<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Hasil Surat & CV - Surat Generator Indonesia</title>
    <meta name="description" content="Lihat contoh hasil surat dan CV profesional yang dibuat dengan Surat Generator Indonesia. Preview dokumen berkualitas untuk lamaran kerja, surat keterangan, dan CV.">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --gradient-secondary: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1);
        }

        * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }

        body {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: var(--gray-900);
        }

        .gradient-bg {
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
        }

        .gradient-bg::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-100);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card:hover {
            box-shadow: var(--shadow-xl);
            transform: translateY(-4px);
        }

        .preview-card {
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .preview-card::after {
            content: 'Klik untuk Preview';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(99, 102, 241, 0.9), transparent);
            color: white;
            padding: 20px;
            font-weight: 600;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }

        .preview-card:hover::after {
            transform: translateY(0);
        }

        .preview-document {
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 32px;
            font-family: 'Times New Roman', serif;
            line-height: 1.6;
            color: #1a1a1a;
        }

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            z-index: 100;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal.active { display: flex; }

        .modal-content {
            background: white;
            border-radius: 16px;
            max-width: 800px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            animation: modalIn 0.3s ease;
        }

        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.9) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-professional {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .badge-hr-ready {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: white;
        }

        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .document-page {
            aspect-ratio: 210/297;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            padding: 24px;
            font-size: 12px;
            line-height: 1.5;
            overflow: hidden;
        }

        .document-page h1 { font-size: 16px; font-weight: bold; margin-bottom: 12px; }
        .document-page h2 { font-size: 14px; font-weight: bold; margin-bottom: 8px; color: #4f46e5; }
        .document-page p { margin-bottom: 8px; }
        .document-page .section { margin-bottom: 16px; }

        .cv-photo {
            width: 60px;
            height: 75px;
            background: linear-gradient(135deg, #e5e7eb 0%, #d1d5db 100%);
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
        }

        .close-btn:hover {
            transform: rotate(90deg);
            background: #ef4444;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-lg border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-3 text-xl font-bold text-gradient">
                        <span class="text-2xl">🇮🇩</span>
                        <span>Surat Generator Indonesia</span>
                    </a>
                </div>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Beranda</a>
                    <a href="/preview-surat" class="text-indigo-600 font-semibold text-sm">Preview</a>
                    <a href="/surat-lamaran-kerja" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">CV Generator</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-16 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <span class="inline-block px-4 py-2 bg-white/20 rounded-full text-sm font-semibold mb-4">
                    📄 Dokumen Profesional Indonesia
                </span>
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Preview Hasil Surat & CV</h1>
                <p class="text-xl text-white/90 max-w-3xl mx-auto mb-8">
                    Lihat contoh hasil dokumen profesional yang akan Anda dapatkan.
                    Semua template dirancang sesuai standar HR Indonesia dan siap pakai.
                </p>
                <div class="flex justify-center gap-4 flex-wrap">
                    <span class="badge badge-hr-ready">✓ HR-Ready</span>
                    <span class="badge badge-professional">✓ ATS Friendly</span>
                    <span class="badge badge-hr-ready">✓ Format PDF</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Surat Lamaran Section -->
            <section class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                            <span class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center text-white text-lg">📄</span>
                            Surat Lamaran Kerja
                        </h2>
                        <p class="text-gray-600 mt-2">Template profesional untuk melamar pekerjaan di perusahaan Indonesia</p>
                    </div>
                    <a href="/surat-lamaran-kerja" class="btn-primary px-6 py-3 rounded-xl text-sm font-semibold">
                        Buat Sekarang →
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Lamaran Preview 1: Formal -->
                    <div class="card preview-card" onclick="openModal('lamaran-formal')">
                        <div class="document-page">
                            <div class="text-center mb-4">
                                <div class="font-bold text-lg">SURAT LAMARAN KERJA</div>
                            </div>
                            <div class="text-right mb-4 text-xs">
                                Jakarta, 15 Maret 2024
                            </div>
                            <div class="mb-4">
                                <div class="font-semibold">Kepada Yth.</div>
                                <div>HRD Manager</div>
                                <div>PT Maju Sejahtera Indonesia</div>
                                <div>Jl. Sudirman Kav. 28, Jakarta Selatan</div>
                            </div>
                            <div class="mb-3 text-justify">
                                <p>Dengan hormat,</p>
                                <p>Berdasarkan informasi lowongan pekerjaan yang saya temukan di website perusahaan, saya berminat untuk mengisi posisi Marketing Manager...</p>
                            </div>
                            <div class="mt-4">
                                <div class="font-semibold">Hormat saya,</div>
                                <div class="mt-6 font-semibold">Ahmad Wijaya</div>
                                <div class="text-xs">0812-3456-7890 | ahmad.wijaya@email.com</div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">Format Formal Standard</h3>
                            <p class="text-sm text-gray-600">Cocok untuk perusahaan korporasi</p>
                        </div>
                    </div>

                    <!-- Lamaran Preview 2: Modern -->
                    <div class="card preview-card" onclick="openModal('lamaran-modern')">
                        <div class="document-page">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <div class="font-bold text-base text-indigo-600">LAMARAN PEKERJAAN</div>
                                </div>
                                <div class="text-xs text-right">
                                    <div>Jakarta, 15 Maret 2024</div>
                                </div>
                            </div>
                            <div class="border-l-4 border-indigo-500 pl-4 mb-4">
                                <div class="font-semibold text-sm">Kepada Yth. HRD</div>
                                <div class="text-xs">PT Digital Innovation</div>
                                <div class="text-xs">Jl. Kemang Raya No. 15</div>
                            </div>
                            <div class="mb-3 text-justify text-xs">
                                <p>Perihal: Lamaran Pekerjaan</p>
                                <p class="mt-2">Dengan hormat, saya ingin mengajukan lamaran untuk posisi UI/UX Designer...</p>
                            </div>
                            <div class="mt-4 pt-2 border-t border-gray-200">
                                <div class="text-xs">Salam hormat,</div>
                                <div class="font-semibold text-sm mt-1">Sarah Amalia</div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">Format Modern Kreatif</h3>
                            <p class="text-sm text-gray-600">Ideal untuk startup & tech company</p>
                        </div>
                    </div>

                    <!-- Lamaran Preview 3: Fresh Graduate -->
                    <div class="card preview-card" onclick="openModal('lamaran-fresh')">
                        <div class="document-page">
                            <div class="text-center mb-4">
                                <div class="font-bold text-lg">SURAT LAMARAN</div>
                                <div class="text-xs text-gray-600">Untuk Fresh Graduate</div>
                            </div>
                            <div class="text-right mb-3 text-xs">
                                Bandung, 20 Maret 2024
                            </div>
                            <div class="mb-3 text-xs">
                                <div class="font-semibold">Kepada Yth.</div>
                                <div>HRD PT Teknologi Nusantara</div>
                                <div>Jl. Dago No. 45, Bandung</div>
                            </div>
                            <div class="mb-3 text-xs text-justify">
                                <p>Assalamualaikum Wr. Wb.</p>
                                <p class="mt-1">Saya Rina Putri, lulusan S1 Teknik Informatika ITB 2024...</p>
                            </div>
                            <div class="mt-3 pt-2 border-t border-gray-200 text-xs">
                                <div>Hormat saya,</div>
                                <div class="font-semibold mt-2">Rina Putri</div>
                                <div>NIM: 19012345</div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">Format Fresh Graduate</h3>
                            <p class="text-sm text-gray-600">Khusus untuk lulusan baru</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CV Section -->
            <section class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                            <span class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center text-white text-lg">👤</span>
                            Curriculum Vitae (CV)
                        </h2>
                        <p class="text-gray-600 mt-2">CV profesional dengan layout modern dan foto profil support</p>
                    </div>
                    <a href="/cv-generator" class="btn-primary px-6 py-3 rounded-xl text-sm font-semibold">
                        Buat CV Sekarang →
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- CV Preview 1: Professional -->
                    <div class="card preview-card" onclick="openModal('cv-professional')">
                        <div class="document-page">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex-1">
                                    <div class="font-bold text-lg text-gray-900">BUDI SANTOSO</div>
                                    <div class="text-sm text-indigo-600 font-semibold">Senior Marketing Manager</div>
                                    <div class="text-xs text-gray-600 mt-1">
                                        Jakarta • 0812-3456-7890 • budi@email.com
                                    </div>
                                </div>
                                <div class="cv-photo">👤</div>
                            </div>
                            <div class="section">
                                <div class="text-xs font-bold text-indigo-600 uppercase tracking-wide mb-2">PROFIL</div>
                                <div class="text-xs text-justify">Profesional marketing dengan 8 tahun pengalaman di FMCG industry...</div>
                            </div>
                            <div class="section">
                                <div class="text-xs font-bold text-indigo-600 uppercase tracking-wide mb-2">PENGALAMAN KERJA</div>
                                <div class="text-xs">
                                    <div class="font-semibold">Marketing Manager</div>
                                    <div class="text-gray-600">PT Unilever Indonesia | 2020 - Sekarang</div>
                                    <div>• Memimpin tim marketing 15 orang</div>
                                </div>
                            </div>
                            <div class="section">
                                <div class="text-xs font-bold text-indigo-600 uppercase tracking-wide mb-2">PENDIDIKAN</div>
                                <div class="text-xs">
                                    <div class="font-semibold">S1 Manajemen Bisnis</div>
                                    <div class="text-gray-600">Universitas Indonesia | 2016</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">CV Professional</h3>
                            <p class="text-sm text-gray-600">Layout klasik dengan foto support</p>
                        </div>
                    </div>

                    <!-- CV Preview 2: Modern Clean -->
                    <div class="card preview-card" onclick="openModal('cv-modern')">
                        <div class="document-page" style="background: linear-gradient(180deg, #f8fafc 0%, #fff 20%);">
                            <div class="text-center mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mx-auto mb-2 flex items-center justify-center text-white text-2xl">👤</div>
                                <div class="font-bold text-base">ANDI PRATAMA</div>
                                <div class="text-xs text-purple-600">Software Engineer</div>
                            </div>
                            <div class="flex justify-center gap-4 text-xs text-gray-600 mb-4">
                                <span>📱 0812-9999-8888</span>
                                <span>✉ andi@email.com</span>
                            </div>
                            <div class="grid grid-cols-2 gap-4 text-xs">
                                <div>
                                    <div class="font-bold text-purple-600 mb-1">KEAHLIAN</div>
                                    <div>• Laravel & PHP</div>
                                    <div>• React & Vue.js</div>
                                    <div>• MySQL & PostgreSQL</div>
                                </div>
                                <div>
                                    <div class="font-bold text-purple-600 mb-1">PENGALAMAN</div>
                                    <div>• Tech Lead @ Gojek</div>
                                    <div>• 5 tahun pengalaman</div>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">CV Modern Clean</h3>
                            <p class="text-sm text-gray-600">Desain minimalis untuk tech industry</p>
                        </div>
                    </div>

                    <!-- CV Preview 3: Creative -->
                    <div class="card preview-card" onclick="openModal('cv-creative')">
                        <div class="document-page">
                            <div class="flex items-start gap-3 mb-4">
                                <div class="w-12 h-14 bg-gradient-to-br from-pink-400 to-orange-400 rounded-lg flex items-center justify-center text-white text-lg flex-shrink-0">👤</div>
                                <div>
                                    <div class="font-bold text-base">MEGAWATI SARI</div>
                                    <div class="text-xs text-pink-600 font-semibold">Graphic Designer</div>
                                    <div class="text-xs text-gray-600 mt-1">📍 Surabaya</div>
                                </div>
                            </div>
                            <div class="bg-gray-50 p-3 rounded-lg mb-3">
                                <div class="text-xs font-bold text-gray-700 mb-2">💼 PORTOFOLIO HIGHLIGHT</div>
                                <div class="text-xs text-gray-600">• Branding 50+ UMKM lokal</div>
                                <div class="text-xs text-gray-600">• Winner Design Award 2023</div>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-pink-100 text-pink-700 rounded text-xs">Illustrator</span>
                                <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">Photoshop</span>
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs">Figma</span>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">CV Kreatif</h3>
                            <p class="text-sm text-gray-600">Desain kreatif untuk designer & kreator</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Surat Keterangan Section -->
            <section class="mb-16">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                            <span class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg flex items-center justify-center text-white text-lg">📋</span>
                            Surat Keterangan
                        </h2>
                        <p class="text-gray-600 mt-2">Format resmi untuk berbagai keperluan administrasi</p>
                    </div>
                    <a href="/surat-keterangan" class="btn-primary px-6 py-3 rounded-xl text-sm font-semibold">
                        Buat Sekarang →
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- SK Preview 1: Domisili -->
                    <div class="card preview-card" onclick="openModal('sk-domisili')">
                        <div class="document-page">
                            <div class="text-center mb-4">
                                <div class="text-xs font-bold uppercase">PEMERINTAH KOTA JAKARTA SELATAN</div>
                                <div class="text-xs">KECAMATAN KEBAYORAN BARU</div>
                                <div class="text-xs">KELURAHAN SENAYAN</div>
                                <div class="mt-2 text-xs font-bold">SURAT KETERANGAN DOMISILI</div>
                                <div class="text-xs">Nomor: 042/SKD/2024</div>
                            </div>
                            <div class="text-xs text-justify mb-3">
                                Yang bertanda tangan di bawah ini, Kepala Kelurahan Senayan, Kecamatan Kebayoran Baru, menerangkan bahwa:
                            </div>
                            <div class="text-xs mb-3">
                                <div>Nama: <strong>Dedi Kurniawan</strong></div>
                                <div>NIK: 3175xxxxxxxx1234</div>
                                <div>Alamat: Jl. Senayan No. 25 RT. 003/RW. 007</div>
                            </div>
                            <div class="text-xs text-justify">
                                Adalah benar-benar berdomisili di wilayah Kelurahan Senayan...
                            </div>
                            <div class="mt-4 text-right text-xs">
                                <div>Jakarta, 15 Maret 2024</div>
                                <div class="mt-4">Kepala Kelurahan</div>
                                <div class="mt-6 font-bold">(Bambang Sutrisno)</div>
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">Surat Keterangan Domisili</h3>
                            <p class="text-sm text-gray-600">Format resmi pemerintah</p>
                        </div>
                    </div>

                    <!-- SK Preview 2: Kerja -->
                    <div class="card preview-card" onclick="openModal('sk-kerja')">
                        <div class="document-page">
                            <div class="border-b-2 border-gray-800 pb-2 mb-3">
                                <div class="flex justify-between items-start">
                                    <div class="text-xs">
                                        <div class="font-bold">PT MAJU JAYA INDONESIA</div>
                                        <div>Jl. Gatot Subroto Kav. 35</div>
                                    </div>
                                    <div class="text-xs text-right">
                                        <div class="font-bold">SURAT KETERANGAN</div>
                                        <div>No. SK/2024/045</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs mb-3">
                                Yang bertanda tangan di bawah ini:
                            </div>
                            <div class="text-xs mb-3 pl-3">
                                <div>Nama: <strong>Dr. Siti Aminah, S.E., M.M.</strong></div>
                                <div>Jabatan: Direktur HRD</div>
                            </div>
                            <div class="text-xs text-justify mb-3">
                                Menerangkan dengan sesungguhnya bahwa:
                            </div>
                            <div class="text-xs mb-3 pl-3">
                                <div>Nama: <strong>Andi Wijaya</strong></div>
                                <div>Jabatan: Senior Accountant</div>
                                <div>Masa Kerja: 2019 - Sekarang</div>
                            </div>
                            <div class="text-xs text-justify">
                                Adalah benar-benar karyawan tetap PT Maju Jaya Indonesia...
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">Surat Keterangan Kerja</h3>
                            <p class="text-sm text-gray-600">Untuk keperluan bank/visa</p>
                        </div>
                    </div>

                    <!-- SK Preview 3: Tidak Mampu -->
                    <div class="card preview-card" onclick="openModal('sk-tm')">
                        <div class="document-page">
                            <div class="text-center mb-4">
                                <div class="text-xs font-bold uppercase">PEMERINTAH DESA SUKAMAJU</div>
                                <div class="text-xs">KECAMATAN CISAUK</div>
                                <div class="text-xs">KABUPATEN TANGERANG</div>
                                <div class="mt-2 text-xs font-bold">SURAT KETERANGAN TIDAK MAMPU</div>
                                <div class="text-xs">Nomor: 125/SKTM/2024</div>
                            </div>
                            <div class="text-xs text-justify mb-3">
                                Yang bertanda tangan di bawah ini, Kepala Desa Sukamaju, Kecamatan Cisauk, Kabupaten Tangerang, menerangkan dengan sesungguhnya bahwa:
                            </div>
                            <div class="text-xs mb-3">
                                <div>Nama: <strong>Siti Nurhaliza</strong></div>
                                <div>Tempat/Tgl Lahir: Tangerang, 10 Januari 1980</div>
                                <div>Pekerjaan: Ibu Rumah Tangga</div>
                                <div>Alamat: Dusun II, RT. 002/RW. 005</div>
                            </div>
                            <div class="text-xs text-justify">
                                Orang tersebut di atas adalah benar-benar warga miskin/tidak mampu...
                            </div>
                        </div>
                        <div class="p-4 border-t border-gray-100">
                            <h3 class="font-semibold text-gray-900">Surat Keterangan Tidak Mampu</h3>
                            <p class="text-sm text-gray-600">Untuk beasiswa & bantuan sosial</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Stats Section -->
            <section class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl p-8 md:p-12 text-white">
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold mb-2">50,000+</div>
                        <div class="text-indigo-200">Dokumen Dibuat</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold mb-2">15+</div>
                        <div class="text-indigo-200">Template Profesional</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold mb-2">4.9/5</div>
                        <div class="text-indigo-200">Rating Pengguna</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold mb-2">100%</div>
                        <div class="text-indigo-200">Gratis Selamanya</div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- CTA Section -->
    <section class="bg-white py-16 border-t border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Siap Membuat Dokumen Profesional Anda?</h2>
            <p class="text-lg text-gray-600 mb-8">
                Buat surat lamaran, CV, atau surat keterangan dalam hitungan menit. Gratis, tanpa registrasi.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="/surat-lamaran-kerja" class="btn-primary px-8 py-4 rounded-xl font-semibold">
                    📝 Buat Surat Lamaran
                </a>
                <a href="/cv-generator" class="px-8 py-4 rounded-xl font-semibold bg-white border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50 transition">
                    👤 Buat CV
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <span class="text-2xl font-bold text-gradient">🇮🇩 Surat Generator Indonesia</span>
                </div>
                <p class="text-gray-400 mb-6">Platform gratis untuk membuat dokumen profesional Indonesia</p>
                <div class="flex justify-center gap-6 text-sm">
                    <a href="/" class="text-gray-400 hover:text-white transition">Beranda</a>
                    <a href="/surat-lamaran-kerja" class="text-gray-400 hover:text-white transition">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-400 hover:text-white transition">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-400 hover:text-white transition">CV Generator</a>
                    <a href="/preview-surat" class="text-gray-400 hover:text-white transition">Preview</a>
                </div>
                <p class="text-gray-600 text-sm mt-8">© 2026 Surat Generator Indonesia. Semua hak dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Modals -->
    <div id="modal" class="modal" onclick="closeModal(event)">
        <div class="close-btn" onclick="closeModal(event)">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </div>
        <div class="modal-content" onclick="event.stopPropagation()">
            <div id="modalContent"></div>
        </div>
    </div>

    <script>
        const previews = {
            'lamaran-formal': {
                title: 'Surat Lamaran Formal',
                content: `
                    <div class="preview-document">
                        <div class="text-center mb-8">
                            <div class="text-2xl font-bold">SURAT LAMARAN KERJA</div>
                        </div>
                        <div class="text-right mb-6">Jakarta, 15 Maret 2024</div>
                        <div class="mb-6">
                            <div class="font-semibold">Kepada Yth.</div>
                            <div>HRD Manager</div>
                            <div>PT Maju Sejahtera Indonesia</div>
                            <div>Jl. Sudirman Kav. 28, Jakarta Selatan</div>
                        </div>
                        <div class="mb-4 text-justify">
                            <p>Dengan hormat,</p>
                            <p class="mt-2">Berdasarkan informasi lowongan pekerjaan yang saya temukan di website perusahaan, saya berminat untuk mengisi posisi Marketing Manager yang sedang dibutuhkan.</p>
                        </div>
                        <div class="mb-4 text-justify">
                            <p>Saya, Ahmad Wijaya, lulusan S1 Manajemen Bisnis Universitas Indonesia tahun 2018 dengan pengalaman 4 tahun di bidang marketing. Saya memiliki kemampuan strategi pemasaran digital, manajemen tim, dan analisis pasar.</p>
                        </div>
                        <div class="mb-4 text-justify">
                            <p>Sebagai bahan pertimbangan, saya lampirkan:</p>
                            <p>1. Daftar Riwayat Hidup</p>
                            <p>2. Fotokopi Ijazah & Transkrip Nilai</p>
                            <p>3. Fotokopi KTP</p>
                            <p>4. Pas Foto 3x4 (2 lembar)</p>
                            <p>5. Sertifikat Pelatihan</p>
                        </div>
                        <div class="mt-8 text-justify">
                            <p>Besar harapan saya untuk dapat bergabung dengan PT Maju Sejahtera Indonesia dan memberikan kontribusi terbaik untuk kemajuan perusahaan.</p>
                        </div>
                        <div class="mt-8">
                            <div>Hormat saya,</div>
                            <div class="mt-12 font-bold">Ahmad Wijaya</div>
                            <div>0812-3456-7890</div>
                            <div>ahmad.wijaya@email.com</div>
                        </div>
                    </div>
                `
            },
            'cv-professional': {
                title: 'CV Professional',
                content: `
                    <div class="preview-document">
                        <div class="flex justify-between items-start mb-6 border-b-2 pb-4">
                            <div>
                                <div class="text-2xl font-bold text-gray-900">BUDI SANTOSO</div>
                                <div class="text-lg text-indigo-600 font-semibold">Senior Marketing Manager</div>
                                <div class="text-sm text-gray-600 mt-2">
                                    📍 Jakarta, Indonesia<br>
                                    📱 0812-3456-7890<br>
                                    ✉ budi.santoso@email.com<br>
                                    🔗 linkedin.com/in/budisantoso
                                </div>
                            </div>
                            <div class="w-24 h-32 bg-gray-200 rounded flex items-center justify-center text-4xl">👤</div>
                        </div>
                        <div class="mb-6">
                            <div class="text-sm font-bold text-indigo-600 uppercase tracking-wide mb-2">PROFIL PROFESIONAL</div>
                            <p class="text-sm text-justify">Marketing professional dengan 8 tahun pengalaman memimpin tim di industri FMCG. Spesialisasi dalam digital marketing, brand management, dan strategic planning. Terbukti meningkatkan market share sebesar 35% dan mengelola budget marketing hingga 50M per tahun.</p>
                        </div>
                        <div class="mb-6">
                            <div class="text-sm font-bold text-indigo-600 uppercase tracking-wide mb-2">PENGALAMAN KERJA</div>
                            <div class="mb-4">
                                <div class="font-semibold">Marketing Manager</div>
                                <div class="text-sm text-gray-600">PT Unilever Indonesia | Jan 2020 - Sekarang</div>
                                <ul class="text-sm list-disc ml-4 mt-1">
                                    <li>Memimpin tim marketing 15 orang untuk brand personal care</li>
                                    <li>Mengelola budget marketing Rp 50M per tahun</li>
                                    <li>Meningkatkan brand awareness sebesar 45% dalam 2 tahun</li>
                                    <li>Meraih penghargaan Marketing Excellence 2023</li>
                                </ul>
                            </div>
                            <div>
                                <div class="font-semibold">Senior Marketing Executive</div>
                                <div class="text-sm text-gray-600">PT Nestlé Indonesia | Jun 2018 - Des 2019</div>
                                <ul class="text-sm list-disc ml-4 mt-1">
                                    <li>Mengelola digital marketing campaign dengan ROI 300%</li>
                                    <li>Berhasil launch produk baru dengan first year revenue Rp 25M</li>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="text-sm font-bold text-indigo-600 uppercase tracking-wide mb-2">PENDIDIKAN</div>
                            <div>
                                <div class="font-semibold">S1 Manajemen Bisnis</div>
                                <div class="text-sm text-gray-600">Universitas Indonesia | 2014 - 2018 | IPK: 3.75/4.00</div>
                            </div>
                        </div>
                        <div>
                            <div class="text-sm font-bold text-indigo-600 uppercase tracking-wide mb-2">KEAHLIAN</div>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Digital Marketing</span>
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Brand Strategy</span>
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Team Leadership</span>
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Data Analysis</span>
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Budget Management</span>
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Google Ads</span>
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Social Media Marketing</span>
                                <span class="px-2 py-1 bg-gray-100 rounded text-xs">Market Research</span>
                            </div>
                        </div>
                    </div>
                `
            },
            'sk-domisili': {
                title: 'Surat Keterangan Domisili',
                content: `
                    <div class="preview-document">
                        <div class="text-center mb-6">
                            <div class="text-sm font-bold uppercase">PEMERINTAH KOTA JAKARTA SELATAN</div>
                            <div class="text-sm">KECAMATAN KEBAYORAN BARU</div>
                            <div class="text-sm">KELURAHAN SENAYAN</div>
                            <div class="text-sm">Jl. Senayan No. 15, Jakarta Selatan</div>
                            <div class="mt-4 text-base font-bold">SURAT KETERANGAN DOMISILI</div>
                            <div class="text-sm">Nomor: 042/SKD/III/2024</div>
                        </div>
                        <div class="text-justify mb-4">
                            <p>Yang bertanda tangan di bawah ini, Kepala Kelurahan Senayan, Kecamatan Kebayoran Baru, Kota Jakarta Selatan, menerangkan dengan sesungguhnya bahwa:</p>
                        </div>
                        <div class="mb-4 ml-4">
                            <table class="text-sm">
                                <tr><td>Nama</td><td class="pl-4">:</td><td class="pl-2 font-bold">Dedi Kurniawan</td></tr>
                                <tr><td>Tempat/Tgl Lahir</td><td class="pl-4">:</td><td class="pl-2">Jakarta, 15 Mei 1985</td></tr>
                                <tr><td>Jenis Kelamin</td><td class="pl-4">:</td><td class="pl-2">Laki-laki</td></tr>
                                <tr><td>Agama</td><td class="pl-4">:</td><td class="pl-2">Islam</td></tr>
                                <tr><td>Status Perkawinan</td><td class="pl-4">:</td><td class="pl-2">Kawin</td></tr>
                                <tr><td>Pekerjaan</td><td class="pl-4">:</td><td class="pl-2">Wiraswasta</td></tr>
                                <tr><td>NIK</td><td class="pl-4">:</td><td class="pl-2">3175091505850001</td></tr>
                                <tr><td>Alamat</td><td class="pl-4">:</td><td class="pl-2">Jl. Senayan No. 25 RT. 003/RW. 007</td></tr>
                            </table>
                        </div>
                        <div class="text-justify mb-4">
                            <p>Adalah benar-benar berdomisili dan bertempat tinggal di wilayah Kelurahan Senayan, Kecamatan Kebayoran Baru, Kota Jakarta Selatan.</p>
                        </div>
                        <div class="text-justify mb-4">
                            <p>Surat keterangan ini diberikan untuk keperluan: <strong>Pengurusan Pembuatan KTP</strong></p>
                        </div>
                        <div class="text-justify mb-8">
                            <p>Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dapat dipergunakan sebagaimana mestinya.</p>
                        </div>
                        <div class="text-right">
                            <div>Jakarta, 15 Maret 2024</div>
                            <div class="mt-2">Kepala Kelurahan Senayan</div>
                            <div class="mt-16 font-bold underline">Bambang Sutrisno, S.Sos., M.Si</div>
                            <div>NIP. 19680315 199003 1 001</div>
                        </div>
                    </div>
                `
            }
        };

        function openModal(type) {
            const modal = document.getElementById('modal');
            const content = document.getElementById('modalContent');
            const preview = previews[type] || {
                title: 'Preview Dokumen',
                content: '<div class="preview-document p-8"><p class="text-center text-gray-500">Preview lengkap tersedia saat Anda membuat dokumen.</p></div>'
            };
            content.innerHTML = preview.content;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(event) {
            if (event.target.id === 'modal' || event.target.closest('.close-btn')) {
                const modal = document.getElementById('modal');
                modal.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('modal');
                if (modal.classList.contains('active')) {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
        });
    </script>
</body>
</html>
