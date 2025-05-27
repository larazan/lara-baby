
<div x-data="{ showContent: false }"  >
<aside @click="showContent = !showContent" class="fixed flex w-[30px] right-0 left-2 md:left-4 top-1/2 transform -translate-y-1/2 z-20 cursor-pointer">
    <div class="relative w-full py-1 shadow-lg rounded-lg border bg-white hover:bg-gray-200 ">
        <div class=" flex flex-col justify-center items-center w-full h-full ">
            <div class="flex items-center px-.5 py-[0.2px] transition duration-500 ease-in-out text-gray-800 scale-105">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </div>
            <div class="flex items-center px-.5 py-[0.2px] transition duration-500 ease-in-out text-gray-500 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </div>
            <div class="flex items-center px-.5 py-[0.2px] transition duration-500 ease-in-out text-gray-500 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </div>
            <div class="flex items-center px-.5 py-[0.2px] transition duration-500 ease-in-out text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </div>
            <div class="flex items-center px-.5 py-[0.2px] transition duration-500 ease-in-out text-gray-500 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </div>
            <div class="flex items-center px-.5 py-[0.2px] transition duration-500 ease-in-out text-gray-500 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                </svg>
            </div>
        </div>
    </div>
</aside>

<template x-if="true">
<aside x-show="showContent" @click.away="showContent = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" @keydown.escape="showContent = false" x-cloak class="fixed flex w-[200px] max-h-[200px] md:w-[400px] md:max-h-[500px] overflow-auto right-0 left-11  top-1/2 transform -translate-y-1/2 z-30">
    <div class="relative w-full py-1 shadow-2xl rounded-lg bg-[#dbebfa] border border-blue-300 ">
        <div class=" flex flex-col items-center2 w-full h-full px-2 py-1 md:px-3 md:py-2 overflow-y-auto">
            <div class="flex items-start text-gray-800 text-[11px] md:text-lg font-sans md:font-bold uppercase tracking-wide">
                <span>table of content</span>
            </div>
            <div class="flex flex-col py-2 px-2 space-y-2 text-sm md:text-md text-gray-600 ">
               {!! $contents['index'] !!}
                <!-- <div onclick="getToScroll('The Struggle Against Apartheid')" class="hover:text-gray-900 truncate cursor-pointer">• The Struggle Against Apartheid</div>
                <div onclick="getToScroll('Leadership and Philosophy')" class="hover:text-gray-900 truncate cursor-pointer">• Leadership and Philosophy</div>
                <div onclick="getToScroll('Post-Apartheid South Africa')" class="hover:text-gray-900 truncate cursor-pointer">• Post-Apartheid South Africa</div>
                <div onclick="getToScroll('Global Impact and Lasting Legacy')" class="hover:text-gray-900 truncate cursor-pointer">• Global Impact and Lasting Legacy</div>
                <div onclick="getToScroll('Conclusion')" class="hover:text-gray-900 truncate cursor-pointer">• Conclusion</div> -->
            </div>
        </div>
    </div>
</aside>
</template>
</div>