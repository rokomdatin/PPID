@extends('layouts.app')
@section('title', 'Standar Pelayanan - PPID Kemenko PM')
@section('content')
<section class="bg-secondary text-primary py-12">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl md:text-4xl font-bold mb-2">Standar Pelayanan Informasi Publik</h1>
        <p class="text-primary text-lg">Kementerian Koordinator Bidang Pemberdayaan Masyarakat</p>
    </div>
</section>
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div x-data="{ activeTab: 'maklumatpelayanan' }" class="flex flex-col lg:flex-row gap-8">
            
            <div class="lg:w-1/3">
                <div class="bg-white rounded-2xl shadow-sm overflow-hidden top-24">
                    <div class="bg-primary text-white px-6 py-4">
                        <h3 class="font-semibold text-lg">Menu Pelayanan PPID</h3>
                    </div>
                    <div class="flex flex-col">
                        <!-- <button 
                            @click="activeTab = 'standarlayanan'"
                            :class="activeTab === 'standarlayanan' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                                Standar Layanan
                            </span>
                        </button> -->
                        <button 
                            @click="activeTab = 'maklumatpelayanan'"
                            :class="activeTab === 'maklumatpelayanan' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                                Maklumat Pelayanan
                            </span>
                        </button>
                        <button 
                            @click="activeTab = 'biayawaktupelayanan'"
                            :class="activeTab === 'biayawaktupelayanan' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Biaya dan Waktu Pelayanan
                            </span>
                        </button>
                        <button 
                            @click="activeTab = 'mekanismepelayanan'"
                            :class="activeTab === 'mekanismepelayanan' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                </svg>
                                Mekanisme Pelayanan
                            </span>
                        </button>
                        <button 
                            @click="activeTab = 'standaroperasional'"
                            :class="activeTab === 'standaroperasional' ? 'bg-secondary text-primary font-semibold border-l-4 border-primary' : 'text-gray-700 hover:bg-gray-50'"
                            class="px-4 py-3 text-left transition-all duration-200">
                            <span class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Standar Operasional Pelayanan
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="lg:w-2/3">
                
                <!-- <div x-show="activeTab === 'standarlayanan'" x-cloak>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="bg-primary text-white px-6 py-4">
                            <h2 class="text-xl font-semibold">Standar Layanan</h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <p class="text-gray-600 leading-relaxed">
                                Pejabat Pengelola Informasi dan Dokumentasi (PPID) adalah pejabat yang bertanggung jawab di bidang penyimpanan, pendokumentasian, penyediaan, dan/atau pelayanan informasi di badan publik.
                            </p>
                            <p class="text-gray-600 leading-relaxed">
                                PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat bertugas mengelola informasi publik sesuai dengan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.
                            </p>
                            
                            <div class="mt-6">
                                <h3 class="text-lg font-semibold text-gray-900 mb-3">Dasar Hukum</h3>
                                <ul class="space-y-2">
                                    <li class="flex items-start gap-2 text-gray-600">
                                        <span class="text-primary mt-1">•</span>
                                        UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik
                                    </li>
                                    <li class="flex items-start gap-2 text-gray-600">
                                        <span class="text-primary mt-1">•</span>
                                        PP No. 61 Tahun 2010 tentang Pelaksanaan UU KIP
                                    </li>
                                    <li class="flex items-start gap-2 text-gray-600">
                                        <span class="text-primary mt-1">•</span>
                                        Peraturan Komisi Informasi No. 1 Tahun 2010
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div x-show="activeTab === 'maklumatpelayanan'" x-cloak>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="bg-primary text-white px-6 py-4">
                            <h2 class="text-xl font-semibold">Maklumat Pelayanan</h2>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="p-6 space-y-4">
                                <div class="mt-4 rounded-xl overflow-hidden border border-gray-200 shadow-2xl">
                                    <img src="/images/maklumat-ppid-desktop.jpg" alt="Maklumat PPID Kemenko PM" class="w-full h-auto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab === 'biayawaktupelayanan'" x-cloak>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="bg-primary text-white px-6 py-4">
                            <h2 class="text-xl font-semibold">Biaya dan Waktu Pelayanan</h2>
                        </div>
                        <div class="p-6 space-y-6">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Biaya Pelayanan</h3>
                                <div class="bg-green-50 border border-green-200 rounded-xl p-5">
                                    <div class="flex items-center gap-3 mb-3">
                                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xl font-bold text-green-700">GRATIS</p>
                                            <p class="text-green-600 text-sm">Tidak dipungut biaya apapun</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm">
                                        Pelayanan informasi publik di PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat tidak dipungut biaya (gratis), kecuali untuk penggandaan dokumen yang menjadi beban pemohon.
                                    </p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Waktu Pelayanan</h3>
                                <div class="overflow-x-auto">
                                    <table class="w-full border-collapse">
                                        <thead>
                                            <tr class="bg-primary text-white">
                                                <th class="px-4 py-3 text-left rounded-tl-lg">Hari</th>
                                                <th class="px-4 py-3 text-left">Jam Operasional</th>
                                                <th class="px-4 py-3 text-left rounded-tr-lg">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            <tr class="bg-white hover:bg-gray-50">
                                                <td class="px-4 py-3 font-medium text-gray-900">Senin - Kamis</td>
                                                <td class="px-4 py-3 text-gray-600">08.00 - 16.00 WIB</td>
                                                <td class="px-4 py-3 text-gray-600">Istirahat: 12.00 - 13.00 WIB</td>
                                            </tr>
                                            <tr class="bg-gray-50 hover:bg-gray-100">
                                                <td class="px-4 py-3 font-medium text-gray-900">Jumat</td>
                                                <td class="px-4 py-3 text-gray-600">08.00 - 16.30 WIB</td>
                                                <td class="px-4 py-3 text-gray-600">Istirahat: 11.30 - 13.00 WIB</td>
                                            </tr>
                                            <tr class="bg-white hover:bg-gray-50">
                                                <td class="px-4 py-3 font-medium text-gray-900">Sabtu - Minggu</td>
                                                <td class="px-4 py-3 text-gray-600">-</td>
                                                <td class="px-4 py-3 text-red-600 font-medium">Libur</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-4">Waktu Penyelesaian Permohonan</h3>
                                <div class="grid gap-4 md:grid-cols-2">
                                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <p class="font-semibold text-blue-800">Informasi Berkala</p>
                                        </div>
                                        <p class="text-blue-700 text-2xl font-bold">10 Hari Kerja</p>
                                        <p class="text-gray-600 text-sm mt-1">Sejak permohonan diterima</p>
                                    </div>
                                    <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <p class="font-semibold text-purple-800">Informasi Serta Merta</p>
                                        </div>
                                        <p class="text-purple-700 text-2xl font-bold">Segera</p>
                                        <p class="text-gray-600 text-sm mt-1">Tanpa menunggu permohonan</p>
                                    </div>
                                    <div class="bg-orange-50 border border-orange-200 rounded-xl p-4">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <p class="font-semibold text-orange-800">Informasi Setiap Saat</p>
                                        </div>
                                        <p class="text-orange-700 text-2xl font-bold">10 Hari Kerja</p>
                                        <p class="text-gray-600 text-sm mt-1">Dapat diperpanjang 7 hari</p>
                                    </div>
                                    <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                                        <div class="flex items-center gap-3 mb-2">
                                            <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                            </div>
                                            <p class="font-semibold text-red-800">Informasi Dikecualikan</p>
                                        </div>
                                        <p class="text-red-700 text-2xl font-bold">17 Hari Kerja</p>
                                        <p class="text-gray-600 text-sm mt-1">Untuk uji konsekuensi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab === 'mekanismepelayanan'" x-cloak>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="bg-primary text-white px-6 py-4">
                            <h2 class="text-xl font-semibold">Mekanisme Pelayanan</h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <p class="text-gray-600 leading-relaxed">
                                Berikut adalah mekanisme pelayanan informasi publik di PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat:
                            </p>
                            {{-- Kontainer Gambar --}}
                            <div class="mt-4 rounded-xl overflow-hidden border border-gray-200">
                                <img src="/images/mekanisme-pelayanan.jpg" alt="Mekanisme Permohonan Informasi Publik" class="w-full h-auto">
                            </div>
                            <div class="mt-4 rounded-xl overflow-hidden border border-gray-200">
                                <img src="/images/mekanisme-pelayanan.jpg" alt="Mekanisme Penyalahgunaan Wewenang" class="w-full h-auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab === 'standaroperasional'" x-cloak>
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <div class="bg-primary text-white px-6 py-4">
                            <h2 class="text-xl font-semibold">Standar Operasional Pelayanan</h2>
                        </div>
                        <div class="p-6 space-y-4">
                            <p class="text-gray-600 leading-relaxed">
                                Berikut adalah Standar Operasional Pelayanan (SOP) PPID Kementerian Koordinator Bidang Pemberdayaan Masyarakat:
                            </p>
                            <div class="mt-4 rounded-xl overflow-hidden border border-gray-200">
                                <img src="/images/sop-ppid.jpg" alt="Standar Operasional Pelayanan PPID" class="w-full h-auto">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection