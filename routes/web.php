<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdvancedDocumentController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard
Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

// Document routes
Route::prefix('documents')->name('documents.')->group(function () {
    Route::get('/{slug}', [DocumentController::class, 'showForm'])->name('form');
    Route::post('/{slug}', [DocumentController::class, 'generate'])->name('generate');
    Route::get('/{slug}/advanced', [AdvancedDocumentController::class, 'showAdvancedForm'])->name('advanced.form');
    Route::post('/{slug}/advanced', [AdvancedDocumentController::class, 'generateAdvanced'])->name('advanced.generate');
    Route::get('/result/{id}', [DocumentController::class, 'result'])->name('result');
    Route::get('/download/pdf/{id}', [DocumentController::class, 'downloadPDF'])->name('download.pdf');
    Route::get('/copy/{id}', [DocumentController::class, 'copyText'])->name('copy.text');
    Route::post('/{id}/share', [AdvancedDocumentController::class, 'shareDocument'])->name('share');
    Route::get('/shared/{token}', [AdvancedDocumentController::class, 'viewSharedDocument'])->name('shared.view');
    Route::get('/{id}/analytics', [AdvancedDocumentController::class, 'getDocumentAnalytics'])->name('analytics');
});

// API routes
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/dashboard', [AdvancedDocumentController::class, 'getUserDashboard'])->name('dashboard');
    Route::get('/recent', [DocumentController::class, 'getRecent'])->name('recent');
});

// SEO-friendly direct routes
Route::get('/preview-surat', [DocumentController::class, 'previewGallery'])->name('preview.gallery');

Route::get('/surat-lamaran-kerja', function() {
    return app(DocumentController::class)->showForm('surat-lamaran-kerja');
})->name('surat-lamaran-kerja');

Route::get('/surat-keterangan', function() {
    return app(DocumentController::class)->showForm('surat-keterangan');
})->name('surat-keterangan');

Route::get('/cv-generator', function() {
    return app(DocumentController::class)->showForm('cv-generator');
})->name('cv-generator');

Route::post('/surat-lamaran-kerja', function(\Illuminate\Http\Request $request) {
    return app(DocumentController::class)->generate($request, 'surat-lamaran-kerja');
});

Route::post('/surat-keterangan', function(\Illuminate\Http\Request $request) {
    return app(DocumentController::class)->generate($request, 'surat-keterangan');
});

Route::post('/cv-generator', function(\Illuminate\Http\Request $request) {
    return app(DocumentController::class)->generate($request, 'cv-generator');
});
