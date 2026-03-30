<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\Template;
use App\Models\GeneratedDocument;
use App\Services\DocumentGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class DocumentController extends Controller
{
    protected $documentGeneratorService;

    public function __construct(DocumentGeneratorService $documentGeneratorService)
    {
        $this->documentGeneratorService = $documentGeneratorService;
    }

    /**
     * Show document form page (alias for route compatibility)
     */
    public function showForm($slug)
    {
        return $this->form($slug);
    }

    /**
     * Show document form page
     */
    public function form($slug)
    {
        $documentType = DocumentType::where('slug', $slug)->firstOrFail();
        $templates = Template::where('document_type_id', $documentType->id)
            ->where('is_active', true)
            ->orderBy('is_premium', 'asc')
            ->get();

        if ($templates->isEmpty()) {
            abort(404, 'Template tidak tersedia untuk jenis surat ini.');
        }

        return view('documents.form', compact('documentType', 'templates'));
    }

    /**
     * Generate document with security and validation
     */
    public function generate(Request $request, $slug)
    {
        // Rate limiting check
        $rateLimitKey = 'document_gen_' . $request->ip();
        $rateLimitCount = Cache::get($rateLimitKey, 0);

        if ($rateLimitCount >= 5) {
            return redirect()
                ->back()
                ->with('error', 'Terlalu banyak permintaan. Silakan coba lagi dalam beberapa menit.')
                ->withInput();
        }

        // Increment rate limit
        Cache::put($rateLimitKey, $rateLimitCount + 1, 300); // 5 minutes

        $documentType = DocumentType::where('slug', $slug)->firstOrFail();

        // Validate template exists and is active
        $template = Template::where('id', $request->template_id)
            ->where('document_type_id', $documentType->id)
            ->where('is_active', true)
            ->first();

        if (!$template) {
            return redirect()
                ->back()
                ->with('error', 'Template tidak valid.')
                ->withInput();
        }

        // Get and validate placeholders
        preg_match_all('/\{\{([^}]+)\}\}/', $template->content, $matches);
        $placeholders = array_unique($matches[1] ?? []);

        // Build validation rules dynamically
        $rules = [];
        $messages = [];

        foreach ($placeholders as $placeholder) {
            $fieldName = str_replace([' ', '-'], '_', $placeholder);

            if (str_contains($placeholder, 'email')) {
                $rules[$fieldName] = ['required', 'email', 'max:255'];
                $messages[$fieldName . '.required'] = 'Email wajib diisi';
                $messages[$fieldName . '.email'] = 'Format email tidak valid';
                $messages[$fieldName . '.max'] = 'Email maksimal 255 karakter';
            } elseif (str_contains($placeholder, 'telepon') || str_contains($placeholder, 'phone')) {
                $rules[$fieldName] = ['required', 'string', 'max:20', 'regex:/^[\d\s\-\+\(\)]+$/'];
                $messages[$fieldName . '.required'] = 'Nomor telepon wajib diisi';
                $messages[$fieldName . '.regex'] = 'Format nomor telepon tidak valid';
                $messages[$fieldName . '.max'] = 'Nomor telepon maksimal 20 karakter';
            } elseif (str_contains($placeholder, 'tanggal') || str_contains($placeholder, 'date')) {
                $rules[$fieldName] = ['required', 'date', 'before_or_equal:today'];
                $messages[$fieldName . '.required'] = 'Tanggal wajib diisi';
                $messages[$fieldName . '.date'] = 'Format tanggal tidak valid';
                $messages[$fieldName . '.before_or_equal'] = 'Tanggal tidak boleh lebih dari hari ini';
            } else {
                $rules[$fieldName] = ['required', 'string', 'max:255'];
                $messages[$fieldName . '.required'] = 'Field ini wajib diisi';
                $messages[$fieldName . '.max'] = 'Maksimal 255 karakter';
            }
        }

        // Add photo validation for CV
        if ($documentType->slug === 'cv-generator') {
            $rules['profile_photo'] = ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'];
            $messages['profile_photo.mimes'] = 'Format foto harus JPEG atau PNG';
            $messages['profile_photo.max'] = 'Ukuran foto maksimal 2MB';
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Sanitize input data
        $sanitizedData = [];
        foreach ($placeholders as $placeholder) {
            $fieldName = str_replace([' ', '-'], '_', $placeholder);
            $value = $request->input($fieldName);

            // Sanitize HTML and special characters
            $sanitizedData[$placeholder] = $this->sanitizeInput($value);
        }

        // Handle photo upload for CV
        $photoPath = null;
        if ($documentType->slug === 'cv-generator' && $request->hasFile('profile_photo')) {
            $photoPath = $this->handlePhotoUpload($request->file('profile_photo'));
            if (!$photoPath) {
                return redirect()
                    ->back()
                    ->with('error', 'Gagal mengupload foto.')
                    ->withInput();
            }
        }

        try {
            // Generate document
            $content = $this->documentGeneratorService->generateDocument(
                $template->content,
                $sanitizedData,
                $photoPath
            );

            // Save to database
            $generatedDocument = GeneratedDocument::create([
                'document_type_id' => $documentType->id,
                'template_id' => $template->id,
                'data_json' => json_encode($sanitizedData),
                'generated_content' => $content,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Store in session for recent history
            $this->storeRecentDocument($generatedDocument);

            return redirect()
                ->route('documents.result', $generatedDocument->id)
                ->with('success', 'Surat berhasil dibuat!');

        } catch (\Exception $e) {
            \Log::error('Document generation failed: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat membuat surat. Silakan coba lagi.')
                ->withInput();
        }
    }

    /**
     * Show result page
     */
    public function result($id)
    {
        $generatedDocument = GeneratedDocument::with(['documentType', 'template'])
            ->findOrFail($id);

        return view('documents.result', compact('generatedDocument'));
    }

    /**
     * Download PDF
     */
    public function downloadPdf($id)
    {
        $generatedDocument = GeneratedDocument::findOrFail($id);

        try {
            $pdf = $this->documentGeneratorService->generatePDF(
                $generatedDocument->generated_content,
                $generatedDocument->documentType->name
            );

            return $pdf->download('surat-' . $generatedDocument->documentType->slug . '-' . $generatedDocument->id . '.pdf');
        } catch (\Exception $e) {
            \Log::error('PDF generation failed: ' . $e->getMessage());

            return redirect()
                ->back()
                ->with('error', 'Gagal membuat PDF. Silakan coba lagi.');
        }
    }

    /**
     * Copy text to clipboard
     */
    public function copyText($id): JsonResponse
    {
        $generatedDocument = GeneratedDocument::findOrFail($id);

        return response()->json([
            'success' => true,
            'text' => $generatedDocument->generated_content
        ]);
    }

    /**
     * Sanitize user input to prevent XSS
     */
    private function sanitizeInput($input)
    {
        if (is_string($input)) {
            // Remove HTML tags and special characters
            $input = strip_tags($input);
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            $input = trim($input);

            // Remove potentially dangerous characters
            $input = preg_replace('/[<>\'"&]/', '', $input);
            $input = str_replace(['javascript:', 'vbscript:', 'onload=', 'onerror='], '', $input);
        }

        return $input;
    }

    /**
     * Handle photo upload for CV
     */
    private function handlePhotoUpload($file)
    {
        try {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            // Store in storage/app/public/photos
            $path = $file->storeAs('photos', $filename, 'public');

            // Resize and optimize image
            $this->resizeImage(storage_path('app/public/' . $path));

            return $path;
        } catch (\Exception $e) {
            \Log::error('Photo upload failed: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Resize and optimize image
     */
    private function resizeImage($path)
    {
        try {
            $image = imagecreatefromstring(file_get_contents($path));

            if ($image) {
                // Get current dimensions
                $width = imagesx($image);
                $height = imagesy($image);

                // Calculate new dimensions (max 200x200)
                $maxSize = 200;
                if ($width > $maxSize || $height > $maxSize) {
                    $ratio = min($maxSize / $width, $maxSize / $height);
                    $newWidth = (int) ($width * $ratio);
                    $newHeight = (int) ($height * $ratio);

                    $resized = imagecreatetruecolor($newWidth, $newHeight);
                    imagecopyresampled($resized, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                    imagedestroy($image);
                    $image = $resized;
                }

                // Save optimized image
                imagejpeg($image, $path, 85);
                imagedestroy($image);
            }
        } catch (\Exception $e) {
            \Log::error('Image resize failed: ' . $e->getMessage());
        }
    }

    /**
     * Store recent document in session
     */
    private function storeRecentDocument($document)
    {
        $recent = session('recent_documents', []);

        // Add to beginning of array
        array_unshift($recent, [
            'id' => $document->id,
            'type' => $document->documentType->name,
            'created_at' => $document->created_at->format('d M Y H:i')
        ]);

        // Keep only last 5 documents
        $recent = array_slice($recent, 0, 5);

        session(['recent_documents' => $recent]);
    }

    /**
     * Get recent documents
     */
    public function getRecent(): JsonResponse
    {
        $recent = session('recent_documents', []);

        return response()->json([
            'success' => true,
            'documents' => $recent
        ]);
    }

    /**
     * Show document preview gallery
     */
    public function previewGallery()
    {
        return view('documents.preview');
    }
}
