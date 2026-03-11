<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class LhkpnController extends Controller
{
    /**
     * Download file LHKPN dari storage
     */
    public function download($filename)
    {
        // Validasi filename untuk mencegah path traversal
        if (strpos($filename, '..') !== false || strpos($filename, '/') !== false) {
            abort(403, 'Akses ditolak');
        }

        // Path file di storage/app/public/lhkpn/
        $filepath = 'lhkpn/' . $filename;

        // Cek apakah file ada
        if (!Storage::disk('public')->exists($filepath)) {
            abort(404, 'File tidak ditemukan');
        }

        // Download file dengan nama asli
        return response()->download(
            Storage::disk('public')->path($filepath),
            $filename
        );
    }
}
