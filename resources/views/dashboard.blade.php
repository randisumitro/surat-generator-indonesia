<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Surat Generator Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        }

        * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }

        body {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: #1a1a1a;
        }

        .gradient-bg {
            background: var(--gradient-primary);
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        .document-item {
            transition: all 0.3s ease;
        }

        .document-item:hover {
            transform: translateX(4px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease;
        }

        .loading-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
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
                    <a href="/" class="text-gray-600 hover:text-primary font-medium text-sm transition">Beranda</a>
                    <a href="/preview-surat" class="text-gray-600 hover:text-primary font-medium text-sm transition">Preview</a>
                    <a href="/dashboard" class="text-indigo-600 font-semibold text-sm">Dashboard</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8 fade-in-up">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Dashboard Dokumen</h1>
                <p class="text-lg text-gray-600">Kelola dan pantau semua dokumen yang Anda buat</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-8">
                <div class="stat-card card p-6 fade-in-up" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Total Dokumen</p>
                            <p class="text-3xl font-bold text-indigo-600" id="totalDocs">-</p>
                        </div>
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center text-2xl">
                            📄
                        </div>
                    </div>
                </div>

                <div class="stat-card card p-6 fade-in-up" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Minggu Ini</p>
                            <p class="text-3xl font-bold text-green-600" id="weekDocs">-</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center text-2xl">
                            📈
                        </div>
                    </div>
                </div>

                <div class="stat-card card p-6 fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Bulan Ini</p>
                            <p class="text-3xl font-bold text-purple-600" id="monthDocs">-</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-2xl">
                            📊
                        </div>
                    </div>
                </div>

                <div class="stat-card card p-6 fade-in-up" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600 mb-1">Dibagikan</p>
                            <p class="text-3xl font-bold text-amber-600" id="sharedDocs">-</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center text-2xl">
                            🔗
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card p-6 mb-8 fade-in-up" style="animation-delay: 0.5s">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Aksi Cepat</h2>
                <div class="grid md:grid-cols-3 gap-4">
                    <a href="/surat-lamaran-kerja" class="btn-primary py-3 px-6 rounded-xl text-center flex items-center justify-center gap-2">
                        <span>📄</span>
                        <span>Buat Surat Lamaran</span>
                    </a>
                    <a href="/cv-generator" class="btn-primary py-3 px-6 rounded-xl text-center flex items-center justify-center gap-2">
                        <span>👤</span>
                        <span>Buat CV</span>
                    </a>
                    <a href="/surat-keterangan" class="btn-primary py-3 px-6 rounded-xl text-center flex items-center justify-center gap-2">
                        <span>📋</span>
                        <span>Buat Surat Keterangan</span>
                    </a>
                </div>
            </div>

            <!-- Recent Documents -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Recent Documents List -->
                <div class="card p-6 fade-in-up" style="animation-delay: 0.6s">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-semibold text-gray-900">Dokumen Terbaru</h2>
                        <button onclick="refreshDocuments()" class="text-indigo-600 hover:text-indigo-800 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                        </button>
                    </div>
                    
                    <div id="documentsList" class="space-y-3">
                        <!-- Documents will be loaded here -->
                        <div class="loading-skeleton h-20 rounded-lg mb-3"></div>
                        <div class="loading-skeleton h-20 rounded-lg mb-3"></div>
                        <div class="loading-skeleton h-20 rounded-lg"></div>
                    </div>

                    <div class="mt-6 text-center">
                        <button onclick="loadMoreDocuments()" class="text-indigo-600 hover:text-indigo-800 font-medium transition">
                            Muat Lebih Banyak
                        </button>
                    </div>
                </div>

                <!-- Activity Chart -->
                <div class="card p-6 fade-in-up" style="animation-delay: 0.7s">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Aktivitas Terkini</h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600">
                                    ✓
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Dokumen dibuat</p>
                                    <p class="text-sm text-gray-500">2 jam yang lalu</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600">Surat Lamaran</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600">
                                    👁
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Dokumen dilihat</p>
                                    <p class="text-sm text-gray-500">5 jam yang lalu</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600">CV Profesional</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600">
                                    ↓
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Dokumen diunduh</p>
                                    <p class="text-sm text-gray-500">1 hari yang lalu</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600">Surat Keterangan</span>
                        </div>

                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center text-amber-600">
                                    🔗
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">Dokumen dibagikan</p>
                                    <p class="text-sm text-gray-500">2 hari yang lalu</p>
                                </div>
                            </div>
                            <span class="text-sm text-gray-600">CV Kreatif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        let dashboardData = null;

        // Load dashboard data
        async function loadDashboardData() {
            try {
                const response = await fetch('/api/dashboard');
                const data = await response.json();
                
                if (data.success) {
                    dashboardData = data;
                    updateStats(data.stats);
                    renderDocuments(data.recent_documents);
                }
            } catch (error) {
                console.error('Error loading dashboard:', error);
            }
        }

        // Update stats
        function updateStats(stats) {
            document.getElementById('totalDocs').textContent = stats.total || 0;
            document.getElementById('weekDocs').textContent = stats.this_week || 0;
            document.getElementById('monthDocs').textContent = stats.this_month || 0;
            document.getElementById('sharedDocs').textContent = stats.shared || 0;
        }

        // Render documents
        function renderDocuments(documents) {
            const container = document.getElementById('documentsList');
            
            if (documents.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-8">
                        <div class="text-4xl mb-4">📄</div>
                        <p class="text-gray-600">Belum ada dokumen yang dibuat</p>
                        <a href="/" class="btn-primary inline-block mt-4 px-6 py-2 rounded-lg">
                            Buat Dokumen Pertama
                        </a>
                    </div>
                `;
                return;
            }

            container.innerHTML = documents.map(doc => `
                <div class="document-item p-4 bg-gray-50 rounded-lg hover:bg-gray-100 cursor-pointer" 
                     onclick="openDocument(${doc.id})">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900">${doc.title}</h3>
                            <p class="text-sm text-gray-600">${doc.document_type.name}</p>
                            <p class="text-xs text-gray-500 mt-1">
                                ${new Date(doc.created_at).toLocaleString('id-ID')}
                            </p>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="event.stopPropagation(); viewDocument(${doc.id})" 
                                    class="p-2 text-indigo-600 hover:bg-indigo-100 rounded-lg transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                            <button onclick="event.stopPropagation(); downloadDocument(${doc.id})" 
                                    class="p-2 text-green-600 hover:bg-green-100 rounded-lg transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </button>
                            <button onclick="event.stopPropagation(); shareDocument(${doc.id})" 
                                    class="p-2 text-purple-600 hover:bg-purple-100 rounded-lg transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m9.032 4.026a9.001 9.001 0 01-7.432 0m9.032-4.026A9.001 9.001 0 0112 3c-4.474 0-8.268 2.943-9.543 7a9.97 9.97 0 011.827 3.342M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Open document
        function openDocument(id) {
            window.open(`/documents/result/${id}`, '_blank');
        }

        // View document
        function viewDocument(id) {
            window.open(`/documents/result/${id}`, '_blank');
        }

        // Download document
        function downloadDocument(id) {
            window.location.href = `/documents/download/pdf/${id}`;
        }

        // Share document
        async function shareDocument(id) {
            try {
                const response = await fetch(`/documents/${id}/share`, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    // Copy to clipboard
                    navigator.clipboard.writeText(result.share_url).then(() => {
                        alert('Link sharing berhasil disalin ke clipboard!');
                    });
                } else {
                    alert('Gagal membuat link sharing');
                }
            } catch (error) {
                console.error('Error sharing document:', error);
                alert('Terjadi kesalahan saat membagikan dokumen');
            }
        }

        // Refresh documents
        function refreshDocuments() {
            loadDashboardData();
        }

        // Load more documents
        function loadMoreDocuments() {
            // Implement pagination if needed
            alert('Fitur pagination akan segera hadir');
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            loadDashboardData();
        });
    </script>
</body>
</html>
