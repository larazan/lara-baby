@extends('frontend.layout')

@section('content')


<main class="overflow-hidden pt-[10px]"><!--[-->
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
                                    <div class="flex items-center w-[100px] sm:w-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-4 w-4 stoke-2 flex-shrink-0 text-[#64748B] mx-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg><a href="/berita" class="text-black-primary text-sm md:text-base md:leading-[25px] font-medium truncate" aria-current="page">
                                            <p class="break-keep whitespace-nowrap truncate">Berita</p>
                                        </a></div>
                                    <div class="flex items-center w-[100px] sm:w-full"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="h-4 w-4 stoke-2 flex-shrink-0 text-[#64748B] mx-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"></path>
                                        </svg><a href="/berita/utama" class="text-gray-primary text-sm md:text-base md:leading-[25px] font-medium truncate" aria-current="page">
                                            <p class="break-keep whitespace-nowrap truncate">Berita Utama</p>
                                        </a></div><!--]-->
                                </li>
                            </ol>
                        </nav>
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900">Activity</h1>
                        </div>
                        <div>
                            <p class="text-sm md:text-base md:leading-[25px] text-gray-primary text-center max-w-[905px]">Kabar dan berita kegiatan utama yang dilakukan oleh BMKG</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 pb-10 md:pb-20">

            <!--  -->
            <div class="py-3 md:py-1 md:pb-5 col-span-full col-start-1 flex flex-col gap-4 mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                    <div class="py-2 md:py-1 pt-2 md:pb-5 col-span-full w-full col-start-1 flex flex-row items-center justify-between gap-2 md:col-start-52 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                        <div class="flex w-full gap-2 ">

                            <div class="mx-auto grid max-w-7xl grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                                <!-- activities -->
                                <div class="w-full flex flex-col ">
                                    <label for="activities" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Activity</label>
                                    <select wire:model="activities" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Activity</option>
                                        @foreach($activityOption as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- activities -->
                                <div class="w-full flex flex-col ">
                                    <label for="ages" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Age</label>
                                    <select wire:model="ages" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Age</option>
                                        @foreach($ages as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- crafts -->
                                <div class="w-full flex flex-col ">
                                    <label for="ages" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Crafts</label>
                                    <select wire:model="ages" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Crafts</option>
                                        @foreach($crafts as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- learnings -->
                                <div class="w-full flex flex-col ">
                                    <label for="learnings" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Learnings</label>
                                    <select wire:model="learnings" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Learnings</option>
                                        @foreach($learnings as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- painting -->
                                <div class="w-full flex flex-col ">
                                    <label for="painting" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Painting</label>
                                    <select wire:model="painting" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Painting</option>
                                        @foreach($painting as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- sensory -->
                                <div class="w-full flex flex-col ">
                                    <label for="sensory" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Sensory</label>
                                    <select wire:model="sensory" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide text-gray-500 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Sensory</option>
                                        @foreach($sensory as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <!--  -->

            <div class="mt-6 md:mt-12 mx-auto grid max-w-7xl grid-cols-2 gap-4 md:gap-6 lg:gap-8 md:grid-cols-3 lg:grid-cols-4"><!--[-->
                @foreach($activities as $act)
                <article class="relative flex flex-col items-start justify-between w-full h-full bg-white p-4 rounded-2xl border border-[#CBD5E1] hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.12)]">
                    <a href="{{ url('activity/'. $act->slug) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                    <div class="w-full mb-4">
                        <div class="relative aspect-[16/9] w-full h-[166px] xl:h-[216px] rounded-xl bg-gray-100 overflow-hidden"><img onerror="this.setAttribute('data-error', 1)" width="345" height="216" alt="BMKG-Kementerian Keuangan Perkuat Sinergi untuk Ketahanan Iklim dan Bencana dalam Mendukung Asta Cita" loading="lazy" data-nuxt-img="" class="w-full h-full object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_0051.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_0051.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_0051.jpg?fit=1280%2C853&amp;ssl=1 2x"></div>
                    </div>
                    <div class="flex flex-col justify-between w-full h-full">
                        <div><time class="text-sm leading-[22px] text-gray-primary font-bold flex items-center">29 Mei 2025</time>
                            <h2 class="mt-2 text-base leading-[25px] md:text-lg md:leading-[27px] xl:text-2xl font-bold text-black-primary">{{ $act->title }}</h2>
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
                @endforeach
                
            </div>
            <div class="bg-white mt-0 md:mt-1">
                <!-- paginate -->
                {{ $activities->links() }}
            </div>
        </div>
    </div><!--]-->
</main>


    @endsection