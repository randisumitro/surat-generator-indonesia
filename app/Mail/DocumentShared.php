<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\DocumentShare;

class DocumentShared extends Mailable
{
    use Queueable, SerializesModels;

    public $share;
    public $document;

    public function __construct(DocumentShare $share)
    {
        $this->share = $share;
        $this->document = $share->generatedDocument;
    }

    public function build()
    {
        return $this->subject('Dokumen Dibagikan: ' . $this->document->title)
                    ->view('emails.document-shared')
                    ->with([
                        'share' => $this->share,
                        'document' => $this->document,
                    ]);
    }
}
