@extends('layouts.app')
@section('title', 'Informasi Berkala - PPID Kemenko PM')
@section('content')


<section class="py-8 bg-gray-50 min-h-screen">
    <div class="container px-4 mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 lg:p-8 border-b border-gray-200">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                    Informasi Wajib Berkala
                </h1>
                <p class="text-gray-600 leading-relaxed">
                    Halaman ini memuat informasi yang wajib diumumkan secara berkala oleh Kementerian Koordinator 
                    Pemberdayaan Masyarakat sesuai peraturan perundang-undangan. Penyajian dilakukan pada interval 
                    yang telah ditetapkan agar publik memperoleh data yang akurat, mutakhir, dan mudah diakses.
                </p>
            </div>

                <div class="p-8 lg:p-8">
                    <div x-show="activeTab === 'rincian'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        
                        @php
                            $downloadType = 'berkala';
                            $informasiData = [
                                [
                                    'kategori' => 'Informasi tentang Profil Kemenko PM',
                                        'items' => [
                                        ['label' => 'Profil Kemenko PM', 'url'   => 'https://pemberdayaan.go.id/pages/tentang/profil'],
                                        ['label' => 'Profil PPID', 'url'   => route('profil') . '#profil'],
                                        ['label' => 'Laporan Harta Kekayaan Pejabat Negara', 'url'   => route('lhkpn')],
                                        ['label' => 'Struktur Organisasi PPID Kemenko PM', 'url'   => route('profil') . '#struktur'],
                                        ['label' => 'Tugas dan Fungsi Unit Kerja', 'file_name' => 'Permenko Pemberdayaan Masyarakat Nomor 1 Tahun 2024.pdf'],
                                    ]
                                ],
                                [
                                    'kategori' => 'Ringkasan Informasi Tentang Program Dan/atau Kegiatan Yang Sedang Dijalankan Dalam Lingkup Kemenko PM',
                                    'items' => [
                                        ['label' => 'Rencana Strategis Kemenko PM', 'file_name' => 'Buku Renstra 2025-2029.pdf'],
                                        ['label' => 'Rencana Kerja Kemenko PM', 'subitems' => [
                                                ['label' => 'Renja 2024', 'file_name' => 'Renja 2024.pdf'],
                                                ['label' => 'Renja 2025', 'file_name' => 'Renja 2025.pdf'],
                                            ]],
                                        ['label' => 'Daftar Isian Pelaksanaan Anggaran (DIPA)', 'subitems' => [
                                                ['label' => 'DIPA 2025', 'file_name' => 'DIPA Kemenko PM 2025.pdf'],
                                                ['label' => 'DIPA 2026', 'file_name' => 'DIPA Kemenko PM 2026.pdf'],
                                            ]],
                                        ['label' => 'Kegiatan Kemenko PM', 'url'   => 'https://pemberdayaan.go.id/pages/media']
                                    ]
                                ],
                                [
                                    'kategori' => 'Laporan Keuangan',
                                    'items' => [
                                        [
                                            'label'    => 'Laporan Keuangan Tahunan',
                                            'subitems' => [
                                                ['label' => 'Laporan Keuangan Tahun 2024', 'file_name' => 'TODO: GANTI_NAMA_FILE14-2023.pdf'],
                                                ['label' => 'Laporan Keuangan Tahun 2025', 'file_name' => 'TODO: GANTI_NAMA_FILE14-2024.pdf'],
                                            ],
                                        ],
                                    ]
                                ],
                                [
                                    'kategori' => 'Ringkasan Informasi Tentang Kinerja Dalam Lingkup Kemenko PM',
                                    'items' => [
                                        [
                                            'label'    => 'Rencana Kinerja Tahunan', 'file_name' => 'LKjIP_2025_Kemenko_PM.pdf'
                                        ]
                                    ]
                                ],
                                [
                                    'kategori' => 'Ringkasan laporan akses Informasi Publik',
                                    'items' => [
                                        ['label' => 'Ringkasan laporan akses Informasi Publik PPID Kemenko PM', 'file_name' => 'TODO: GANTI_NAMA_FILE18.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang peraturan, keputusan, dan/atau kebijakan yang mengikat dan/atau berdampak bagi publik yang dikeluarkan oleh Kemenko PM',
                                    'items' => [
                                        ['label' => 'Daftar Peraturan perundang-undangan, keputusan, dan/atau kebijakan yang telah disahkan atau ditetapkan', 'url'   => 'https://jdih.pemberdayaan.go.id/']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang prosedur memperoleh Informasi Publik',
                                    'items' => [
                                        ['label' => 'Tata cara memperoleh Informasi Publik', 'file_name' => 'TODO: GANTI_NAMA_FILE22.pdf'],
                                        ['label' => 'Tata cara pengajuan keberatan dan proses penyelesaian sengketa Informasi Publik berikut pihak-pihak yang bertanggungjawab yang dapat dihubungi', 'file_name' => 'TODO: GANTI_NAMA_FILE22.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang tata cara pengaduan penyalahgunaan wewenang atau pelanggaran oleh Kemenko PM',
                                    'items' => [
                                        ['label' => 'Tata cara pengaduan penyalahgunaan wewenang atau pelanggaran oleh Kemenko PM', 'file_name' => 'TODO: GANTI_NAMA_FILE22.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang pengumuman pengadaan barang dan jasa',
                                    'items' => [
                                        ['label' => 'Pengumuman pengadaan barang dan jasa', 'file_name' => 'TODO: GANTI_NAMA_FILE22.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang ketenagakerjaan',
                                    'items' => [
                                        ['label' => 'Statistik Kepegawaian Kemenko PM', 'file_name' => 'TODO: GANTI_NAMA_FILE22.pdf']
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
                                                                        <a href="{{ route('informasi.download', ['type' => $downloadType, 'filename' => $sub['file_name']]) }}" download="{{ $sub['file_name'] }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
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
                                                                                     <a href="{{ route('informasi.download', ['type' => $downloadType, 'filename' => $item['file_name']]) }}"
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