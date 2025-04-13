@extends('frontend.layout')


@section('content')

@include('frontend.components._filter')

<main class="flex bg-white min-h-screen pt-16 md:pt-[60px] max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="w-full flex-grow max-w-6xl sm:mx-auto p-2 px-2 sm:py-8 space-y-8">
        <div class="w-full sm:grid sm:grid-cols-5">
            <div class="w-full flex flex-col col-span-5 space-y-4">
                <div class="flex flex-row justify-between">
                    <div class="flex flex-row items-end space-x-1">
                        <span class="pally-bold text-lg md:text-2xl">Browse</span>
                        @if($topic != null)
                        <div class="flex items-center space-x-1">
                            <span class="pally-medium text-sm md:text-normal tracking-tight">with topic: </span>
                            <div class="mr-2 mt-1 mb-1 py-1 px-3 text-sm bg-white border border-slate-300 rounded-xs flex items-center text-slate-900 gap-x-1 hover:bg-slate-200 transition cursor-pointer">
                                <div class="truncate tracking-wide text-xs font-semibold capitalize">{{ $topic }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <button @click="filterOpen = true" class="flex md:hidden justify-between shadow text-slate-800 hover:text-blue-600 text-sm bg-white hover:bg-slate-100 border border-slate-300  rounded-md font-medium px-3 py-2 space-x-1 md:space-x-2 items-center">
                        <span class="inline-block font-semibold">Filter</span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="w-full h-full flex sm:grid sm:grid-cols-5 sm:space-x-4">
                    <form action="{{ route('categories') }}" method="GET" class="hidden md:block">
                        @csrf
                        <div class="flex justify-start items-center flex-col gap-4 border border-gray-300 rounded py-4 shadow-sm">
                            <div class="w-full bg-white space-y-0">
                                <div class="px-4 py-2">
                                    <h3 class="font-medium text-gray-900 pb-3">Category</h3>
                                    <div class="">
                                        <div class="space-y-2">

                                            @foreach($categories as $cat)
                                            <div class="flex items-center">
                                                <a href="{{ url('categories/'.$cat->slug) }}" class="ml-1 min-w-0 flex-1 pally-medium hover:text-[#20bd70] text-sm @if(in_array(Request::segment(3), [$cat->slug])){{ 'text-[#20bd70]' }}@else{ 'text-gray-500' }@endif">{{ $cat->name }}</a>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-2">
                                    <h3 class="font-medium text-gray-900 pb-3">Type</h3>
                                    <div class="">
                                        <div class="space-y-0">
                                            <div class="hidden items-center">
                                                <input 
                                                    id="facts-single" 
                                                    name="type[]" 
                                                    value="single" 
                                                    type="checkbox" 
                                                    class="h-4 w-4 rounded border text-[#20bd70] focus:ring-0"
                                                    @if(is_array(Request::get('type')) && in_array('single', Request::get('type')))
                                                        checked
                                                    @endif
                                                >
                                                <label for="facts-single" class="ml-3 min-w-0 flex-1 text-gray-500 text-sm">
                                                    Single
                                                </label>
                                            </div>
                                            <div class="flex items-center">
                                                <input 
                                                    id="facts-series" 
                                                    name="type[]" 
                                                    value="series" 
                                                    type="checkbox" 
                                                    class="h-4 w-4 rounded border text-[#20bd70] focus:ring-0" 
                                                    @if(is_array(Request::get('type')) && in_array('series', Request::get('type')))
                                                        checked
                                                    @endif
                                                >
                                                <label for="facts-series" class="ml-3 min-w-0 flex-1 text-gray-500 text-sm">
                                                    Series
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-2 flex2 gap-3 space-y-1 flex-col">
                                    <div class="w-full">
                                        <button type="submit" class="w-full border border-green-600 bg-[#20bd70] hover:bg-green-400 hover:text-green-700 text-white px-3 py-2 text-sm rounded-lg transition duration-500">
                                            Filter
                                        </button>
                                    </div>
                                    <div class="w-full flex justify-start">
                                        <a href="{{ route('categories') }}" class="w-full border text-center border-gray-400 hover:border-gray-800 text-gray-400 hover:text-gray-800 px-3 py-1 text-xs rounded-lg transition duration-500">
                                            Reset
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="h-full col-span-4 space-y-6 w-full">
                        @if($facts->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-2 gap-y-2  xl:gap-x-4">

                            @foreach($facts as $f)
                            @if($f->original)
                            <div
                                class="relative mb-0 rounded w-full h-72 md:h-full border group flex flex-col overflow-hidden justify-center shadow-md items-center"
                                x-data="{ showInfo: false }">
                                <div class="absolute w-full h-full">
                                    <div class="w-full h-full">
                                        <div class="bg-mask2 flex w-full h-full md:w-full md:h-full relative transition duration-300 ease-out">
                                            <img
                                                src="{{ asset('storage/'.$f->original) }}"
                                                data-src="{{ asset('storage/'.$f->original) }}"
                                                data-srcset="{{ asset('storage/'.$f->original. ' 860w') }},
                                                        {{ asset('storage/'.$f->original. ' 640w') }},
                                                        {{ asset('storage/'.$f->original. ' 420w') }}"
                                                alt="{{ $f->title }}"
                                                class="h-full md:h-full w-full object-cover lazyload blur-up" />
                                        </div>
                                    </div>
                                </div>
                                <div class="absolute bottom-8 z-20 pl-2">
                                    <h3 class="font-bold font-sans bg-text inline leading-snug pb-8 bottom-10 bg-white bg-none bg-repeat bg-scroll box-decoration-clone capitalize mb-2.5 px-0 py-1 text-[#f00] @if($f->beta <= 100){{ 'text-2xl md:text-2xl lg:text-2xl' }}@else{{ 'text-lg md:text-lg lg:text-lg' }}@endif md:mb-[4px]">
                                        {!! $f->title !!}
                                    </h3>
                                   
                                </div>
                                @if($f->credit)
                                <div class="absolute bottom-1 z-20">
                                    <div class="flex justify-start items-start">
                                    <p class="px-1 flex text-white text-[10px] font-sans font-extralight">@ {!! $f->credit !!}</p>
                                    </div>
                                </div>
                                @endif
                                <div class="absolute z-10 bottom-0 h-56 w-full bg-gradient-to-b from-transparent to-[#0a1016]"></div>
                                <div class="absolute z-20 bottom-0 h-full w-full rounded-md px-2 pt-0 opacity-0 group-hover:opacity-100 bg-gradient-to-b from-transparent to-[#0a1016]">
                                    <div class="absolute top-2 right-2 ">
                                        <div class="flex justify-between">
                                            <a href="{{ url('fact/'. $f->uuid ) }}" class="flex justify-end hover:bg-white hover:border rounded-full p-1 items-end text-white hover:text-[#20bd70]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path fill-rule="evenodd" d="M15.75 2.25H21a.75.75 0 0 1 .75.75v5.25a.75.75 0 0 1-1.5 0V4.81L8.03 17.03a.75.75 0 0 1-1.06-1.06L19.19 3.75h-3.44a.75.75 0 0 1 0-1.5Zm-10.5 4.5a1.5 1.5 0 0 0-1.5 1.5v10.5a1.5 1.5 0 0 0 1.5 1.5h10.5a1.5 1.5 0 0 0 1.5-1.5V10.5a.75.75 0 0 1 1.5 0v8.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V8.25a3 3 0 0 1 3-3h8.25a.75.75 0 0 1 0 1.5H5.25Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    @if($f->description)
                                    <div class="absolute bottom-3 left-2">
                                        <div class="mt-4 flex items-center">
                                            <button class="flex items-center space-x-1" @click="showInfo = !showInfo">
                                                <span class="h-7 w-7 text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                    </svg>
                                                </span>
                                                <span class="flex items-center justify-center text-xs font-light text-white">Info</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="absolute bottom-3 right-2 ">
                                        <div class="flex inline-flex2 flex-col space-y-2 ">
                                            <button class="h-8 w-8 md:flex items-center hover:bg-white rounded-full hover:border p-1 text-white hover:text-pink-500">
                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                            </button>
                                            <button class="h-6 w-6 md:flex2 hidden items-center">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            <button class="h-6 w-6 md:flex2 hidden items-center">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    id="showInfo" x-cloak
                                    x-show="showInfo"
                                    :class="showInfo ? 'top-0' : 'top-full'"
                                    class="absolute z-20  h-full w-full bg-black transform overflow-auto ease-in-out translate-y-0 transition-all duration-300"
                                    x-transition:enter="transition ease-gentle duration-300"
                                    x-transition:enter-start="translate-y-full"
                                    x-transition:enter-end="-translate-y-0"
                                    x-transition:leave="transition ease-gentle duration-300"
                                    x-transition:leave-start="-translate-y-0"
                                    x-transition:leave-end="translate-y-full"
                                    :key="{{ $f->id }}">
                                    <button class="absolute flex top-2 right-2 rounded-full bg-transparent px-1 py-1 hover:bg-gray-100 text-white hover:text-[#1d494e] transition duration-150 cursor-pointer" @click.stop="showInfo = !showInfo">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width=3
                                            stroke="currentColor"
                                            class="w-5 h-5 ">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                    <div class="flex px-8 py-9">
                                        <span class="text-white description">{!! $f->description !!}</span>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div
                                class="relative mb-0 rounded w-full border group flex flex-col overflow-hidden justify-center shadow-md items-center"
                                x-data="{ showInfo: false }"
                                style="background-color: {{ $f->bgColor }}">
                                <div class="flex flex-col justify-center items-center px-10 md:px-6 py-12 md:py-10 lg:py-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 2048 2048" width="70" height="70">
                                        <path transform="translate(1080,519)" d="m0 0h42l33 2 30 4 17 4 18 6 25 10 39 19 17 9 22 14 16 12 16 13 12 11 11 12 8 10 10 14 12 21 9 17 11 25 12 34 7 27 4 20 2 20 1 31v50l-3 24-7 33-9 31-10 27-8 17-8 16-12 21-8 12-9 12-7 9-12 14-18 22-12 13-7 8-12 14-10 14-8 13-6 11-8 16-10 24-4 14-5 23-2 22v71l2 31 6 52 3 13 12 23 5 12 1 4v11l-3 21-6 25-6 16-7 16-6 11 1 1v7l3 7-1 11-4 26-6 23-6 16-8 16-9 15-8 10-10 9-13 9-5 4-8 6-5 16-7 21-11 27-6 12 9-10 3-5 5-5 8-14 12-25 6-12 9-10 8-6-1 5-9 20-13 27-13 23-10 15-8 10-1-3 11-18 8-14 6-10 3-8 1-4-10 18-6 10h-2l-1 5-3 3-13 20-11 13h-2l-1 3-10 8-12 7h-2l-1-4h-30l-19-3-13-5-11-6-10-8-7-7-8-11-9-16-8-20-5-21v-4l-6-2-11-4-15-6-19-10-12-8-14-12-10-10-10-13-7-12-5-12-3-14-2-16v-23l1-6v-12l-5-12-8-16-6-10-5-13-4-20-2-17v-18l7-31 3-6 6-9v-43l-2-32-5-37-8-43-5-20-8-26-9-21-8-13-8-8-17-12-28-17-19-13-12-9-17-14-13-12-21-21-11-14-9-12-9-15-12-22-8-19-11-31-6-24-4-22-3-33-1-29v-19l1-27 3-27 6-25 7-24 11-27 11-23 14-24 11-16 14-18 9-11 9-10 10-11 8-7 13-12 14-11 10-8 36-24 21-12 17-9 29-13 28-11 19-7 28-8 25-6 30-5 36-4zm-3 36-50 3-35 4-29 5-31 7-33 11-20 9-29 14-20 11-22 14-19 14-13 10-13 11-8 7-13 12-22 22-11 14-13 18-12 21-12 25-7 19-7 24-5 25-3 20-2 26v47l3 36 4 27 8 32 5 15 13 25 10 15 9 12 9 10 7 8 10 10 22 18 10 7 15 10 26 17 14 9 12 9 10 9 5 5 8 9 11 19 9 19 7 24 7 32 5 39 5 49 2 28 2 44 2 9 3 3 19 6 26 5 35 4 25 2h8v-9l-4-47-3-37-6-56-7-63-9-65-8-46-8-39-9-36-10-34-15-43-9-21-7-8-8-4-10-7-11-7-13-10-16-13-7-7-6-5-9-11-11-16-7-12-2-5-1-10 3-10 6-7 8-4 7-2h8l12 3 13 9 9 9 12 18 11 19 15 28 9 20 7 11 5 4 26 4h11l14-3 16-8 13-9 7-9 1-2v-14l-8-31-4-26v-51l5-15 9-10 10-5h8l9 4 6 5 6 10 3 9 1 5v17l-4 27-5 23-7 26-4 9v7l4 9 6 8 14 10 17 6 19 5 19 1 5-5 10-24 8-20 8-16 7-12 9-12 9-10 10-9 13-8 12-5 16-3h7l10 3 8 6 9 14 2 4 1 9-2 8-5 10-9 12-12 14-11 11-14 11-25 15-16 8-18 8-9 3-6 13-6 37-4 37-7 83-1 20v63l1 62 2 53 3 61 2 58 14-2 44-11 21-6 16-7 1-1-1-33-1-60v-112l3-21 6-25 10-19 13-17 11-13 41-41 8-7 12-13 12-14 13-18 12-19 13-27 10-26 7-21 9-33 5-29 4-43v-47l-3-34-5-26-6-20-10-25-12-25-13-22-20-26-11-12-16-16-14-11-17-13-18-12-24-14-19-9-16-6-20-5-27-4-21-2zm-34 285-5 5-2 6v28l1 27 2 19 3 10h3l4-9 7-36 2-16v-20l-2-8-3-5-2-1zm-200 56-6 4 1 10 7 14 9 10 7 8 21 21 14 11 7 6 12 8-2-5-6-9-11-23-11-17-10-15-12-15-10-7-3-1zm391 1-11 4-12 8-10 9-11 14-8 13-12 23-7 17-3 9 1 3 9-4 12-5 16-9 17-12 10-8 12-11 9-10 8-13 2-7v-9l-4-8-5-4zm-190 87-6 8-4 5-8 7-7 6-10 6-9 3-15 2h-23l-15-1 2 9 10 27 11 33 10 37 9 41 7 35 11 65 8 64 8 81 6 77 3 21 1 3h23l35-3 26-4 6-2v-18l-3-64-3-32-1-17v-72l1-90 3-67 3-37 9-69 2-10v-5l-6-2-25-3-16-4-16-8-10-7-12-11-3-4zm213 532-15 6-36 13-36 11-22 5-28 4-33 3-42 2h-24l-43-2-25-2-30-4-21-4-6-2-16-6v14l4 25 4 12 6 10 9 10 12 9 17 8 30 10 26 6 20 3 23 2h34l18-2 10-2v-1h-37l-1-10-2-10v-22l2-7 5-3 17-5 42-9 41-11 25-9 20-9 25-12 11-4 10-3 3-2 3 5h1l1-16zm-3 16m-108 101m-9 2m-3 1m-8 2m-7 1m-20 3-6 1v1h8l6-1v-1zm126 9-16 8-21 8-28 9-29 8-25 5-32 4h-37l-26-3-26-5-25-7-23-8-16-7h-4l-1 7v8l1 3 4 2 2 5-4 2 1 5 6 12 9 11 8 7 13 9 14 8 21 8 21 6 22 4 9 1h33l30-3 29-5 30-7 21-8 11-8 8-9 6-10 8-24 8-29 1-6zm-21 134m-2 3-5 9v2h2l4-8zm-53 7-26 4-32 3-55 1-3 1 1 8 6 17 8 13 5 6 11 7 12 3 7 1h16l14-3 10-5 9-8 9-13 6-16 5-16v-3zm47 4m0 2m-1 1-1 4 2-1z" fill="#FFFFFF" />
                                        <path transform="translate(205,698)" d="m0 0 12 1 69 9 68 10 35 6 47 9 38 9 11 4 3 3 1 3-1 25-2 5-2 2-15-1-57-10-84-15-80-16-29-8-10-4-5-5-3-11v-8l3-7z" fill="#FFFFFF" />
                                        <path transform="translate(520,255)" d="m0 0 7 1 11 9 7 8 24 26 11 13 11 14 10 13 13 18 22 33 7 10 11 17 11 18 8 18 2 9-4 5-8 4-11 2-7-1-8-6-12-16-9-14-14-20-13-18-16-21-28-38-13-16-13-18-7-10-8-13-1-6 4-9 6-8z" fill="#FFFFFF" />
                                        <path transform="translate(578,1277)" d="m0 0h3l5 19 1 11v9l-4 8-11 11-11 9-32 26-15 13-16 13-14 11-11 10-11 9-9 8-10 8-14 11-11 7-14 8-4 1-3-5-4-13v-15l5-8 7-8 8-7 30-26 14-12 11-10 11-9 11-10 11-9 28-24 17-14 12-9 13-9z" fill="#FFFFFF" />
                                        <path transform="translate(493,1027)" d="m0 0h12l2 2 2 12 1 17-3 3-24 4-72 10-59 8-109 16h-8l-4-6-2-16 3-10 6-3 57-9 41-7 74-11 73-9z" fill="#FFFFFF" />
                                        <path transform="translate(996,120)" d="m0 0 4 1 3 7 9 59 8 50 5 33 9 51 7 43v9l-4 3h-19l-6-2-4-4-4-13-11-57-9-50-9-49-6-39-1-16 2-7 13-10z" fill="#FFFFFF" />
                                        <path transform="translate(1440,194)" d="m0 0 5 5 5 19v13l-6 12-9 11-24 28-12 13-9 11-10 11-9 11-12 14-22 28-9 10-13 9-6 1-8-7-5-9 1-7 9-16 10-13 8-10 11-14 12-15 13-17 8-10 10-13 13-16 14-17 11-12 6-7h2v-2l12-9z" fill="#FFFFFF" />
                                        <path transform="translate(1573,1113)" d="m0 0 8 1 21 9 31 15 33 15 29 13 30 14 35 17 9 6 4 5 3 7v12l-2 11-4 4-9-2-16-7-34-16-56-28-22-12-17-9-23-11-19-10-4-7v-18z" fill="#FFFFFF" />
                                        <path transform="translate(1706,475)" d="m0 0h9l7 6 3 9v10l-6 9-8 7-20 13-23 14-11 7-21 13-21 12-24 13-19 10-13 5-7-1-7-8-3-5v-7l3-7 5-5 13-11 22-15 17-11 75-45 17-9z" fill="#FFFFFF" />
                                        <path transform="translate(1632,851)" d="m0 0h150l55 1 5 2 1 2 1 9v19l-5 4-5 1-21 1h-86l-38-1-50-3-9-2-3-6-1-6v-15l2-4z" fill="#FFFFFF" />
                                        <path transform="translate(1469,1330)" d="m0 0 5 1 8 8 8 13 16 28 10 18 13 24 15 29 12 22 11 20 7 17-1 9-5 5-5 2-10 1-7-3-5-5-5-8-8-16-8-18-19-38-20-38-9-19-6-13-4-13v-13l3-8z" fill="#FFFFFF" />
                                        <path transform="translate(755,1414)" d="m0 0 6 1 4 4 2 5v10l-3 17-5 15-9 22-13 28-12 25-16 34-14 29-9 17-6 4-6-2-5-8v-13l5-17 11-25 13-28 15-31 12-26 10-19 11-25 5-13z" fill="#FFFFFF" />
                                    </svg>
                                    <p
                                        class="mt-4 leading-tight truncate text-ellipsis overflow-hidden ... md:leading-tight text-wrap text-white text-center @if($f->beta <= 100){{ 'text-2xl md:text-2xl lg:text-2xl' }}@elseif($f->beta > 200){{ 'text-md md:text-md lg:text-md' }}@else{{ 'text-lg md:text-lg lg:text-lg' }}@endif pally-bold"
                                        style="color: {{ $f->color }}">
                                        @if($f->history_time) On {{ Carbon\Carbon::createFromFormat('Y-m-d', $f->history_time)->format('M. d, Y') }} , @endif {!! $f->title !!}
                                    </p>
                                </div>
                                <div class="absolute z-10 bottom-0 h-full w-full rounded-md px-2 pt-0 opacity-0 group-hover:opacity-100 bg-gradient-to-b from-transparent to-[#0a1016]">
                                    <div class="absolute top-2 right-2 ">
                                        <div class="flex justify-between">
                                            <a href="{{ url('fact/'. $f->uuid ) }}" class="flex justify-end hover:bg-white hover:border rounded-full p-1 items-end text-white hover:text-[#20bd70]">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                                    <path fill-rule="evenodd" d="M15.75 2.25H21a.75.75 0 0 1 .75.75v5.25a.75.75 0 0 1-1.5 0V4.81L8.03 17.03a.75.75 0 0 1-1.06-1.06L19.19 3.75h-3.44a.75.75 0 0 1 0-1.5Zm-10.5 4.5a1.5 1.5 0 0 0-1.5 1.5v10.5a1.5 1.5 0 0 0 1.5 1.5h10.5a1.5 1.5 0 0 0 1.5-1.5V10.5a.75.75 0 0 1 1.5 0v8.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V8.25a3 3 0 0 1 3-3h8.25a.75.75 0 0 1 0 1.5H5.25Z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    @if($f->description)
                                    <div class="absolute bottom-3 left-2">
                                        <div class="mt-4 flex items-center">
                                            <button class="flex items-center space-x-1" @click="showInfo = !showInfo">
                                                <span class="h-7 w-7 text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                                    </svg>
                                                </span>
                                                <span class="flex items-center justify-center text-xs font-light text-white">Info</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="absolute bottom-3 right-2 ">
                                        <div class="flex inline-flex2 flex-col space-y-2 ">
                                            <button class="h-8 w-8 md:flex items-center hover:bg-white rounded-full hover:border p-1 text-white hover:text-pink-500">
                                                <svg class="h-6 w-6 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                            </button>
                                            <button class="h-6 w-6 md:flex2 hidden items-center">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            <button class="h-6 w-6 md:flex2 hidden items-center">
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    id="showInfo" x-cloak
                                    x-show="showInfo"
                                    :class="showInfo ? 'top-0' : 'top-full'"
                                    class="absolute z-20  h-full w-full bg-black transform overflow-auto ease-in-out translate-y-0 transition-all duration-300"
                                    x-transition:enter="transition ease-gentle duration-300"
                                    x-transition:enter-start="translate-y-full"
                                    x-transition:enter-end="-translate-y-0"
                                    x-transition:leave="transition ease-gentle duration-300"
                                    x-transition:leave-start="-translate-y-0"
                                    x-transition:leave-end="translate-y-full"
                                    :key="{{ $f->id }}">
                                    <button class="absolute flex top-2 right-2 rounded-full bg-transparent px-1 py-1 hover:bg-gray-100 text-white hover:text-[#1d494e] transition duration-150 cursor-pointer" @click.stop="showInfo = !showInfo">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width=3
                                            stroke="currentColor"
                                            class="w-5 h-5 ">
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                    <div class="flex px-8 py-9">
                                        <span class="text-white description">{!! $f->description !!}</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                        @else
                        <div class="flex items-center justify-center mx-auto w-full ">
                            <span class="font-semibold text-md text-red-500">No record found!</span>
                        </div>
                        @endif
                        {{ $facts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

@push('style')
<style>
    .blur-up {
        -webkit-filter: blur(5px);
        filter: blur(5px);
        transition: filter 400ms, -webkit-filter 400ms;
    }

    .blur-up.lazyloaded {
        -webkit-filter: blur(0);
        filter: blur(0);
    }

    /* .bg-text {
        background: #fff none repeat scroll 0 0;
        box-decoration-break: clone;
        display: inline;
        padding: 0 10px;
        bottom: 10px;
        line-height: 1.6;
        color: #f00;
        box-shadow: 45px 0 0 #f00,-45px 0 0 #f00;
    } */
</style>
@endpush