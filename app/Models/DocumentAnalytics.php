<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAnalytics extends Model
{
    use HasFactory;

    protected $fillable = [
        'generated_document_id',
        'action_type',
        'ip_address',
        'user_agent',
        'metadata',
        'created_at',
    ];

    protected $casts = [
        'metadata' => 'array',
        'created_at' => 'datetime',
    ];

    public $timestamps = false;

    public function generatedDocument()
    {
        return $this->belongsTo(GeneratedDocument::class);
    }

    public static function track($documentId, $action, $metadata = [])
    {
        return self::create([
            'generated_document_id' => $documentId,
            'action_type' => $action,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'metadata' => $metadata,
            'created_at' => now(),
        ]);
    }

    public function scopeForDocument($query, $documentId)
    {
        return $query->where('generated_document_id', $documentId);
    }

    public function scopeByAction($query, $action)
    {
        return $query->where('action_type', $action);
    }

    public function scopeInPeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }
}
