<?php

use Illuminate\Database\Seeder;
use App\Models\DocumentCategory;

class DocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Surat Lamaran Kerja',
                'slug' => 'surat-lamaran',
                'description' => 'Template surat lamaran kerja profesional untuk berbagai posisi',
                'icon' => '📄',
                'sort_order' => 1,
            ],
            [
                'name' => 'Curriculum Vitae',
                'slug' => 'cv',
                'description' => 'Template CV modern dan profesional untuk berbagai industri',
                'icon' => '👤',
                'sort_order' => 2,
            ],
            [
                'name' => 'Surat Keterangan',
                'slug' => 'surat-keterangan',
                'description' => 'Template surat keterangan resmi untuk berbagai keperluan',
                'icon' => '📋',
                'sort_order' => 3,
            ],
            [
                'name' => 'Surat Resmi',
                'slug' => 'surat-resmi',
                'description' => 'Template surat resmi dan formal untuk keperluan administrasi',
                'icon' => '📝',
                'sort_order' => 4,
            ],
            [
                'name' => 'Dokumen Bisnis',
                'slug' => 'bisnis',
                'description' => 'Template dokumen bisnis dan korporat',
                'icon' => '💼',
                'sort_order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            DocumentCategory::create($category);
        }
    }
}
