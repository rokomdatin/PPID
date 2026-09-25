@extends('layouts.app')
@section('title', 'Informasi Serta Merta - PPID Kemenko PM')
@section('content')

<section class="py-8 bg-gray-50 min-h-screen">
    <div class="container px-4 mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 lg:p-8 border-b border-gray-100">
                <h1 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                    Informasi Wajib Serta Merta
                </h1>
                <p class="text-gray-600 leading-relaxed">
                    Halaman ini memuat informasi yang Informasi yang dapat mengancam hajat hidup orang banyak dan
                    ketertiban umum sesuai dengan ketentuan peraturan perundang-undangan.
                </p>
            </div>
            
                <div class="p-8 lg:p-8">
                    <div x-show="activeTab === 'rincian'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                        
                        @php
                            $downloadType = 'sertamerta';
                            $informasiData = [
                                [
                                    'kategori' => 'Informasi Bencana Alam',
                                    'items' => [
                                        ['label' => 'Peringatan Dini (Early Warning)', 'file_name' => 'TODO: GANTI_NAMA_FILE1.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi Keadaan Bencana Non Alam',
                                    'items' => [ 
                                        ['label' => 'Status Kedaruratan Kesehatan Masyarakat', 'file_name' => 'TODO: GANTI_NAMA_FILE4.pdf']
                                    ]
                                ],
                                [
                                    'kategori' => 'Informasi Bencana Sosial',
                                    'items' => [
                                        ['label' => 'Informasi Penanganan Pengungsi', 'file_name' => 'TODO: GANTI_NAMA_FILE7.pdf']
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
                                                    <div class="flex items-center justify-between gap-4 py-3 px-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                                        <span class="min-w-0 flex-1 text-gray-700">{{ $item['label'] }}</span>
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
                                                    </div>
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