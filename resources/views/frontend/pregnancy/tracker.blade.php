@extends('frontend.layout')

@section('content')

<main class="overflow-hidden pt-0"><!--[-->
    <div class="relative">
        <div class="relative">
            <div class="w-full h-full absolute bg-[#fff0d9]"></div>
            <div class="py-6 md:py-20 relative">
                <div class="mx-auto max-w-lg px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">
                        
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900 figtree-bold">{{ $cat_title }}</h1>
                        </div>
                        <div>
                            <p class=" md: md:leading-[25px] text-gray-800 text-center max-w-[905px] figtree-reguler">{!! $cat_desc !!}</p>
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

                        <div class="container mx-auto py-4" x-data="{ tab: '{{ $trimester }}' }">
                            <ul class="flex justify-between w-full mt-0">
                                <li class="flex justify-center w-1/2 text-center  ">
                                    <a
                                        class="flex w-full bg-blue-200 py-2 justify-center items-center md:text-lg text-blue-500 font-semibold border-2 border-white hover:border-blue-400 figtree-medium" 
                                        href="{{ url('/pregnancy/tracker/first-trimester') }}"
                                        :class="{ '!border-pink-400 bg-pink-200 text-pink-500': tab == 'first-trimester'}"
                                        {{-- @click.prevent="tab = 'first-trimester'" --}}
                                    >
                                        1st Trimester
                                    </a>
                                </li>
                                <li class="flex justify-center w-1/2 text-center ">
                                    <a
                                        class="flex w-full bg-blue-200 py-2 justify-center items-center md:text-lg text-blue-500 font-semibold border-2 border-white hover:border-blue-400 figtree-medium"
                                        href="{{ url('/pregnancy/tracker/second-trimester') }}"
                                        :class="{ '!border-pink-400 bg-pink-200 text-pink-500': tab == 'second-trimester'}"
                                        {{-- @click.prevent="tab = 'second-trimester'" --}}
                                    >
                                        2nd Trimester
                                    </a>
                                </li>
                                <li class="flex justify-center w-1/2 text-center ">
                                    <a
                                        class="flex w-full bg-blue-200 py-2 justify-center items-center md:text-lg text-blue-500 font-semibold border-2 border-white hover:border-blue-400 figtree-medium"
                                        href="{{ url('/pregnancy/tracker/third-trimester') }}"
                                        :class="{ '!border-pink-400 bg-pink-200 text-pink-500': tab == 'third-trimester'}"
                                        {{-- @click.prevent="tab = 'third-trimester'" --}}
                                    >
                                        3rd Trimester
                                    </a>
                                </li>
                            </ul>
                            <div class="content  md:px-4 py-4  pt-4">
                                <div x-show="tab == 'first-trimester'">
                                    <div class="w-full mt-4 lg:col-span-2 px-4">
                                        <div class="flex flex-col space-y-2 gap-3">
                                            <div class="flex flex-col text-center justify-center mx-auto max-w-md">
                                                <h3 class="text-gray-800 font-semibold text-lg figtree-bold">First trimester weeks</h3>
                                                <span class="text-gray-700 font-light figtree-reguler">Congrats! During the first trimester, you’re getting used to the idea of being pregnant.</span>
                                            </div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                                @foreach($first as $f)
                                                <div class="relative flex flex-col rounded-md bg-[#9ae3ca] border-2 border-gray-800 px-4 py-2 shadow-menu transition hover:scale-105">
                                                    <a href="{{ url('pregnancy/tracker/first-trimester/week-'.$f) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#1a4c78] text-2xl font-bold figtree-bold">{{ $f }}</span>
                                                        <span class="text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="leading-tight">
                                                        <span class="md:text-lg text-black font-semibold md:font-bold figtree-reguler">weeks <br/>pregnant</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div x-show="tab == 'second-trimester'">
                                    <div class="w-full mt-4 lg:col-span-2 px-4">
                                        <div class="flex flex-col space-y-2 gap-3">
                                            <div class="flex flex-col text-center justify-center mx-auto max-w-md">
                                                <h3 class="text-gray-800 font-semibold text-lg figtree-bold">Second trimester weeks</h3>
                                                <span class="text-gray-700 font-light figtree-reguler">As you enter this second trimester, your body will settle down to pregnancy.</span>
                                            </div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                                @foreach($second as $f)
                                                <div class="relative flex flex-col rounded-md bg-[#9ae3ca] border-2 border-gray-800 px-4 py-2 shadow-menu transition hover:scale-105">
                                                    <a href="{{ url('pregnancy/tracker/first-trimester/week-'.$f) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#1a4c78] text-2xl font-bold figtree-bold">{{ $f }}</span>
                                                        <span class="text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="leading-tight">
                                                        <span class="md:text-lg text-black font-semibold md:font-bold figtree-reguler">weeks <br/>pregnant</span>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div x-show="tab == 'third-trimester'">
                                    <div class="w-full mt-4 lg:col-span-2 px-4">
                                        <div class="flex flex-col space-y-2 gap-3">
                                            <div class="flex flex-col text-center justify-center mx-auto max-w-md">
                                                <h3 class="text-gray-800 font-semibold text-lg figtree-bold">Third trimester weeks</h3>
                                                <span class="text-gray-700 font-light figtree-reguler">You've reached the third and final trimester and will be heavily pregnant by now.</span>
                                            </div>
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                                @foreach($third as $f)
                                                <div class="relative flex flex-col rounded-md bg-[#9ae3ca] border-2 border-gray-800 px-4 py-2 shadow-menu transition hover:scale-105">
                                                    <a href="{{ url('pregnancy/tracker/first-trimester/week-'.$f) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                                                    <div class="flex justify-between items-center">
                                                        <span class="text-[#1a4c78] text-2xl font-bold figtree-bold">{{ $f }}</span>
                                                        <span class="text-black">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="leading-tight">
                                                        <span class="md:text-lg text-black font-semibold md:font-bold figtree-reguler">weeks <br/>pregnant</span>
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
                            <div class="flex bg-white border-2 p-2 border-sky-500 rounded-md w-full h-full object-cover">
                                @php
                                $arr = explode("-", $article->slug)
                                @endphp
                                <div class="flex">
                                    <span class="text-gray-700 text-xs font-semibold leading-tight figtree-reguler">{{ $arr[1] }} weeks</span>
                                </div>
                                <div class="flex flex-end items-end">
                                    <img src="{{ asset('frontend/pregnant/week_'.$arr[1].'.svg') }}"  class="h-12 w-12 ">
                                </div>
                            </div>
                        </a>
                        <div class="item-detail flex flex-col items-start gap-1">
                            <a href="{{ url('pregnancy/tracker/'.$article->categorySlug($article->category_id)) }}" class="flex px-3 py-1 bg-sky-600 text-white text-xs rounded-full w-fit font-medium">
                                <span class="figtree-reguler">{{ $article->category($article->category_id) }}</span> 
                            </a>
                            <h1 class="item-title font-bold text-[15px]  md:text-md line-clamp-3 text-gray-800">
                                <a href="{{ url('pregnancy/tracker/'.$article->categorySlug($article->category_id).'/'.$article->slug) }}" >{{ $article->title }}</a>
                            </h1>
                            <p class="item-description hidden figtree-reguler">{{ $article->title }}</p>
                            <time datetime="2025-05-30 16:29:00" class="item-date text-xs text-zinc-500 figtree-reguler">30 Mei 2025 16:29</time>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
            </div>

        </div>
    </div><!--]-->
</main>

@endsection