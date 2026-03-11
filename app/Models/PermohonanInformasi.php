<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermohonanInformasi extends Model
{
    protected $table = 'permohonan_informasi';

    protected $fillable = [
        'nomor_registrasi',
        'nama',
        'alamat',
        'telepon',
        'email',
        'rincian_informasi',
        'tujuan',
        'cara_memperoleh',
        'cara_salinan',
        'status',
        'catatan_admin',
    ];
}