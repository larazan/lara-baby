<section class="w-1/3 flex justify-start items-between ">
    <div class="space-y-2 w-fit justify-start cursor-pointer text-slate-800" @click="openSearch = !openSearch" aria-controls="searchSection" :aria-expanded="openSearch" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="text-slate-900 transition-all duration-300 w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
    </div>
    <div
        id="searchSection" x-cloak
        x-show="openSearch"
        :class="openSearch ? 'right-0' : '-right-1'"
        class="flex flex-col bg-white opacity-952 w-full h-[100vh] z-20 fixed top-0 text-white text-4xl font-bold  flex-1 justify-between transform overflow-auto ease-in-out -translate-x-0 transition-all duration-300"
        x-transition:enter="transition ease-gentle duration-300"
        x-transition:enter-start="-translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition ease-gentle duration-300"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-full">
        <div class="flex flex-col">
            <div class="flex flex-row justify-end items-center px-4 py-4">
                
                <div class="cursor-pointer w-8 h-8 flex justify-center items-center rounded-full shadow bg-white hover:bg-slate-50" @click.stop="openSearch = !openSearch">
                    <svg class="h-6 w-8 text-gray-900" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col space-y-2 text-[#001838] mx-auto w-full justify-center items-center">
                <div class="capitalize text-lg md:text-2xl font-bold ">Search in Apps</div>
                <div class="flex flex-col space-y-1 max-w-sm w-full md:max-w-lg">
                    <span class="text-sm font-semibold">What are you looking for?</span>
                    <div class="">
                        <form action="{{ route('fact.search') }}" method="GET" class="flex items-center relative">
                            @csrf
                            <div class="flex w-full items-center rounded-lg bg-gray-100 h-12 border border-slate-300 px-1 py-3">
                                <button class="static inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-transparent text-gray-400 h-10 px-2 py-2 " type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.3-4.3"></path>
                                    </svg>
                                </button>
                                <input type="text" name="search" class="relative flex h-12 bg-transparent px-1 py-3 border-none ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50 w-full lg:w-[600px] focus-visible:ring-transparent" placeholder="search facts">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>