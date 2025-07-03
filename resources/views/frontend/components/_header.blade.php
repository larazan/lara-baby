<div
    x-data="{ isScroll: false }"
    x-init="window.addEventListener('scroll', () => { isScroll = window.scrollY > 10; })"
    :class="isScroll ? 'backdrop-blur-[20px] bg-[rgba(255,255,255,1)] drop-shadow-[0px_4px_3px_rgba(45,47,122,0.15)]' : ''"
    class="sticky z-40 top-0 w-full flex justify-center bg-white transition-all duration-1000 ease-in-out">
    <nav
        
        class="flex z-40 items-center justify-center sticky top-0 inset-x-0 bg-basic-transparent h-[56px] md:h-[60px] transition-height duration-1000 ease-in-out max-w-[1170px] w-full px-[24px] desktop:px-0"
    >
        <header class="z-40 flex gap-4 w-full flex-row relative flex-nowrap items-center max-w-[1280px] justify-center px-0 h-[68px] desktop:h-[110px]">
            <div class="flex flex-row flex-grow2 flex-nowrap justify-start bg-transparent items-center no-underline text-medium whitespace-nowrap box-border flex-none flex-grow-0">
                <a id="menu-ee-logo" href="/">
                    <img
                        alt="EE logo"
                        loading="lazy"
                        width="100"
                        height="100"
                        decoding="async"
                        data-nimg="1"
                        class="transition-all duration-700 ease-in-out"
                        src="/frontend/img/fimela.png"
                    />
                </a>
            </div>
           
            <div class="hidden md:block">
                <x-search />
            </div>
            
            <ul
                class="flex gap-4 h-full flex-row flex-nowrap items-center data-[justify=start]:justify-start data-[justify=start]:flex-grow data-[justify=start]:basis-0 data-[justify=center]:justify-center data-[justify=end]:justify-end data-[justify=end]:flex-grow data-[justify=end]:basis-0 desktop:hidden"
                data-justify="end"
            >
            <li>
                
            </li>
                @include('frontend.components._language')
                <li class="h-full block md:hidden">
                    <button
                        class="group flex items-center justify-center w-6 h-full rounded-small tap-highlight-transparent outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2"
                        type="button"
                        tabindex="0"
                        aria-label="Open menu"
                        aria-pressed="false"
                        @click="menuOpen = !menuOpen" aria-controls="menubar" :aria-expanded="menuOpen"
                    >
                        <span class="sr-only">open navigation menu</span>
                        <span
                            class="w-full h-full pointer-events-none flex flex-col items-center justify-center text-inherit group-data-[pressed=true]:opacity-70 transition-opacity before:content-[''] before:block before:w-6 before:transition-transform before:duration-150 before:-translate-y-1 before:rotate-0 group-data-[open=true]:before:rotate-45 after:content-[''] after:block after:w-6 after:transition-transform after:duration-150 after:translate-y-1 after:rotate-0 group-data-[open=true]:after:translate-y-0 group-data-[open=true]:after:-rotate-45 after:h-[2px] after:bg-snow-400 before:h-[2px] before:bg-snow-400 group-data-[open=true]:before:translate-y-[2px] group-data-[open=true]:after:bg-indigo-600 group-data-[open=true]:before:bg-indigo-600"
                        >
                            <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 md:size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg x-show="menuOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 md:size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>

                        </span>
                    </button>
                </li>
            </ul>
        </header>
    </nav>
</div>
