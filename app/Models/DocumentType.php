<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'is_active',
        'category_id',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function activeTemplates()
    {
        return $this->hasMany(Template::class)->where('is_active', true);
    }

    public function generatedDocuments()
    {
        return $this->hasMany(GeneratedDocument::class);
    }

    public function category()
    {
        return $this->belongsTo(DocumentCategory::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getDocumentCount()
    {
        return $this->generatedDocuments()->count();
    }
}
