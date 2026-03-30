<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DocumentShare extends Model
{
    use HasFactory;

    protected $fillable = [
        'generated_document_id',
        'share_token',
        'share_url',
        'is_protected',
        'password',
        'expires_at',
        'view_count',
        'is_active',
    ];

    protected $casts = [
        'is_protected' => 'boolean',
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($share) {
            $share->share_token = Str::random(32);
            $share->share_url = route('documents.shared', $share->share_token);
        });
    }

    public function generatedDocument()
    {
        return $this->belongsTo(GeneratedDocument::class);
    }

    public function analytics()
    {
        return $this->hasMany(DocumentAnalytics::class, 'document_id');
    }

    public function isExpired()
    {
        return $this->expires_at && $this->expires_at->isPast();
    }

    public function isValid()
    {
        return $this->is_active && !$this->isExpired();
    }

    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                    ->where(function ($q) {
                        $q->whereNull('expires_at')
                          ->orWhere('expires_at', '>', now());
                    });
    }
}
