<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'PPID')</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="@yield('description', 'Portal Pejabat Pengelola Informasi dan Dokumentasi')">
    
    <!-- Favicon (with cache busting) -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v={{ config('app.version', time()) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}?v={{ config('app.version', time()) }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-gray-50">
    
    <!-- Welcome Popup -->
    @if(!session('popup_closed'))
        <x-welcome-popup 
            title="Selamat Datang di PPID"
            description="Portal Pejabat Pengelola Informasi dan Dokumentasi menyediakan akses informasi publik secara transparan dan akuntabel untuk seluruh masyarakat."
            image="/images/maklumatppid.png"
            :showButton="true"
            buttonText="Mulai Jelajahi"
        />
    @endif

    <!-- Navbar -->
    <x-navbar />
    
    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>
    
    <!-- Footer -->
    <x-footer />
</body>

</html>