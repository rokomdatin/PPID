<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    /**
     * Download file informasi publik dari storage
     * @param string $type berkala, sertamerta, atau setiapsaat
     * @param string $filename nama file pdf
     */
    public function download($type, $filename)
    {
        // Validasi type
        if (!in_array($type, ['berkala', 'sertamerta', 'setiapsaat'])) {
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
        return Storage::disk('public')->download($filepath);
    }
}
