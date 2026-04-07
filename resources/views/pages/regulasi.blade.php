@extends('layouts.app')
@section('title', 'Regulasi - PPID Kemenko PM')
@section('content')

<section class="relative pt-12 pb-16 lg:pt-14 bg-gradient-to-r from-primary to-primary/80">
    <div class="container px-4 mx-auto">
        <h1 class="text-3xl font-bold text-center text-primary md:text-4xl">Peraturan Terkait Informasi Publik</h1>
        <p class="mt-2 text-center text-primary">Kementerian Koordinator Bidang Pemberdayaan Masyarakat</p>
    </div>
</section>

<section class="py-8 bg-gray-50 min-h-screen" x-data="{ activeFilter: 'semua', searchQuery: '' }">
    <div class="container px-4 mx-auto">
        <!-- <div class="mb-8 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="flex flex-wrap gap-2">
                    <button 
                        @click="activeFilter = 'semua'"
                        :class="activeFilter === 'semua' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-colors">
                        Semua
                    </button>
                    <button 
                        @click="activeFilter = 'undang-undang'"
                        :class="activeFilter === 'undang-undang' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-colors">
                        Undang-Undang
                    </button>
                    <button 
                        @click="activeFilter = 'peraturan-pemerintah'"
                        :class="activeFilter === 'peraturan-pemerintah' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-4 py-2 rounded-full text- sm font-medium transition-colors">
                        Peraturan Pemerintah
                    </button>
                    <button 
                        @click="activeFilter = 'peraturan-menteri'"
                        :class="activeFilter === 'peraturan-menteri' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-colors">
                        Peraturan Menteri
                    </button>
                    <button 
                        @click="activeFilter = 'keputusan'"
                        :class="activeFilter === 'keputusan' ? 'bg-primary text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-colors">
                        Keputusan
                    </button>
                </div>
                <div class="relative">
                    <input 
                        type="text" 
                        x-model="searchQuery"
                        placeholder="Cari regulasi..."
                        class="w-full lg:w-80 pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div> -->

        <div class="space-y-4">
            @php
                $regulasiData = [
                    [
                        'tahun' => '2008',
                        'kategori' => 'peraturan-menteri',
                        'nomor' => 'Undang-Undang (UU) Nomor 14 Tahun 2008',
                        'judul' => 'Tentang Keterbukaan Informasi Publik',
                        'tipe' => 'Document',
                        'file_name' => 'Undang-Undang Nomor 14 Tahun 2008.pdf'
                    ],
                    [
                        'tahun' => '2010',
                        'kategori' => 'keputusan',
                        'nomor' => 'Peraturan Pemerintah No.61 Tahun 2010',
                        'judul' => 'Tentang Pelaksanaan Undang - Undang Keterbukaan Informasi Publik',
                        'tipe' => 'Document',
                        'file_name' => 'Permenko Nomor 5 Tahun 2025 tentang Standar Layanan Informasi Publik.pdf'
                    ],
                    [
                        'tahun' => '2011',
                        'kategori' => 'keputusan',
                        'nomor' => 'Perma No 2 Tahun 2011',
                        'judul' => 'Tentang Tata Cara Penyelesaian Sengketa Informasi Publik di Pengadilan',
                        'tipe' => 'Document',
                        'file_name' => 'Permenko Nomor 5 Tahun 2025 tentang Standar Layanan Informasi Publik.pdf'
                    ],
                    [
                        'tahun' => '2025',
                        'kategori' => 'peraturan-menteri',
                        'nomor' => 'Permenko Nomor 5 Tahun 2025 tentang Standar Layanan Informasi Publik',
                        'judul' => 'Penetapan Pejabat Pengelola Informasi dan Dokumentasi di Lingkungan Kementerian Koordinator Bidang Pemberdayaan Masyarakat',
                        'tipe' => 'Document',
                        'file_name' => 'Permenko Nomor 5 Tahun 2025 tentang Standar Layanan Informasi Publik.pdf'
                    ],
                    
                    
                ];
            @endphp
            @foreach ($regulasiData as $regulasi)
                <div 
                    x-show="(activeFilter === 'semua' || activeFilter === '{{ $regulasi['kategori'] }}') && 
                            (searchQuery === '' || '{{ strtolower($regulasi['nomor'] . ' ' . $regulasi['judul']) }}'.includes(searchQuery.toLowerCase()))"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                    x-transition:enter-end="opacity-100 transform translate-y-0"
                    class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                    
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row lg:items-start gap-4">
                        
                            <div class="flex-shrink-0">
                                <div class="flex items-center gap-2 text-gray-500">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm font-semibold">{{ $regulasi['tahun'] }}</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <a href="{{ isset($regulasi['file_name']) ? route('regulasi.download', ['filename' => $regulasi['file_name']]) : $regulasi['link'] ?? '#' }}" class="text-lg font-semibold text-primary hover:text-primary/80 transition-colors">
                                    {{ $regulasi['nomor'] }}
                                </a>
                                <p class="mt-2 text-gray-600 leading-relaxed">
                                    {{ $regulasi['judul'] }}
                                </p>
                                
                                <div class="mt-4">
                                    @if($regulasi['tipe'] === 'Document')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-green-100 text-green-700 text-xs font-medium rounded-full">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            Document
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-blue-100 text-blue-700 text-xs font-medium rounded-full">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                            </svg>
                                            Link
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                <a href="{{ isset($regulasi['file_name']) ? route('regulasi.download', ['filename' => $regulasi['file_name']]) : $regulasi['link'] ?? '#' }}" 
                                   {{ isset($regulasi['file_name']) ? 'download="' . $regulasi['file_name'] . '"' : '' }}
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors">
                                    @if($regulasi['tipe'] === 'Document')
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Unduh
                                    @else
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                        Lihat
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div 
            x-show="false" 
            class="py-12 text-center bg-white rounded-xl shadow-sm border border-gray-100">
            <svg class="w-16 h-16 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="mt-4 text-lg font-semibold text-gray-700">Tidak Ada Regulasi</h3>
            <p class="mt-2 text-gray-500">Tidak ada regulasi yang sesuai dengan filter yang dipilih.</p>
        </div>
        <div class="mt-8 bg-secondary/50 border-l-4 border-primary rounded-r-xl p-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0">
                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-primary">Informasi Penting</h4>
                    <p class="mt-1 text-sm text-gray-600 leading-relaxed">
                        Seluruh peraturan yang tercantum di halaman ini merupakan dokumen resmi yang mengatur tentang 
                        keterbukaan informasi publik. Untuk informasi lebih lanjut atau salinan resmi dokumen, 
                        silakan hubungi PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection