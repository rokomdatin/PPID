<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\RegulasController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\LhkpnController;

require __DIR__.'/permohonan.php';

Route::get('/profil/download/{filename}', function ($filename) {
    if (str_contains($filename, '..') || str_contains($filename, '/') || str_contains($filename, '\\')) {
        abort(403, 'Akses ditolak');
    }

    $path = storage_path('app/public/' . $filename);

    if (!file_exists($path)) {
        abort(404, 'File tidak ditemukan');
    }

    return response()->download($path);
})->name('profil.download');

Route::get('/regulasi/download/{filename}', [RegulasController::class, 'download'])
    ->name('regulasi.download');

Route::get('/informasi/download/{type}/{filename}', [InformasiController::class, 'download'])
    ->name('informasi.download');

Route::get('/lhkpn/download/{filename}', [LhkpnController::class, 'download'])
    ->name('lhkpn.download');

Route::get('/', function () {
    return view('pages.beranda');
})->name('beranda');

Route::get('/profil', function () {
    return view('pages.profil');
})->name('profil');

Route::get('/faq', function () {
    return view('pages.faq');
})->name('faq');

Route::get('/regulasi', function () {
    return view('pages.regulasi');
})->name('regulasi');

Route::get('/layanan-informasi/pengajuan-keberatan', function () {
    return view('pages.layanan-informasi.formulir-keberatan');
})->name('formulir-keberatan');

Route::get('/standar-pelayanan', function () {
    return view('pages.standar-pelayanan');
})->name('standar-pelayanan');

Route::get('/lhkpn', function () {
    return view('pages.lhkpn');
})->name('lhkpn');

Route::get('/informasi-publik/berkala', function () {
    return view('pages.informasi-publik.berkala');
})->name('informasi.berkala');

Route::get('/informasi-publik/sertamerta', function () {
    return view('pages.informasi-publik.sertamerta');
})->name('informasi.sertamerta');

Route::get('/informasi-publik/setiapsaat', function () {
    return view('pages.informasi-publik.setiapsaat');
})->name('informasi.setiapsaat');
