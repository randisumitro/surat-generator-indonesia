<?php

namespace App\Http\Controllers;

use App\Models\DocumentCategory;
use App\Models\DocumentType;
use App\Models\Template;
use App\Models\DocumentField;
use App\Models\GeneratedDocument;
use App\Models\DocumentShare;
use App\Models\DocumentAnalytics;
use App\Models\UserProfile;
use App\Services\DocumentGeneratorService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\DocumentShared;

class AdvancedDocumentController extends Controller
{
    protected $documentGeneratorService;

    public function __construct(DocumentGeneratorService $documentGeneratorService)
    {
        $this->documentGeneratorService = $documentGeneratorService;
    }

    /**
     * Show document form with advanced fields
     */
    public function showAdvancedForm($slug)
    {
        $documentType = DocumentType::where('slug', $slug)
            ->with(['category', 'templates.fields'])
            ->firstOrFail();

        $templates = $documentType->templates()
            ->where('is_active', true)
            ->with('fields')
            ->orderBy('sort_order')
            ->get();

        if ($templates->isEmpty()) {
            abort(404, 'Template tidak tersedia untuk jenis surat ini.');
        }

        return view('documents.advanced-form', compact('documentType', 'templates'));
    }

    /**
     * Generate document with advanced validation
     */
    public function generateAdvanced(Request $request, $slug)
    {
        // Rate limiting check
        $rateLimitKey = 'document_gen_' . $request->ip();
        $rateLimitCount = Cache::get($rateLimitKey, 0);

        if ($rateLimitCount >= 5) {
            return response()->json([
                'success' => false,
                'message' => 'Terlalu banyak permintaan. Silakan coba lagi dalam beberapa menit.'
            ], 429);
        }

        // Increment rate limit
        Cache::put($rateLimitKey, $rateLimitCount + 1, 300);

        $documentType = DocumentType::where('slug', $slug)->firstOrFail();
        $template = Template::where('id', $request->template_id)
            ->where('document_type_id', $documentType->id)
            ->where('is_active', true)
            ->with('fields')
            ->firstOrFail();

        // Build validation rules from fields
        $rules = [];
        $messages = [];

        foreach ($template->fields as $field) {
            $fieldRules = $field->getValidationRulesAttribute();
            $rules[$field->field_name] = $fieldRules;
            
            $messages[$field->field_name . '.required'] = $field->field_label . ' wajib diisi';
            
            if ($field->field_type === 'email') {
                $messages[$field->field_name . '.email'] = 'Format ' . strtolower($field->field_label) . ' tidak valid';
            } elseif ($field->field_type === 'phone') {
                $messages[$field->field_name . '.regex'] = 'Format ' . strtolower($field->field_label) . ' tidak valid';
            }
        }

        // Validate request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Process data
            $data = $request->all();
            $sanitizedData = $this->sanitizeInput($data);

            // Handle photo upload for CV
            $photoPath = null;
            if ($documentType->slug === 'cv-generator' && $request->hasFile('profile_photo')) {
                $photoPath = $this->handlePhotoUpload($request->file('profile_photo'));
            }

            // Generate document
            $content = $this->documentGeneratorService->generateDocument($template, $sanitizedData, $photoPath);
            $pdfContent = $this->documentGeneratorService->generatePDF($content, $template->name);

            // Save to storage
            $fileName = 'documents/' . Str::uuid() . '.pdf';
            Storage::put($fileName, $pdfContent);

            // Create user profile
            $userProfile = UserProfile::getOrCreateProfile(
                null, // user_id (no auth)
                session()->getId()
            );

            // Save generated document
            $generatedDocument = GeneratedDocument::create([
                'document_type_id' => $documentType->id,
                'template_id' => $template->id,
                'title' => $template->name,
                'content' => $content,
                'data_json' => $sanitizedData,
                'file_path' => $fileName,
                'user_ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'session_id' => session()->getId(),
                'user_profile_id' => $userProfile->id,
            ]);

            // Track analytics
            $generatedDocument->trackAction('created');

            // Update user profile
            $userProfile->incrementDocumentCount();

            // Store in session for recent documents
            $this->storeRecentDocument($generatedDocument);

            return response()->json([
                'success' => true,
                'document_id' => $generatedDocument->id,
                'message' => 'Dokumen berhasil dibuat'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat membuat dokumen. Silakan coba lagi.'
            ], 500);
        }
    }

    /**
     * Share document
     */
    public function shareDocument(Request $request, $id)
    {
        $document = GeneratedDocument::findOrFail($id);

        $request->validate([
            'expires_at' => 'nullable|date|after:now',
            'password' => 'nullable|string|min:4',
            'is_protected' => 'boolean'
        ]);

        $share = $document->createShare([
            'expires_at' => $request->expires_at,
            'password' => $request->is_protected ? bcrypt($request->password) : null,
            'is_protected' => $request->boolean('is_protected'),
        ]);

        // Track sharing
        $document->trackAction('shared', ['share_id' => $share->id]);

        return response()->json([
            'success' => true,
            'share_url' => $share->share_url,
            'share_token' => $share->share_token
        ]);
    }

    /**
     * View shared document
     */
    public function viewSharedDocument($token)
    {
        $share = DocumentShare::where('share_token', $token)
            ->with('generatedDocument.documentType', 'generatedDocument.template')
            ->active()
            ->firstOrFail();

        if ($share->isExpired()) {
            abort(404, 'Link sharing telah kedaluwarsa');
        }

        // Track view
        $share->incrementViewCount();
        $share->generatedDocument->trackAction('viewed', ['share_id' => $share->id]);

        return view('documents.shared', compact('share'));
    }

    /**
     * Get document analytics
     */
    public function getDocumentAnalytics($id): JsonResponse
    {
        $document = GeneratedDocument::findOrFail($id);
        $analytics = $document->getAnalyticsSummary();

        return response()->json([
            'success' => true,
            'analytics' => $analytics
        ]);
    }

    /**
     * Get user dashboard data
     */
    public function getUserDashboard(): JsonResponse
    {
        $userProfile = UserProfile::getOrCreateProfile(null, session()->getId());
        
        $recentDocuments = GeneratedDocument::where('user_profile_id', $userProfile->id)
            ->with('documentType', 'template')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        $documentStats = [
            'total' => $userProfile->document_count,
            'this_week' => GeneratedDocument::where('user_profile_id', $userProfile->id)
                ->where('created_at', '>=', now()->subWeek())
                ->count(),
            'this_month' => GeneratedDocument::where('user_profile_id', $userProfile->id)
                ->where('created_at', '>=', now()->subMonth())
                ->count(),
        ];

        return response()->json([
            'success' => true,
            'profile' => $userProfile,
            'recent_documents' => $recentDocuments,
            'stats' => $documentStats
        ]);
    }

    /**
     * Sanitize input data
     */
    private function sanitizeInput($data)
    {
        $sanitized = [];
        
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $sanitized[$key] = array_map(function($item) {
                    return htmlspecialchars(strip_tags($item), ENT_QUOTES, 'UTF-8');
                }, $value);
            } else {
                $sanitized[$key] = htmlspecialchars(strip_tags($value), ENT_QUOTES, 'UTF-8');
            }
        }
        
        return $sanitized;
    }

    /**
     * Handle photo upload
     */
    private function handlePhotoUpload($photo)
    {
        $validator = Validator::make(['photo' => $photo], [
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($validator->fails()) {
            throw new \Exception('Format foto tidak valid. Gunakan JPG/PNG maksimal 2MB.');
        }

        $path = $photo->store('photos', 'public');
        
        // Resize and optimize
        $this->resizeImage(storage_path('app/public/' . $path));
        
        return $path;
    }

    /**
     * Resize image
     */
    private function resizeImage($imagePath)
    {
        try {
            $image = \Intervention\Image\Facades\Image::make($imagePath);
            $image->resize(300, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($imagePath, 85);
        } catch (\Exception $e) {
            // Log error but continue
        }
    }

    /**
     * Store recent document in session
     */
    private function storeRecentDocument($document)
    {
        $recent = session('recent_documents', []);
        
        $newDoc = [
            'id' => $document->id,
            'type' => $document->documentType->name,
            'title' => $document->title,
            'created_at' => $document->created_at->toISOString(),
            'template_name' => $document->template->name
        ];
        
        // Remove existing document with same ID
        $recent = array_filter($recent, function($doc) use ($document) {
            return $doc['id'] !== $document->id;
        });
        
        // Add new document to beginning
        array_unshift($recent, $newDoc);
        
        // Keep only last 5 documents
        $recent = array_slice($recent, 0, 5);
        
        session(['recent_documents' => $recent]);
    }
}
