@extends('layouts.app')
@section('title', 'Formulir Permohonan Informasi - PPID Kemenko PM')
@section('content')

    <section class="bg-primary py-8 sm:py-12">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold text-white">Formulir Permohonan Informasi</h1>
            <p class="text-white/80 mt-3 max-w-2xl">Silakan lengkapi formulir berikut untuk mengajukan permohonan informasi publik kepada PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat.</p>
        </div>
    </section>

    <section class="py-8 sm:py-12 bg-gray-50" x-data="{
                caraMemperoleh: '',
                caraSalinan: '',
                loading: false,
                showSuccess: false,
                nomorRegistrasi: '',
                errors: {},
                async submitForm() {
                    this.errors = {};
                    const form = this.$refs.formEl;
                    const formData = {
                        nama: form.nama.value.trim(),
                        alamat: form.alamat.value.trim(),
                        telepon: form.telepon.value.trim(),
                        email: form.email.value.trim(),
                        rincian_informasi: form.rincian_informasi.value.trim(),
                        tujuan: form.tujuan.value.trim(),
                        cara_memperoleh: this.caraMemperoleh,
                        cara_salinan: this.caraSalinan
                    };
                    // Client-side validation
                    if (!formData.nama) this.errors.nama = 'Nama wajib diisi';
                    if (!formData.alamat) this.errors.alamat = 'Alamat wajib diisi';
                    if (!formData.telepon) this.errors.telepon = 'Nomor telepon wajib diisi';
                    if (!formData.email) this.errors.email = 'Email wajib diisi';
                    if (!formData.rincian_informasi) this.errors.rincian_informasi = 'Rincian informasi wajib diisi';
                    if (!formData.tujuan) this.errors.tujuan = 'Tujuan wajib diisi';
                    if (!formData.cara_memperoleh) this.errors.cara_memperoleh = 'Pilih cara memperoleh informasi';
                    if (!formData.cara_salinan) this.errors.cara_salinan = 'Pilih cara memperoleh salinan';
                    if (Object.keys(this.errors).length > 0) return;
                    this.loading = true;
                    try {
                        const response = await fetch('/api/permohonan-informasi', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(formData)
                        });
                        const data = await response.json();
                        if (response.ok) {
                            this.nomorRegistrasi = data.nomor_registrasi;
                            this.showSuccess = true;
                            form.reset();
                            this.caraMemperoleh = '';
                            this.caraSalinan = '';
                        } else {
                            if (data.errors) {
                                this.errors = {};
                                for (const [key, msgs] of Object.entries(data.errors)) {
                                    this.errors[key] = Array.isArray(msgs) ? msgs[0] : msgs;
                                }
                            } else {
                                alert(data.message || 'Terjadi kesalahan, silakan coba lagi.');
                            }
                        }
                    } catch (error) {
                        alert('Gagal mengirim permohonan. Periksa koneksi internet Anda.');
                    } finally {
                        this.loading = false;
                    }
                }
            }">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

                <div class="bg-primary text-white px-6 py-4">
                    <h2 class="text-xl font-semibold">Data Pemohon Informasi</h2>
                    <p class="text-white/70 text-sm mt-1">Isi semua field yang bertanda <span class="text-red-300">*</span></p>
                </div>

                <form x-ref="formEl" @submit.prevent="submitForm()" class="p-6 md:p-8 space-y-6">
                    @csrf
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nama" id="nama"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all"
                            placeholder="Masukkan nama lengkap Anda">
                            <p x-show="errors.nama" x-text="errors.nama" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-gray-700 mb-2">
                            Alamat <span class="text-red-500">*</span>
                        </label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all resize-none"
                            placeholder="Masukkan alamat lengkap Anda"></textarea>
                            <p x-show="errors.alamat" x-text="errors.alamat" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="telepon" class="block text-sm font-semibold text-gray-700 mb-2">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" name="telepon" id="telepon"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all"
                                placeholder="Contoh: 08123456789">
                            <p x-show="errors.telepon" x-text="errors.telepon" class="text-red-500 text-xs mt-1"></p>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" name="email" id="email"
                                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all"
                                placeholder="Contoh: nama@email.com">
                            <p x-show="errors.email" x-text="errors.email" class="text-red-500 text-xs mt-1"></p>
                        </div>
                    </div>

                    <div>
                        <label for="rincian_informasi" class="block text-sm font-semibold text-gray-700 mb-2">
                            Rincian Informasi yang Dibutuhkan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="rincian_informasi" id="rincian_informasi" rows="4"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all resize-none"
                            placeholder="Jelaskan secara rinci informasi yang Anda butuhkan"></textarea>
                        <p x-show="errors.rincian_informasi" x-text="errors.rincian_informasi" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div>
                        <label for="tujuan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tujuan Penggunaan Informasi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="tujuan" id="tujuan" rows="3"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all resize-none"
                            placeholder="Jelaskan tujuan Anda membutuhkan informasi tersebut"></textarea>
                            <p x-show="errors.tujuan" x-text="errors.tujuan" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Cara Memperoleh Informasi <span class="text-red-500">*</span>
                        </label>
                        <div class="space-y-3">
                            <label class="flex items-start gap-3 p-4 rounded-lg border border-gray-200 cursor-pointer transition-all hover:border-primary/40 hover:bg-primary/5"
                                :class="caraMemperoleh === 'melihat' ? 'border-primary bg-primary/5 ring-1 ring-primary/20' : ''">
                                <input type="radio" name="cara_memperoleh" value="melihat" x-model="caraMemperoleh"
                                    class="mt-0.5 w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                                <div>
                                    <span class="text-sm font-medium text-gray-800">Melihat/membaca/mendengarkan/mencatat</span>
                                    <p class="text-xs text-gray-500 mt-1">Anda dapat melihat atau mencatat informasi secara langsung</p>
                                </div>
                            </label>
                            <label class="flex items-start gap-3 p-4 rounded-lg border border-gray-200 cursor-pointer transition-all hover:border-primary/40 hover:bg-primary/5"
                                :class="caraMemperoleh === 'salinan' ? 'border-primary bg-primary/5 ring-1 ring-primary/20' : ''">
                                <input type="radio" name="cara_memperoleh" value="salinan" x-model="caraMemperoleh"
                                    class="mt-0.5 w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                                <div>
                                    <span class="text-sm font-medium text-gray-800">Mendapatkan salinan informasi (hardcopy/softcopy)</span>
                                    <p class="text-xs text-gray-500 mt-1">Anda akan mendapatkan salinan dokumen dalam bentuk cetak atau digital</p>
                                </div>
                            </label>
                        </div>
                        <p x-show="errors.cara_memperoleh" x-text="errors.cara_memperoleh" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">
                            Cara Memperoleh Salinan Informasi <span class="text-red-500">*</span>
                        </label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @php
                                $opsiSalinan = [
                                    ['value' => 'ambil_langsung', 'label' => 'Mengambil Langsung', 'desc' => 'Datang langsung ke kantor PPID', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />'],
                                    ['value' => 'kurir', 'label' => 'Kurir', 'desc' => 'Dikirim melalui jasa kurir', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />'],
                                    ['value' => 'pos', 'label' => 'POS', 'desc' => 'Dikirim melalui layanan POS', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'],
                                    ['value' => 'email', 'label' => 'Email', 'desc' => 'Dikirim melalui email', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />'],
                                ];
                            @endphp
                            @foreach ($opsiSalinan as $opsi)
                                <label class="flex items-start gap-3 p-4 rounded-lg border border-gray-200 cursor-pointer transition-all hover:border-primary/40 hover:bg-primary/5"
                                    :class="caraSalinan === '{{ $opsi['value'] }}' ? 'border-primary bg-primary/5 ring-1 ring-primary/20' : ''">
                                    <input type="radio" name="cara_salinan" value="{{ $opsi['value'] }}" x-model="caraSalinan"
                                        class="mt-0.5 w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                                    <div class="flex items-start gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-primary/70 mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">{!! $opsi['icon'] !!}</svg>
                                        <div>
                                            <span class="text-sm font-medium text-gray-800">{{ $opsi['label'] }}</span>
                                            <p class="text-xs text-gray-500 mt-0.5">{{ $opsi['desc'] }}</p>
                                        </div>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        <p x-show="errors.cara_salinan" x-text="errors.cara_salinan" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 sm:gap-6">
                            <p class="text-xs text-gray-500 text-center sm:text-left">
                                Dengan mengirimkan formulir ini, Anda menyetujui bahwa data yang diberikan adalah benar dan akan diproses sesuai ketentuan yang berlaku.
                            </p>
                            <button type="submit" :disabled="loading"
                                class="w-full sm:w-auto shrink-0 bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-3 rounded-lg transition-all duration-200 flex items-center justify-center gap-2 shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                                <template x-if="loading">
                                    <svg class="animate-spin w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                    </svg>
                                </template>
                                <template x-if="!loading">
                                </template>
                                <span x-text="loading ? 'Mengirim...' : 'Kirim Permohonan'"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div x-show="showSuccess" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
                <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="showSuccess = false"></div>
                <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Permohonan Berhasil Dikirim!</h3>
                    <p class="text-gray-600 mb-4">Permohonan informasi Anda telah berhasil dikirim ke Admin PPID.</p>
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                        <p class="text-sm text-gray-600 mb-1">Nomor Registrasi Anda:</p>
                        <p class="text-xl font-bold text-blue-700" x-text="nomorRegistrasi"></p>
                        <p class="text-xs text-gray-500 mt-2">Simpan nomor ini untuk melacak status permohonan Anda.</p>
                    </div>
                    <button @click="showSuccess = false"
                        class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 px-6 rounded-xl transition-all">
                        Tutup
                    </button>
                </div>
            </div>
            
            <div class="mt-8 bg-secondary/50 border border-primary/10 rounded-2xl p-4 sm:p-6">
                <div class="flex items-start gap-3 sm:gap-4">
                    <div class="bg-primary/10 rounded-full p-2 sm:p-3 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-800 mb-2">Informasi Penting</h3>
                        <ul class="text-sm text-gray-600 space-y-1.5">
                            <li class="flex items-start gap-2">
                                <span class="text-primary mt-1">•</span>
                                Permohonan informasi akan diproses dalam waktu <strong>10 hari kerja</strong> sejak diterima.
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-primary mt-1">•</span>
                                Jangka waktu dapat diperpanjang paling lambat <strong>7 hari kerja</strong> dengan pemberitahuan tertulis.
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-primary mt-1">•</span>
                                Untuk informasi lebih lanjut, hubungi PPID melalui email atau telepon yang tersedia di halaman kontak.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection