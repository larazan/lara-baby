<div class="bg-[#F8FAFC] py-10 md:py-20">
    <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
        <div class="flex justify-between">
            <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] lg:leading-[48px] font-bold figtree-medium text-gray-900">Related Activity</h2>
            <a href="{{ url('activities') }}" class="text-blue-primary inline-flex items-center justify-center rounded-lg text-sm lg:text-base leading-[25px] font-bold hover:underline underline-offset-8">
                <span class="hidden sm:inline-flex figtree-reguler">Read more</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 lg:w-5 lg:h-5 stroke-2 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                </svg>
            </a>
        </div>
        <div class="relative mt-6 flex flex-row mx-auto w-full md:w-12/12 lg:w-11/12 justify-between items-center">
            <div class="mb-[1em] flex flex-row overflow-x-auto scroll-smooth custom-scrollbar pb-3 auto-rows-fr">

                @foreach($activities as $act)
                <div class="transition-all duration-150 flex">
                <article class="relative flex flex-col shadow-stack-sm items-start justify-between w-[230px] mr-3 md:w-[280px] h-full bg-white p-2 md:p-4 rounded-lg md:rounded-2xl border-2 border-gray-800 hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.12)]">
                    <a href="{{ url('activity/'. $act->slug) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                    <div class="w-full mb-4">
                        <div class="relative aspect-[16/9] w-full h-[166px] xl:h-[216px] rounded-md md:rounded-xl bg-gray-100 overflow-hidden">
                            <img onerror="this.setAttribute('data-error', 1)" width="345" height="216" alt="BMKG-Kementerian Keuangan Perkuat Sinergi untuk Ketahanan Iklim dan Bencana dalam Mendukung Asta Cita" loading="lazy" data-nuxt-img="" class="w-full h-full object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_0051.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_0051.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_0051.jpg?fit=1280%2C853&amp;ssl=1 2x">
                        </div>
                    </div>
                    <div class="flex flex-col justify-between w-full h-full">
                        <div>
                            <span class="flex px-2 py-1 bg-orange-500 text-white text-xs rounded-full w-fit font-medium figtree-reguler">{{ $act->category($act->category_id) }}</span>
                            <h2 class="mt-2 text-base leading-[25px] md:text-lg md:leading-[27px] xl:text-2xl font-semibold text-gray-800 figtree-medium">{{ $act->title }}</h2>
                        </div>
                        <div class="mt-4">
                            <a href="#" class="text-sm lg:text-base font-bold leading-6 text-blue-primary flex gap-2 items-center !text-base !leading-[25px] figtree-reguler">Read more
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 stroke-2">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>