<div class="bg-[#F8FAFC] py-10 md:py-20">
        <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
            <div class="flex justify-between">
                <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] lg:leading-[48px] font-bold figtree-medium text-gray-900">Related Activity</h2>
                <a href="/siaran-pers" class="text-blue-primary inline-flex items-center justify-center rounded-lg text-sm lg:text-base leading-[25px] font-bold hover:underline underline-offset-8">
                    <span class="hidden sm:inline-flex figtree-reguler">Read more</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 lg:w-5 lg:h-5 stroke-2 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                    </svg>
                </a>
            </div>
            <div class="relative flex flex-row mx-auto w-full md:w-12/12 lg:w-11/12 justify-between items-center">
    <div class="mb-[1em] flex flex-row overflow-x-auto scroll-smooth custom-scrollbar pb-3">

      @foreach($articles as $a)
      <div class="transition-all duration-150 flex mr-[.5em] ">
        <div class="flex w-[230px] md:w-[280px] p-5 justify-center bg-white shadow hover:shadow-lg">
          <div class=" bg-white  flex ">
            <a href="/" class="flex flex-col space-y-3 justify-center items-center">
              <div class="">
                <h2 class="pb-4 text-left">
                  <a href="{{ url('/article/' . $a->slug) }}" class="text-lg md:text-2xl leading-tight font-bold text-gray-800 hover:text-blue-700 transition ease-in-out duration-150">
                    {{ $a->title }}
                  </a>
                </h2>
                <p class="md:text-lg md:leading-normal text-gray-600 text-left">
                  {{ $a->excerpt() }}
                </p>
                <div class="pt-6 flex justify-center md:justify-start">
                  <div class="flex items-center">
                    <div class="w-10 h-10">
                      <img src="{{ Avatar::create(ucwords($a->user->name))->toBase64() }}" alt="{{ $a->user->name }}" class="rounded-full w-full" />
                    </div>
                    <div class="ml-3 leading-6">
                      <div class="font-medium text-gray-600 capitalize">
                        {{ $a->user->name }}
                      </div>
                      <div class="text-sm text-gray-500">
                        <time datetime="2021-29-00">{{ $a->created_at->diffForHumans() }}</time>
                        <span> · </span>
                        <span>{{ $a->readTime() }} min read</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
            <div class="hidden mt-6 md:mt-8 grid2 grid-cols-1 gap-6 lg:gap-8 md:grid-cols-3"><!--[-->
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