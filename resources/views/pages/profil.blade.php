@extends('layouts.app')
@section('title', 'Profil - PPID Kemenko PM')
@section('content')

<section class="relative pt-16 pb-10 bg-secondary">
    <div class="container px-4 mx-auto">
        <h1 class="text-3xl font-bold text-center text-primary md:text-4xl">Profil PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat</h1>
        <p class="mt-2 text-center text-primary">Pejabat Pengelola Informasi dan Dokumentasi</p>
    </div>
</section>

<section class="py-12 bg-gray-50">
    <div class="container px-4 mx-auto">
        <div x-data="{ activeTab: 'profil' }" class="flex flex-col gap-6 lg:flex-row">

            <div class="w-full lg:w-1/4">
                <div class="overflow-hidden bg-white rounded-xl shadow-sm">
                    <div class="p-4 text-white bg-primary">
                        <h3 class="font-semibold">Menu Profil</h3>
                    </div>
                    <nav class="flex flex-col">
                        <button 
                            @click="activeTab = 'profil'"
                            :class="activeTab === 'profil' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Profil PPID
                            </span>
                        </button>
                        <button 
                            @click="activeTab = 'visi-misi'"
                            :class="activeTab === 'visi-misi' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Visi dan Misi
                            </span>
                        </button>
                        <button 
                            @click="activeTab = 'tugas'"
                            :class="activeTab === 'tugas' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                Tugas Tim PPID
                            </span>
                        </button>
                        <button 
                            @click="activeTab = 'struktur'"
                            :class="activeTab === 'struktur' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Struktur Organisasi
                            </span>
                        </button>
                    </nav>
                </div>
            </div>

            <div class="w-full lg:w-3/4">
                <div class="overflow-hidden bg-white rounded-xl shadow-sm">

                    <div x-show="activeTab === 'profil'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="p-4 text-white bg-primary">
                            <h2 class="text-xl font-bold">Profil PPID</h2>
                        </div>
                        <div class="p-6">
                            <p class="mb-4 leading-relaxed text-gray-700">
                                Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi di badan publik.
                            </p>
                            <p class="mb-4 leading-relaxed text-gray-700">
                                PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat bertugas mengelola informasi publik sesuai dengan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
                            </p>
                            
                            <div class="p-4 mt-6 border-l-4 rounded-r-lg bg-secondary/50 border-primary">
                                <h4 class="mb-2 font-semibold text-primary">Dasar Hukum</h4>
                                <ul class="space-y-2 text-gray-700">
                                    <li class="flex items-start gap-2">
                                        <span class="mt-1.5 w-2 h-2 bg-primary rounded-full shrink-0"></span>
                                        UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="mt-1.5 w-2 h-2 bg-primary rounded-full shrink-0"></span>
                                        PP No. 61 Tahun 2010 tentang Pelaksanaan UU KIP
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="mt-1.5 w-2 h-2 bg-primary rounded-full shrink-0"></span>
                                        Peraturan Komisi Informasi No. 1 Tahun 2010
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <span class="mt-1.5 w-2 h-2 bg-primary rounded-full shrink-0"></span>
                                        <a href="{{ route('profil.download', ['filename' => 'Kepses 11 Tahun 2025.pdf']) }}" class="font-medium text-blue-600 underline hover:text-blue-800">
                                            Kepses No. 11 Tahun 2025
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div x-show="activeTab === 'visi-misi'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="p-4 text-white bg-primary">
                            <h2 class="text-xl font-bold">Visi dan Misi</h2>
                        </div>
                        <div class="p-6">
                            <div class="mb-8">
                                <h3 class="mb-4 text-lg font-bold text-primary">Visi</h3>
                                <div class="p-6 text-center rounded-lg bg-linear-to-r from-primary to-primary/80">
                                    <p class="text-lg italic text-white">
                                        "Sinkronisasi dan Koordinasi serta Pengenddalian Efektif dalam Pemberdayaan Masyarakat yang Inklusif dan Berkelanjutan Menuju Indonesia Emas 2045."
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h3 class="mb-4 text-lg font-bold text-primary">Misi</h3>
                                <div class="space-y-3">
                                    @php
                                        $misi = [
                                            'Menyelenggarakan sinkronisasi, koordinasi, dan pengendalian dalam pemberdayaan ekonomi masyarakat dan pelindungan pekerja migran.',
                                            'Menyelenggarakan sinkronisasi, koordinasi dan pengendalian dalam pembangunan kesejahteraan sosial yang inklusif.',
                                            'Menyelenggarakan sinkronisasi, koordinasi, dan pengendalian dalam pemberdayaan masyarakat desa, daerah tertinggal, dan daerah tertentu.'
                                        ];
                                    @endphp
                                    @foreach ($misi as $index => $item)
                                        <div class="flex items-start gap-4 p-4 transition-colors rounded-lg bg-gray-50 hover:bg-secondary/30">
                                            <span class="flex items-center justify-center shrink-0 w-8 h-8 text-sm font-bold text-white rounded-full bg-primary">
                                                {{ $index + 1 }}
                                            </span>
                                            <p class="text-gray-700">{{ $item }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="activeTab === 'tugas'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="p-4 text-white bg-primary">
                            <h2 class="text-xl font-bold">Tugas Tim PPID</h2>
                        </div>
                        <div class="p-6">
                            <div class="mb-8">
                                <h3 class="mb-4 text-lg font-bold text-primary">Tugas PPID</h3>
                                <div class="space-y-3">
                                    @php
                                        $tugas = [
                                            'Menyusun dan melaksanakan kebijakan layanan Informasi Publik.',
                                            'Menyusun laporan pelaksanaan kebijakan layanan Informasi Publik.',
                                            'Melakukan penyimpanan, pendokumentasian, penyediaan, dan Pelayanan Informasi Publik.',
                                            'Mengoordinasikan dan mengonsolidasikan pengumpulan Dokumen Informasi Publik dari Petugas Pelayanan Informasi Publik.',
                                            'Melakukan verifikasi Dokumen Informasi Publik.',
                                            'Menentukan Informasi Publik yang dapat diakses publik dan layak untuk dipublikasikan;',
                                            'Melakukan pengujian tentang konsekuensi atas Informasi Publik yang akan dikecualikan;',
                                            'Melakukan pengelolaan, pemeliharaan, dan pemutakhiran Daftar Informasi Publik;',
                                            'Menyediakan Informasi Publik secara efektif dan efisien agar mudah diakses oleh publik.',
                                            'Melakukan pembinaan, pengawasan, evaluasi, dan monitoring atas pelaksanaan kebijakan teknis Informasi Publik yang dilakukan oleh Petugas Pelayanan Informasi Publik.'
                                        ];
                                    @endphp
                                    @foreach ($tugas as $item)
                                        <div class="flex items-start gap-3 p-3 rounded-lg bg-gray-50">
                                            <svg class="shrink-0 w-5 h-5 mt-0.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <p class="text-gray-700">{{ $item }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <div>
                                <h3 class="mb-4 text-lg font-bold text-primary">Wewenang PPID</h3>
                                <div class="space-y-3">
                                    @php
                                        $wewenang = [
                                            'Menolak memberikan informasi yang dikecualikan sesuai ketentuan perundang-undangan.',
                                            'Meminta dan memperoleh informasi dari unit kerja/komponen di badan publik.',
                                            'Mengkoordinasikan pemberian pelayanan informasi dengan unit kerja terkait.',
                                            'Menentukan klasifikasi informasi atau mengubahnya.',
                                        ];
                                    @endphp
                                    @foreach ($wewenang as $item)
                                        <div class="flex items-start gap-3 p-3 rounded-lg bg-gray-50">
                                            <svg class="flex-shrink-0 w-5 h-5 mt-0.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                            <p class="text-gray-700">{{ $item }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div x-show="activeTab === 'struktur'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        <div class="p-4 text-white bg-primary">
                            <h2 class="text-xl font-bold">Struktur Organisasi</h2>
                        </div>
                        <div class="p-6">
                            <div class="p-8 mt-8 flex flex-col items-center justify-center">
                                <img src="{{ asset('images/strukturdiagramppid.png') }}" 
                                    alt="Gambar Struktur Organisasi" 
                                    class="max-auto object-contain">
                            </div>
                            <!-- <div class="p-8 mt-8 text-center border-2 border-gray-300 border-dashed rounded-lg bg-gray-50">
                                <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-2 text-gray-500">Gambar Struktur Organisasi</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection