<?php

namespace App\Services;

use App\Models\DocumentType;
use App\Models\Template;
use App\Models\GeneratedDocument;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DocumentGeneratorService
{
    /**
     * Generate document content by replacing placeholders
     */
    public function generateDocument($template, $data, $photoPath = null)
    {
        $content = $template;

        // Replace placeholders with actual data
        foreach ($data as $key => $value) {
            $content = str_replace('{{' . $key . '}}', $value, $content);
        }

        // Handle photo insertion for CV
        if ($photoPath && str_contains($content, '{{profile_photo}}')) {
            $content = str_replace('{{profile_photo}}', '<div class="photo-section"><img src="' . asset('storage/' . $photoPath) . '" alt="Profile Photo" style="max-width: 120px; max-height: 150px; border-radius: 8px; margin-bottom: 15px;"></div>', $content);
        }

        return $content;
    }

    /**
     * Generate PDF from content
     */
    public function generatePDF($content, $title = 'Document')
    {
        $pdf = new \Dompdf\Dompdf();

        // Set paper size and orientation
        $pdf->setPaper('A4');
        $pdf->setOrientation('portrait');

        // Set margins (in mm)
        $pdf->set_option('margin-top', 20);
        $pdf->set_option('margin-bottom', 20);
        $pdf->set_option('margin-left', 20);
        $pdf->set_option('margin-right', 20);

        // Set font
        $pdf->set_option('defaultFont', 'Times New Roman');
        $pdf->set_option('fontDir', public_path('fonts/'));

        // Load HTML content
        $html = view('pdf.document', [
            'content' => $content,
            'documentType' => (object)['name' => $title],
            'data_json' => [],
            'photoPath' => $photoPath
        ])->render();

        $pdf->loadHtml($html);

        return $pdf;
    }

    /**
     * Extract placeholders from template content
     */
    public function extractPlaceholders($content)
    {
        preg_match_all('/\{\{([^}]+)\}\}/', $content, $matches);
        return array_unique($matches[1] ?? []);
    }

    /**
     * Validate required placeholders
     */
    public function validateRequiredPlaceholders($content, $data)
    {
        $placeholders = $this->extractPlaceholders($content);
        $missing = [];

        foreach ($placeholders as $placeholder) {
            if (!isset($data[$placeholder]) || empty($data[$placeholder])) {
                $missing[] = $placeholder;
            }
        }

        return $missing;
    }

    /**
     * Clean and format content for PDF
     */
    public function cleanContentForPDF($content)
    {
        // Remove any potentially harmful HTML
        $content = strip_tags($content, '<p><br><strong><em><ul><ol><li><h1><h2><h3><h4><h5><h6><div><span><img>');

        // Clean up extra whitespace
        $content = preg_replace('/\s+/', ' ', $content);
        $content = trim($content);

        return $content;
    }

    /**
     * Format content for web display
     */
    public function formatContentForWeb($content)
    {
        // Convert line breaks to <br> tags
        $content = nl2br($content);

        // Add proper paragraph formatting
        $content = '<div class="document-content">' . $content . '</div>';

        return $content;
    }
}
