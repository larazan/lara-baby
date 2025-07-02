@extends('frontend.layout')

@section('content')

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
                <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] figtree-bold lg:leading-[48px] font-bold text-gray-900" isnews="true"><!--[-->
                    <span>{{ $title }}</span><!--]-->
                </h2>
                <div class="flex flex-wrap items-center gap-2 mt-4">
                    <div class="border-white rounded-full border-3 text-[20px] leading-9 text-center w-11 h-11 left-11 -top-6 roundedShadow sm:block border-1.5 ">
                        <img src="{{ Avatar::create(ucwords($activity->user->name))->toBase64() }}" alt="{{ $activity->user->name }}" aria-hidden="true" class="rounded-full w-full border-2 border-white" />
                    </div>

                    <div class="flex md:flex-row flex-col items-center2">
                        <div class="flex justify-start text-right pr-1">
                            <span class="font-bold text-gray-800">
                                <p class="capitalize figtree-reguler">{{ $activity->user->name }}</p>
                            </span>
                        </div>
                        <div class="flex space-x-1 items-center figtree-reguler">
                            <span class="hidden md:block text-muted">|</span>
                            <span class="flex text-gray-600 text-sm">
                                @if( $activity->updated_at == null )
                                <span class="hidden md:block pr-1">Published on</span> {{ $activity->created_at->format('d M Y') }}
                                @else
                                <span class="hidden md:block pr-1">Updated on</span> {{ $activity->updated_at->format('d M Y') }}
                                @endif
                            </span>
                            <span class="text-muted">|</span>
                            <span class="text-gray-600 text-sm">
                                {{ $activity->readTime() }} min read
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-3 md:mt-6">
                <div>
                    <img onerror="this.setAttribute('data-error', 1)" width="994" height="480" alt="Kepala BMKG Tegaskan Komitmen STMKG Cetak SDM Unggul Berdaya Saing Global di Hadapan Komisi V DPR RI" loading="lazy" data-nuxt-img="" class="w-full h-[240px] md:h-[360px] lg:h-[480px] object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 2x">

                    <div class="flex justify-between items-center w-full mx-auto mt-0 pt-3 pb-8">
                        <div class="shadow-sm rounded-2xl">
                            <a href="" class="w-full justify-center no-underline figtree-medium inline-flex items-center px-4 py-1 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500" >
                                {{ $activity->category($activity->category_id) }}
                            </a>
                        </div>
                        <div class="flex justify-end items-end">
                            {!! $shareComponent !!}
                        </div>
                    </div>

                    <div class="news mt-0 md:mt-0 prose md:prose-md lg:prose-lg figtree-reguler text-[#334155] max-w-none hover:prose-a:text-blue-primary">
                        <p><strong>Tangerang, 12 Mei 2025</strong> – Sekolah Tinggi Meteorologi Klimatologi dan Geofisika (STMKG) menerima kunjungan kerja spesifik Komisi V DPR RI pada Jumat (9/5). Kunjungan ini menjadi momentum penting untuk meninjau langsung kesiapan STMKG dalam mencetak sumber daya manusia (SDM) unggul dan berdaya saing global di bidang meteorologi, klimatologi, dan geofisika (MKG).</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4 mt-5">
                    <div>
                        <h4 class="text-black text-lg md:text-2xl font-semibold figtree-medium">Materials You’ll Need</h4>
                    </div>
                    <ul class="list-disc pl-4 text-black">
                        @foreach($materials as $m)
                        <li class="figtree-reguler">{{ $m->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex flex-col gap-4 mt-5">
                    <div>
                        <h4 class="text-black text-lg md:text-2xl font-semibold figtree-medium">How to Make</h4>
                    </div>
                    <div>
                        @php
                        $i = 1
                        @endphp
                        @foreach($steps as $s)
                        <article class="flex flex-col gap-1 px-0 py-4">
                            <div class="flex items-center space-x-2 text-black text-xl font-medium">
                                <div class="h-4 w-4 px-1 py-1 rounded-full border bg-orange-400"></div>
                                <span class="figtree-medium">Step {{ $i++ }}</span>
                            </div>
                            <div></div>
                            <div class="flex flex-col gap-1 pl-6">
                                <div class="text-black font-semibold figtree-medium">{{ $s->title }}</div>
                                <div class="prose md:prose-md lg:prose-lg text-[#334155] max-w-none hover:prose-a:text-blue-primary figtree-reguler">{{ $s->description }}</div>
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
    </div>
</main>

@endsection

@push('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<style>
    div#social-links {
            /* background-color: #ccc; */
            display: flex;
            /* margin: 0 auto; */
            min-width: 230px;
        }

        div#social-links ul li {
            display: inline-block;
            margin: 1.5px;
        }

        div#social-links ul li a {
            border-radius: 10%;
            padding: 6px 7px;
            /* border: 1px solid #ccc; */
            margin: 1px;
            font-size: 20px;
            color: #fff;
            background-color: #dbeafe;
        }

        /* facebook */
        div#social-links ul li:nth-child(1) a {
            background-color: #2d65b0;
        }

        /* twitter */
        div#social-links ul li:nth-child(2) a {
            background-color: #35bced;
        }

        /* linkedin */
        div#social-links ul li:nth-child(3) a {
            background-color: #0675a5;
        }

        /* telegram */
        div#social-links ul li:nth-child(4) a {
            background-color: #3dba92;
        }

        /* whatsapp */
        div#social-links ul li:nth-child(5) a {
            background-color: #128c7d;
        }

        /* reddit */
        div#social-links ul li:nth-child(6) a {
            background-color: #ff4a0d;
        }
</style>

@endpush