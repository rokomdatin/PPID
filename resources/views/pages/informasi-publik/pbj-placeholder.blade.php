@extends('layouts.app')

@section('title', $pageTitle . ' - Pengadaan Barang/Jasa')

@section('content')
    <section class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4">
            <div class="rounded-xl border border-gray-100 bg-white p-6 shadow-sm lg:p-8">
                <nav aria-label="Breadcrumb" class="mb-4 text-sm text-gray-600">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="{{ route('beranda') }}" class="transition-colors hover:text-primary">Beranda</a></li>
                        <li aria-hidden="true">/</li>
                        <li><a href="{{ route('informasi.pbj') }}" class="transition-colors hover:text-primary">Pengadaan Barang/Jasa</a></li>
                        <li aria-hidden="true">/</li>
                        <li aria-current="page" class="font-medium text-gray-900">{{ $pageTitle }}</li>
                    </ol>
                </nav>
                <h1 class="text-2xl font-bold text-gray-900 lg:text-3xl">{{ $pageTitle }}</h1>
            </div>
        </div>
    </section>
@endsection
