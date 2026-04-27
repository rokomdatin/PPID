<nav x-data="{ 
    mobileMenuOpen: false, 
    activeDropdown: null,
    mobileDropdowns: []
}" 
    @click.outside="activeDropdown = null"
    class="bg-primary shadow-lg sticky top-0 z-50"
>
    <div class="container mx-auto px-4 ">
        <div class="flex items-center justify-between h-24 lg:h-28">
            
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <div class="flex items-center">
                <img src="{{ asset('images/logoheadernavbar.png') }}" 
                     alt="PPID Kemenko PM" 
                     class="h-16 w-64 sm:h-20 lg:h-24 object-contain">
            </div>
            </a>

            <div class="hidden lg:flex items-center gap-1">
                <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                
                <a href="{{ url('/profil') }}" class="nav-link">Profil</a>
                
                <div class="relative" 
                    @mouseenter="activeDropdown = 'informasi-publik'" 
                    @mouseleave="activeDropdown = null"
                >
                    <button class="nav-link flex items-center gap-1">
                        Informasi Publik
                        <svg class="w-4 h-4 transition-transform duration-200" 
                            :class="{ 'rotate-180': activeDropdown === 'informasi-publik' }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu" :class="{ 'open': activeDropdown === 'informasi-publik' }">
                        <a href="{{ url('/informasi-publik/berkala') }}" class="dropdown-item">Informasi Berkala</a>
                        <a href="{{ url('/informasi-publik/setiapsaat') }}" class="dropdown-item">Informasi Tersedia Setiap Saat</a>
                        <a href="{{ url('/informasi-publik/sertamerta') }}" class="dropdown-item">Informasi Serta Merta</a>
                    </div>
                </div>
                
                <div class="relative"
                    @mouseenter="activeDropdown = 'layanan-informasi'"
                    @mouseleave="activeDropdown = null"
                >
                    <button class="nav-link flex items-center gap-1">
                        Layanan Informasi
                        <svg class="w-4 h-4 transition-transform duration-200"
                            :class="{ 'rotate-180': activeDropdown === 'layanan-informasi' }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu" :class="{ 'open': activeDropdown === 'layanan-informasi' }">
                        <a href="{{ route('formulir-permohonan') }}" class="dropdown-item">Permohonan Informasi</a>
                        <a href="{{ url('/layanan-informasi/pengajuan-keberatan') }}" class="dropdown-item">Pengajuan Keberatan</a>
                    </div>
                </div>

                <a href="{{ url('/standar-pelayanan') }}" class="nav-link">Standar Pelayanan</a>
                
                <a href="{{ url('/regulasi') }}" class="nav-link">Regulasi</a>
                
                <a href="{{ url('/faq') }}" class="nav-link">FAQ</a>
            </div>
            
            <button @click="mobileMenuOpen = !mobileMenuOpen"
                class="lg:hidden p-2 text-white hover:bg-white/10 rounded-md transition-colors"
                aria-label="Toggle menu"
            >
                <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div x-show="mobileMenuOpen" 
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            class="lg:hidden pb-4"
        >
            <div class="flex flex-col gap-1 pt-2">
                <a href="{{ url('/') }}" 
                    @click="mobileMenuOpen = false"
                    class="block px-4 py-3 text-white font-medium hover:bg-white/10 rounded-md transition-colors">
                    Beranda
                </a>
                
                <a href="{{ url('/profil') }}"
                    @click="mobileMenuOpen = false" 
                    class="block px-4 py-3 text-white font-medium hover:bg-white/10 rounded-md transition-colors">
                    Profil
                </a>
                
                <div>
                    <button @click="mobileDropdowns.includes('informasi-publik') 
                        ? mobileDropdowns = mobileDropdowns.filter(i => i !== 'informasi-publik') 
                        : mobileDropdowns.push('informasi-publik')"
                        class="w-full flex items-center justify-between px-4 py-3 text-white hover:bg-white/10 rounded-md transition-colors"
                    >
                        <span class="font-medium">Informasi Publik</span>
                        <svg class="w-5 h-5 transition-transform duration-200"
                            :class="{ 'rotate-180': mobileDropdowns.includes('informasi-publik') }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="mobileDropdowns.includes('informasi-publik')"
                        x-cloak
                        x-transition
                        class="ml-4 mt-1 border-l-2 border-white/30 pl-4"
                    >
                        <a href="{{ url('/informasi-publik/berkala') }}" 
                            @click="mobileMenuOpen = false"
                            class="block py-2.5 text-white/80 hover:text-white transition-colors">
                            Informasi Berkala
                        </a>
                        <a href="{{ url('/informasi-publik/tersedia-setiap-saat') }}"
                            @click="mobileMenuOpen = false"
                            class="block py-2.5 text-white/80 hover:text-white transition-colors">
                            Informasi Tersedia Setiap Saat
                        </a>
                        <a href="{{ url('/informasi-publik/serta-merta') }}"
                            @click="mobileMenuOpen = false"
                            class="block py-2.5 text-white/80 hover:text-white transition-colors">
                            Informasi Serta Merta
                        </a>
                    </div>
                </div>
                
                <div>
                    <button @click="mobileDropdowns.includes('layanan-informasi') 
                        ? mobileDropdowns = mobileDropdowns.filter(i => i !== 'layanan-informasi') 
                        : mobileDropdowns.push('layanan-informasi')"
                        class="w-full flex items-center justify-between px-4 py-3 text-white hover:bg-white/10 rounded-md transition-colors"
                    >
                        <span class="font-medium">Layanan Informasi</span>
                        <svg class="w-5 h-5 transition-transform duration-200"
                            :class="{ 'rotate-180': mobileDropdowns.includes('layanan-informasi') }"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="mobileDropdowns.includes('layanan-informasi')"
                        x-cloak
                        x-transition
                        class="ml-4 mt-1 border-l-2 border-white/30 pl-4"
                    >
                        <a href="{{ route('formulir-permohonan') }}"
                            @click="mobileMenuOpen = false"
                            class="block py-2.5 text-white/80 hover:text-white transition-colors">
                            Permohonan Informasi
                        </a>
                        <a href="{{ route('formulir-keberatan') }}"
                            @click="mobileMenuOpen = false"
                            class="block py-2.5 text-white/80 hover:text-white transition-colors">
                            Permohonan Keberatan
                        </a>
                    </div>
                </div>
                
                <a href="{{ url('/standar-pelayanan') }}"
                    @click="mobileMenuOpen = false"
                    class="block px-4 py-3 text-white font-medium hover:bg-white/10 rounded-md transition-colors">
                    Standar Pelayanan
                </a>
                
                <a href="{{ url('/regulasi') }}"
                    @click="mobileMenuOpen = false"
                    class="block px-4 py-3 text-white font-medium hover:bg-white/10 rounded-md transition-colors">
                    Regulasi
                </a>
                
                <a href="{{ url('/faq') }}"
                    @click="mobileMenuOpen = false"
                    class="block px-4 py-3 text-white font-medium hover:bg-white/10 rounded-md transition-colors">
                    FAQ
                </a>
            </div>
        </div>
    </div>
</nav>
<style>
    [x-cloak] { display: none !important; }
</style>