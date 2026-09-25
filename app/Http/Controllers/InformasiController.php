<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Preview file informasi publik di halaman viewer.
     */
    public function preview($type, $filename)
    {
        if (!in_array($type, ['berkala', 'sertamerta', 'setiapsaat', 'standaroperasional'])) {
            abort(403, 'Akses ditolak');
        }

        if (str_contains($filename, '..') || str_contains($filename, '/') || str_contains($filename, '\\')) {
            abort(403, 'Akses ditolak');
        }

        $filepath = $type . '/' . $filename;

        if (!Storage::disk('public')->exists($filepath)) {
            abort(404, 'File tidak ditemukan');
        }

        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $typeLabelMap = [
            'berkala' => 'Informasi Berkala',
            'sertamerta' => 'Informasi Serta Merta',
            'setiapsaat' => 'Informasi Setiap Saat',
            'standaroperasional' => 'Standar Operasional',
        ];

        $documentTitle = preg_replace('/\.[^.]+$/', '', $filename);

        return view('pages.dokumen-preview', [
            'type' => $type,
            'filename' => $filename,
            'typeLabel' => $typeLabelMap[$type] ?? 'Dokumen Informasi',
            'documentTitle' => $documentTitle,
            'pageTitle' => $documentTitle,
            'downloadUrl' => route('informasi.download', ['type' => $type, 'filename' => $filename]),
            'previewUrl' => route('informasi.file', ['type' => $type, 'filename' => $filename]),
            'isPdf' => $extension === 'pdf',
            'isImage' => in_array($extension, ['png', 'jpg', 'jpeg', 'webp']),
            'backRoute' => match ($type) {
                'berkala' => route('informasi.berkala'),
                'sertamerta' => route('informasi.sertamerta'),
                'setiapsaat' => route('informasi.setiapsaat'),
                default => route('beranda'),
            },
        ]);
    }

    /**
     * Tampilkan file dokumen inline untuk preview di browser.
     */
    public function file($type, $filename)
    {
        if (!in_array($type, ['berkala', 'sertamerta', 'setiapsaat', 'standaroperasional'])) {
            abort(403, 'Akses ditolak');
        }

        if (str_contains($filename, '..') || str_contains($filename, '/') || str_contains($filename, '\\')) {
            abort(403, 'Akses ditolak');
        }

        $filepath = $type . '/' . $filename;

        if (!Storage::disk('public')->exists($filepath)) {
            abort(404, 'File tidak ditemukan');
        }

        return response()->file(
            Storage::disk('public')->path($filepath),
            ['Content-Disposition' => 'inline; filename="' . $filename . '"']
        );
    }

    /**
     * Download file informasi publik dari storage
     * @param string $type berkala, sertamerta, atau setiapsaat
     * @param string $filename nama file pdf
     */
    public function download($type, $filename)
    {
        // Validasi type
        if (!in_array($type, ['berkala', 'sertamerta', 'setiapsaat', 'standaroperasional'])) {
            abort(403, 'Akses ditolak');
        }

        // Validasi filename untuk mencegah path traversal
        if (strpos($filename, '..') !== false || strpos($filename, '/') !== false) {
            abort(403, 'Akses ditolak');
        }

        // Path file di storage/app/public/{type}/
        $filepath = $type . '/' . $filename;

        // Cek apakah file ada
        if (!Storage::disk('public')->exists($filepath)) {
            abort(404, 'File tidak ditemukan');
        }

        // Download file dengan nama asli
        return response()->download(Storage::disk('public')->path($filepath));
    }
}
