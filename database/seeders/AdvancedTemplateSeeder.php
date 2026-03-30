<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;
use App\Models\DocumentField;

class AdvancedTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Enhanced CV Template with custom fields
        $cvTemplate = Template::where('slug', 'cv-modern')->first();
        if ($cvTemplate) {
            $fields = [
                [
                    'field_name' => 'nama_lengkap',
                    'field_type' => 'text',
                    'field_label' => 'Nama Lengkap',
                    'field_placeholder' => 'Masukkan nama lengkap Anda',
                    'is_required' => true,
                    'validation_rules' => ['string', 'max:255'],
                    'sort_order' => 1,
                ],
                [
                    'field_name' => 'email',
                    'field_type' => 'email',
                    'field_label' => 'Email',
                    'field_placeholder' => 'email@example.com',
                    'is_required' => true,
                    'validation_rules' => ['email', 'max:255'],
                    'sort_order' => 2,
                ],
                [
                    'field_name' => 'telepon',
                    'field_type' => 'phone',
                    'field_label' => 'Nomor Telepon',
                    'field_placeholder' => '+62 812-3456-7890',
                    'is_required' => true,
                    'validation_rules' => ['regex:/^[\d\s\-\+\(\)]+$'],
                    'sort_order' => 3,
                ],
                [
                    'field_name' => 'alamat',
                    'field_type' => 'textarea',
                    'field_label' => 'Alamat Lengkap',
                    'field_placeholder' => 'Masukkan alamat lengkap Anda',
                    'is_required' => true,
                    'validation_rules' => ['string', 'max:500'],
                    'sort_order' => 4,
                ],
                [
                    'field_name' => 'posisi_yang_dilamar',
                    'field_type' => 'text',
                    'field_label' => 'Posisi yang Dilamar',
                    'field_placeholder' => 'Contoh: Marketing Manager',
                    'is_required' => true,
                    'validation_rules' => ['string', 'max:255'],
                    'sort_order' => 5,
                ],
                [
                    'field_name' => 'pengalaman_kerja',
                    'field_type' => 'textarea',
                    'field_label' => 'Pengalaman Kerja',
                    'field_placeholder' => 'Jelaskan pengalaman kerja Anda...',
                    'is_required' => false,
                    'validation_rules' => ['string', 'max:1000'],
                    'sort_order' => 6,
                ],
                [
                    'field_name' => 'pendidikan',
                    'field_type' => 'select',
                    'field_label' => 'Pendidikan Terakhir',
                    'field_options' => ['SMA/SMK', 'D3', 'S1', 'S2', 'S3'],
                    'field_placeholder' => 'Pilih pendidikan',
                    'is_required' => true,
                    'validation_rules' => ['string'],
                    'sort_order' => 7,
                ],
                [
                    'field_name' => 'keahlian',
                    'field_type' => 'checkbox',
                    'field_label' => 'Keahlian',
                    'field_options' => ['Microsoft Office', 'Digital Marketing', 'Graphic Design', 'Web Development', 'Data Analysis', 'Public Speaking'],
                    'field_placeholder' => 'Pilih keahlian Anda',
                    'is_required' => false,
                    'validation_rules' => ['array'],
                    'sort_order' => 8,
                ],
            ];

            foreach ($fields as $field) {
                DocumentField::create(array_merge($field, ['template_id' => $cvTemplate->id]));
            }
        }

        // Enhanced Surat Lamaran Template
        $lamaranTemplate = Template::where('slug', 'lamaran-professional')->first();
        if ($lamaranTemplate) {
            $fields = [
                [
                    'field_name' => 'nama_lengkap',
                    'field_type' => 'text',
                    'field_label' => 'Nama Lengkap',
                    'field_placeholder' => 'Masukkan nama lengkap Anda',
                    'is_required' => true,
                    'validation_rules' => ['string', 'max:255'],
                    'sort_order' => 1,
                ],
                [
                    'field_name' => 'email',
                    'field_type' => 'email',
                    'field_label' => 'Email',
                    'field_placeholder' => 'email@example.com',
                    'is_required' => true,
                    'validation_rules' => ['email', 'max:255'],
                    'sort_order' => 2,
                ],
                [
                    'field_name' => 'telepon',
                    'field_type' => 'phone',
                    'field_label' => 'Nomor Telepon',
                    'field_placeholder' => '+62 812-3456-7890',
                    'is_required' => true,
                    'validation_rules' => ['regex:/^[\d\s\-\+\(\)]+$'],
                    'sort_order' => 3,
                ],
                [
                    'field_name' => 'alamat',
                    'field_type' => 'textarea',
                    'field_label' => 'Alamat',
                    'field_placeholder' => 'Masukkan alamat Anda',
                    'is_required' => true,
                    'validation_rules' => ['string', 'max:500'],
                    'sort_order' => 4,
                ],
                [
                    'field_name' => 'perusahaan',
                    'field_type' => 'text',
                    'field_label' => 'Nama Perusahaan',
                    'field_placeholder' => 'PT Nama Perusahaan',
                    'is_required' => true,
                    'validation_rules' => ['string', 'max:255'],
                    'sort_order' => 5,
                ],
                [
                    'field_name' => 'hrd_name',
                    'field_type' => 'text',
                    'field_label' => 'Nama HRD/Manager',
                    'field_placeholder' => 'Bapak/Ibu HRD Manager',
                    'is_required' => false,
                    'validation_rules' => ['string', 'max:255'],
                    'sort_order' => 6,
                ],
                [
                    'field_name' => 'posisi_yang_dilamar',
                    'field_type' => 'text',
                    'field_label' => 'Posisi yang Dilamar',
                    'field_placeholder' => 'Contoh: Marketing Manager',
                    'is_required' => true,
                    'validation_rules' => ['string', 'max:255'],
                    'sort_order' => 7,
                ],
                [
                    'field_name' => 'informasi_lowongan',
                    'field_type' => 'select',
                    'field_label' => 'Sumber Informasi Lowongan',
                    'field_options' => ['Website Perusahaan', 'LinkedIn', 'Job Portal', 'Rekan/Kerabat', 'Media Sosial', 'Lainnya'],
                    'field_placeholder' => 'Pilih sumber informasi',
                    'is_required' => false,
                    'validation_rules' => ['string'],
                    'sort_order' => 8,
                ],
            ];

            foreach ($fields as $field) {
                DocumentField::create(array_merge($field, ['template_id' => $lamaranTemplate->id]));
            }
        }
    }
}
