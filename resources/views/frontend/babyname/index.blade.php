@extends('frontend.layout')

@section('content')

<main class="overflow-hidden pt-[6px]">
    <div class="relative">
        <div class="relative">
            <div class="w-full h-full absolute bg-[rgb(237,246,251)]/75"></div>
            <div class="pb-[72px] pt-10 md:py-20 relative">
                <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">
                        <nav class="flex" aria-label="Breadcrumb">
                            <ol role="list" class="flex items-center">
                                <li>
                                    <div class="flex items-center"><a href="/" class="text-sm md:text-base md:leading-[25px] font-medium text-black-primary">Beranda</a></div>
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
                                            <p class="break-keep whitespace-nowrap truncate">Baby Name</p>
                                        </a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900">Baby Name</h1>
                        </div>
                        <div>
                            <div class="flex flex-wrap items-center gap-1 md:gap-2 justify-center md:justify-center mx-auto w-11/12 md:w-10/12 ">
                                @foreach($letters as $l)
                                <a
                                    href="{{ url('baby-name/letter/'.$l) }}"
                                    class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10  px-2 md:px-4 py-1 border-2 border-gray-900 @if(Request::segment(3) == $l){{ 'bg-orange-300 text-white' }}@else{{ 'bg-white text-gray-900 hover:bg-orange-300 hover:text-white' }}@endif">
                                    <span class="uppercase font-bold ">{{ $l }}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 -mt-7 pb-10">
            <div class="w-full mx-auto md:max-w-[618px] xl:max-w-[790px] relative md:!max-w-[585px]">
                <x-dropdown-search />
                
            </div>
            <div class="mt-6 md:mt-6 mx-auto grid2 max-w-7xl grid-cols-12 gap-62 lg:gap-82 md:grid-cols-22 lg:grid-cols-32">

                <div class="py-3 md:py-1 md:pb-5 col-span-full col-start-1 flex flex-col gap-4 mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                    <form action="{{ url('baby-name') }}" method="GET">
                    <div class="py-2 md:py-1 pt-2 md:pb-5 col-span-full w-full col-start-1 flex flex-row items-center justify-between gap-2 md:col-start-52 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                        <div class="flex w-full gap-2 ">

                            <div class="flex flex-col w-1/2 md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                    <label for="religion" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Religion</label>
                                    <select name="religion" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Religion</option>
                                        @foreach($religions as $r)
                                        <option 
                                            value="{{ $r->id }}"
                                            @if(Request::get('religion') == $r->id) 
                                                selected
                                            @endif
                                        >{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                    <label for="origin" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Origin</label>
                                    <select name="origin" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Origin</option>
                                        @foreach($origins as $o)
                                        <option 
                                            value="{{ $o->id }}"
                                            @if(Request::get('origin') == $o->id) 
                                                selected
                                            @endif
                                        >{{ $o->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-col w-1/2 md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                    <label for="country" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Country</label>
                                    <select name="country" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $c)
                                        <option 
                                            value="{{ $c->id }}"
                                            @if(Request::get('country') == $c->id) 
                                                selected
                                            @endif
                                        >{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                    <label for="gender" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Gender</label>
                                    <select name="gender" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Gender</option>
                                        @foreach($genders as $key => $value)
                                        <option 
                                            value="{{ $key }}" 
                                            @if(Request::get('gender') == $key) 
                                                selected
                                            @endif
                                        >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="flex mx-auto w-full max-w-2xl px-0 py-3 ">
                        <button type="submit" class="flex w-full mx-auto py-2 md:py-3 rounded-full border border-blue-800 items-center justify-center bg-blue-700 hover:bg-blue-800 font-semibold text-white">
                            Browse
                        </button>
                    </div>
                    </form>
                </div>

                

                <!--  -->
                <div class="bg-white pb-0 md:pb-10">
                    <div class="mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0">
                        <div class="flex justify-between">
                            <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] lg:leading-[48px] font-bold text-gray-900">Results {{ $countNames }} Names Found</h2>
                        </div>
                        <div class="mt-6 md:mt-12 grid gap-4 lg:gap-8 grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"><!--[-->
                            @foreach($babynames as $baby)
                            <a aria-label="Selengkapnya" href="{{ url('baby-name/'. $baby->slug) }}" class="@if($baby->gender_id == 1){{ 'bg-[#dbebfa]' }}@elseif($baby->gender_id == 2){{ 'bg-orange-200' }}@else{{ 'bg-green-200' }}@endif hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.08)] border border-gray-700 flex justify-between items-center gap-3 p-3 md:px-4 md:py-3 rounded-lg drop-shadow-md">
                                <div class="md:flex items-center gap-3">
                                    <p class="md:mt-0 text-xs leading-5 md:text-base md:leading-[25px] font-bold text-gray-800 capitalize">{{ $baby->name }}</p>
                                </div>
                                <div class="hidden2 md:block">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 stroke-2 text-[#475569]">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                                    </svg>
                                </div>

                            </a>
                            @endforeach

                        </div>
                        
                    </div>
                    <!--  -->
                <div class="flex flex-col w-full md:px-6 mt-6">
                    <div class="flex items-center gap-2">
                        <div class="flex px-1 py-1 w-10 bg-[#dbebfa] border border-gray-700"></div>
                        <span class="font-semibold text-md text-gray-700">Boy</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="flex px-1 py-1 w-10 bg-orange-200 border border-gray-700"></div>
                        <span class="font-semibold text-md text-gray-700">Girl</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="flex px-1 py-1 w-10 bg-green-200 border border-gray-700"></div>
                        <span class="font-semibold text-md text-gray-700">Unisex</span>
                    </div>
                </div>
                <!--  -->
                </div>
                
            </div>
            <div class="bg-white md:mt-0">
                <!-- paginate -->
                {{ $babynames->links() }}
            </div>
        </div>
    </div><!--]-->
</main>

@endsection