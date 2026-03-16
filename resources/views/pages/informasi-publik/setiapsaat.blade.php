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
                            $informasiData = [
                                [
                                    'kategori' => 'Daftar Informasi Publik Kemenko PM',
                                    'items' => [
                                        ['label' => 'Daftar Informasi Publik', 'file_name' => 'TODO: GANTI_NAMA_FILE1.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi Tentang Peraturan, Keputusan Dan/atau Kebijakan Kemenko PM',
                                    'items' => [
                                        ['label' => 'Daftar peraturan, keputusan dan/atau kebijakan yang telah diterbitkan di Kemenko PM', 'url'   => 'https://jdih.pemberdayaan.go.id/']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang organisasi, administrasi, kepegawaian, dan keuangan',
                                    'items' => [
                                        ['label' => 'Pedoman pengelolaan organisasi, administrasi, personil dan keuangan', 'file_name' => 'TODO: GANTI_NAMA_FILE4.pdf'],
                                        ['label' => 'Profil Pimpinan dan Pegawai', 'url'   => 'https://pemberdayaan.go.id/pages/tentang/struktur'],
                                        ['label' => 'Anggaran Badan Publik secara umum maupun anggaran secara khusus pada unit pelaksanaan teknis serta laporan keuangannya', 'file_name' => 'TODO: GANTI_NAMA_FILE6.pdf'],
                                        ['label' => 'Data statistik yang dibuat dan dikelola oleh Kemenko PM', 'file_name' => 'TODO: GANTI_NAMA_FILE7.pdf'],
                                        ['label' => 'Neraca', 'file_name' => 'TODO: GANTI_NAMA_FILE8.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Surat menyurat pimpinan atau pejabat dalam rangka pelaksanaan tugas, fungsi dan wewenangnya Kemenko PM',
                                    'items' => [
                                        ['label' => 'Rekapitulasi surat menyurat pimpinan (Informasi tersedia berdasarkan permintaan)', 'file_name' => 'TODO: GANTI_NAMA_FILE12.pdf']
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
                                                ['label' => 'Agenda Kegiatan Pimpinan', 'file_name' => 'TODO: GANTI_NAMA_FILE14-2023.pdf'],
                                                ['label' => 'Agenda Kegiatan Sekretaris', 'file_name' => 'TODO: GANTI_NAMA_FILE14-2024.pdf'],
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
                                                        <div class="flex items-center justify-between py-3 px-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                                            <span class="text-gray-700">{{ $item['label'] }}</span>
                                                            <div x-data="{ open:false }" class="relative">
                                                                <button @click="open = !open" class="inline-flex items-center justify-center px-4 py-1.5 text-xs font-medium text-white bg-primary rounded-full hover:bg-primary/90 transition-colors">
                                                                    PILIH
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                                    </svg>
                                                                </button>
                                                                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-10">
                                                                    @foreach($item['subitems'] as $sub)
                                                                        <a href="{{ route('informasi.download', ['type' => 'berkala', 'filename' => $sub['file_name']]) }}" download="{{ $sub['file_name'] }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                                                            {{ $sub['label'] }}
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center justify-between py-3 px-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                                            <span class="text-gray-700">{{ $item['label'] }}</span>
                                                            @php $url = $item['url'] ?? null; @endphp
                                                            @if($url)
                                                                @php $isExternal = \Illuminate\Support\Str::startsWith($url, ['http://','https://']); @endphp
                                                                <a href="{{ $url }}" 
                                                                   @if($isExternal) target="_blank" rel="noopener" @endif
                                                                   class="inline-flex items-center justify-center px-4 py-1.5 text-xs font-medium text-white bg-primary rounded-full hover:bg-primary/90 transition-colors">
                                                                    LIHAT
                                                                </a>
                                                            @else
                                                                <a href="{{ route('informasi.download', ['type' => 'berkala', 'filename' => $item['file_name']]) }}"
                                                                   download="{{ $item['file_name'] }}"
                                                                   class="inline-flex items-center justify-center px-4 py-1.5 text-xs font-medium text-white bg-primary rounded-full hover:bg-primary/90 transition-colors">
                                                                    UNDUH
                                                                </a>
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