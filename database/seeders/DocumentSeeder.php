<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentType;
use App\Models\Template;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        // Create Document Types
        $suratLamaranKerja = DocumentType::create([
            'name' => 'Surat Lamaran Kerja',
            'slug' => 'surat-lamaran-kerja',
            'description' => 'Template surat lamaran kerja profesional untuk berbagai posisi',
        ]);

        $suratKeterangan = DocumentType::create([
            'name' => 'Surat Keterangan',
            'slug' => 'surat-keterangan',
            'description' => 'Template surat keterangan umum untuk berbagai keperluan',
        ]);

        $cvGenerator = DocumentType::create([
            'name' => 'CV Generator',
            'slug' => 'cv-generator',
            'description' => 'Template CV/Resume profesional dan modern',
        ]);

        // Create Templates for Surat Lamaran Kerja
        Template::create([
            'document_type_id' => $suratLamaranKerja->id,
            'name' => 'Template Formal Standar',
            'content' => '{{nama_lengkap}}
{{alamat}}
{{email}} | {{telepon}}
{{tanggal}}

Hal: Lamaran Pekerjaan sebagai {{posisi}}

Kepada Yth.
Bapak/Ibu Manajer HRD
{{nama_perusahaan}}
{{alamat_perusahaan}}

Dengan hormat,

Berdasarkan informasi lowongan pekerjaan yang saya peroleh dari {{sumber_info}}, saya bermaksud mengajukan lamaran untuk posisi {{posisi}} di perusahaan yang Bapak/Ibu pimpin.

Saya adalah lulusan {{pendidikan_terakhir}} dengan jurusan {{jurusan}} dan memiliki pengalaman kerja selama {{pengalaman_tahun}} tahun di bidang terkait. Selama berkarir, saya telah mengembangkan berbagai kompetensi yang relevan dengan posisi ini, di antaranya:

• {{skill_1}}
• {{skill_2}}
• {{skill_3}}

Saya yakin bahwa pengalaman dan kemampuan yang saya miliki dapat memberikan kontribusi positif bagi kemajuan perusahaan. Saya adalah individu yang {{deskripsi_diri}} dan selalu berkomitmen untuk memberikan yang terbaik.

Bersama surat ini, saya lampirkan:
1. Curriculum Vitae
2. Fotokopi Ijazah Terakhir
3. Fotokopi Transkip Nilai
4. Pas Foto Terbaru
5. {{dokumen_tambahan}}

Saya sangat berharap dapat diberikan kesempatan untuk mengikuti tahap seleksi selanjutnya. Atas perhatian dan waktu yang Bapak/Ibu berikan, saya ucapkan terima kasih.

Hormat saya,

{{nama_lengkap}}
{{tanda_tangan}}',
            'is_premium' => false,
            'is_active' => true,
        ]);

        Template::create([
            'document_type_id' => $suratLamaranKerja->id,
            'name' => 'Template Modern',
            'content' => '{{nama_lengkap}}
📱 {{telepon}} | ✉️ {{email}} | 📍 {{alamat}}
🔗 LinkedIn: {{linkedin}} | 🌐 Portfolio: {{portfolio}}

{{tanggal}}

Subject: Application for {{posisi}} Position

Dear Hiring Manager at {{nama_perusahaan}},

I am excited to apply for the {{posisi}} position at {{nama_perusahaan}}. With my background in {{bidang_keahlian}} and {{pengalaman_tahun}} years of experience, I am confident in my ability to contribute to your team\'s success.

Professional Highlights:
• {{prestasi_1}}
• {{prestasi_2}}
• {{prestasi_3}}

Key Skills:
• {{skill_1}}
• {{skill_2}}
• {{skill_3}}

I am particularly drawn to {{nama_perusahaan}} because of {{alasan_tertarik}}. Your company\'s values and mission align perfectly with my professional goals.

I would welcome the opportunity to discuss how my experience and skills would be beneficial to your organization. Thank you for considering my application.

Best regards,

{{nama_lengkap}}
{{tanda_tangan}}',
            'is_premium' => true,
            'is_active' => true,
        ]);

        // Create Templates for Surat Keterangan
        Template::create([
            'document_type_id' => $suratKeterangan->id,
            'name' => 'Surat Keterangan Kerja',
            'content' => '{{kop_surat}}

SURAT KETERANGAN KERJA
Nomor: {{nomor_surat}}

Yang bertanda tangan di bawah ini:

{{nama_penandatangan}}
{{jabatan_penandatangan}}
{{nama_perusahaan}}
{{alamat_perusahaan}}

Menerangkan bahwa:

Nama                    : {{nama_karyawan}}
Tempat, Tanggal Lahir   : {{tempat_lahir}}, {{tanggal_lahir}}
Alamat                  : {{alamat_karyawan}}
Jabatan                 : {{jabatan_karyawan}}
Mulai Kerja             : {{tanggal_mulai_kerja}}
Status                  : {{status_karyawan}}

Adalah benar karyawan di {{nama_perusahaan}} sejak {{tanggal_mulai_kerja}} hingga saat ini dengan jabatan {{jabatan_karyawan}}.

Selama bekerja di perusahaan kami, yang bersangkutan menunjukkan kinerja yang baik dan memiliki track record yang {{kinerja_desc}}.

Demikian surat keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.

{{tempat}}, {{tanggal_pembuatan}}

{{nama_penandatangan}}
{{jabatan_penandatangan}}
{{tanda_tangan}}',
            'is_premium' => false,
            'is_active' => true,
        ]);

        Template::create([
            'document_type_id' => $suratKeterangan->id,
            'name' => 'Surat Keterangan Domisili',
            'content' => 'SURAT KETERANGAN DOMISILI
Nomor: {{nomor_surat}}

Yang bertanda tangan di bawah ini:

{{nama_pejabat}}
{{jabatan_pejabat}}
{{nama_institusi}}
{{alamat_institusi}}

Menerangkan bahwa:

Nama Lengkap : {{nama_lengkap}}
Tempat, Tanggal Lahir : {{tempat_lahir}}, {{tanggal_lahir}}
NIK : {{nik}}
Alamat : {{alamat_lengkap}}
RT/RW : {{rt}}/{{rw}}
Kelurahan : {{kelurahan}}
Kecamatan : {{kecamatan}}
Kabupaten/Kota : {{kabupaten_kota}}
Provinsi : {{provinsi}}

Benar-benar bertempat tinggal di alamat tersebut sejak {{sejak_tahun}} hingga sekarang dan masih berdomisili di tempat tersebut.

Surat keterangan ini diterbitkan atas permintaan yang bersangkutan untuk keperluan {{tujuan_surat}}.

Demikian surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya.

{{tempat}}, {{tanggal}}

{{nama_pejabat}}
{{jabatan_pejabat}}

{{tanda_tangan}}

NIP. {{nip_pejabat}}',
            'is_premium' => false,
            'is_active' => true,
        ]);

        Template::create([
            'document_type_id' => $cvGenerator->id,
            'name' => 'CV Professional Modern',
            'content' => 'CURRICULUM VITAE

{{nama_lengkap}}
{{alamat}} • {{telepon}} • {{email}} • {{linkedin}}

---

RINGKASAN PROFESIONAL
Profesional berpengalaman dengan latar belakang {{bidang_keahlian}} yang memiliki track record terbukti dalam {{spesialisasi_1}} dan {{spesialisasi_2}}. Berkomitmen untuk menghasilkan karya berkualitas tinggi dan terus mengembangkan kompetensi sesuai perkembangan industri.

---

RIWAYAT PENDIDIKAN
• {{pendidikan_terakhir}} - {{jurusan}}
  {{nama_institusi}}, {{tahun_lulus}}
  IPK: {{ipk}}
• {{pendidikan_sebelumnya}}
  {{nama_institusi_sebelumnya}}, {{tahun_lulus_sebelumnya}}

---

PENGALAMAN KERJA
{{posisi_terkini}}
{{nama_perusahaan_terkini}} • {{lokasi_perusahaan}}
{{bulan_mulai}} {{tahun_mulai}} - Sekarang

Tanggung Jawab Utama:
• {{tanggung_jawab_1}}
• {{tanggung_jawab_2}}
• {{tanggung_jawab_3}}
• {{tanggung_jawab_4}}

Pencapaian:
• {{prestasi_1}}
• {{prestasi_2}}

{{posisi_sebelumnya}}
{{nama_perusahaan_sebelumnya}} • {{lokasi_perusahaan}}
{{bulan_mulai_sebelumnya}} {{tahun_mulai_sebelumnya}} - {{bulan_selesai_sebelumnya}} {{tahun_selesai_sebelumnya}}

Tanggung Jawab Utama:
• {{tanggung_jawab_5}}
• {{tanggung_jawab_6}}

---

KEAHLIAN TEKNIS
• {{skill_teknis_1}} - {{level_skill_1}}
• {{skill_teknis_2}} - {{level_skill_2}}
• {{skill_teknis_3}} - {{level_skill_3}}
• {{skill_teknis_4}} - {{level_skill_4}}

---

KOMPETENSI LAINNYA
• Bahasa: {{bahasa_1}} ({{kemampuan_bahasa_1}}), {{bahasa_2}} ({{kemampuan_bahasa_2}})
• Software: {{software_1}}, {{software_2}}, {{software_3}}
• Sertifikasi: {{sertifikasi_1}}, {{sertifikasi_2}}

---

REFERENSI
Tersedia upon request

---

Informasi Tambahan
• Tempat, Tanggal Lahir: {{tempat_lahir}}, {{tanggal_lahir}}
• Kewarganegaraan: {{kewarganegaraan}}
• Status: {{status_pernikahan}}',
            'is_premium' => false,
            'is_active' => true,
        ]);

        // Create additional templates for variety
        Template::create([
            'document_type_id' => $suratLamaranKerja->id,
            'name' => 'Template Fresh Graduate',
            'content' => '{{nama_lengkap}}
{{alamat}}
{{email}} | {{telepon}}
{{tanggal}}

Hal: Lamaran Pekerjaan sebagai {{posisi}}

Kepada Yth.
Bapak/Ibu Manajer HRD
{{nama_perusahaan}}
{{alamat_perusahaan}}

Dengan hormat,

Saya adalah fresh graduate lulusan {{pendidikan_terakhir}} jurusan {{jurusan}} dari {{nama_universitas}} dengan sangat tertarik untuk mengajukan lamaran pada posisi {{posisi}} yang diiklankan melalui {{sumber_info}}.

Selama masa studi, saya telah mengembangkan fondasi akademis yang kuat dan terlibat aktif dalam berbagai kegiatan ekstrakurikuler yang membentuk karakter dan kemampuan interpersonal saya. Keahlian yang saya miliki antara lain:

• {{skill_1}} - tingkat {{level_skill_1}}
• {{skill_2}} - tingkat {{level_skill_2}}
• {{skill_3}} - tingkat {{level_skill_3}}

Sebagai individu yang {{deskripsi_diri}}, saya siap untuk belajar dan berkontribusi secara maksimal dalam tim. Saya percaya bahwa semangat, dedikasi, dan kemampuan belajar cepat yang saya miliki akan menjadi nilai tambah bagi perusahaan.

Bersama surat ini, saya lampirkan:
1. Curriculum Vitae
2. Fotokopi Ijazah
3. Fotokopi Transkip Nilai
4. Sertifikat Pendukung
5. Pas Foto Terbaru

Saya sangat berharap dapat diberikan kesempatan untuk wawancara dan membahas lebih lanjut bagaimana saya dapat berkontribusi pada kesuksesan {{nama_perusahaan}}. Terima kasih atas perhatian dan kesempatan yang diberikan.

Hormat saya,

{{nama_lengkap}}
{{tanda_tangan}}',
            'is_premium' => false,
            'is_active' => true,
        ]);
    }
}
