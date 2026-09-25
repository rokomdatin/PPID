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
                                        ['label' => 'Laporan Harta Kekayaan Pejabat Negara (LHKPN)', 'url'   => route('lhkpn')],
                                        ['label' => 'Struktur Organisasi PPID Kemenko PM', 'url'   => route('profil') . '#struktur'],
                                        ['label' => 'Tugas dan Fungsi Unit Kerja', 'file_name' => 'Permenko Pemberdayaan Masyarakat Nomor 1 Tahun 2024.pdf'],
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi Khusus Lainnya yang Berkaitan Langsung dengan Hak-Hak Masyarakat',
                                        'items' => [
                                        ['label' => 'SP4N Lapor!', 'url'   => 'https://www.lapor.go.id/'],
                                        ['label' => 'JDIH', 'url'   => 'https://jdih-dev.pemberdayaan.go.id/'],
                                        ['label' => 'e-LHKPN', 'url'   => 'https://elhkpn.kpk.go.id/portal/user/login#'],
                                        ['label' => 'Dashboard Agregat DTSEN', 'url'   => 'https://dashboard-dtsen.pemberdayaan.go.id/'],
                                        ['label' => 'Dashboard Desa Prioritas', 'url'   => 'https://desaprioritas.pemberdayaan.go.id/'],
                                    ]
                                ],
                                [
                                    'kategori' => 'Ringkasan Informasi Tentang Program Dan/atau Kegiatan Yang Sedang Dijalankan Dalam Lingkup Kemenko PM',
                                    'items' => [
                                        ['label' => 'Rencana Strategis Kemenko PM', 'file_name' => 'Buku Renstra 2025-2029.pdf'],
                                        ['label' => 'Rencana Kerja Kemenko PM', 'subitems' => [
                                                ['label' => 'Renja 2025', 'file_name' => 'Renja 2025.pdf'],
                                                ['label' => 'Renja 2026', 'file_name' => 'Renja 2026.pdf'],
                                            ]],
                                        
                                        ['label' => 'Kegiatan Kemenko PM', 'file_name' => 'Kegiatan Kemenko PM Tahun 2026.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Laporan Keuangan',
                                    'items' => [
                                        [
                                            'label'    => 'Laporan Keuangan Tahunan',
                                            'subitems' => [
                                                ['label' => '2024', 'file_name' => 'TODO: GANTI_NAMA_FILE14-2023.pdf'],
                                                ['label' => '2025', 'file_name' => 'LKKL 2025.pdf'],
                                            ],
                                        ],
                                        ['label' => 'Daftar Isian Pelaksanaan Anggaran (DIPA)', 'subitems' => [
                                                ['label' => 'DIPA 2025', 'file_name' => 'DIPA Kemenko PM 2025.pdf'],
                                                ['label' => 'DIPA 2026', 'file_name' => 'DIPA Kemenko PM 2026.pdf'],
                                            ]],
                                        ['label' => 'Rencana Kerja dan Anggaran (RKA)', 'subitems' => [
                                                ['label' => 'RKA 2025', 'file_name' => 'TODO: GANTI_NAMA_FILE14-2024.pdf'],
                                                ['label' => 'RKA 2026', 'file_name' => 'RKA KL Pagu Alokasi Anggaran 2026.pdf'],
                                            ]],
                                        ['label' => 'Informasi realisasi atau penyerapan penggunaan keuangan Tahun 2026', 'subitems' => [
                                                ['label' => 'Laporan Realisasi Anggaran 2025', 'file_name' => 'TODO: GANTI_NAMA_FILE14-2024.pdf'],
                                                ['label' => 'Laporan Realisasi Anggaran 2026', 'file_name' => 'Laporan Realisasi Anggaran 2026.pdf'],
                                            ]],
                                    ]
                                ],
                                [
                                    'kategori' => 'Ringkasan Informasi Tentang Kinerja Dalam Lingkup Kemenko PM',
                                    'items' => [
                                        [
                                            'label'    => 'Laporan Kinerja Tahunan', 'file_name' => 'Laporan Capaian Kinerja Kemenko PM 2026.pdf'
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
                                        ['label' => 'Tata cara memperoleh Informasi Publik', 'download_type' => 'standaroperasional', 'file_name' => 'Konsultasi dan Audiensi.png'],
                                        ['label' => 'Tata cara pengajuan keberatan dan proses penyelesaian sengketa Informasi Publik berikut pihak-pihak yang bertanggungjawab yang dapat dihubungi', 'download_type' => 'standaroperasional', 'file_name' => 'Rapat Koordinasi.png']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi tentang tata cara pengaduan penyalahgunaan wewenang atau pelanggaran oleh Kemenko PM',
                                    'items' => [
                                        ['label' => 'Tata cara pengaduan penyalahgunaan wewenang atau pelanggaran oleh Kemenko PM', 'url'   => route('standar-pelayanan') . '#mekanismepelayanan']
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
                                        ['label' => 'Statistik Kepegawaian Kemenko PM', 'file_name' => 'Data Statistik Kepegawaian Kemenko PM.pdf']
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
                                                                            $subFileName = $sub['file_name'] ?? null;
                                                                            $subUrl = $sub['url'] ?? null;
                                                                            $subIsTodoFile = $subFileName && \Illuminate\Support\Str::startsWith($subFileName, 'TODO:');
                                                                            $subPreviewUrl = $subFileName ? route('informasi.preview', ['type' => $downloadType, 'filename' => $subFileName]) : null;
                                                                        @endphp
                                                                        @if($subUrl)
                                                                            <a href="{{ $subUrl }}" target="_blank" rel="noopener" class="block border-b border-gray-100 px-4 py-3 text-sm text-gray-700 transition hover:bg-gray-50 last:border-0">
                                                                                {{ $sub['label'] }}
                                                                            </a>
                                                                        @elseif($subFileName && !$subIsTodoFile)
                                                                            <a href="{{ $subPreviewUrl }}" class="block border-b border-gray-100 px-4 py-3 text-sm text-gray-700 transition hover:bg-gray-50 last:border-0">
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
                                                                    $itemDownloadType = $item['download_type'] ?? $downloadType;
                                                                    $previewRoute = route('informasi.preview', ['type' => $itemDownloadType, 'filename' => $fileName]);
                                                                @endphp
                                                                @if($isTodoFile)
                                                                    <span class="inline-flex h-9 min-w-[76px] shrink-0 items-center justify-center rounded-full bg-gray-200 px-4 py-2 text-xs font-medium text-gray-500 cursor-not-allowed sm:text-sm" title="Dokumen belum tersedia">
                                                                        SEGERA TERSEDIA
                                                                    </span>
                                                                @else
                                                                    <a href="{{ $previewRoute }}" class="inline-flex h-9 min-w-[76px] shrink-0 items-center justify-center rounded-full bg-primary px-4 py-2 text-xs font-semibold text-white shadow-sm transition hover:bg-primary/90 sm:text-sm">
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