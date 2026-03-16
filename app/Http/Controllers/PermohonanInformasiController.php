<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PermohonanInformasiMail;
class PermohonanInformasiController extends Controller
{
    /**
     * Menampilkan halaman formulir permohonan informasi.
     */
    public function index()
    {
        return view('pages.layanan-informasi.formulir-permohonan');
    }
    /**
     * Memproses pengiriman formulir permohonan informasi.
     * Data dikirim ke email Admin PPID.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'              => 'required|string|max:255',
            'alamat'            => 'required|string|max:1000',
            'telepon'           => 'required|string|max:20',
            'email'             => 'required|email|max:255',
            'rincian_informasi' => 'required|string|max:5000',
            'tujuan'            => 'required|string|max:2000',
            'cara_memperoleh'   => 'required|in:melihat,salinan',
            'cara_salinan'      => 'required|in:ambil_langsung,kurir,pos,email',
        ]);

        $nomorRegistrasi = 'PPID-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        // Simpan ke database
        $permohonan = \App\Models\PermohonanInformasi::create([
            ...$validated,
            'nomor_registrasi' => $nomorRegistrasi,
            'status'           => 'diterima',
        ]);

        // Siapkan data untuk email
        $emailData = $validated;
        $emailData['nomor_registrasi'] = $nomorRegistrasi;
        $emailData['tanggal_permohonan'] = now()->format('d F Y, H:i') . ' WIB';
        $emailData['cara_memperoleh_label'] = $validated['cara_memperoleh'] === 'melihat'
            ? 'Melihat/membaca/mendengarkan/mencatat'
            : 'Mendapatkan salinan informasi (hardcopy/softcopy)';

        $salinanLabels = [
            'ambil_langsung' => 'Mengambil Langsung',
            'kurir'          => 'Kurir',
            'pos'            => 'POS',
            'email'          => 'Email',
        ];
        $emailData['cara_salinan_label'] = $salinanLabels[$validated['cara_salinan']] ?? '-';

        // Kirim email ke Admin PPID
        $adminEmail = config('mail.ppid_admin_email', 'ppid@kemenko-pm.go.id');
        Mail::to($adminEmail)->send(new PermohonanInformasiMail($emailData));

        return response()->json([
            'message'          => 'Permohonan informasi berhasil dikirim.',
            'nomor_registrasi' => $nomorRegistrasi,
        ]);
    }

}