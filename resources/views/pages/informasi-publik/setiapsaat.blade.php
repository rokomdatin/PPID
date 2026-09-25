@extends('layouts.app')
@section('title', 'Informasi Setiap Saat - PPID Kemenko PM')
@section('content')

<section class="py-8 bg-gray-50 min-h-screen">
    <div class="container px-4 mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 lg:p-8 border-b border-gray-100">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                    Informasi Wajib Setiap Saat
                </h1>
                <p class="text-gray-600 leading-relaxed">
                    Halaman ini memuat informasi yang setiap saat dapat diakses oleh publik tanpa menunggu permohonan, 
                    sepanjang tersedia dalam penguasaan Kemenko PM. Konten diperbarui secara berkala untuk menjamin akurasi dan kemutakhiran.
                </p>
            </div>
            
                <div class="p-8 lg:p-8">
                    <div x-show="activeTab === 'rincian'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        
                        @php
                            $downloadType = 'setiapsaat';
                            $informasiData = [
                                [
                                    'kategori' => 'Daftar Informasi Publik Kemenko PM',
                                    'items' => [
                                        ['label' => 'Daftar Informasi Publik', 'file_name' => 'SK DIP.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi Tentang Peraturan, Keputusan Dan/atau Kebijakan Kemenko PM',
                                    'items' => [
                                        ['label' => 'Daftar peraturan, keputusan dan/atau kebijakan yang telah diterbitkan di Kemenko PM', 'url'   => 'https://jdih-dev.pemberdayaan.go.id/'],
                                        ['label' => 'Daftar rancangan dan tahap pembentukan peraturan perundang-undangan, keputusan, dan/atau kebijakan yang sedang dalam proses pembuatan', 'file_name' => 'Daftar Rancangan Peraturan Keputusan Kebijakan yang Sedang Diproses.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang organisasi, administrasi, kepegawaian, dan keuangan',
                                    'items' => [
                                        ['label' => 'Pedoman pengelolaan organisasi, administrasi, personil dan keuangan', 'file_name' => 'Kepmenko No 1 Tahun 2025.pdf'],
                                        ['label' => 'Profil Pimpinan dan Pegawai', 'url'   => 'https://pemberdayaan.go.id/pages/tentang/struktur'],
                                        ['label' => 'Anggaran Badan Publik secara umum maupun anggaran secara khusus pada unit pelaksanaan teknis serta laporan keuangannya', 'file_name' => 'TODO: GANTI_NAMA_FILE6.pdf'],
                                        ['label' => 'Data statistik yang dibuat dan/atau dikelola oleh Kemenko PM', 'url' => 'https://jdih.pemberdayaan.go.id/' ]
                                    ]
                                ],
                                [
                                    'kategori' => 'Surat menyurat pimpinan atau pejabat dalam rangka pelaksanaan tugas, fungsi dan wewenangnya Kemenko PM',
                                    'items' => [
                                        ['label' => 'Rekapitulasi surat menyurat pimpinan (Informasi tersedia berdasarkan permintaan)', 'url' => route('formulir-permohonan')]
                                    ]
                                ],
                                [
                                    'kategori' => 'Data perbendaharaan atau inventaris',
                                    'items' => [
                                        ['label' => 'Daftar rekapitulasi perbendaharaan atau inventaris aset', 'file_name' => 'TODO: GANTI_NAMA_FILE13.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Agenda Pimpinan Satuan Kerja',
                                    'items' => [
                                        [
                                            'label'    => 'Agenda Pimpinan Satuan Kerja (Informasi tersedia berdasarkan permintaan)',
                                            'subitems' => [
                                                ['label' => 'Agenda Kegiatan Pimpinan', 'url' => route('formulir-permohonan')],
                                                ['label' => 'Agenda Kegiatan Sekretaris', 'url' => route('formulir-permohonan')],
                                            ],
                                        ]
                                    ]
                                ],
                                [
                                    'kategori' => 'Jumlah, jenis, dan gambaran umum pelanggaran yang ditemukan dalam pengawasan internal serta laporan penindakannya',
                                    'items' => [
                                        ['label' => 'Jumlah, jenis, dan gambaran umum pelanggaran yang dilaporkan oleh masyarakat serta laporan penindakannya', 'file_name' => 'TODO: GANTI_NAMA_FILE17.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi dan kebijakan yang disampaikan pejabat publik dalam pertemuan yang terbuka untuk umum',
                                    'items' => [
                                        ['label' => 'Informasi dan kebijakan yang disampaikan pejabat publik dalam pertemuan yang terbuka untuk umum', 'url'   => 'https://pemberdayaan.go.id/pages/media']
                                    ]
                                ]
                            ];
                        @endphp
                        <div class="space-y-8">
                            @foreach ($informasiData as $index => $data)
                                <div class="border-b border-gray-100 pb-6 last:border-0 last:pb-0">
                                    <div class="flex flex-col lg:flex-row lg:gap-8">
                                        <div class="lg:w-1/3 mb-4 lg:mb-0">
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                {{ $data['kategori'] }}
                                            </h3>
                                        </div>
                                        
                                        <div class="lg:w-2/3">
                                            <div class="space-y-3">
                                                @foreach ($data['items'] as $item)
                                                    @if(isset($item['subitems']))
                                                        <div class="flex items-center justify-between gap-4 py-3 px-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                                            <span class="min-w-0 flex-1 text-gray-700">{{ $item['label'] }}</span>
                                                            <div x-data="{ open:false }" class="relative">
                                                                <button @click="open = !open" class="inline-flex items-center justify-center gap-1 rounded-full bg-primary px-4 py-2.5 text-xs font-semibold text-white shadow-sm transition hover:bg-primary/90 sm:text-sm">
                                                                    PILIH
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                                    </svg>
                                                                </button>
                                                                <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-72 max-w-[calc(100vw-2rem)] rounded-xl border border-gray-200 bg-white shadow-lg">
                                                                    @foreach($item['subitems'] as $sub)
                                                                        @php
                                                                            $subUrl = $sub['url'] ?? null;
                                                                            $subFileName = $sub['file_name'] ?? null;
                                                                            $isExternalSubUrl = $subUrl && \Illuminate\Support\Str::startsWith($subUrl, ['http://', 'https://']);
                                                                            $isTodoSubFile = $subFileName && \Illuminate\Support\Str::startsWith($subFileName, 'TODO:');
                                                                        @endphp
                                                                        @if($subUrl)
                                                                            <a href="{{ $subUrl }}" @if($isExternalSubUrl) target="_blank" rel="noopener" @endif class="block border-b border-gray-100 px-4 py-3 text-sm text-gray-700 transition hover:bg-gray-50 last:border-0">
                                                                                {{ $sub['label'] }}
                                                                            </a>
                                                                        @elseif($subFileName && !$isTodoSubFile)
                                                                            <a href="{{ route('informasi.preview', ['type' => $downloadType, 'filename' => $subFileName]) }}" class="block border-b border-gray-100 px-4 py-3 text-sm text-gray-700 transition hover:bg-gray-50 last:border-0">
                                                                                {{ $sub['label'] }}
                                                                            </a>
                                                                        @else
                                                                            <span class="block px-4 py-2 text-sm text-gray-400 cursor-not-allowed" title="Dokumen belum tersedia">
                                                                                {{ $sub['label'] }}
                                                                            </span>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center justify-between gap-4 py-3 px-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                                            <span class="min-w-0 flex-1 text-gray-700">{{ $item['label'] }}</span>
                                                            @php $url = $item['url'] ?? null; @endphp
                                                            @if($url)
                                                                @php $isExternal = \Illuminate\Support\Str::startsWith($url, ['http://','https://']); @endphp
                                                                <a href="{{ $url }}" 
                                                                   @if($isExternal) target="_blank" rel="noopener" @endif
                                                                   class="inline-flex h-9 min-w-[76px] shrink-0 items-center justify-center rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-primary/90 sm:text-sm">
                                                                    LIHAT
                                                                </a>
                                                            @else
                                                                @php
                                                                    $fileName = $item['file_name'] ?? '';
                                                                    $isTodoFile = \Illuminate\Support\Str::startsWith($fileName, 'TODO:');
                                                                @endphp
                                                                @if($isTodoFile)
                                                                    <span class="inline-flex h-9 min-w-[76px] shrink-0 items-center justify-center rounded-full bg-gray-200 px-4 py-2 text-xs font-medium text-gray-500 cursor-not-allowed sm:text-sm" title="Dokumen belum tersedia">
                                                                        SEGERA TERSEDIA
                                                                    </span>
                                                                @else
                                                                    <a href="{{ route('informasi.preview', ['type' => $downloadType, 'filename' => $fileName]) }}" class="inline-flex h-9 min-w-[76px] shrink-0 items-center justify-center rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-primary/90 sm:text-sm">
                                                                        LIHAT
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection