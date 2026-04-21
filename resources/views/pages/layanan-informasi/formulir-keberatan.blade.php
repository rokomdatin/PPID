@extends('layouts.app')
@section('title', 'Formulir Pengajuan Keberatan Informasi Publik')
@section('content')

<section class="bg-primary py-12">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold text-white">Formulir Pengajuan Keberatan Informasi Publik</h1>
            <p class="text-white/80 mt-3 max-w-2xl">Silakan lengkapi formulir berikut untuk mengajukan permohonan keberatan informasi publik kepada PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat.</p>
        </div>
</section>



<section class="py-8 sm:py-12 bg-gray-50" x-data="{
        loading: false,
        showSuccess: false,
        nomorRegistrasi: '',
        errors: {},
        alasan: '',
        async submitForm() {
            this.errors = {};
            const form = this.$refs.formEl;
            
            const payload = {
                nomor_permohonan: form.nomor_permohonan.value,
                tujuan_penggunaan: form.tujuan_penggunaan.value,
                nama_pemohon: form.nama_pemohon.value,
                alamat_pemohon: form.alamat_pemohon.value,
                telepon_pemohon: form.telepon_pemohon.value,
                pekerjaan_pemohon: form.pekerjaan_pemohon.value,
                nama_kuasa: form.nama_kuasa.value,
                alamat_kuasa: form.alamat_kuasa.value,
                telepon_kuasa: form.telepon_kuasa.value,
                alasan_keberatan: this.alasan
            };

            if (!payload.nomor_permohonan) this.errors.nomor_permohonan = 'Nomor permohonan wajib diisi';
            if (!payload.tujuan_penggunaan) this.errors.tujuan_penggunaan = 'Tujuan penggunaan wajib diisi';
            if (!payload.nama_pemohon) this.errors.nama_pemohon = 'Nama pemohon wajib diisi';
            if (!payload.alamat_pemohon) this.errors.alamat_pemohon = 'Alamat pemohon wajib diisi';
            if (!payload.telepon_pemohon) this.errors.telepon_pemohon = 'Nomor telepon pemohon wajib diisi';
            if (!payload.pekerjaan_pemohon) this.errors.pekerjaan_pemohon = 'Pekerjaan pemohon wajib diisi';
            if (!payload.alasan_keberatan) this.errors.alasan_keberatan = 'Pilih alasan keberatan';

            if (Object.keys(this.errors).length > 0) return;

            this.loading = true;
            try {
                const response = await fetch('/api/keberatan-informasi', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });
                const data = await response.json();
                if (response.ok) {
                    this.nomorRegistrasi = data.nomor_registrasi;
                    this.showSuccess = true;
                    form.reset();
                    this.alasan = '';
                } else {
                    if (data.errors) {
                        this.errors = {};
                        for (const [key, msgs] of Object.entries(data.errors)) {
                            this.errors[key] = Array.isArray(msgs) ? msgs[0] : msgs;
                        }
                    } else {
                        alert(data.message || 'Terjadi kesalahan.');
                    }
                }
            } catch (e) {
                alert('Gagal mengirim pengajuan. Periksa koneksi internet Anda.');
            } finally {
                this.loading = false;
            }
        }
    }">
        <div class="max-w-4xl mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden mb-8">
                <div class="bg-primary text-white px-6 py-4">
                    <h2 class="text-xl font-semibold">Data Pengajuan Keberatan</h2>
                    <p class="text-white/70 text-sm mt-1">Isi formulir berikut dengan data yang valid</p>
                </div>

                <form x-ref="formEl" @submit.prevent="submitForm()" class="p-6 md:p-8 space-y-6">
                    @csrf
                    
                    <div>
                        <label for="nomor_permohonan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nomor Permohonan Informasi <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="nomor_permohonan" id="nomor_permohonan"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all"
                            placeholder="Masukkan nomor registrasi permohonan informasi">
                        <p x-show="errors.nomor_permohonan" x-text="errors.nomor_permohonan" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div>
                        <label for="tujuan_penggunaan" class="block text-sm font-semibold text-gray-700 mb-2">
                            Tujuan Penggunaan Informasi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="tujuan_penggunaan" id="tujuan_penggunaan" rows="3"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all resize-none"
                            placeholder="Jelaskan tujuan penggunaan informasi"></textarea>
                        <p x-show="errors.tujuan_penggunaan" x-text="errors.tujuan_penggunaan" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Identitas Pemohon</h3>
                        <div class="space-y-4">
                            <div>
                                <label for="nama_pemohon" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                                <input type="text" name="nama_pemohon" id="nama_pemohon" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all" placeholder="Nama lengkap pemohon">
                                <p x-show="errors.nama_pemohon" x-text="errors.nama_pemohon" class="text-red-500 text-xs mt-1"></p>
                            </div>
                            <div>
                                <label for="alamat_pemohon" class="block text-sm font-semibold text-gray-700 mb-2">Alamat <span class="text-red-500">*</span></label>
                                <textarea name="alamat_pemohon" id="alamat_pemohon" rows="2" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all resize-none" placeholder="Alamat lengkap pemohon"></textarea>
                                <p x-show="errors.alamat_pemohon" x-text="errors.alamat_pemohon" class="text-red-500 text-xs mt-1"></p>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="telepon_pemohon" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon <span class="text-red-500">*</span></label>
                                    <input type="tel" name="telepon_pemohon" id="telepon_pemohon" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all" placeholder="Contoh: 08123456789">
                                    <p x-show="errors.telepon_pemohon" x-text="errors.telepon_pemohon" class="text-red-500 text-xs mt-1"></p>
                                </div>
                                <div>
                                    <label for="pekerjaan_pemohon" class="block text-sm font-semibold text-gray-700 mb-2">Pekerjaan <span class="text-red-500">*</span></label>
                                    <input type="text" name="pekerjaan_pemohon" id="pekerjaan_pemohon" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all" placeholder="Pekerjaan pemohon">
                                    <p x-show="errors.pekerjaan_pemohon" x-text="errors.pekerjaan_pemohon" class="text-red-500 text-xs mt-1"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Identitas Kuasa Pemohon <span class="text-sm font-normal text-gray-500">(Jika ada)</span></h3>
                        <div class="space-y-4">
                            <div>
                                <label for="nama_kuasa" class="block text-sm font-semibold text-gray-700 mb-2">Nama Kuasa</label>
                                <input type="text" name="nama_kuasa" id="nama_kuasa" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all" placeholder="Nama lengkap kuasa pemohon">
                            </div>
                            <div>
                                <label for="alamat_kuasa" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Kuasa</label>
                                <textarea name="alamat_kuasa" id="alamat_kuasa" rows="2" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all resize-none" placeholder="Alamat lengkap kuasa pemohon"></textarea>
                            </div>
                            <div>
                                <label for="telepon_kuasa" class="block text-sm font-semibold text-gray-700 mb-2">Nomor Telepon Kuasa</label>
                                <input type="tel" name="telepon_kuasa" id="telepon_kuasa" class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary outline-none transition-all" placeholder="Nomor telepon kuasa pemohon">
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4">
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Alasan Pengajuan Keberatan <span class="text-red-500">*</span></label>
                        <div class="space-y-3">
                            @php
                                $alasanKeberatan = [
                                    'Permohonan Informasi Ditolak',
                                    'Informasi Berkala Tidak Disediakan',
                                    'Permohonan Informasi Tidak Ditanggapi',
                                    'Permohonan Informasi Ditanggapi Tidak Sebagaimana yang Diminta',
                                    'Permohonan Informasi Tidak Dipenuhi',
                                    'Biaya yang Dikenakan Tidak Wajar',
                                    'Informasi Disampaikan Melebihi Jangka Waktu yang Ditentukan'
                                ];
                            @endphp
                            @foreach ($alasanKeberatan as $alasan)
                                <label class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 cursor-pointer transition-all hover:border-primary/40 hover:bg-primary/5" :class="alasan === '{{ $alasan }}' ? 'border-primary bg-primary/5 ring-1 ring-primary/20' : ''">
                                    <input type="radio" name="alasan_keberatan" value="{{ $alasan }}" x-model="alasan" class="mt-0.5 w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                                    <span class="text-sm text-gray-700">{{ $alasan }}</span>
                                </label>
                            @endforeach
                        </div>
                        <p x-show="errors.alasan_keberatan" x-text="errors.alasan_keberatan" class="text-red-500 text-xs mt-1"></p>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <button type="submit" :disabled="loading" class="w-full bg-primary hover:bg-primary/90 text-white font-semibold px-8 py-3 rounded-lg transition-all duration-200 flex items-center justify-center gap-2 shadow-md hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                            <template x-if="loading">
                                <svg class="animate-spin w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                                </svg>
                            </template>
                            <span x-text="loading ? 'Mengirim...' : 'Kirim Pengajuan Keberatan'"></span>
                        </button>
                    </div>
                </form>
            </div>

            <div x-show="showSuccess" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display: none;">
                <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" @click="showSuccess = false"></div>
                <div class="relative bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">
                    <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Pengajuan Berhasil!</h3>
                    <p class="text-gray-600 mb-4">Pengajuan keberatan informasi Anda telah berhasil dikirim.</p>
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
                        <p class="text-sm text-gray-600 mb-1">Nomor Registrasi Keberatan:</p>
                        <p class="text-xl font-bold text-blue-700" x-text="nomorRegistrasi"></p>
                        <p class="text-xs text-gray-500 mt-2">Simpan nomor ini untuk melacak status pengajuan Anda.</p>
                    </div>
                    <button @click="showSuccess = false" class="w-full bg-primary hover:bg-primary/90 text-white font-semibold py-3 px-6 rounded-xl transition-all">Tutup</button>
                </div>
            </div>
        </div>
    </section>

@endsection