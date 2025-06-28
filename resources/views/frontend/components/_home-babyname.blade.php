<section class="section flex flex-col gap-6 w-full px-4 md:px-8 py-12 md:py-12">

    <div class="flex justify-between">
        <div class="flex items-center gap-2.5"><!---->
            <h1 class="text-lg leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900">Search Baby Name</h1>
        </div>
        <a href="{{ url('baby-name') }}" class="text-blue-800 inline-flex items-center justify-center rounded-lg text-sm lg:text-base leading-[25px] font-bold hover:underline underline-offset-8">
            <span class="hidden sm:inline-flex">More</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 lg:w-5 lg:h-5 stroke-2 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
            </svg>
        </a>
    </div>

    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

        <a aria-label="Selengkapnya" href="{{ url('baby-name/') }}" class="bg-sky-500 hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.08)] border-2 border-gray-800 shadow-menu flex justify-between items-center gap-3 p-3 md:px-4 md:py-3 rounded-lg drop-shadow-md transition hover:scale-105">
            <div class="md:flex items-center gap-3">
                <p class="md:mt-0 text-lg leading-5 md:text-2xl md:leading-[25px] font-bold text-white capitalize">Names by gender</p>
            </div>
            <div class="hidden2 md:block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-6 md:h-6 stroke-2 text-white -rotate-45">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                </svg>
            </div>
        </a>

        <a aria-label="Selengkapnya" href="{{ url('baby-name/') }}" class="bg-purple-500 hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.08)] border-2 border-gray-800 shadow-menu flex justify-between items-center gap-3 p-3 md:px-4 md:py-3 rounded-lg drop-shadow-md transition hover:scale-105">
            <div class="md:flex items-center gap-3">
                <p class="md:mt-0 text-lg leading-5 md:text-2xl md:leading-[25px] font-bold text-white capitalize">Names by origin</p>
            </div>
            <div class="hidden2 md:block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-6 md:h-6 stroke-2 text-white -rotate-45">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                </svg>
            </div>
        </a>

        <a aria-label="Selengkapnya" href="{{ url('baby-name/') }}" class="bg-red-500 hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.08)] border-2 border-gray-800 shadow-menu flex justify-between items-center gap-3 p-3 md:px-4 md:py-3 rounded-lg drop-shadow-md transition hover:scale-105">
            <div class="md:flex items-center gap-3">
                <p class="md:mt-0 text-lg leading-5 md:text-2xl md:leading-[25px] font-bold text-white capitalize">Names by religion</p>
            </div>
            <div class="hidden2 md:block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-6 md:h-6 stroke-2 text-white -rotate-45">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                </svg>
            </div>
        </a>

        <a aria-label="Selengkapnya" href="{{ url('baby-name/') }}" class="bg-orange-500 hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.08)] border-2 border-gray-800 shadow-menu flex justify-between items-center gap-3 p-3 md:px-4 md:py-3 rounded-lg drop-shadow-md transition hover:scale-105">
            <div class="md:flex items-center gap-3">
                <p class="md:mt-0 text-lg leading-5 md:text-2xl md:leading-[25px] font-bold text-white capitalize">Names by country</p>
            </div>
            <div class="hidden2 md:block">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-6 md:h-6 stroke-2 text-white -rotate-45">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                </svg>
            </div>
        </a>

    </div>

</section>