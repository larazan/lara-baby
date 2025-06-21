@extends('frontend.layout')

@section('content')

@dump($activities)


<main class="overflow-hidden pt-0"><!--[--><!--[-->
    <div class="bg-white py-10 md:py-20">
        <div class="mx-auto max-w-[994px] px-6 lg:px-10 xl:px-0">
            <div>
                <div class="flex gap-2 mb-4">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center">
                            <li>
                                <div class="flex items-center">
                                    <a href="/" class="text-sm md:text-base md:leading-[25px] font-medium text-black-primary">Beranda</a>
                                </div>
                            </li>
                            <li class="flex items-center"><!--[-->
                                <div class="flex items-center w-[100px] sm:w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-4 w-4 stoke-2 flex-shrink-0 text-[#64748B] mx-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                    <a href="/berita" class="text-black-primary text-sm md:text-base md:leading-[25px] font-medium truncate" aria-current="page">
                                        <p class="break-keep whitespace-nowrap truncate">Berita</p>
                                    </a>
                                </div>
                                <div class="flex items-center w-[100px] sm:w-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-4 w-4 stoke-2 flex-shrink-0 text-[#64748B] mx-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                    </svg>
                                    <a href="/berita/utama" class="text-gray-primary text-sm md:text-base md:leading-[25px] font-medium truncate" aria-current="page">
                                        <p class="break-keep whitespace-nowrap truncate">Berita Utama</p>
                                    </a>
                                </div><!--]-->
                            </li>
                        </ol>
                    </nav>
                </div>
                <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] lg:leading-[48px] font-bold text-gray-900" isnews="true"><!--[-->
                    <span>{{ $title }}</span><!--]-->
                </h2>
                <div class="flex flex-wrap items-center gap-3 md:gap-6 mt-4">
                    <div class="flex items-center gap-2">
                        <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 text-gray-primary">
                                <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z" clip-rule="evenodd"></path>
                            </svg></div>
                        <p class="text-sm leading-[22px] font-bold text-gray-primary">12 Mei 2025</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 text-gray-primary">
                                <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z"></path>
                            </svg></div>
                        <p class="text-sm leading-[22px] font-bold text-gray-primary">Dwi Herlambang</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 text-gray-primary">
                                <path fill-rule="evenodd" d="M4.5 2A2.5 2.5 0 0 0 2 4.5v3.879a2.5 2.5 0 0 0 .732 1.767l7.5 7.5a2.5 2.5 0 0 0 3.536 0l3.878-3.878a2.5 2.5 0 0 0 0-3.536l-7.5-7.5A2.5 2.5 0 0 0 8.38 2H4.5ZM5 6a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd"></path>
                            </svg></div>
                        <p class="text-sm leading-[22px] font-bold text-gray-primary">Siaran Pers</p>
                    </div>
                </div>
            </div>
            <div class="mt-6 md:mt-12">
                <div>
                    <img onerror="this.setAttribute('data-error', 1)" width="994" height="480" alt="Kepala BMKG Tegaskan Komitmen STMKG Cetak SDM Unggul Berdaya Saing Global di Hadapan Komisi V DPR RI" loading="lazy" data-nuxt-img="" class="w-full h-[240px] md:h-[360px] lg:h-[480px] object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 2x">
                    <div class="news mt-6 md:mt-12 prose md:prose-md lg:prose-lg text-[#334155] max-w-none hover:prose-a:text-blue-primary">
                        <p><strong>SIARAN PERS</strong></p>
                        <p><strong>Tangerang, 12 Mei 2025</strong> – Sekolah Tinggi Meteorologi Klimatologi dan Geofisika (STMKG) menerima kunjungan kerja spesifik Komisi V DPR RI pada Jumat (9/5). Kunjungan ini menjadi momentum penting untuk meninjau langsung kesiapan STMKG dalam mencetak sumber daya manusia (SDM) unggul dan berdaya saing global di bidang meteorologi, klimatologi, dan geofisika (MKG).</p>
                        <p>Kepala Badan Meteorologi Klimatologi dan Geofisika (BMKG), Dwikorita Karnawati dalam sambutannya menyampaikan apresiasi atas kehadiran 11 anggota Komisi V DPR RI yang dipimpin oleh&nbsp; Ketua Komisi, Lasarus. Dalam kesempatan tersebut, Dwikorita memaparkan sejarah, visi, dan capaian strategis STMKG sebagai lembaga pendidikan tinggi yang vital bagi pengembangan keilmuan dan layanan MKG di Indonesia.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4 mt-5">
                    <div>
                        <h4 class="text-black text-lg md:text-2xl font-semibold">Materials You’ll Need</h4>
                    </div>
                    <ul class="list-disc pl-4 text-black">
                        @foreach($materials as $m)
                            <li class="">{{ $m->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex flex-col gap-4 mt-5">
                    <div>
                        <h4 class="text-black text-lg md:text-2xl font-semibold">How to Make</h4>
                    </div>
                    <div>
                        @php
                            $i = 1
                        @endphp
                        @foreach($steps as $s)
                            <article class="flex flex-col gap-1 px-0 py-4">
                                <div class="flex items-center space-x-2 text-black text-xl font-medium">
                                    <div class="h-4 w-4 px-1 py-1 rounded-full border bg-orange-400"></div>
                                    <span>Step {{ $i++ }}</span>
                                </div>
                                <div></div>
                                <div class="flex flex-col gap-1 pl-6">
                                    <div class="text-black font-semibold">{{ $s->title }}</div>
                                    <div class="prose md:prose-md lg:prose-lg text-[#334155] max-w-none hover:prose-a:text-blue-primary">{{ $s->description }}</div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#F8FAFC] py-10 md:py-20">
        <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
            <div class="flex justify-between">
                <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] lg:leading-[48px] font-bold text-gray-900">Related Article</h2>
                <a href="/siaran-pers" class="text-blue-primary inline-flex items-center justify-center rounded-lg text-sm lg:text-base leading-[25px] font-bold hover:underline underline-offset-8">
                    <span class="hidden sm:inline-flex">Lihat Semuanya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 lg:w-5 lg:h-5 stroke-2 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                    </svg>
                </a>
            </div>
            <div class="mt-6 md:mt-8 grid grid-cols-1 gap-6 lg:gap-8 md:grid-cols-3"><!--[-->
                <article class="relative flex flex-col items-start justify-between w-full h-full bg-white p-4 rounded-2xl border border-[#CBD5E1] hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.12)]">
                    <a href="/siaran-pers/bmkg-apresiasi-inisiatif-ugm-dan-telkom-untuk-perkuat-sistem-peringatan-dini-tsunami-nasional" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                    <div class="w-full mb-4">
                        <div class="relative aspect-[16/9] w-full h-[166px] xl:h-[216px] rounded-xl bg-gray-100 overflow-hidden"><img onerror="this.setAttribute('data-error', 1)" width="345" height="216" alt="BMKG Apresiasi Inisiatif UGM dan Telkom, untuk Perkuat Sistem Peringatan Dini Tsunami Nasional" loading="lazy" data-nuxt-img="" class="w-full h-full object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0053.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0053.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0053.jpg?fit=1280%2C853&amp;ssl=1 2x"></div>
                    </div>
                    <div class="flex flex-col justify-between w-full h-full">
                        <div>
                            <time class="text-sm leading-[22px] text-gray-primary font-bold flex items-center">30 Mei 2025</time>
                            <h2 class="mt-2 text-base leading-[25px] md:text-lg md:leading-[27px] xl:text-2xl font-bold text-black-primary">BMKG Apresiasi Inisiatif UGM dan Telkom, untuk Perkuat Sistem Peringatan Dini Tsunami Nasional</h2>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-sm lg:text-base font-bold leading-6 text-blue-primary flex gap-2 items-center !text-base !leading-[25px]">Baca selengkapnya 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 stroke-2">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
                
            </div>
        </div>
    </div><!--]--><!--]-->
</main>

@endsection