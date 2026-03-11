<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class RegulasController extends Controller
{
    /**
     * Download file regulasi dari storage
     */
    public function download($filename)
    {
        // Validasi filename untuk mencegah path traversal
        if (strpos($filename, '..') !== false || strpos($filename, '/') !== false) {
            abort(403, 'akses ditolak');
        }

        // Path file di storage/app/public/regulasi/
        $filepath = 'regulasi/' . $filename;

        // Cek apakah file ada
        if (!Storage::disk('public')->exists($filepath)) {
            abort(404, 'File tidak ditemukan');
        }

        // Download file dengan nama asli
        return Storage::disk('public')->download($filepath);
    }
}
