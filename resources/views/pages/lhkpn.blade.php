@extends('layouts.app')
@section('title', 'LHKPN - PPID Kemenko PM')
@section('content')

{{-- Header Section --}}
<section class="relative py-16 bg-secondary">
    <div class="container px-4 mx-auto">
        <h1 class="text-3xl font-bold text-center text-primary md:text-4xl">
            Laporan Harta Kekayaan Penyelenggara Negara
        </h1>
        <p class="mt-2 text-center text-primary/90">
            Kementerian Koordinator Bidang Pemberdayaan Masyarakat
        </p>
    </div>
</section>

<section class="py-8 bg-gray-50 min-h-screen">
    <div class="container px-4 mx-auto">
        
        <div class="mb-8 bg-secondary/50 border-l-4 border-primary rounded-r-xl p-6">
            <div class="flex items-start gap-4">
                <div class="shrink-0">
                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-primary">Tentang LHKPN</h4>
                    <p class="mt-1 text-sm text-gray-600 leading-relaxed">
                        Laporan Harta Kekayaan Penyelenggara Negara (LHKPN) merupakan bentuk transparansi 
                        dan akuntabilitas pejabat publik sesuai dengan Undang-Undang Nomor 28 Tahun 1999 
                        tentang Penyelenggara Negara yang Bersih dan Bebas dari Korupsi, Kolusi, dan Nepotisme.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="space-y-4">
            @php
                $lhkpnData = [
                    [
                        'nama' => 'Abdul Muhaimin Iskandar',
                        'jabatan' => 'Menteri Koordinator Bidang Pemberdayaan Masyarakat',
                        'file_name' => 'LHKPN 2024_Abdul Muhaimin Iskandar.pdf'
                    ],
                    [
                        'nama' => 'Andie Megantara',
                        'jabatan' => 'Sekretaris Kementerian Koordinator Bidang Pemberdayaan Masyarakat',
                        'file_name' => 'LHKPN 2024_ANDIE MEGANTARA.pdf'
                    ],
                    [
                        'nama' => 'Leontinus Alpha Edison',
                        'jabatan' => 'Deputi Bidang Koordinasi Pemberdayaan Ekonomi Masyarakat dan Pelindungan Pekerja Migran',
                        'file_name' => 'LHKPN 2024_LEONTINUS ALPHA EDISON.pdf'
                    ],
                    [
                        'nama' => 'Nunung Nuryartono',
                        'jabatan' => 'Deputi Bidang Koordinasi Peningkatan Kesejahteraan Sosial',
                        'file_name' => 'LHKPN 2024_NUNUNG NURYARTONO.pdf'
                    ],
                    [
                        'nama' => 'Abdul Haris',
                        'jabatan' => 'Deputi Bidang Koordinasi Pemberdayaan Masyarakat Desa, Daerah Tertinggal, dan Daerah Tertentu',
                        'file_name' => 'LHKPN 2024_ABDUL HARIS.pdf'
                    ],
                    [
                        'nama' => 'Sugeng Bahagijo',
                        'jabatan' => 'Staf Ahli Menteri Bidang Pembangunan Ekonomi dan Digitalisasi',
                        'file_name' => 'LHKPN 2024_SUGENG BAHAGIJO.pdf'
                    ],
                    [
                        'nama' => 'Dyah Tri Kumolosari',
                        'jabatan' => 'Staf Ahli Menteri Bidang Hubungan Antar Lembaga dan Masyarakat',
                        'file_name' => 'LHKPN 2024_DYAH TRI KUMOLOSARI.pdf'
                    ]
                ];
            @endphp

            @foreach ($lhkpnData as $item)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex flex-col lg:flex-row lg:items-center gap-4">
                            
                            <div class="shrink-0">
                                <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                            </div>
                            
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    {{ $item['nama'] }}
                                </h3>
                                <p class="mt-1 text-gray-600 leading-relaxed">
                                    {{ $item['jabatan'] }}
                                </p>
                            </div>
                            
                            <div class="shrink-0">
                                <a href="{{ route('lhkpn.download', ['filename' => $item['file_name']]) }}" 
                                   download="{{ $item['file_name'] }}"
                                   class="inline-flex items-center gap-2 px-4 py-2 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary/90 transition-colors">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-start gap-4">
                <div class="shrink-0">
                    <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900">Catatan</h4>
                    <p class="mt-1 text-sm text-gray-600 leading-relaxed">
                        Dokumen LHKPN yang tersedia di halaman ini merupakan laporan resmi yang telah 
                        dilaporkan kepada Komisi Pemberantasan Korupsi (KPK). Untuk informasi lebih lanjut 
                        atau klarifikasi, silakan hubungi PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
