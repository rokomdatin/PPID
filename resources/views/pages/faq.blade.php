@extends('layouts.app')
@section('title', 'FAQ - PPID')
@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8 mb-8">
            <h1 class="text-3xl lg:text-4xl font-bold text-primary mb-4">
                Frequently Asked Questions (FAQ)
            </h1>
            <p class="text-gray-600 text-lg leading-relaxed max-w-4xl">
                Temukan jawaban atas pertanyaan yang sering diajukan seputar layanan informasi publik, 
                prosedur permohonan informasi, dan berbagai hal terkait Pejabat Pengelola Informasi dan Dokumentasi (PPID). 
                Jika pertanyaan Anda belum terjawab, silakan hubungi kami melalui halaman kontak.
            </p>
        </div>
        <div class="space-y-8">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-primary px-6 py-4">
                    <h2 class="text-xl font-bold text-white">
                        A. Pejabat Pengelola Informasi dan Dokumentasi
                    </h2>
                </div>
                <div class="p-6" x-data="{ openAccordion: null }">
                    
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 1 ? null : 1"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Apa itu PPID?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 1 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 1" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                PPID (Pejabat Pengelola Informasi dan Dokumentasi) adalah pejabat yang bertanggung jawab 
                                di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi di badan publik. 
                                PPID bertugas untuk memastikan keterbukaan informasi publik sesuai dengan Undang-Undang Nomor 14 Tahun 2008.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 2 ? null : 2"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Apa tugas dan fungsi PPID?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 2 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 2" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Tugas dan fungsi PPID meliputi: penyediaan, penyimpanan, pendokumentasian, dan pengamanan informasi; 
                                pelayanan informasi sesuai dengan aturan yang berlaku; pelayanan permohonan informasi publik; 
                                penetapan informasi yang dapat diakses publik; pengujian konsekuensi informasi yang dikecualikan; 
                                serta pengelolaan keberatan atas permohonan informasi.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 3 ? null : 3"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Siapa yang dapat menjadi PPID?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 3 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 3" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                PPID adalah pejabat yang ditunjuk oleh pimpinan badan publik untuk mengelola informasi dan dokumentasi. 
                                Biasanya, PPID dijabat oleh pejabat struktural yang membidangi informasi publik, 
                                kehumasan, atau bidang terkait lainnya dalam suatu instansi atau lembaga.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-primary px-6 py-4">
                    <h2 class="text-xl font-bold text-white">
                        B. Permohonan Informasi Publik
                    </h2>
                </div>
                <div class="p-6" x-data="{ openAccordion: null }">

                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 1 ? null : 1"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Bagaimana cara mengajukan permohonan informasi?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 1 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 1" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Permohonan informasi dapat diajukan melalui beberapa cara: 
                                (1) Datang langsung ke kantor PPID dengan membawa identitas diri; 
                                (2) Mengisi formulir permohonan informasi secara online melalui website PPID; 
                                (3) Mengirimkan surat permohonan melalui email atau pos ke alamat PPID. 
                                Pemohon wajib menyertakan identitas diri dan menjelaskan informasi yang diminta dengan jelas.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 2 ? null : 2"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Berapa lama waktu penyelesaian permohonan informasi?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 2 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 2" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Sesuai dengan UU Keterbukaan Informasi Publik, PPID wajib memberikan tanggapan atas permohonan informasi 
                                paling lambat 10 (sepuluh) hari kerja sejak permohonan diterima. Jangka waktu tersebut dapat diperpanjang 
                                paling lama 7 (tujuh) hari kerja dengan pemberitahuan tertulis beserta alasannya.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 3 ? null : 3"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Apakah ada biaya untuk mengajukan permohonan informasi?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 3 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 3" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Pengajuan permohonan informasi pada dasarnya tidak dipungut biaya. Namun, pemohon dapat dikenakan biaya 
                                untuk penggandaan atau pengiriman dokumen sesuai dengan standar biaya yang berlaku. Biaya tersebut 
                                ditetapkan berdasarkan peraturan yang berlaku dan diinformasikan kepada pemohon sebelumnya.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 4 ? null : 4"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Dokumen apa saja yang diperlukan untuk mengajukan permohonan?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 4 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 4" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Dokumen yang diperlukan meliputi: (1) Fotokopi KTP atau identitas diri yang masih berlaku; 
                                (2) Formulir permohonan informasi yang telah diisi lengkap; 
                                (3) Surat kuasa jika permohonan diwakilkan kepada orang lain; 
                                (4) Dokumen pendukung lainnya sesuai kebutuhan permohonan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-primary px-6 py-4">
                    <h2 class="text-xl font-bold text-white">
                        C. Jenis Informasi Publik
                    </h2>
                </div>
                <div class="p-6" x-data="{ openAccordion: null }">
                    
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 1 ? null : 1"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Apa saja jenis informasi yang dapat diakses publik?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 1 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 1" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Informasi publik yang dapat diakses terbagi menjadi: 
                                (1) Informasi yang wajib disediakan dan diumumkan secara berkala; 
                                (2) Informasi yang wajib diumumkan serta merta; 
                                (3) Informasi yang wajib tersedia setiap saat; 
                                (4) Informasi yang dikecualikan sesuai dengan peraturan perundang-undangan.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 2 ? null : 2"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Apa itu informasi yang dikecualikan?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 2 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 2" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Informasi yang dikecualikan adalah informasi yang tidak dapat diberikan kepada publik karena 
                                dapat menghambat proses penegakan hukum, mengganggu kepentingan perlindungan hak atas kekayaan intelektual, 
                                membahayakan pertahanan dan keamanan negara, mengungkapkan kekayaan alam Indonesia, 
                                merugikan ketahanan ekonomi nasional, merugikan kepentingan hubungan luar negeri, 
                                atau melanggar privasi seseorang.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 3 ? null : 3"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Bagaimana jika permohonan informasi saya ditolak?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 3 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 3" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Jika permohonan informasi ditolak, pemohon berhak mengajukan keberatan kepada atasan PPID 
                                dalam jangka waktu 30 hari kerja sejak diterimanya penolakan. Jika keberatan tidak mendapat tanggapan 
                                atau ditolak, pemohon dapat mengajukan sengketa informasi ke Komisi Informasi Pusat dalam jangka waktu 
                                14 hari kerja sejak diterimanya tanggapan atas keberatan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="bg-primary px-6 py-4">
                    <h2 class="text-xl font-bold text-white">
                        D. Pengaduan dan Keberatan
                    </h2>
                </div>
                <div class="p-6" x-data="{ openAccordion: null }">
                    
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 1 ? null : 1"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Bagaimana cara mengajukan keberatan?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 1 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 1" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Keberatan dapat diajukan dengan mengisi formulir keberatan yang tersedia di kantor PPID atau website PPID. 
                                Formulir harus dilengkapi dengan alasan keberatan, identitas pemohon, dan dokumen pendukung terkait. 
                                Keberatan akan diproses dan ditanggapi dalam jangka waktu 30 hari kerja oleh atasan PPID.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 2 ? null : 2"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Apa itu Komisi Informasi?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 2 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 2" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Komisi Informasi adalah lembaga mandiri yang berfungsi menjalankan Undang-Undang Keterbukaan Informasi Publik 
                                dan peraturan pelaksanaannya. Komisi Informasi bertugas menerima, memeriksa, dan memutus permohonan 
                                penyelesaian sengketa informasi publik melalui mediasi dan/atau ajudikasi nonlitigasi.
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-200 last:border-b-0">
                        <button 
                            @click="openAccordion = openAccordion === 3 ? null : 3"
                            class="w-full flex items-center justify-between py-4 text-left hover:text-primary transition-colors"
                        >
                            <span class="font-medium text-gray-800">Bagaimana cara menghubungi PPID untuk pengaduan?</span>
                            <svg 
                                class="w-5 h-5 text-primary transition-transform duration-200"
                                :class="{ 'rotate-180': openAccordion === 3 }"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div 
                            x-show="openAccordion === 3" 
                            x-collapse
                            x-cloak
                        >
                            <div class="pb-4 text-gray-600 leading-relaxed">
                                Anda dapat menghubungi PPID untuk pengaduan melalui beberapa cara: 
                                (1) Datang langsung ke kantor PPID pada jam kerja; 
                                (2) Mengirim email ke alamat resmi PPID;
                                (3) Mengisi formulir pengaduan online melalui website PPID. 
                                Pastikan untuk menyertakan identitas dan bukti pendukung pengaduan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 bg-secondary rounded-xl p-8 text-center">
            <h3 class="text-2xl font-bold text-primary mb-3">Masih ada pertanyaan?</h3>
            <p class="text-gray-700 mb-6 max-w-2xl mx-auto">
                Jika Anda tidak menemukan jawaban yang dicari, jangan ragu untuk menghubungi kami. <br>Tim PPID siap membantu Anda.
            </p>
            <a href="/kontak" class="btn-primary">
                Hubungi Kami
            </a>
        </div>
    </div>
</div>
@endsection