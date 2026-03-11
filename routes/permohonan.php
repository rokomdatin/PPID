<?php
use App\Http\Controllers\PermohonanInformasiController;
use App\Http\Controllers\KeberatanInformasiController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Route untuk Permohonan Informasi
|--------------------------------------------------------------------------
| Tambahkan baris berikut ke file routes/web.php:
| require __DIR__.'/permohonan.php';
|
*/
// Halaman formulir
Route::get('/formulir-permohonan', [PermohonanInformasiController::class, 'index'])
    ->name('formulir-permohonan');
// API endpoint untuk submit form (AJAX)
Route::post('/api/permohonan-informasi', [PermohonanInformasiController::class, 'store'])
    ->name('permohonan-informasi.store');

// API endpoint untuk submit formulir keberatan informasi (AJAX)
Route::post('/api/keberatan-informasi', [KeberatanInformasiController::class, 'store'])
    ->name('keberatan-informasi.store');