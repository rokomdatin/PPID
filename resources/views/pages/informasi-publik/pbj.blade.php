@extends('layouts.app')

@section('title', 'Pengadaan Barang/Jasa - PPID Kemenko PM')

@section('content')
    <section class="min-h-screen bg-gray-50 py-8">
        <div class="container mx-auto px-4">
            <div class="mb-6">
                <nav aria-label="Breadcrumb" class="mb-3 text-sm text-gray-600">
                    <ol class="flex flex-wrap items-center gap-2">
                        <li><a href="{{ route('beranda') }}" class="transition-colors hover:text-primary">Beranda</a></li>
                        <li aria-hidden="true">/</li>
                        <li><span class="font-medium text-gray-900">Pengadaan Barang/Jasa</span></li>
                    </ol>
                </nav>
                <h1 class="text-2xl font-bold text-gray-900 lg:text-3xl">Pengadaan Barang/Jasa</h1>
            </div>

            <div class="grid grid-cols-1 items-stretch gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($menus as $item)
                    <x-menu-card :item="$item" />
                @endforeach
            </div>
        </div>
    </section>
@endsection