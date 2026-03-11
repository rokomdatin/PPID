<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KeberatanInformasi extends Model
{
    protected $fillable = [
        'nomor_registrasi',
        'nomor_permohonan',
        'tujuan_penggunaan',
        'nama_pemohon',
        'alamat_pemohon',
        'telepon_pemohon',
        'pekerjaan_pemohon',
        'nama_kuasa',
        'alamat_kuasa',
        'telepon_kuasa',
        'alasan_keberatan',
        'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Generate nomor registrasi otomatis: KEB-YYYYMMDD-XXXX
            if (empty($model->nomor_registrasi)) {
                $model->nomor_registrasi = 'KEB-' . date('Ymd') . '-' . strtoupper(Str::random(4));
            }
        });
    }
}