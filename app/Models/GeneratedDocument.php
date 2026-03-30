<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneratedDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'template_id',
        'title',
        'content',
        'data_json',
        'file_path',
        'user_ip',
        'user_agent',
        'session_id',
        'user_profile_id',
    ];

    protected $casts = [
        'data_json' => 'array',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }

    public function shares()
    {
        return $this->hasMany(DocumentShare::class);
    }

    public function analytics()
    {
        return $this->hasMany(DocumentAnalytics::class);
    }

    public function trackAction($action, $metadata = [])
    {
        return DocumentAnalytics::track($this->id, $action, $metadata);
    }

    public function createShare($options = [])
    {
        return DocumentShare::create(array_merge([
            'generated_document_id' => $this->id,
        ], $options));
    }

    public function getActiveShares()
    {
        return $this->shares()->active()->get();
    }

    public function getAnalyticsSummary()
    {
        return [
            'views' => $this->analytics()->where('action_type', 'viewed')->count(),
            'downloads' => $this->analytics()->where('action_type', 'downloaded')->count(),
            'shares' => $this->analytics()->where('action_type', 'shared')->count(),
            'total_views' => $this->shares()->sum('view_count'),
        ];
    }
}
