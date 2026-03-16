@extends('layouts.app')
@section('title', 'Beranda - PPID')
@section('description', 'Portal Pejabat Pengelola Informasi dan Dokumentasi - Menyediakan layanan informasi publik yang transparan, akuntabel, dan bertanggung jawab.')
@section('content')

<section class="relative min-h-125 lg:min-h-150 flex items-center justify-center overflow-hidden">
    
    <div class="absolute inset-0 z-0">
        <img 
            src="{{ asset('images/backgroundheader.jpg') }}"
            alt="Hero Background" 
            class="object-cover w-full h-full"
        >
        <div class="absolute inset-0 z-10 bg-linear-to-r from-primary/90 to-primary/70"></div>
    </div>

    
    <div class="container relative z-10 px-4 mx-auto text-center">
        <p class="mb-4 text-lg font-medium tracking-wide text-white/90 lg:text-xl">
            Selamat Datang di Website
        </p>
        <h1 class="text-3xl font-bold leading-tight text-white md:text-4xl lg:text-5xl xl:text-6xl">
            PPID Kementerian Koordinator<br>
            <span class="text-secondary">Pemberdayaan Masyarakat</span>
        </h1>
        <div class="flex flex-col items-center justify-center gap-4 mt-8 sm:flex-row">
            <a href="{{ route('formulir-permohonan') }}" class="btn-primary">
                Ajukan Permohonan
            </a>
            <a href="#informasi-publik" class="btn-secondary">
                Lihat Informasi Publik
            </a>
        </div>
    </div>
</section>

<section class="py-12 bg-white lg:py-16">
    <div class="container px-4 mx-auto">
        <div class="relative" x-data="{ activeSlide: 0, totalSlides: 3 }">
            
            <div class="overflow-hidden rounded-xl">
                <div 
                    class="flex transition-transform duration-500 ease-in-out"
                    :style="'transform: translateX(-' + (activeSlide * 100) + '%)'"
                >
                    @foreach ([1, 2, 3] as $slide)
                        <div class="flex-shrink-0 w-full">
                            <div class="relative aspect-[16/6] bg-gray-200 rounded-xl overflow-hidden">
                                <img 
                                    src="{{ asset('images/slider/slide-' . $slide . '.png') }}" 
                                    alt="Slide {{ $slide }}"
                                    class="object-cover w-full h-full"
                                >
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <button 
                @click="activeSlide = activeSlide === 0 ? totalSlides - 1 : activeSlide - 1"
                class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-200 hover:scale-110"
                aria-label="Previous slide"
            >
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button 
                @click="activeSlide = activeSlide === totalSlides - 1 ? 0 : activeSlide + 1"
                class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/90 hover:bg-white rounded-full shadow-lg flex items-center justify-center transition-all duration-200 hover:scale-110"
                aria-label="Next slide"
            >
                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
            
            <div class="flex justify-center gap-2 mt-6">
                @foreach ([0, 1, 2] as $index)
                    <button 
                        @click="activeSlide = {{ $index }}"
                        :class="activeSlide === {{ $index }} ? 'bg-primary w-8' : 'bg-gray-300 w-3'"
                        class="h-3 rounded-full transition-all duration-300"
                        aria-label="Go to slide {{ $index + 1 }}"
                    ></button>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section id="informasi-publik" class="py-12 lg:py-20 bg-secondary/30 scroll-mt-20">
    <div class="container px-4 mx-auto">
        
        <div class="max-w-2xl mx-auto mb-12 text-center">
            <h1 class="section-title text-3xl font-bold text-primary md:text-4xl lg:text-5xl">
                Informasi Publik
            </h1>
            <div class="w-20 h-1 mx-auto mt-4 mb-6 rounded-full bg-primary"></div>
        </div>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @php
                $cards = [
                    [
                        'img' => 'card1',
                        'title' => 'Informasi Wajib Berkala',
                        'link' => '/informasi-publik/berkala',
                        'description' => 'Informasi yang disampaikan secara rutin dalam periode tertentu.'
                    ],
                    [
                        'img' => 'card2',
                        'title' => 'Informasi Tersedia Setiap Saat',
                        'link' => '/informasi-publik/setiapsaat',
                        'description' => 'Informasi yang dapat diakses kapan saja oleh publik.'
                    ],
                    [
                        'img' => 'card3',
                        'title' => 'Informasi Serta Merta',
                        'link' => '/informasi-publik/sertamerta',
                        'description' => 'Informasi yang wajib segera diumumkan saat terjadi peristiwa penting.'
                    ]
                ];
            @endphp
            @foreach ($cards as $card)
                <div class="card group hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    
                    <div class="relative overflow-hidden aspect-[4/3]">
                        <img 
                            src="{{ asset('images/cards/' . $card['img'] . '.png') }}" 
                            alt="{{ $card['title'] }}"
                            class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110"
                        >
                        <div class="absolute inset-0 transition-opacity duration-300 opacity-0 bg-primary/20 group-hover:opacity-100"></div>
                    </div>
                    
                    <div class="card-body">
                        <h3 class="mb-4 text-lg font-semibold text-gray-900 group-hover:text-primary transition-colors duration-200">
                            {{ $card['title'] }}
                        </h3>
                        <p class="mb-4 text-sm text-gray-700"> {{ $card['description'] }} </p>
                        <a 
                            href="{{ $card['link'] }}" 
                            class="inline-flex items-center gap-2 text-sm font-medium text-primary hover:gap-3 transition-all duration-200"
                        >
                            Lihat Detail
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



</section>
<a 
    href="#" 
    x-data="{ show: false }"
    x-init="window.addEventListener('scroll', () => { show = window.scrollY > 300 })"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-4"
    @click.prevent="window.scrollTo({ top: 0, behavior: 'smooth' })"
    class="fixed z-50 flex items-center justify-center w-14 h-14 text-white transition-all duration-300 rounded-full shadow-lg bottom-8 right-8 bg-primary hover:bg-primary/90 hover:scale-110 active:scale-95 group"
    aria-label="Kembali ke atas"
>
    <svg class="w-6 h-6 transition-transform group-hover:-translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</a>
@endsection