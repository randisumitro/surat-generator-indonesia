<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'session_id',
        'name',
        'email',
        'phone',
        'preferences',
        'document_count',
        'last_activity',
    ];

    protected $casts = [
        'preferences' => 'array',
        'document_count' => 'integer',
        'last_activity' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function generatedDocuments()
    {
        return $this->hasMany(GeneratedDocument::class);
    }

    public function incrementDocumentCount()
    {
        $this->increment('document_count');
        $this->update(['last_activity' => now()]);
    }

    public function updateActivity()
    {
        $this->update(['last_activity' => now()]);
    }

    public static function getOrCreateProfile($userId = null, $sessionId = null)
    {
        if ($userId) {
            return self::firstOrCreate(['user_id' => $userId], [
                'document_count' => 0,
                'last_activity' => now(),
            ]);
        }

        if ($sessionId) {
            return self::firstOrCreate(['session_id' => $sessionId], [
                'document_count' => 0,
                'last_activity' => now(),
            ]);
        }

        return null;
    }

    public function getPreference($key, $default = null)
    {
        return $this->preferences[$key] ?? $default;
    }

    public function setPreference($key, $value)
    {
        $preferences = $this->preferences ?? [];
        $preferences[$key] = $value;
        $this->update(['preferences' => $preferences]);
    }
}
