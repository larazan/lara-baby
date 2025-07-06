<!-- toc -->
<div x-data="{ open:false }" @click.away="open = false" class="flex flex-col w-full">

<div
    x-data="{ isVisible: false }"
    x-init="window.addEventListener('scroll', () => { isVisible = window.scrollY > 100; })"
    x-show="isVisible"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-2"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-out duration-100"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-0">
    <div  class="fixed top-[40px] z-20 flex flex-col w-full px-5 py-3 bg-[#dbebfa] border-y border-blue-800 my-4 shadow-md">
        <div class="flex w-full max-w-2xl mx-auto justify-center items-center space-x-1 cursor-pointer" @click="open = !open">
            <span class="font-bold text-lg text-gray-800 figtree-medium">Table of contents</span>
            <span class="text-primary font-normal text-2xl">
                <!-- <svg :class="open ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-8 md:h-8 transition-all">
<path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
</svg> -->
                <svg :class="open ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" />
                </svg>
            </span>
        </div>
        <nav x-show="open"   aria-label="Table of contents"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-6"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-6"
            class="py-2 max-h-80 overflow-auto">
            <div class="flex flex-col py-2 px-2 space-y-2 text-sm md:text-md text-gray-700 overflow-y-auto">
            {!! $contents['index'] !!}
            </div>
            <ul class="hidden list-unstyled">
                <li class="py-1 md:py-1.5 toc-active ">
                    <a href="#baby-girl-names-inspired-by-the-beatles-" class="text-base md:text-md text-gray-900 hover:text-orange-500 font-semibold figtree-medium">Baby Girl Names Inspired by The Beatles &nbsp;</a>
                </li>
                <li class="py-1 md:py-1.5">
                    <a href="#the-beatles-names-for-boys" class="text-base md:text-md text-gray-900 hover:text-orange-500 font-semibold figtree-medium">The Beatles Names for Boys</a>
                </li>
                <li class="py-1 md:py-1.5">
                    <a href="#unisex-baby-names-inspired-by-the-beatles" class="text-base md:text-md text-gray-900 hover:text-orange-500 font-semibold figtree-medium">Unisex Baby Names Inspired by The Beatles</a>
                </li>
                <li class="py-1 md:py-1.5">
                    <a href="#finding-inspiration-that-lasts-" class="text-base md:text-md text-gray-900 hover:text-orange-500 font-semibold figtree-medium">Finding Inspiration That Lasts &nbsp;</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

</div>
<!--  -->