@extends('frontend.layout')

@section('content')

<main class="overflow-hidden pt-[20px]"><!--[-->
    <div class="relative">
        <div class="relative">
            <div class="w-full h-full absolute bg-[#fff0d9]"></div>
            <div class="py-12 md:py-20 relative">
                <div class="mx-auto max-w-lg px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol role="list" class="flex items-center">
                                <li>
                                    <div class="flex items-center"><a href="/" class="text-[15px]  md:text-md md:text-base md:leading-[25px] font-medium text-black-primary">Beranda</a></div>
                                </li>
                                <li class="flex items-center"><!--[-->
                                    <div class="flex items-center w-[100px] sm:w-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-4 w-4 stoke-2 flex-shrink-0 text-[#64748B] mx-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg><a href="/berita" class="text-black-primary text-[15px]  md:text-md md:text-base md:leading-[25px] font-medium truncate" aria-current="page">
                                            <p class="break-keep whitespace-nowrap truncate">Berita</p>
                                        </a></div>
                                    <div class="flex items-center w-[100px] sm:w-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-4 w-4 stoke-2 flex-shrink-0 text-[#64748B] mx-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg><a href="/berita/utama" class="text-gray-primary text-[15px]  md:text-md md:text-base md:leading-[25px] font-medium truncate" aria-current="page">
                                            <p class="break-keep whitespace-nowrap truncate">Berita Utama</p>
                                        </a></div><!--]-->
                                </li>
                            </ol>
                        </nav>
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900">Pregnancy Tracker: Day by Day</h1>
                        </div>
                        <div>
                            <p class=" md: md:leading-[25px] text-gray-800 text-center max-w-[905px]">Get a daily look at how your baby is growing and find timely guidance for every week and trimester of your pregnancy.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 pb-10 md:pb-20">

            <!-- tracker calendar -->
            <div class="w-full">
                <div class=" w-full max-w-2xl mx-auto">
                    <div class="relative flex flex-col w-full md:px-8 py-6 bg-white">

                        <div class="container mx-auto py-4" x-data="{ tab: 'tab1' }">
                            <ul class="flex justify-between w-full border-b-2 mt-0">
                                <li class="flex justify-center w-1/2 text-center  ">
                                    <a
                                        class="flex w-full justify-center items-center text-lg text-blue-700 font-semibold hover:text-blue-800 hover:border-b-2 hover:border-blue-700" href="#"
                                        :class="{ 'text-blue-700 border-b-2 border-blue-700': tab == 'tab1'}"
                                        @click.prevent="tab = 'tab1'">1st trimester</a>
                                </li>
                                <li class="flex justify-center w-1/2 text-center ">
                                    <a
                                        class="flex w-full justify-center items-center text-lg text-blue-700 font-semibold hover:text-blue-800 hover:border-b-2 hover:border-blue-700"
                                        href="#"
                                        :class="{ 'text-blue-700 border-b-2 border-blue-700': tab == 'tab2'}"
                                        @click.prevent="tab = 'tab2'">2nd trimester</a>
                                </li>
                                <li class="flex justify-center w-1/2 text-center ">
                                    <a
                                        class="flex w-full justify-center items-center text-lg text-blue-700 font-semibold hover:text-blue-800 hover:border-b-2 hover:border-blue-700"
                                        href="#"
                                        :class="{ 'text-blue-700 border-b-2 border-blue-700': tab == 'tab3'}"
                                        @click.prevent="tab = 'tab3'">3rd trimester</a>
                                </li>
                            </ul>
                            <div class="content md:px-4 py-4 pt-4">
                                <div x-show="tab == 'tab1'">
                                    <div class="w-full mt-4 lg:col-span-2 px-4">
                                        <div class="flex flex-col space-y-2 gap-3">
                                            <div class="flex flex-col text-center justify-center mx-auto max-w-md">
                                                <h3 class="text-gray-800 font-semibold text-lg">First trimester weeks</h3>
                                                <span class="text-gray-700 font-light">Congrats! During the first trimester, you’re getting used to the idea of being pregnant.</span>
                                            </div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                                @foreach($first as $f)
                                                <div class="relative flex flex-col rounded-md bg-blue-200 border px-4 py-4 shadow transition hover:scale-105">
                                                    <a href="{{ url('pregnancy/tracker/first-trimester/week-'.$f) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-blue-600 text-2xl font-bold ">{{ $f }}</span>
                                                        <span class="text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="text-lg text-black font-bold leading-3">weeks pregnants</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div x-show="tab == 'tab2'">
                                    <div class="w-full mt-4 lg:col-span-2 px-4">
                                        <div class="flex flex-col space-y-2 gap-3">
                                            <div class="flex flex-col text-center justify-center mx-auto max-w-md">
                                                <h3 class="text-gray-800 font-semibold text-lg">Second trimester weeks</h3>
                                                <span class="text-gray-700 font-light">As you enter this second trimester, your body will settle down to pregnancy.</span>
                                            </div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                                @foreach($second as $f)
                                                <div class="relative flex flex-col rounded-md bg-blue-200 border px-4 py-4 shadow transition hover:scale-105">
                                                    <a href="{{ url('pregnancy/tracker/second-trimester/week-'.$f) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-blue-600 text-2xl font-bold ">{{ $f }}</span>
                                                        <span class="text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="text-lg text-black font-bold leading-3">weeks pregnants</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div x-show="tab == 'tab3'">
                                    <div class="w-full mt-4 lg:col-span-2 px-4">
                                        <div class="flex flex-col space-y-2 gap-3">
                                            <div class="flex flex-col text-center justify-center mx-auto max-w-md">
                                                <h3 class="text-gray-800 font-semibold text-lg">Third trimester weeks</h3>
                                                <span class="text-gray-700 font-light">You've reached the third and final trimester and will be heavily pregnant by now.</span>
                                            </div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                                @foreach($third as $f)
                                                <div class="relative flex flex-col rounded-md bg-blue-200 border px-4 py-4 shadow transition hover:scale-105">
                                                    <a href="{{ url('pregnancy/tracker/third-trimester/week-'.$f) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-blue-600 text-2xl font-bold ">{{ $f }}</span>
                                                        <span class="text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div>
                                                        <span class="text-lg text-black font-bold leading-3">weeks pregnants</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--  -->

            <div class="flex mx-auto max-w-lg  w-full mb-8">
                <ul class="divide-y dark:divide-white/10 w-full">
                    @foreach($articles as $article)
                    <li class="item flex items-start gap-x-3 py-4 relative w-full" >
                        <a href="{{ url('pregnancy/tracker/'.$article->categorySlug($article->category_id).'/'.$article->slug) }}" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" aria-label="{{ $article->title }}" >
                            <img src="https://cdns.klimg.com/mav-prod-resized/1200x630/webp/newsCover/2025/5/30/1748597285535-46bst.jpeg" class="w-full h-full object-cover" width="100" height="100" >
                        </a>
                        <div class="item-detail flex flex-col items-start">
                            <a href="{{ url('pregnancy/tracker/'.$article->categorySlug($article->category_id)) }}" class="item-tag uppercase text-[14px] font-semibold  text-gray-600">
                            {{ $article->category($article->category_id) }} 
                            </a>
                            <h1 class="item-title font-bold text-[15px]  md:text-md line-clamp-3 text-gray-800">
                                <a href="{{ url('pregnancy/tracker/'.$article->categorySlug($article->category_id).'/'.$article->slug) }}" >{{ $article->title }}</a>
                            </h1>
                            <p class="item-description hidden">{{ $article->title }}</p>
                            <time datetime="2025-05-30 16:29:00" class="item-date text-xs text-zinc-500">30 Mei 2025 16:29</time>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
            </div>

        </div>
    </div><!--]-->
</main>

@endsection