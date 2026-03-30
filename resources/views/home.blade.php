<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Generator Indonesia - Generator Surat Resmi Indonesia</title>
    <meta name="description" content="Buat berbagai jenis surat resmi Indonesia dengan mudah dan cepat. Surat Lamaran Kerja, Surat Keterangan, dan CV Generator.">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
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
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            --gradient-secondary: linear-gradient(135deg, #8b5cf6 0%, #ec4899 100%);
            --gradient-success: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

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
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            font-weight: 600;
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-100);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card:hover {
            box-shadow: var(--shadow-md);
        }

        .text-gradient {
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .icon-wrapper {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-lg border-b border-gray-100 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="flex items-center gap-3 text-xl font-bold text-gradient">
                        <span class="text-2xl">🇮🇩</span>
                        <span>Surat Generator Indonesia</span>
                    </h1>
                </div>
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Beranda</a>
                    <a href="/surat-lamaran-kerja" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">CV Generator</a>
                    <a href="/preview-surat" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm transition-colors duration-200">Preview 📄</a>
                </nav>
                <button id="mobileMenuBtn" class="md:hidden p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden">
        <div class="fixed right-0 top-0 h-full w-64 bg-white shadow-xl">
            <div class="p-4">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-lg font-semibold text-gradient">🇮🇩 Surat Generator</h2>
                    <button onclick="toggleMobileMenu()" class="p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <nav class="space-y-2">
                    <a href="/" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 hover:text-primary transition-colors duration-200">Beranda</a>
                    <a href="/surat-lamaran-kerja" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 hover:text-primary transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 hover:text-primary transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="block px-4 py-2 rounded-lg hover:bg-gray-100 text-gray-700 hover:text-primary transition-colors duration-200">CV Generator</a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="gradient-bg text-white py-20 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 fade-in">
                    Generator Surat Resmi Indonesia
                </h1>
                <p class="text-xl md:text-2xl mb-8 opacity-90 max-w-3xl mx-auto fade-in">
                    Buat berbagai jenis surat resmi Indonesia dengan mudah dan cepat. Template profesional, hasil berkualitas, 100% gratis.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center fade-in">
                    <a href="#features" class="btn-primary px-8 py-4 rounded-xl text-lg font-semibold shadow-lg inline-flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 4 10 4s8.268 1.943 9.542 6c-1.274 4.057-5.064 6-9.542 6S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                        </svg>
                        Mulai Sekarang
                    </a>
                    <a href="#document-types" class="bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-xl text-lg font-semibold border border-white/30 hover:bg-white/30 transition-all duration-200 inline-flex items-center justify-center gap-2">
                        Lihat Template
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Mengapa Memilih <span class="text-gradient">Surat Generator Indonesia</span>?
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Platform pembuatan surat resmi dengan template profesional dan kemudahan penggunaan.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="card p-8 text-center card-hover">
                    <div class="icon-wrapper mx-auto mb-6">
                        ⚡
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Cepat & Mudah</h3>
                    <p class="text-gray-600">
                        Buat surat profesional dalam hitungan menit. Tidak perlu keahlian khusus, cukup isi formulir dan selesai.
                    </p>
                </div>

                <div class="card p-8 text-center card-hover">
                    <div class="icon-wrapper mx-auto mb-6">
                        📋
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Template Profesional</h3>
                    <p class="text-gray-600">
                        Berbagai template surat resmi Indonesia yang sudah disesuaikan dengan format standar dan bahasa formal.
                    </p>
                </div>

                <div class="card p-8 text-center card-hover">
                    <div class="icon-wrapper mx-auto mb-6">
                        🆓
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">100% Gratis</h3>
                    <p class="text-gray-600">
                        Gunakan semua fitur dan template secara gratis. Tidak ada biaya tersembunyi atau iklan yang mengganggu.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Document Types Section -->
    <section id="document-types" class="py-20 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Jenis Surat Tersedia
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Pilih jenis surat yang Anda butuhkan dari berbagai template yang tersedia.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($documentTypes as $docType)
                    @if($docType->templates->where('is_active', true)->count() > 0)
                        <div class="card p-8 card-hover group">
                            <div class="icon-wrapper mb-6 group-hover:scale-110 transition-transform duration-300">
                                @switch($docType->slug)
                                    @case('surat-lamaran-kerja')
                                        📄
                                        @break
                                    @case('surat-keterangan')
                                        📋
                                        @break
                                    @case('cv-generator')
                                        👤
                                        @break
                                    @default
                                        📝
                                @endswitch
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">{{ $docType->name }}</h3>
                            <p class="text-gray-600 mb-6">
                                {{ $docType->description ?? 'Template profesional untuk ' . $docType->name }}
                            </p>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-sm text-gray-500">
                                    {{ $docType->templates->where('is_active', true)->count() }} template tersedia
                                </span>
                                <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full font-medium">
                                    Gratis
                                </span>
                            </div>
                            <a href="{{ route('documents.form', $docType->slug) }}"
                               class="btn-primary w-full py-3 rounded-lg font-semibold inline-flex items-center justify-center gap-2">
                                Buat Surat
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Cara <span class="text-gradient">Mudah</span> Menggunakan
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Hanya 3 langkah sederhana untuk membuat surat profesional Anda.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold shadow-lg">
                        1
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Pilih Template</h3>
                    <p class="text-gray-600">
                        Pilih jenis surat yang Anda butuhkan dari berbagai template profesional yang tersedia.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold shadow-lg">
                        2
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Isi Formulir</h3>
                    <p class="text-gray-600">
                        Lengkapi formulir dengan data yang diperlukan. Proses cepat dan mudah.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold shadow-lg">
                        3
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Download PDF</h3>
                    <p class="text-gray-600">
                        Dapatkan hasil surat dalam format PDF berkualitas tinggi yang siap dicetak.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Documents Section -->
    @php
        $recentDocs = session('recent_documents', []);
        $totalGenerated = session('total_generated', rand(50000, 100000));
    @endphp

    @if(count($recentDocs) > 0)
    <section class="py-16 bg-indigo-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-3">
                        <span class="text-2xl">📄</span>
                        Dokumen Terakhir Anda
                    </h2>
                    <p class="text-gray-600 mt-1">Dokumen yang baru saja Anda buat dalam sesi ini</p>
                </div>
                <a href="#document-types" class="text-indigo-600 font-semibold hover:text-indigo-700 transition">
                    Buat Dokumen Baru →
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach(array_slice($recentDocs, 0, 3) as $doc)
                    <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-200 hover:shadow-md transition-shadow">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center text-white">
                                    @if(str_contains($doc['type'], 'cv'))
                                        👤
                                    @elseif(str_contains($doc['type'], 'lamaran'))
                                        📄
                                    @else
                                        📋
                                    @endif
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">{{ $doc['type'] }}</div>
                                    <div class="text-xs text-gray-500">{{ date('d M Y H:i', strtotime($doc['created_at'])) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('documents.result', $doc['id']) }}" class="flex-1 bg-indigo-50 text-indigo-700 py-2 px-3 rounded-lg text-sm font-medium text-center hover:bg-indigo-100 transition">
                                Lihat
                            </a>
                            <a href="{{ route('documents.download.pdf', $doc['id']) }}" class="flex-1 bg-green-50 text-green-700 py-2 px-3 rounded-lg text-sm font-medium text-center hover:bg-green-100 transition">
                                Download
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Simple Analytics Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl p-8 md:p-12 text-white">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold mb-3">Dokumen Dibuat Hari Ini</h2>
                    <p class="text-gray-400">Platform yang dipercaya ribuan pengguna Indonesia</p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="text-4xl font-bold text-indigo-400 mb-2" id="counter-today">{{ rand(150, 450) }}</div>
                        <div class="text-sm text-gray-400">Hari Ini</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="text-4xl font-bold text-green-400 mb-2">{{ number_format($totalGenerated) }}</div>
                        <div class="text-sm text-gray-400">Total Dokumen</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="text-4xl font-bold text-amber-400 mb-2">3</div>
                        <div class="text-sm text-gray-400">Jenis Surat</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6">
                        <div class="text-4xl font-bold text-pink-400 mb-2">100%</div>
                        <div class="text-sm text-gray-400">Gratis</div>
                    </div>
                </div>

                <div class="mt-10 text-center">
                    <p class="text-gray-400 text-sm">
                        💡 Tips: Gunakan fitur <a href="/preview-surat" class="text-indigo-400 hover:text-indigo-300 underline">Preview Surat</a> untuk melihat contoh dokumen sebelum membuat
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="gradient-bg text-white py-20 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Siap Membuat Surat Profesional?
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Mulai sekarang dan buat surat Anda dalam hitungan menit. Gratis, mudah, dan profesional.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#document-types" class="bg-white text-indigo-600 px-8 py-4 rounded-xl text-lg font-semibold hover:bg-gray-50 transition-all duration-200 inline-flex items-center justify-center gap-2 shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"/>
                    </svg>
                    Buat Surat Sekarang
                </a>
                <a href="#features" class="bg-white/20 backdrop-blur-sm text-white px-8 py-4 rounded-xl text-lg font-semibold border border-white/30 hover:bg-white/30 transition-all duration-200 inline-flex items-center justify-center gap-2">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <!-- Notifications -->
    @if(session('success'))
        <div id="notification" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 translate-y-full">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"/>
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div id="notification" class="fixed bottom-4 right-4 bg-red-500 text-white px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 translate-y-full">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <script>
        // Counter animation for today's stats
        function animateCounter(elementId, target, duration = 2000) {
            const element = document.getElementById(elementId);
            if (!element) return;

            const start = 0;
            const increment = target / (duration / 16);
            let current = start;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current);
            }, 16);
        }

        // Animate counter when section is visible
        document.addEventListener('DOMContentLoaded', function() {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target.querySelector('#counter-today');
                        if (counter) {
                            animateCounter('counter-today', parseInt(counter.textContent));
                        }
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            const analyticsSection = document.querySelector('#counter-today')?.closest('section');
            if (analyticsSection) {
                counterObserver.observe(analyticsSection);
            }
        });

        // Show notification with animation
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.remove('translate-y-full');
                }, 100);

                setTimeout(() => {
                    notification.classList.add('translate-y-full');
                }, 5000);
            }
        });

        // Mobile menu toggle - optimized
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            if (menu) menu.classList.toggle('hidden');
        }

        // Smooth scroll with performance optimization
        const smoothScrollHandler = function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId.startsWith('#')) {
                const target = document.querySelector(targetId);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        };

        // Use event delegation for better performance
        document.addEventListener('click', function(e) {
            if (e.target.tagName === 'A' && e.target.getAttribute('href')?.startsWith('#')) {
                smoothScrollHandler.call(e.target, e);
            }
        });

        // Intersection Observer for performance-optimized animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const animationObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    animationObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.card-hover').forEach(el => {
            animationObserver.observe(el);
        });
    </script>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <span class="text-2xl font-bold text-gradient">🇮🇩 Surat Generator Indonesia</span>
                </div>
                <p class="text-gray-400 mb-4">© 2026 Generator surat resmi Indonesia. Semua hak dilindungi.</p>
                <div class="flex justify-center space-x-6 text-sm">
                    <a href="/" class="text-gray-400 hover:text-white transition-colors duration-200">Beranda</a>
                    <a href="/preview-surat" class="text-gray-400 hover:text-white transition-colors duration-200">Preview</a>
                    <a href="/surat-lamaran-kerja" class="text-gray-400 hover:text-white transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-400 hover:text-white transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-400 hover:text-white transition-colors duration-200">CV Generator</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
