<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $documentType->name }}</title>
    <style>
        @page {
            margin: 2cm 2.5cm;
            size: A4;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Times New Roman', 'Georgia', serif;
            font-size: 11pt;
            line-height: 1.7;
            color: #1a1a1a;
            background: white;
        }

        /* === SURAT LAMARAN STYLES === */
        .letter-container {
            max-width: 100%;
        }

        .letter-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 3px double #1a1a1a;
        }

        .letter-header h1 {
            font-size: 14pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 5px;
        }

        .letter-date {
            text-align: right;
            margin-bottom: 30px;
            font-style: normal;
        }

        .letter-recipient {
            margin-bottom: 25px;
            line-height: 1.8;
        }

        .letter-recipient strong {
            display: block;
            margin-bottom: 5px;
        }

        .letter-subject {
            margin: 20px 0;
            font-weight: bold;
        }

        .letter-content {
            text-align: justify;
            margin-bottom: 30px;
        }

        .letter-content p {
            margin-bottom: 12px;
            text-indent: 40px;
        }

        .letter-content p:first-child,
        .letter-content .no-indent {
            text-indent: 0;
        }

        .letter-salutation {
            margin-bottom: 15px;
        }

        .letter-closing {
            margin-top: 30px;
        }

        .letter-signature {
            margin-top: 50px;
            text-align: right;
        }

        .letter-signature .signature-line {
            margin-top: 70px;
            border-top: 1px solid #1a1a1a;
            display: inline-block;
            min-width: 200px;
            padding-top: 5px;
            font-weight: bold;
        }

        .letter-attachments {
            margin-top: 30px;
            font-size: 10pt;
        }

        .letter-attachments strong {
            display: block;
            margin-bottom: 8px;
        }

        /* === CV STYLES === */
        .cv-container {
            max-width: 100%;
        }

        .cv-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #2c3e50;
        }

        .cv-header-content {
            flex: 1;
        }

        .cv-name {
            font-size: 24pt;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
            letter-spacing: 1px;
        }

        .cv-title {
            font-size: 12pt;
            color: #555;
            font-style: italic;
            margin-bottom: 10px;
        }

        .cv-contact {
            font-size: 10pt;
            color: #666;
            line-height: 1.6;
        }

        .cv-photo-container {
            width: 90px;
            height: 110px;
            margin-left: 20px;
            border: 2px solid #2c3e50;
            overflow: hidden;
            background: #f5f5f5;
        }

        .cv-photo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cv-photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #ccc;
        }

        .cv-section {
            margin-bottom: 20px;
        }

        .cv-section-title {
            font-size: 12pt;
            font-weight: bold;
            color: #2c3e50;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 1px solid #2c3e50;
            padding-bottom: 5px;
            margin-bottom: 12px;
        }

        .cv-profile {
            text-align: justify;
            font-size: 10.5pt;
            line-height: 1.6;
            color: #444;
        }

        .cv-item {
            margin-bottom: 15px;
        }

        .cv-item-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 3px;
        }

        .cv-item-title {
            font-weight: bold;
            font-size: 11pt;
            color: #1a1a1a;
        }

        .cv-item-date {
            font-size: 10pt;
            color: #666;
            font-style: italic;
        }

        .cv-item-company {
            font-size: 10pt;
            color: #555;
            font-style: italic;
            margin-bottom: 5px;
        }

        .cv-item-description {
            font-size: 10pt;
            color: #444;
            margin-left: 15px;
        }

        .cv-item-description li {
            margin-bottom: 3px;
            list-style-type: disc;
        }

        .cv-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .cv-skill {
            background: #f5f5f5;
            padding: 4px 10px;
            border-radius: 3px;
            font-size: 10pt;
            color: #444;
            border: 1px solid #ddd;
        }

        .cv-education-item {
            margin-bottom: 10px;
        }

        .cv-education-title {
            font-weight: bold;
            font-size: 11pt;
        }

        .cv-education-meta {
            font-size: 10pt;
            color: #666;
            font-style: italic;
        }

        /* === SURAT KETERANGAN STYLES === */
        .sk-container {
            max-width: 100%;
        }

        .sk-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px double #1a1a1a;
        }

        .sk-header-pemerintah {
            font-size: 12pt;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .sk-header-instansi {
            font-size: 11pt;
            font-weight: bold;
            margin-bottom: 3px;
        }

        .sk-header-alamat {
            font-size: 10pt;
            color: #555;
            margin-bottom: 10px;
        }

        .sk-title {
            font-size: 13pt;
            font-weight: bold;
            text-decoration: underline;
            margin: 20px 0 5px 0;
        }

        .sk-number {
            font-size: 10pt;
            margin-bottom: 20px;
        }

        .sk-intro {
            text-align: justify;
            margin-bottom: 15px;
        }

        .sk-data-table {
            margin: 15px 0;
            margin-left: 30px;
        }

        .sk-data-row {
            display: flex;
            margin-bottom: 5px;
        }

        .sk-data-label {
            width: 150px;
            flex-shrink: 0;
        }

        .sk-data-separator {
            width: 20px;
            flex-shrink: 0;
        }

        .sk-data-value {
            flex: 1;
        }

        .sk-content {
            text-align: justify;
            margin: 15px 0;
        }

        .sk-signature {
            margin-top: 50px;
            text-align: right;
        }

        .sk-signature-place {
            margin-bottom: 70px;
        }

        .sk-signature-name {
            font-weight: bold;
            text-decoration: underline;
        }

        .sk-signature-nip {
            font-size: 10pt;
            color: #555;
        }

        /* === FOOTER === */
        .pdf-footer {
            position: fixed;
            bottom: 15px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 9pt;
            color: #888;
            font-family: Arial, sans-serif;
        }

        /* === UTILITY CLASSES === */
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-justify { text-align: justify; }
        .font-bold { font-weight: bold; }
        .uppercase { text-transform: uppercase; }
        .mt-1 { margin-top: 5px; }
        .mt-2 { margin-top: 10px; }
        .mb-1 { margin-bottom: 5px; }
        .mb-2 { margin-bottom: 10px; }
    </style>
</head>
<body>
    @php
        $isCV = str_contains(strtolower($documentType->slug), 'cv') || str_contains(strtolower($documentType->slug), 'curriculum');
        $isSK = str_contains(strtolower($documentType->slug), 'keterangan');
        $isLamaran = str_contains(strtolower($documentType->slug), 'lamaran');
        $data = isset($data_json) ? $data_json : [];
    @endphp

    @if($isCV)
        {{-- CV LAYOUT --}}
        <div class="cv-container">
            <div class="cv-header">
                <div class="cv-header-content">
                    <div class="cv-name">{{ $data['nama_lengkap'] ?? $data['nama'] ?? 'NAMA LENGKAP' }}</div>
                    <div class="cv-title">{{ $data['posisi_yang_dilamar'] ?? $data['jabatan'] ?? 'Posisi yang Dilamar' }}</div>
                    <div class="cv-contact">
                        @if(isset($data['telepon']) || isset($data['no_telepon']) || isset($data['phone']))
                            📱 {{ $data['telepon'] ?? $data['no_telepon'] ?? $data['phone'] }}<br>
                        @endif
                        @if(isset($data['email']))
                            ✉ {{ $data['email'] }}<br>
                        @endif
                        @if(isset($data['alamat']))
                            📍 {{ $data['alamat'] }}
                        @endif
                    </div>
                </div>
                @if(isset($photoPath) && $photoPath)
                    <div class="cv-photo-container">
                        <img src="{{ $photoPath }}" alt="Foto Profil">
                    </div>
                @else
                    <div class="cv-photo-container">
                        <div class="cv-photo-placeholder">👤</div>
                    </div>
                @endif
            </div>

            {{-- Profil Section --}}
            @if(isset($data['profil']) || isset($data['deskripsi_diri']) || isset($data['tentang_saya']))
                <div class="cv-section">
                    <div class="cv-section-title">Profil Profesional</div>
                    <div class="cv-profile">
                        {{ $data['profil'] ?? $data['deskripsi_diri'] ?? $data['tentang_saya'] }}
                    </div>
                </div>
            @endif

            {{-- Pengalaman Kerja --}}
            @if(isset($data['pengalaman_kerja']) || isset($data['riwayat_pekerjaan']))
                <div class="cv-section">
                    <div class="cv-section-title">Pengalaman Kerja</div>
                    <div class="cv-item">
                        <div class="cv-item-header">
                            <span class="cv-item-title">{{ $data['posisi'] ?? 'Posisi' }}</span>
                            <span class="cv-item-date">{{ $data['periode_kerja'] ?? '20XX - Sekarang' }}</span>
                        </div>
                        <div class="cv-item-company">{{ $data['perusahaan'] ?? $data['nama_perusahaan'] ?? 'Nama Perusahaan' }}</div>
                        @if(isset($data['deskripsi_pekerjaan']))
                            <div class="cv-item-description">
                                {{ $data['deskripsi_pekerjaan'] }}
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            {{-- Pendidikan --}}
            @if(isset($data['pendidikan']) || isset($data['riwayat_pendidikan']) || isset($data['universitas']))
                <div class="cv-section">
                    <div class="cv-section-title">Pendidikan</div>
                    <div class="cv-education-item">
                        <div class="cv-education-title">{{ $data['gelar'] ?? $data['jurusan'] ?? 'S1 - Jurusan' }}</div>
                        <div class="cv-education-meta">
                            {{ $data['universitas'] ?? $data['sekolah'] ?? $data['institusi'] ?? 'Universitas' }}
                            | {{ $data['tahun_lulus'] ?? '20XX' }}
                            @if(isset($data['ipk']))
                                | IPK: {{ $data['ipk'] }}
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            {{-- Keahlian --}}
            @if(isset($data['keahlian']) || isset($data['skills']) || isset($data['keterampilan']))
                <div class="cv-section">
                    <div class="cv-section-title">Keahlian</div>
                    <div class="cv-skills">
                        @php
                            $skills = explode(',', $data['keahlian'] ?? $data['skills'] ?? $data['keterampilan'] ?? '');
                        @endphp
                        @foreach($skills as $skill)
                            @if(trim($skill))
                                <span class="cv-skill">{{ trim($skill) }}</span>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Custom Content --}}
            <div class="cv-section">
                {!! $content !!}
            </div>
        </div>

    @elseif($isSK)
        {{-- SURAT KETERANGAN LAYOUT --}}
        <div class="sk-container">
            <div class="sk-header">
                <div class="sk-header-pemerintah">PEMERINTAH {{ strtoupper($data['kota'] ?? $data['kabupaten'] ?? 'KOTA/KABUPATEN') }}</div>
                <div class="sk-header-instansi">{{ strtoupper($data['instansi'] ?? $data['kecamatan'] ?? 'KECAMATAN') }}</div>
                <div class="sk-header-instansi">{{ strtoupper($data['desa'] ?? $data['kelurahan'] ?? 'DESA/KELURAHAN') }}</div>
                <div class="sk-header-alamat">{{ $data['alamat_instansi'] ?? 'Alamat Instansi' }}</div>

                <div class="sk-title">{{ $documentType->name }}</div>
                <div class="sk-number">Nomor: {{ $data['nomor_surat'] ?? 'XXX/SK/'.date('m/Y') }}</div>
            </div>

            <div class="sk-intro">
                Yang bertanda tangan di bawah ini, {{ $data['jabatan_penandatangan'] ?? 'Kepala Desa/Kelurahan' }} {{ $data['desa'] ?? $data['kelurahan'] ?? '' }},
                {{ $data['kecamatan'] ?? '' }}, {{ $data['kota'] ?? $data['kabupaten'] ?? '' }},
                menerangkan dengan sesungguhnya bahwa:
            </div>

            <div class="sk-data-table">
                <div class="sk-data-row">
                    <div class="sk-data-label">Nama</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value font-bold">{{ $data['nama_lengkap'] ?? $data['nama'] ?? '[Nama Lengkap]' }}</div>
                </div>
                <div class="sk-data-row">
                    <div class="sk-data-label">Tempat/Tgl Lahir</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value">{{ $data['tempat_lahir'] ?? '' }}, {{ $data['tanggal_lahir'] ?? '' }}</div>
                </div>
                <div class="sk-data-row">
                    <div class="sk-data-label">Jenis Kelamin</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value">{{ $data['jenis_kelamin'] ?? '-' }}</div>
                </div>
                <div class="sk-data-row">
                    <div class="sk-data-label">Agama</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value">{{ $data['agama'] ?? '-' }}</div>
                </div>
                <div class="sk-data-row">
                    <div class="sk-data-label">Status Perkawinan</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value">{{ $data['status_perkawinan'] ?? '-' }}</div>
                </div>
                <div class="sk-data-row">
                    <div class="sk-data-label">Pekerjaan</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value">{{ $data['pekerjaan'] ?? '-' }}</div>
                </div>
                <div class="sk-data-row">
                    <div class="sk-data-label">NIK</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value">{{ $data['nik'] ?? $data['no_ktp'] ?? '-' }}</div>
                </div>
                <div class="sk-data-row">
                    <div class="sk-data-label">Alamat</div>
                    <div class="sk-data-separator">:</div>
                    <div class="sk-data-value">{{ $data['alamat'] ?? '-' }}</div>
                </div>
            </div>

            <div class="sk-content">
                {!! $content !!}
            </div>

            <div class="sk-content text-justify">
                Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dapat dipergunakan sebagaimana mestinya.
            </div>

            <div class="sk-signature">
                <div class="sk-signature-place">
                    {{ $data['tempat'] ?? $data['kota'] ?? 'Tempat' }}, {{ isset($data['tanggal']) ? date('d F Y', strtotime($data['tanggal'])) : date('d F Y') }}
                </div>
                <div>{{ $data['jabatan_penandatangan'] ?? 'Kepala Desa/Kelurahan' }}</div>
                <div style="margin-top: 70px;" class="sk-signature-name">{{ $data['nama_penandatangan'] ?? '[Nama Lengkap]' }}</div>
                @if(isset($data['nip']))
                    <div class="sk-signature-nip">NIP. {{ $data['nip'] }}</div>
                @endif
            </div>
        </div>

    @else
        {{-- DEFAULT SURAT LAMARAN LAYOUT --}}
        <div class="letter-container">
            <div class="letter-header">
                <h1>{{ $documentType->name }}</h1>
            </div>

            <div class="letter-date">
                {{ $data['tempat'] ?? 'Jakarta' }}, {{ isset($data['tanggal']) ? date('d F Y', strtotime($data['tanggal'])) : date('d F Y') }}
            </div>

            <div class="letter-recipient">
                <strong>Kepada Yth.</strong>
                {{ $data['hrd_name'] ?? 'HRD Manager' }}<br>
                {{ $data['perusahaan'] ?? $data['nama_perusahaan'] ?? 'PT [Nama Perusahaan]' }}<br>
                {{ $data['alamat_perusahaan'] ?? 'Alamat Perusahaan' }}
            </div>

            <div class="letter-salutation">
                Dengan hormat,
            </div>

            <div class="letter-subject">
                Perihal: Lamaran Pekerjaan {{ $data['posisi_yang_dilamar'] ?? $data['posisi'] ?? '[Posisi]' }}
            </div>

            <div class="letter-content">
                {!! $content !!}
            </div>

            <div class="letter-closing">
                Atas perhatian dan pertimbangannya, saya ucapkan terima kasih.
            </div>

            <div class="letter-signature">
                <div>Hormat saya,</div>
                <div class="signature-line">{{ $data['nama_lengkap'] ?? $data['nama'] ?? '[Nama Lengkap]' }}</div>
                @if(isset($data['email']) || isset($data['telepon']))
                    <div style="margin-top: 10px; font-size: 10pt; color: #555;">
                        {{ $data['email'] ?? '' }}{{ isset($data['email']) && isset($data['telepon']) ? ' | ' : '' }}{{ $data['telepon'] ?? $data['no_telepon'] ?? '' }}
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="pdf-footer">
        Generated by Surat Generator Indonesia • {{ date('d F Y H:i') }}
    </div>
</body>
</html>
