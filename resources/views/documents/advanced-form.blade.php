<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $documentType->name }} - Form Advanced</title>
    <meta name="description" content="Buat {{ $documentType->name }} dengan template profesional dan fitur lengkap.">
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
            --gradient-primary: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        }

        * { font-family: 'Inter', system-ui, -apple-system, sans-serif; }

        body {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            color: #1a1a1a;
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
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .input-focus {
            transition: all 0.2s ease;
            border: 2px solid #e5e7eb;
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
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .field-group {
            animation: fadeInUp 0.3s ease;
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

        .template-card {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .template-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .template-card.selected {
            border-color: var(--primary);
            background: linear-gradient(to right, rgba(99, 102, 241, 0.05), rgba(139, 92, 246, 0.05));
        }

        .progress-bar {
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border-radius: 2px;
            transition: width 0.3s ease;
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

        .error-message {
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
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
                    <a href="/dashboard" class="text-gray-600 hover:text-primary font-medium text-sm transition">Dashboard</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Progress Bar -->
    <div class="progress-bar" style="width: 0%;" id="progressBar"></div>

    <!-- Main Content -->
    <main class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-500">
                    <li><a href="/" class="hover:text-primary transition">Beranda</a></li>
                    <li class="text-gray-400">/</li>
                    <li><a href="/#document-types" class="hover:text-primary transition">Dokumen</a></li>
                    <li class="text-gray-400">/</li>
                    <li class="text-gray-900 font-semibold">{{ $documentType->name }}</li>
                </ol>
            </nav>

            <!-- Page Title -->
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-4">
                    {{ $documentType->icon ?? '📄' }}
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $documentType->name }}</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    {{ $documentType->description ?? 'Buat dokumen profesional dengan template berkualitas tinggi' }}
                </p>
            </div>

            <!-- Template Selection -->
            <div class="card p-8 mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center gap-3">
                    <span class="w-8 h-8 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center text-white">📋</span>
                    Pilih Template
                </h2>
                
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($templates as $template)
                        <div class="template-card card p-6 border-2 border-gray-200 rounded-xl" 
                             data-template-id="{{ $template->id }}"
                             onclick="selectTemplate({{ $template->id }})">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h3 class="font-semibold text-gray-900">{{ $template->name }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ $template->fields->count() }} field tersedia</p>
                                </div>
                                <div class="w-6 h-6 rounded-full border-2 border-gray-300 flex items-center justify-center template-check">
                                    <div class="w-3 h-3 bg-primary rounded-full hidden"></div>
                                </div>
                            </div>
                            @if($template->is_premium)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-amber-500 to-orange-500 text-white">
                                    ✨ Premium
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Gratis
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Dynamic Form -->
            <div class="card p-8" id="formContainer" style="display: none;">
                <form id="advancedForm" class="space-y-6">
                    @csrf
                    <input type="hidden" name="template_id" id="selectedTemplateId">
                    
                    <div id="dynamicFields" class="space-y-6">
                        <!-- Fields will be dynamically loaded here -->
                    </div>

                    <!-- Photo Upload for CV -->
                    <div id="photoUploadSection" class="hidden">
                        <div class="p-6 border-t border-gray-100 bg-gradient-to-r from-amber-50 to-orange-50 rounded-xl">
                            <div class="flex items-center gap-2 mb-4">
                                <span class="px-2 py-1 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-xs font-bold rounded-full">
                                    PREMIUM
                                </span>
                                <label class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                                    <span class="text-lg">📷</span>
                                    Foto Profil (Opsional)
                                </label>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div id="photoPreview" class="w-24 h-32 bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden border-2 border-dashed border-gray-300">
                                        <span class="text-3xl">👤</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <input type="file" name="profile_photo" id="profile_photo" 
                                           accept="image/jpeg,image/png,image/jpg"
                                           class="input-focus w-full px-4 py-3 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-amber-100 file:text-amber-700 hover:file:bg-amber-200"
                                           onchange="previewPhoto(this)">
                                    <p class="text-xs text-gray-500 mt-2">
                                        Format: JPG, PNG. Maksimal 2MB. Foto akan ditampilkan di CV Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 border-t border-gray-100">
                        <button type="submit" id="submitBtn"
                                class="btn-primary w-full py-4 px-8 rounded-xl text-lg flex items-center justify-center gap-3">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.293l-3-3a1 1 0 00-1.414 1.414L10.586 9.5H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"/>
                            </svg>
                            <span id="submitText">Buat Dokumen</span>
                            <div id="loadingSpinner" class="loading-spinner hidden"></div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 transform transition-all">
            <div class="text-center">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Dokumen Berhasil Dibuat!</h3>
                <p class="text-gray-600 mb-6">Dokumen Anda telah siap dan dapat diunduh.</p>
                <div class="flex gap-3">
                    <button onclick="viewDocument()" class="flex-1 bg-indigo-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-indigo-700 transition">
                        Lihat Dokumen
                    </button>
                    <button onclick="downloadDocument()" class="flex-1 bg-green-600 text-white py-3 px-4 rounded-lg font-medium hover:bg-green-700 transition">
                        Download PDF
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let selectedTemplateId = null;
        let currentDocumentId = null;
        const templates = @json($templates);

        // Select template
        function selectTemplate(templateId) {
            selectedTemplateId = templateId;
            
            // Update UI
            document.querySelectorAll('.template-card').forEach(card => {
                card.classList.remove('selected');
                card.querySelector('.template-check div').classList.add('hidden');
            });
            
            const selectedCard = document.querySelector(`[data-template-id="${templateId}"]`);
            selectedCard.classList.add('selected');
            selectedCard.querySelector('.template-check div').classList.remove('hidden');
            
            // Set hidden input
            document.getElementById('selectedTemplateId').value = templateId;
            
            // Load fields
            loadTemplateFields(templateId);
            
            // Show form
            document.getElementById('formContainer').style.display = 'block';
            
            // Update progress
            updateProgress(50);
        }

        // Load template fields
        function loadTemplateFields(templateId) {
            const template = templates.find(t => t.id === templateId);
            const fieldsContainer = document.getElementById('dynamicFields');
            
            fieldsContainer.innerHTML = '';
            
            template.fields.forEach((field, index) => {
                const fieldHtml = createFieldHtml(field, index);
                fieldsContainer.innerHTML += fieldHtml;
            });
            
            // Show photo upload for CV
            const photoSection = document.getElementById('photoUploadSection');
            if (template.document_type.slug === 'cv-generator') {
                photoSection.classList.remove('hidden');
            } else {
                photoSection.classList.add('hidden');
            }
        }

        // Create field HTML
        function createFieldHtml(field, index) {
            const required = field.is_required ? 'required' : '';
            const requiredMark = field.is_required ? '<span class="text-red-500">*</span>' : '';
            
            let fieldHtml = `
                <div class="field-group" style="animation-delay: ${index * 0.1}s">
                    <label for="${field.field_name}" class="block text-sm font-semibold text-gray-900 mb-2">
                        ${field.field_label} ${requiredMark}
                    </label>
            `;
            
            switch (field.field_type) {
                case 'textarea':
                    fieldHtml += `
                        <textarea name="${field.field_name}" id="${field.field_name}" rows="4"
                                  class="input-focus w-full px-4 py-3 rounded-xl resize-none"
                                  placeholder="${field.field_placeholder || ''}" ${required}></textarea>
                    `;
                    break;
                    
                case 'select':
                    fieldHtml += `
                        <select name="${field.field_name}" id="${field.field_name}"
                                class="input-focus w-full px-4 py-3 rounded-xl" ${required}>
                            <option value="">Pilih ${field.field_label.toLowerCase()}</option>
                    `;
                    field.field_options.forEach(option => {
                        fieldHtml += `<option value="${option}">${option}</option>`;
                    });
                    fieldHtml += `</select>`;
                    break;
                    
                case 'radio':
                    field.field_options.forEach((option, idx) => {
                        fieldHtml += `
                            <label class="flex items-center gap-2 mb-2">
                                <input type="radio" name="${field.field_name}" id="${field.field_name}_${idx}" 
                                       value="${option}" class="mr-2" ${required}>
                                <span>${option}</span>
                            </label>
                        `;
                    });
                    break;
                    
                case 'checkbox':
                    field.field_options.forEach((option, idx) => {
                        fieldHtml += `
                            <label class="flex items-center gap-2 mb-2">
                                <input type="checkbox" name="${field.field_name}[]" id="${field.field_name}_${idx}" 
                                       value="${option}" class="mr-2">
                                <span>${option}</span>
                            </label>
                        `;
                    });
                    break;
                    
                case 'date':
                    fieldHtml += `
                        <input type="date" name="${field.field_name}" id="${field.field_name}"
                               class="input-focus w-full px-4 py-3 rounded-xl" ${required}>
                    `;
                    break;
                    
                case 'email':
                    fieldHtml += `
                        <input type="email" name="${field.field_name}" id="${field.field_name}"
                               class="input-focus w-full px-4 py-3 rounded-xl"
                               placeholder="${field.field_placeholder || 'email@example.com'}" ${required}>
                    `;
                    break;
                    
                case 'phone':
                    fieldHtml += `
                        <input type="tel" name="${field.field_name}" id="${field.field_name}"
                               class="input-focus w-full px-4 py-3 rounded-xl"
                               placeholder="${field.field_placeholder || '+62 812-3456-7890'}" ${required}>
                    `;
                    break;
                    
                default: // text
                    fieldHtml += `
                        <input type="text" name="${field.field_name}" id="${field.field_name}"
                               class="input-focus w-full px-4 py-3 rounded-xl"
                               placeholder="${field.field_placeholder || ''}" ${required}>
                    `;
            }
            
            fieldHtml += `
                <div class="error-message hidden mt-2 p-3 bg-red-50 border border-red-200 rounded-xl">
                    <p class="text-sm text-red-800"></p>
                </div>
            </div>
            `;
            
            return fieldHtml;
        }

        // Photo preview
        function previewPhoto(input) {
            const preview = document.getElementById('photoPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                    preview.classList.remove('border-dashed');
                    preview.classList.add('border-solid');
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.innerHTML = '<span class="text-3xl">👤</span>';
                preview.classList.add('border-dashed');
                preview.classList.remove('border-solid');
            }
        }

        // Form submission
        document.getElementById('advancedForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (!selectedTemplateId) {
                alert('Silakan pilih template terlebih dahulu');
                return;
            }
            
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const spinner = document.getElementById('loadingSpinner');
            
            // Show loading
            submitBtn.disabled = true;
            submitText.textContent = 'Membuat Dokumen...';
            spinner.classList.remove('hidden');
            
            updateProgress(75);
            
            try {
                const formData = new FormData(this);
                const response = await fetch(`/documents/${documentType.slug}/advanced`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                    }
                });
                
                const result = await response.json();
                
                if (result.success) {
                    currentDocumentId = result.document_id;
                    updateProgress(100);
                    showSuccessModal();
                } else {
                    throw new Error(result.message || 'Terjadi kesalahan');
                }
                
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi.');
            } finally {
                // Reset button
                submitBtn.disabled = false;
                submitText.textContent = 'Buat Dokumen';
                spinner.classList.add('hidden');
            }
        });

        // Update progress bar
        function updateProgress(percentage) {
            document.getElementById('progressBar').style.width = percentage + '%';
        }

        // Show success modal
        function showSuccessModal() {
            document.getElementById('successModal').classList.remove('hidden');
        }

        // View document
        function viewDocument() {
            if (currentDocumentId) {
                window.open(`/documents/result/${currentDocumentId}`, '_blank');
            }
        }

        // Download document
        function downloadDocument() {
            if (currentDocumentId) {
                window.location.href = `/documents/download/pdf/${currentDocumentId}`;
            }
        }

        // Close modal
        document.getElementById('successModal').addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
