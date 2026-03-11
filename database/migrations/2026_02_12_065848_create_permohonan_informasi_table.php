<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonan_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_registrasi')->unique();
            $table->string('nama');
            $table->text('alamat');
            $table->string('telepon', 20);
            $table->string('email');
            $table->text('rincian_informasi');
            $table->text('tujuan');
            $table->enum('cara_memperoleh', ['melihat', 'salinan']);
            $table->enum('cara_salinan', ['ambil_langsung', 'kurir', 'pos', 'email']);
            $table->enum('status', ['diterima', 'diproses', 'selesai', 'ditolak'])->default('diterima');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonan_informasi');
    }
};