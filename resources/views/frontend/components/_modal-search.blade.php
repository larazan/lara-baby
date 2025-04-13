<div class="hidden w-7/12 md:w-6/12 ml-auto2 block2">
    <form action="{{ route('fact.search') }}" method="GET" class="flex items-center relative">

        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <img class="h-5 w-5 text-gray-400" alt="Search Milled" src="/frontend/img/search.svg">
        </div>
        <input 
            name="search" 
            class="block w-full pl-10 pr-3 py-2 border rounded-md leading-5 sm:text-sm
                border-gray-300 bg-white placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500" 
            placeholder="Search fun or fact" 
            type="search"
        >
        

        <div class="hidden flex2 w-full items-center rounded-md bg-white md:h-10 border border-gray-300 px-1 md:py-3 ">
            <button class="static inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-transparent text-gray-400 h-10 px-2 py-2 " type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 md:h-4 md:w-4">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </button>
            <input type="text" name="search" class="relative flex h-8 md:h-12 bg-transparent px-1 py-1 md:py-3 text-sm md:text-md ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50 w-full lg:w-[600px] focus-visible:ring-transparent border-none" placeholder="Search for fun and fact">
        </div>
    </form>
    {{--
    <div x-show="searchVisible" class="fixed inset-0 bg-slate-900 bg-opacity-30 z-50 transition-opacity" aria-hidden="true" style="display: none;" ></div>
    <div x-show="searchVisible" id="search-modal" class="fixed inset-0 z-50 overflow-hidden flex items-start top-20 mb-4 justify-center transform px-4 sm:px-6" role="dialog" aria-modal="true" style="display: none;" >
        <div @click.outside="searchVisible = false" class="bg-white overflow-auto max-w-2xl w-full max-h-full rounded-lg shadow-lg" >
            <form class="border-b">
                <div class="relative" >
                    <label for="search" class="sr-only">Search</label>
                    <input id="search" class="w-full border-0 focus:ring-transparent placeholder-slate-400 appearance-none py-3 pl-10 pr-4 outline-none bg-gray-100 text-[#9cb3c9]" type="search" placeholder="Search Quote or People...">
                    <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                        <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-4 mr-2" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z"></path>
                            <path d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z"></path>
                        </svg>
                    </button>
                </div>
            </form>
            <div class="py-3 md:py-6 px-6" >
                <div class="mb-3 last:mb-0" >
                    <div class="text-md font-semibold text-slate-500 capitalize px-2 mb-3" >Recent searches 2</div>
                    <ul class="w-full flex flex-col space-y-3">
                        <li class="flex justify-between items-center cursor-pointer w-full hover:text-indigo-500 pb-1 border-b">
                            <span class="text-sm leading-tight md:leading-normal text-slate-500">25 New Mom Gift Baskets That Are All About Her</span>
                            <div >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </div>
                        </li>
                        <li class="flex justify-between items-center cursor-pointer w-full hover:text-indigo-500 pb-1 border-b">
                            <span class="text-sm leading-tight md:leading-normal text-slate-500">33 Meditation Gifts to Help Find Your Inner Zen Master</span>
                            <div >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </div>
                        </li>
                        <li class="flex justify-between items-center cursor-pointer w-full hover:text-indigo-500 pb-1 border-b">
                            <span class="text-sm leading-tight md:leading-normal text-slate-500">25 New Mom Gift Baskets That Are All About Her</span>
                            <div >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mb-3 last:mb-0" >
                    <div class="text-md font-semibold text-slate-500 capitalize px-2 mb-3" >Recent pages</div>
                    <ul class="w-full flex flex-col space-y-3">
                        <li class="flex justify-between items-center cursor-pointer w-full hover:text-indigo-500 pb-1 border-b">
                            <span class="text-sm leading-tight md:leading-normal text-slate-500">33 Meditation Gifts to Help Find Your Inner Zen Master</span>
                            <div >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </div>
                        </li>
                        <li class="flex justify-between items-center cursor-pointer w-full hover:text-indigo-500 pb-1 border-b">
                            <span class="text-sm leading-tight md:leading-normal text-slate-500">25 New Mom Gift Baskets That Are All About Her</span>
                            <div >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </div>
                        </li>
                        <li class="flex justify-between items-center cursor-pointer w-full hover:text-indigo-500 pb-1 border-b">
                            <span class="text-sm leading-tight md:leading-normal text-slate-500">33 Meditation Gifts to Help Find Your Inner Zen Master</span>
                            <div >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"></path>
                                </svg>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    --}}
</div>