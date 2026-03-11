{{-- Welcome Popup Component --}}
{{-- Muncul otomatis saat pengguna mengakses website --}}
<div 
    x-data="{ 
        showPopup: false,
        init() {
            // Cek apakah popup sudah pernah ditampilkan
            if (!localStorage.getItem('welcomePopupClosed')) {
                this.showPopup = true;
            }
        },
        closePopup() {
            this.showPopup = false;
            // Simpan ke localStorage agar tidak muncul lagi
            localStorage.setItem('welcomePopupClosed', 'true');
        }
    }" 
    x-show="showPopup" 
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center p-4"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    {{-- Overlay Background --}}
    <div 
        class="absolute inset-0 bg-black/30 backdrop-blur-sm"
        @click="closePopup()"
    ></div>
    
    {{-- Popup Content --}}
    <div 
        class="relative bg-white rounded-2xl shadow-2xl w-full max-w-4xl overflow-hidden"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        @click.stop
    >
        {{-- Close Button --}}
        <button 
            @click="closePopup()"
            class="absolute top-4 right-4 z-10 w-10 h-10 flex items-center justify-center rounded-full bg-white/90 hover:bg-white text-gray-600 hover:text-gray-900 shadow-lg transition-all duration-200 hover:scale-110"
            aria-label="Tutup popup"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        {{-- Image Section --}}
        <div class="relative h-120 sm:h-140 overflow-hidden">
            <img 
                src="{{ $image ?? '/images/maklumatppid.png' }}" 
                alt="{{ $imageAlt ?? 'Selamat Datang' }}"
                class="w-full h-full object-cover"
            >
            {{-- Gradient Overlay --}}
            <div class="absolute inset-0 bg-linear-to-t from-black/40 to-transparent"></div>
        </div>
        
        {{-- Content Section --}}
        <!-- <div class="p-6 sm:p-8">
            {{-- Header --}}
            <h2 class="text-2xl sm:text-3xl font-bold text-primary mb-3">
                {{ $title ?? 'Selamat Datang di PPID' }}
            </h2>
            
            {{-- Description (optional) --}}
            @if(isset($description))
                <p class="text-gray-600 mb-6 leading-relaxed">
                    {{ $description }}
                </p>
            @else
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Portal Pejabat Pengelola Informasi dan Dokumentasi menyediakan akses informasi publik secara transparan dan akuntabel.
                </p>
            @endif
            
            {{-- Action Button (optional) --}}
            @if(isset($showButton) && $showButton)
                <button 
                    @click="showPopup = false"
                    class="w-full sm:w-auto px-8 py-3 bg-primary hover:bg-primary/90 text-white font-semibold rounded-xl transition-all duration-200 hover:shadow-lg"
                >
                    {{ $buttonText ?? 'Mulai Jelajahi' }}
                </button>
            @endif
        </div> -->
    </div>
</div>
<style>
    [x-cloak] { display: none !important; }
</style>