<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keberatan_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_registrasi')->unique();
            $table->string('nomor_permohonan'); // Referensi ke nomor permohonan sebelumnya
            $table->text('tujuan_penggunaan');
            
            // Identitas Pemohon
            $table->string('nama_pemohon');
            $table->text('alamat_pemohon');
            $table->string('telepon_pemohon');
            $table->string('pekerjaan_pemohon');
            
            // Identitas Kuasa (Nullable)
            $table->string('nama_kuasa')->nullable();
            $table->text('alamat_kuasa')->nullable();
            $table->string('telepon_kuasa')->nullable();
            
            $table->string('alasan_keberatan');
            $table->string('status')->default('Menunggu Verifikasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keberatan_informasis');
    }
};