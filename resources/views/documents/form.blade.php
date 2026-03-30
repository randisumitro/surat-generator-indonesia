<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $documentType->name }} - Surat Generator Indonesia</title>
    <meta name="description" content="Buat {{ $documentType->name }} dengan template profesional. Isi formulir dan dapatkan surat Anda sekarang.">
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

        .step-indicator {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-weight: 600;
            font-size: 14px;
        }

        .step-indicator.active {
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow-md);
        }

        .input-focus {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid var(--gray-200);
            background: white;
        }

        .input-focus:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            outline: none;
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

        .btn-primary:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        .btn-secondary {
            background: white;
            color: var(--gray-700);
            border: 2px solid var(--gray-200);
            font-weight: 600;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-secondary:hover {
            background: var(--gray-50);
            border-color: var(--gray-300);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .loading-spinner {
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .animate-shake {
            animation: shake 0.5s ease-in-out;
        }

        .input-error {
            border-color: var(--error) !important;
            background-color: #fef2f2 !important;
        }

        .input-error:focus {
            border-color: var(--error) !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
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
                    <a href="/surat-lamaran-kerja" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-600 hover:text-primary font-medium text-sm transition-colors duration-200">CV Generator</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Progress Steps -->
    <section class="gradient-bg text-white py-8 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="step-indicator active w-10 h-10 rounded-full flex items-center justify-center">1</div>
                    <div class="w-16 h-1 bg-white/30 mx-2 rounded-full"></div>
                    <div class="step-indicator w-10 h-10 rounded-full bg-white/30 flex items-center justify-center">2</div>
                    <div class="w-16 h-1 bg-white/30 mx-2 rounded-full"></div>
                    <div class="step-indicator w-10 h-10 rounded-full bg-white/30 flex items-center justify-center">3</div>
                </div>
                <div class="hidden md:block text-right">
                    <div class="text-sm opacity-80 font-medium">Langkah</div>
                    <div class="font-semibold text-lg">Isi Formulir</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="/" class="hover:text-primary transition-colors duration-200 font-medium">Beranda</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-900 font-semibold">{{ $documentType->name }}</li>
                </ol>
            </nav>

            <!-- Page Title -->
            <div class="text-center mb-10">
                <div class="icon-wrapper mx-auto mb-4">
                    @switch($documentType->slug)
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
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $documentType->name }}</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    {{ $documentType->description ?? 'Isi formulir di bawah ini untuk membuat surat profesional Anda' }}
                </p>
            </div>

            <!-- Form -->
            <div class="card p-8 shadow-lg">
                <form action="{{ route('documents.generate', $documentType->slug) }}" method="POST" id="documentForm" class="space-y-0" enctype="multipart/form-data">
                    @csrf

                    <!-- Template Selection -->
                    @if($templates->count() > 1)
                        <div class="p-8 border-b border-gray-100">
                            <label class="block text-sm font-semibold text-gray-900 mb-4 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-5L9 2H4z"/>
                                </svg>
                                Pilih Template
                            </label>
                            <div class="grid md:grid-cols-2 gap-4">
                                @foreach($templates as $template)
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="template_id" value="{{ $template->id }}"
                                               class="peer sr-only" {{ $loop->first ? 'checked' : '' }}>
                                        <div class="card p-4 border-2 rounded-xl transition-all peer-checked:border-primary peer-checked:bg-gradient-to-r peer-checked:from-indigo-50 peer-checked:to-purple-50 hover:border-gray-300 peer-checked:shadow-md">
                                            <div class="flex items-start justify-between">
                                                <div>
                                                    <div class="font-semibold text-gray-900">{{ $template->name }}</div>
                                                    <div class="text-sm text-gray-500 mt-1">
                                                        {{ $template->is_premium ? '✨ Premium' : 'Gratis' }}
                                                    </div>
                                                </div>
                                                <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-primary peer-checked:bg-primary flex items-center justify-center transition-all">
                                                    <div class="w-2 h-2 bg-white rounded-full hidden peer-checked:block"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="template_id" value="{{ $templates->first()->id }}">
                    @endif

                    <!-- Dynamic Form Fields -->
                    <div class="p-8">
                        @php
                            $selectedTemplate = $templates->first();
                            $content = $selectedTemplate->content;
                            preg_match_all('/\{\{([^}]+)\}\}/', $content, $matches);
                            $placeholders = array_unique($matches[1] ?? []);
                        @endphp

                        <div class="space-y-6">
                            @foreach($placeholders as $placeholder)
                                <div class="form-group">
                                    <label for="{{ $placeholder }}" class="block text-sm font-semibold text-gray-900 mb-2">
                                        {{ ucfirst(str_replace('_', ' ', $placeholder)) }}
                                        <span class="text-red-500">*</span>
                                    </label>

                                    @if(str_contains($placeholder, 'alamat') || str_contains($placeholder, 'deskripsi') || str_contains($placeholder, 'konten'))
                                        <div class="relative">
                                            <textarea
                                                name="{{ $placeholder }}"
                                                id="{{ $placeholder }}"
                                                rows="4"
                                                class="input-focus w-full px-4 py-3 rounded-xl resize-none"
                                                placeholder="Masukkan {{ str_replace('_', ' ', $placeholder) }}..."
                                                required>{{ old($placeholder) }}</textarea>
                                            <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                                <span id="{{ $placeholder }}-count">0</span>/500
                                            </div>
                                        </div>
                                    @elseif(str_contains($placeholder, 'email'))
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                                </svg>
                                            </div>
                                            <input
                                                type="email"
                                                name="{{ $placeholder }}"
                                                id="{{ $placeholder }}"
                                                class="input-focus w-full pl-12 pr-4 py-3 rounded-xl"
                                                placeholder="email@example.com"
                                                value="{{ old($placeholder) }}"
                                                required>
                                        </div>
                                    @elseif(str_contains($placeholder, 'telepon') || str_contains($placeholder, 'phone'))
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                                </svg>
                                            </div>
                                            <input
                                                type="tel"
                                                name="{{ $placeholder }}"
                                                id="{{ $placeholder }}"
                                                class="input-focus w-full pl-12 pr-4 py-3 rounded-xl"
                                                placeholder="+62 812-3456-7890"
                                                value="{{ old($placeholder) }}"
                                                required>
                                        </div>
                                    @elseif(str_contains($placeholder, 'tanggal') || str_contains($placeholder, 'date'))
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <input
                                                type="date"
                                                name="{{ $placeholder }}"
                                                id="{{ $placeholder }}"
                                                class="input-focus w-full pl-12 pr-4 py-3 rounded-xl"
                                                value="{{ old($placeholder) ?? date('Y-m-d') }}"
                                                required>
                                        </div>
                                    @else
                                        <input
                                            type="text"
                                            name="{{ $placeholder }}"
                                            id="{{ $placeholder }}"
                                            class="input-focus w-full px-4 py-3 rounded-xl"
                                            placeholder="Masukkan {{ str_replace('_', ' ', $placeholder) }}..."
                                            value="{{ old($placeholder) }}"
                                            required>
                                    @endif

                                    @error($placeholder)
                                        <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3 animate-shake">
                                            <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            <div class="flex-1">
                                                <p class="text-sm font-medium text-red-800">{{ $message }}</p>
                                                <p class="text-xs text-red-600 mt-1">Harap periksa kembali input Anda</p>
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <!-- Photo Upload for CV -->
                        @if($documentType->slug === 'cv-generator')
                            <div class="p-8 border-t border-gray-100 bg-gradient-to-r from-amber-50 to-orange-50">
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="px-2 py-1 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-xs font-bold rounded-full">
                                        PREMIUM
                                    </span>
                                    <label class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                        </svg>
                                        Foto Profil (Opsional)
                                    </label>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0">
                                        <div id="photoPreview" class="w-24 h-32 bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden border-2 border-dashed border-gray-300">
                                            <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="relative">
                                            <input
                                                type="file"
                                                name="profile_photo"
                                                id="profile_photo"
                                                accept="image/jpeg,image/png,image/jpg"
                                                class="input-focus w-full px-4 py-3 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-100 file:text-amber-700 hover:file:bg-amber-200"
                                                onchange="previewPhoto(this)">
                                        </div>
                                        <p class="text-xs text-gray-500 mt-2">
                                            Format: JPG, PNG. Maksimal 2MB. Foto akan ditampilkan di pojok kanan atas CV Anda.
                                        </p>
                                        @error('profile_photo')
                                            <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3 animate-shake">
                                                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                                </svg>
                                                <div class="flex-1">
                                                    <p class="text-sm font-medium text-red-800">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <script>
                                function previewPhoto(input) {
                                    const preview = document.getElementById('photoPreview');
                                    if (input.files && input.files[0]) {
                                        const reader = new FileReader();
                                        reader.onload = function(e) {
                                            preview.innerHTML = '<img src="' + e.target.result + '" class="w-full h-full object-cover">';
                                            preview.classList.remove('border-dashed');
                                            preview.classList.add('border-solid');
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    } else {
                                        preview.innerHTML = '<svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>';
                                        preview.classList.add('border-dashed');
                                        preview.classList.remove('border-solid');
                                    }
                                }
                            </script>
                        @endif

                        <!-- Submit Button -->
                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <button type="submit" id="submitBtn"
                                    class="btn-primary w-full py-4 px-8 rounded-xl text-lg flex items-center justify-center gap-3 shadow-lg">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"/>
                                </svg>
                                <span id="submitText">Generate Surat</span>
                                <div id="loadingSpinner" class="loading-spinner hidden"></div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Instructions -->
            <div class="mt-8 bg-gradient-to-r from-indigo-50 via-purple-50 to-pink-50 border border-indigo-200 rounded-2xl p-8">
                <h3 class="text-lg font-semibold text-indigo-900 mb-4 flex items-center gap-2">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    Panduan Penggunaan
                </h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 text-sm font-bold shadow-md">1</div>
                            <div>
                                <div class="font-semibold text-indigo-900">Isi Formulir</div>
                                <div class="text-sm text-indigo-700">Lengkapi semua field dengan data yang benar</div>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 text-sm font-bold shadow-md">2</div>
                            <div>
                                <div class="font-semibold text-indigo-900">Pilih Template</div>
                                <div class="text-sm text-indigo-700">Pilih template yang sesuai kebutuhan Anda</div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-lg flex items-center justify-center flex-shrink-0 text-sm font-bold shadow-md">3</div>
                            <div>
                                <div class="font-semibold text-indigo-900">Generate & Download</div>
                                <div class="text-sm text-indigo-700">Preview hasil dan download dalam format PDF</div>
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
                                <div class="text-sm text-green-700">Tidak perlu registrasi atau pembayaran</div>
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
                <p class="text-gray-400">© 2026 Generator surat resmi Indonesia. Semua hak dilindungi.</p>
                <div class="mt-4 flex justify-center space-x-6 text-sm">
                    <a href="/" class="text-gray-400 hover:text-white transition-colors duration-200">Beranda</a>
                    <a href="/surat-lamaran-kerja" class="text-gray-400 hover:text-white transition-colors duration-200">Surat Lamaran</a>
                    <a href="/surat-keterangan" class="text-gray-400 hover:text-white transition-colors duration-200">Surat Keterangan</a>
                    <a href="/cv-generator" class="text-gray-400 hover:text-white transition-colors duration-200">CV Generator</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Error Modal -->
    @if(session('error'))
        <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 transform transition-all">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Terjadi Kesalahan</h3>
                        <p class="text-gray-600 text-sm">{{ session('error') }}</p>
                    </div>
                </div>
                <button onclick="closeErrorModal()" class="w-full bg-gray-900 text-white py-2 px-4 rounded-lg font-medium hover:bg-gray-800 transition">
                    Tutup
                </button>
            </div>
        </div>
    @endif

    <script>
        // Character counter for textareas
        document.querySelectorAll('textarea').forEach(textarea => {
            const counter = document.getElementById(textarea.id + '-count');
            if (counter) {
                textarea.addEventListener('input', function() {
                    counter.textContent = this.value.length;
                    // Change color when approaching limit
                    if (this.value.length > 400) {
                        counter.classList.add('text-orange-500');
                    } else {
                        counter.classList.remove('text-orange-500');
                    }
                });
                // Initialize counter
                counter.textContent = textarea.value.length;
            }
        });

        // Enhanced form validation
        const form = document.getElementById('documentForm');
        const submitBtn = document.getElementById('submitBtn');
        const submitText = document.getElementById('submitText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        // Real-time validation
        document.querySelectorAll('input, textarea').forEach(field => {
            field.addEventListener('blur', function() {
                validateField(this);
            });

            field.addEventListener('input', function() {
                // Remove error styling when user starts typing
                this.classList.remove('input-error');
                const errorDiv = this.parentElement.querySelector('.animate-shake');
                if (errorDiv) {
                    errorDiv.remove();
                }
            });
        });

        function validateField(field) {
            const value = field.value.trim();
            let isValid = true;
            let errorMessage = '';

            // Basic validation
            if (field.hasAttribute('required') && !value) {
                isValid = false;
                errorMessage = 'Field ini wajib diisi';
            }

            // Email validation
            if (field.type === 'email' && value && !isValidEmail(value)) {
                isValid = false;
                errorMessage = 'Format email tidak valid';
            }

            // Phone validation
            if (field.type === 'tel' && value && !isValidPhone(value)) {
                isValid = false;
                errorMessage = 'Format nomor telepon tidak valid';
            }

            // Show/hide error
            if (!isValid) {
                showFieldError(field, errorMessage);
            } else {
                hideFieldError(field);
            }

            return isValid;
        }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function isValidPhone(phone) {
            return /^[\d\s\-\+\(\)]+$/.test(phone) && phone.replace(/\D/g, '').length >= 10;
        }

        function showFieldError(field, message) {
            field.classList.add('input-error');

            // Remove existing error if any
            hideFieldError(field);

            // Create error message
            const errorDiv = document.createElement('div');
            errorDiv.className = 'mt-2 p-3 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3 animate-shake';
            errorDiv.innerHTML = `
                <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <div class="flex-1">
                    <p class="text-sm font-medium text-red-800">${message}</p>
                    <p class="text-xs text-red-600 mt-1">Harap periksa kembali input Anda</p>
                </div>
            `;

            field.parentElement.appendChild(errorDiv);
        }

        function hideFieldError(field) {
            field.classList.remove('input-error');
            const errorDiv = field.parentElement.querySelector('.animate-shake');
            if (errorDiv) {
                errorDiv.remove();
            }
        }

        // Form submission with enhanced loading state
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Validate all fields first
            let isFormValid = true;
            document.querySelectorAll('input, textarea').forEach(field => {
                if (!validateField(field)) {
                    isFormValid = false;
                }
            });

            if (!isFormValid) {
                // Scroll to first error
                const firstError = document.querySelector('.input-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            submitText.textContent = 'Menggenerate...';
            loadingSpinner.classList.remove('hidden');

            // Add loading animation to button
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');

            // Submit form after a short delay for better UX
            setTimeout(() => {
                form.submit();
            }, 500);
        });

        // Template selection with smooth transition
        document.querySelectorAll('input[name="template_id"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // Add visual feedback
                document.querySelectorAll('.peer-checked\\:border-purple-500').forEach(el => {
                    el.classList.add('transition-all', 'duration-200');
                });
            });
        });

        // Close error modal
        function closeErrorModal() {
            const modal = document.getElementById('errorModal');
            if (modal) {
                modal.style.opacity = '0';
                modal.style.transform = 'scale(0.95)';
                setTimeout(() => modal.remove(), 300);
            }
        }

        // Auto-close error modal after 5 seconds
        setTimeout(() => {
            closeErrorModal();
        }, 5000);

        // Progress step animation on scroll
        window.addEventListener('scroll', function() {
            const scrolled = window.scrollY;
            const progressSection = document.querySelector('.gradient-bg');
            if (progressSection && scrolled > 100) {
                progressSection.style.transform = 'translateY(-50%)';
                progressSection.style.opacity = '0.9';
            } else if (progressSection) {
                progressSection.style.transform = 'translateY(0)';
                progressSection.style.opacity = '1';
            }
        });
    </script>
</body>
</html>
