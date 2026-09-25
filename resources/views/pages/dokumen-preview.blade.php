@extends('layouts.app')

@section('title', $pageTitle . ' - PPID Kemenko PM')

@section('content')
<section class="min-h-screen bg-gray-50 py-4 sm:py-6 lg:py-8">
    <div class="container mx-auto max-w-6xl px-3 sm:px-4">
        <div class="overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm">
            <div class="border-b border-gray-200 p-4 sm:p-6 lg:p-8">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                    <div class="min-w-0">
                        <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-primary/80">
                            Preview Dokumen
                        </p>
                        <h1 class="mt-3 break-words text-2xl font-bold leading-tight text-gray-900 sm:text-3xl lg:text-4xl">
                            {{ $documentTitle }}
                        </h1>
                        <p class="mt-2 text-sm text-gray-600 sm:text-base">
                            Jenis dokumen: {{ $typeLabel }}
                        </p>
                    </div>

                    <div class="flex w-full flex-col gap-3 sm:flex-row sm:items-center md:w-auto md:shrink-0">
                        <a href="{{ $backRoute }}"
                           class="btn-secondary w-full sm:min-w-[170px] sm:w-auto">
                            Kembali ke Daftar
                        </a>
                        <a href="{{ $downloadUrl }}"
                           class="btn-primary w-full sm:min-w-[180px] sm:w-auto">
                            Unduh Dokumen
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-5 lg:p-6">
                @if($isImage)
                    <div class="overflow-hidden rounded-xl border border-gray-200 bg-gray-50">
                        <img src="{{ $previewUrl }}" alt="{{ $documentTitle }}" class="mx-auto h-auto max-h-[85vh] w-full object-contain">
                    </div>
                @elseif($isPdf)
                    <div class="rounded-xl border border-gray-200 overflow-hidden">
                        <iframe
                            src="{{ $previewUrl }}#zoom=page-width"
                            class="w-full h-[calc(100vh-160px)] min-h-[300px]"
                            frameborder="0"
                            title="{{ $documentTitle }}">
                        </iframe>
                    </div>
                @else
                    <div class="rounded-xl border border-dashed border-gray-300 bg-gray-50 p-8 text-center sm:p-10">
                        <p class="text-lg font-semibold text-gray-800 sm:text-xl">Preview dokumen tidak tersedia</p>
                        <p class="mt-3 text-sm text-gray-600 sm:text-base">
                            Format file ini tidak didukung untuk ditampilkan di browser. Anda tetap bisa mengunduh dokumen untuk membukanya di perangkat lain.
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
@endsection
