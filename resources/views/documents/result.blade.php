<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Surat - {{ $generatedDocument->documentType->name }}</title>
    <meta name="description" content="Preview dan download hasil surat yang telah dibuat">
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

        .btn-secondary {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-secondary:hover {
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .preview-container {
            background: linear-gradient(to bottom, #f8fafc, #ffffff);
        }

        .success-animation {
            animation: slideInUp 0.5s ease-out;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .copy-success {
            animation: copyPulse 0.6s ease;
        }

        @keyframes copyPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
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
    </style>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-lg border-b border-gray-100 sticky top-0 z-40 shadow-sm">
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
                    <a href="/surat-lamaran-kerja" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">CV Generator</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Success Banner -->
    <section class="gradient-bg text-white py-8 relative">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="success-animation flex items-center justify-center gap-4">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="text-center">
                    <h2 class="text-2xl md:text-3xl font-bold mb-2">🎉 Surat Berhasil Dibuat!</h2>
                    <p class="text-white/90 text-lg">Preview hasil surat Anda dan download dalam format PDF</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Document Preview (2/3 width) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Document Info Card -->
                    <div class="card p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3h4v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                                Informasi Surat
                            </h3>
                            <span class="px-3 py-1 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-sm font-medium rounded-full shadow-md">
                                Selesai
                            </span>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <div class="text-sm text-gray-500 mb-1">Jenis Surat</div>
                                <div class="font-medium text-gray-900">{{ $generatedDocument->documentType->name }}</div>
                            </div>
                            @if($generatedDocument->template)
                                <div>
                                    <div class="text-sm text-gray-500 mb-1">Template</div>
                                    <div class="font-medium text-gray-900">{{ $generatedDocument->template->name }}</div>
                                </div>
                            @endif
                            <div>
                                <div class="text-sm text-gray-500 mb-1">Dibuat</div>
                                <div class="font-medium text-gray-900">{{ $generatedDocument->created_at->format('d M Y H:i') }}</div>
                            </div>
                            <div>
                                <div class="text-sm text-gray-500 mb-1">ID Dokumen</div>
                                <div class="font-medium text-gray-900">#{{ $generatedDocument->id }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Document Preview -->
                    <div class="card shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-indigo-50 via-purple-50 to-pink-50 px-6 py-4 border-b border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3h4v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                                Preview Surat
                            </h3>
                        </div>
                        <div class="preview-container p-6 max-h-96 overflow-y-auto">
                            <div class="card p-8 shadow-sm border border-gray-200">
                                <div class="whitespace-pre-wrap text-sm leading-relaxed font-serif text-gray-800">
                                    {{ $generatedDocument->generated_content }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Sidebar (1/3 width) -->
                <div class="lg:col-span-1">
                    <div class="lg:sticky lg:top-24 space-y-6">
                        <!-- Primary Actions -->
                        <div class="card p-6 shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 4 10 4s8.268 1.943 9.542 6c-1.274 4.057-5.064 6-9.542 6S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                                Aksi Cepat
                            </h3>
                            <div class="space-y-3">
                                <a href="{{ route('documents.download.pdf', $generatedDocument->id) }}"
                                   class="btn-primary w-full py-3 px-6 rounded-xl font-semibold flex items-center justify-center gap-3 shadow-lg">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L10.586 9.5H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                    Download PDF
                                </a>

                                <button onclick="copyToClipboard()"
                                        class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white py-3 px-6 rounded-xl font-semibold hover:from-green-600 hover:to-emerald-600 transition-all duration-200 flex items-center justify-center gap-3 shadow-lg">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"/>
                                        <path d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 00-3 3z"/>
                                    </svg>
                                    <span id="copyText">Salin Teks</span>
                                </button>
                            </div>
                        </div>

                        <!-- Secondary Actions -->
                        <div class="card p-6 shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Lainnya</h3>
                            <div class="space-y-3">
                                <a href="{{ route('documents.form', $generatedDocument->documentType->slug) }}"
                                   class="btn-secondary w-full bg-gray-100 text-gray-700 py-3 px-6 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                    </svg>
                                    Buat Surat Baru
                                </a>

                                <a href="/"
                                   class="btn-secondary w-full border border-gray-300 text-gray-700 py-3 px-6 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-200 flex items-center justify-center gap-3">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                    </svg>
                                    Kembali ke Beranda
                                </a>
                            </div>
                        </div>

                        <!-- Share Options -->
                        <div class="card p-6 shadow-lg">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.3 3.3 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                </svg>
                                Bagikan
                            </h3>
                            <div class="space-y-3">
                                <button onclick="shareViaWhatsApp()"
                                        class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white py-2 px-4 rounded-xl font-medium hover:from-green-600 hover:to-emerald-600 transition-all duration-200 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                    WhatsApp
                                </button>

                                <button onclick="copyLink()"
                                        class="w-full bg-gradient-to-r from-blue-500 to-indigo-500 text-white py-2 px-4 rounded-xl font-medium hover:from-blue-600 hover:to-indigo-600 transition-all duration-200 flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414l3 3a2 2 0 002.828 0zm-4.828 8.586a2 2 0 112.828-2.828l3-3a1 1 0 011.414 1.414l-3 3a2 2 0 01-2.828 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Salin Link
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips Section -->
            <div class="mt-12 bg-gradient-to-r from-indigo-50 via-purple-50 to-pink-50 border border-indigo-200 rounded-2xl p-8">
                <h3 class="text-xl font-semibold text-indigo-900 mb-6 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    Tips Tambahan
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2v1a1 1 0 102 0V3h4v1a1 1 0 102 0V3a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-indigo-900">Format PDF Profesional</div>
                                <div class="text-sm text-indigo-700">File PDF sudah dalam format A4 dengan margin dan tipografi yang tepat</div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2 3 3 0 00-3 3z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-indigo-900">Siap Cetak</div>
                                <div class="text-sm text-indigo-700">Hasil surat siap untuk dicetak pada kertas A4</div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 4 10 4s8.268 1.943 9.542 6c-1.274 4.057-5.064 6-9.542 6S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-indigo-900">Periksa Kembali</div>
                                <div class="text-sm text-indigo-700">Selalu periksa kembali data sebelum mencetak</div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 shadow-md">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div>
                                <div class="font-semibold text-green-900">100% Gratis</div>
                                <div class="text-sm text-green-700">Tidak ada biaya tersembunyi atau registrasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12 mt-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center mb-4">
                    <span class="text-2xl font-bold text-gradient">🇮🇩 Surat Generator Indonesia</span>
                </div>
                <p class="text-gray-400 mb-4"> 2026 Generator surat resmi Indonesia. Semua hak dilindungi.</p>
                <div class="flex justify-center space-x-6 text-sm">
                    <a href="/" class="text-gray-400 hover:text-white transition-colors duration-200">Beranda</a>
                    <a href="/surat-lamaran-kerja" class="text-gray-400 hover:text-white transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-400 hover:text-white transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-400 hover:text-white transition-colors duration-200">CV Generator</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Hidden textarea for copying -->
    <textarea id="copyText" class="absolute -left-full opacity-0">{{ $generatedDocument->generated_content }}</textarea>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-4 right-4 transform translate-y-full transition-transform duration-300 z-50">
        <div class="bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <span id="toastMessage">Berhasil disalin!</span>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const copyText = document.getElementById('copyText');
            const button = event.target.closest('button');
            const originalText = button.querySelector('span').textContent;

            copyText.select();
            copyText.setSelectionRange(0, 99999);

            try {
                document.execCommand('copy');
                showToast('Teks berhasil disalin!');
                button.classList.add('copy-success');
                button.querySelector('span').textContent = '✓ Tersalin';

                setTimeout(() => {
                    button.classList.remove('copy-success');
                    button.querySelector('span').textContent = originalText;
                }, 2000);
            } catch (err) {
                // Fallback for modern browsers
                navigator.clipboard.writeText(copyText.value).then(() => {
                    showToast('Teks berhasil disalin!');
                    button.classList.add('copy-success');
                    button.querySelector('span').textContent = '✓ Tersalin';

                    setTimeout(() => {
                        button.classList.remove('copy-success');
                        button.querySelector('span').textContent = originalText;
                    }, 2000);
                }).catch(() => {
                    showToast('Gagal menyalin teks', 'error');
                });
            }
        }

        function shareViaWhatsApp() {
            const text = encodeURIComponent('Saya baru saja membuat surat menggunakan Surat Generator Indonesia!');
            const url = encodeURIComponent(window.location.href);
            window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
        }

        function copyLink() {
            navigator.clipboard.writeText(window.location.href).then(() => {
                showToast('Link berhasil disalin!');
            }).catch(() => {
                showToast('Gagal menyalin link', 'error');
            });
        }

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            const toastDiv = toast.querySelector('div');

            toastMessage.textContent = message;

            if (type === 'error') {
                toastDiv.className = 'bg-red-500 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3';
            } else {
                toastDiv.className = 'bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3';
            }

            toast.classList.remove('translate-y-full');

            setTimeout(() => {
                toast.classList.add('translate-y-full');
            }, 3000);
        }

        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            // Ctrl/Cmd + S to download PDF
            if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                e.preventDefault();
                window.location.href = '{{ route('documents.download.pdf', $generatedDocument->id) }}';
            }
            // Ctrl/Cmd + C to copy text
            if ((e.ctrlKey || e.metaKey) && e.key === 'c' && !window.getSelection().toString()) {
                e.preventDefault();
                copyToClipboard();
            }
        });
    </script>
</body>
</html>
