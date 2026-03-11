<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\KeberatanInformasiMail;
use App\Models\KeberatanInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class KeberatanInformasiController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_permohonan' => 'required|string|max:255',
            'tujuan_penggunaan' => 'required|string',
            'nama_pemohon' => 'required|string|max:255',
            'alamat_pemohon' => 'required|string',
            'telepon_pemohon' => 'required|string|max:20',
            'pekerjaan_pemohon' => 'required|string|max:255',
            'nama_kuasa' => 'nullable|string|max:255',
            'alamat_kuasa' => 'nullable|string',
            'telepon_kuasa' => 'nullable|string|max:20',
            'alasan_keberatan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $keberatan = KeberatanInformasi::create([
            ...$validator->validated(),
            'status' => 'Menunggu Verifikasi',
        ]);

        $emailData = [
            ...$keberatan->toArray(),
            'status' => $keberatan->status ?? 'Menunggu Verifikasi',
            'tanggal_pengajuan' => $keberatan->created_at?->format('d F Y, H:i') . ' WIB',
        ];

        $adminEmail = config('mail.ppid_admin_email', 'ppid@kemenko-pm.go.id');
        Mail::to($adminEmail)->send(new KeberatanInformasiMail($emailData));

        return response()->json([
            'message' => 'Pengajuan keberatan berhasil dikirim',
            'nomor_registrasi' => $keberatan->nomor_registrasi,
        ], 201);
    }
}