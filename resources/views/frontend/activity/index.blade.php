@extends('frontend.layout')

@section('content')

<main class="overflow-hidden pt-0"><!--[-->
    <div class="relative">
        <div class="relative">
            <div class="w-full h-full absolute bg-sky-400"></div>
            <div class=" py-6 md:py-20 relative">
                <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">

                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-white figtree-bold">Activities</h1>
                        </div>
                        <div>
                            <p class="text-sm md:text-base md:leading-[25px] text-white text-center max-w-[905px] figtree-reguler">Keeping toddlers, preschoolers, kindergarteners, and kids entertained and learning can be a fun challenge. <span class="hidden">Our blog section is chock-full of activities and crafts that are perfect for sparking creativity and curiosity in children of all ages.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full pt-4 px-3 md:px-6 lg:px-10 xl:px-0 pb-10 md:pb-20">

            <!--  -->
            <div class="h-max flex flex-col">
                <div class="flex items-center">
                    <div class="w-full py-2 font-mono flex flex-wrap md:flex-nowrap items-center md:space-x-6">
                        <!-- activities -->
                        <div class="w-full flex flex-col ">
                            <div
                                x-data="{ open: false }"
                                @click.away="open = false"
                                @keydown.escape="open = false"
                                class="relative">
                                <span class="inline-block w-full ">
                                    <button
                                        x-ref="button"
                                        @click="open = !open"
                                        :aria-expanded="open"
                                        aria-haspopup="listbox"
                                        class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out border border-gray-800 cursor-default focus:outline-none focus:shadow-outline-blue sm:text-sm sm:leading-5 shadow-menu bg-blue-400">
                                        <span class="truncate text-sm figtree-reguler font-semibold uppercase text-white">Select Activity</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-white" :class="open ? 'rotate-90': ''" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                                <div
                                    x-show="open"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    class="absolute z-10 w-full mt-0 border border-gray-700 shadow-lg bg-blue-400">
                                    <ul
                                        role="listbox"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/activities') }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">Activities</span>
                                            </a>
                                        </li>
                                        @foreach($activityOption as $a)
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- ages -->
                        <div class="w-full flex flex-col ">
                            <div
                                x-data="{ open: false }"
                                @click.away="open = false"
                                @keydown.escape="open = false"
                                class="relative">
                                <span class="inline-block w-full rounded-md shadow-sm">
                                    <button
                                        x-ref="button"
                                        @click="open = !open"
                                        :aria-expanded="open"
                                        aria-haspopup="listbox"
                                        class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out border border-gray-800 cursor-default focus:outline-none focus:shadow-outline-blue sm:text-sm sm:leading-5 shadow-menu bg-orange-400">
                                        <span class="truncate text-sm figtree-reguler font-semibold uppercase text-white">Select Age</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-white" :class="open ? 'rotate-90': ''" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                                <div
                                    x-show="open"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    class="absolute z-10 w-full mt-0 border border-gray-700 shadow-lg bg-orange-400">
                                    <ul
                                        role="listbox"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/age') }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">Age</span>
                                            </a>
                                        </li>
                                        @foreach($ages as $a)
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- crafts -->
                        <div class="w-full flex flex-col ">
                            <div
                                x-data="{ open: false }"
                                @click.away="open = false"
                                @keydown.escape="open = false"
                                class="relative">
                                <span class="inline-block w-full rounded-md shadow-sm">
                                    <button
                                        x-ref="button"
                                        @click="open = !open"
                                        :aria-expanded="open"
                                        aria-haspopup="listbox"
                                        class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out border border-gray-800 cursor-default focus:outline-none focus:shadow-outline-blue sm:text-sm sm:leading-5 shadow-menu bg-pink-400">
                                        <span class="truncate text-sm figtree-reguler font-semibold uppercase text-white">Select Craft</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-white" :class="open ? 'rotate-90': ''" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                                <div
                                    x-show="open"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    class="absolute z-10 w-full mt-0 border border-gray-700 shadow-lg bg-pink-400">
                                    <ul
                                        role="listbox"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/crafts') }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">Crafts</span>
                                            </a>
                                        </li>
                                        @foreach($crafts as $a)
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="h-max flex flex-col">
                <div class="flex items-center">
                    <div class="w-full  py-2 font-mono flex flex-wrap md:flex-nowrap items-center md:space-x-6">
                        <!-- learnings -->
                        <div class="w-full flex flex-col ">
                            <div
                                x-data="{ open: false }"
                                @click.away="open = false"
                                @keydown.escape="open = false"
                                class="relative">
                                <span class="inline-block w-full rounded-md shadow-sm">
                                    <button
                                        x-ref="button"
                                        @click="open = !open"
                                        :aria-expanded="open"
                                        aria-haspopup="listbox"
                                        class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out border border-gray-800 cursor-default focus:outline-none focus:shadow-outline-blue sm:text-sm sm:leading-5 shadow-menu bg-purple-400">
                                        <span class="truncate text-sm figtree-reguler font-semibold uppercase text-white">Select Learning</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-white" :class="open ? 'rotate-90': ''" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                                <div
                                    x-show="open"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    class="absolute z-10 w-full mt-0 border border-gray-700 shadow-lg bg-purple-400">
                                    <ul
                                        role="listbox"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/learning') }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">Learning</span>
                                            </a>
                                        </li>
                                        @foreach($learnings as $a)
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- painting -->
                        <div class="w-full flex flex-col ">
                            <div
                                x-data="{ open: false }"
                                @click.away="open = false"
                                @keydown.escape="open = false"
                                class="relative">
                                <span class="inline-block w-full rounded-md shadow-sm">
                                    <button
                                        x-ref="button"
                                        @click="open = !open"
                                        :aria-expanded="open"
                                        aria-haspopup="listbox"
                                        class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out border border-gray-800 cursor-default focus:outline-none focus:shadow-outline-blue sm:text-sm sm:leading-5 shadow-menu bg-green-400">
                                        <span class="truncate text-sm figtree-reguler font-semibold uppercase text-white">Select Painting</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-white" :class="open ? 'rotate-90': ''" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                                <div
                                    x-show="open"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    class="absolute z-10 w-full mt-0 border border-gray-700 shadow-lg bg-green-400">
                                    <ul
                                        role="listbox"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/painting') }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">Painting</span>
                                            </a>
                                        </li>
                                        @foreach($painting as $a)
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- sensory -->
                        <div class="w-full flex flex-col ">
                            <div
                                x-data="{ open: false }"
                                @click.away="open = false"
                                @keydown.escape="open = false"
                                class="relative">
                                <span class="inline-block w-full rounded-md shadow-sm">
                                    <button
                                        x-ref="button"
                                        @click="open = !open"
                                        :aria-expanded="open"
                                        aria-haspopup="listbox"
                                        class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out border border-gray-800 cursor-default focus:outline-none focus:shadow-outline-blue sm:text-sm sm:leading-5 shadow-menu bg-yellow-400">
                                        <span class="truncate text-sm figtree-reguler font-semibold uppercase text-white">Select Sensory</span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                            <svg class="w-5 h-5 text-white" :class="open ? 'rotate-90': ''" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </span>
                                    </button>
                                </span>
                                <div
                                    x-show="open"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    class="absolute z-10 w-full mt-0 border border-gray-700 shadow-lg bg-yellow-400">
                                    <ul
                                        role="listbox"
                                        tabindex="-1"
                                        class="py-1 overflow-auto text-base leading-6 rounded max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/sensory') }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">Sensory</span>
                                            </a>
                                        </li>
                                        @foreach($sensory as $a)
                                        <li
                                            role="option"
                                            class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                            <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

            <!--  -->
            <div class="hidden py-3 md:py-1 md:pb-5 col-span-full col-start-1 flex2 flex-col gap-4 mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                <div class="py-2 md:py-1 pt-2 md:pb-5 col-span-full w-full col-start-1 flex flex-row items-center justify-between gap-2 md:col-start-52 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                    <div class="flex w-full gap-2 ">

                        <div class="mx-auto grid max-w-7xl grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
                            <!-- activities -->
                            <div class="w-full flex flex-col ">
                                <div
                                    x-data="{ open: false }"
                                    @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="relative">
                                    <span class="inline-block w-full rounded-md shadow-sm">
                                        <button
                                            x-ref="button"
                                            @click="open = !open"
                                            :aria-expanded="open"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-blue-400 border border-blue-500 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-600 sm:text-sm sm:leading-5">
                                            <span class="truncate text-xs font-semibold uppercase text-white">Select Activity</span>
                                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="w-5 h-5 " :class="open ? 'text-blue-600': 'text-white'" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </span>
                                    <div
                                        x-show="open"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                        class="absolute z-10 w-full mt-1 bg-blue-400 rounded-md shadow-lg">
                                        <ul
                                            role="listbox"
                                            tabindex="-1"
                                            class="py-1 overflow-auto text-base leading-6 rounded shadow-sm border max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                            @foreach($activityOption as $a)
                                            <li
                                                role="option"
                                                class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                                <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                    <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ages -->
                            <div class="w-full flex flex-col ">
                                <div
                                    x-data="{ open: false }"
                                    @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="relative">
                                    <span class="inline-block w-full rounded-md shadow-sm">
                                        <button
                                            x-ref="button"
                                            @click="open = !open"
                                            :aria-expanded="open"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-orange-400 border border-orange-500 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-600 sm:text-sm sm:leading-5">
                                            <span class="truncate text-xs font-semibold uppercase text-white">Select Age</span>
                                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="w-5 h-5 " :class="open ? 'text-blue-600': 'text-white'" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </span>
                                    <div
                                        x-show="open"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                        class="absolute z-10 w-full mt-1 bg-orange-400 rounded-md shadow-lg">
                                        <ul
                                            role="listbox"
                                            tabindex="-1"
                                            class="py-1 overflow-auto text-base leading-6 rounded shadow-sm border max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                            @foreach($ages as $a)
                                            <li
                                                role="option"
                                                class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                                <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                    <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- crafts -->
                            <div class="w-full flex flex-col ">
                                <div
                                    x-data="{ open: false }"
                                    @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="relative">
                                    <span class="inline-block w-full rounded-md shadow-sm">
                                        <button
                                            x-ref="button"
                                            @click="open = !open"
                                            :aria-expanded="open"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-pink-400 border border-pink-500 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-600 sm:text-sm sm:leading-5">
                                            <span class="truncate text-xs font-semibold uppercase text-white">Select Craft</span>
                                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="w-5 h-5 " :class="open ? 'text-blue-600': 'text-white'" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </span>
                                    <div
                                        x-show="open"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                        class="absolute z-10 w-full mt-1 bg-pink-400 rounded-md shadow-lg">
                                        <ul
                                            role="listbox"
                                            tabindex="-1"
                                            class="py-1 overflow-auto text-base leading-6 rounded shadow-sm border max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                            @foreach($crafts as $a)
                                            <li
                                                role="option"
                                                class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                                <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                    <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- learnings -->
                            <div class="w-full flex flex-col ">
                                <div
                                    x-data="{ open: false }"
                                    @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="relative">
                                    <span class="inline-block w-full rounded-md shadow-sm">
                                        <button
                                            x-ref="button"
                                            @click="open = !open"
                                            :aria-expanded="open"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-indigo-400 border border-indigo-500 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-600 sm:text-sm sm:leading-5">
                                            <span class="truncate text-xs font-semibold uppercase text-white">Select Learning</span>
                                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="w-5 h-5 " :class="open ? 'text-blue-600': 'text-white'" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </span>
                                    <div
                                        x-show="open"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                        class="absolute z-10 w-full mt-1 bg-indigo-400 rounded-md shadow-lg">
                                        <ul
                                            role="listbox"
                                            tabindex="-1"
                                            class="py-1 overflow-auto text-base leading-6 rounded shadow-sm border max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                            @foreach($learnings as $a)
                                            <li
                                                role="option"
                                                class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                                <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                    <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- painting -->
                            <div class="w-full flex flex-col ">
                                <div
                                    x-data="{ open: false }"
                                    @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="relative">
                                    <span class="inline-block w-full rounded-md shadow-sm">
                                        <button
                                            x-ref="button"
                                            @click="open = !open"
                                            :aria-expanded="open"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-green-400 border border-green-500 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-600 sm:text-sm sm:leading-5">
                                            <span class="truncate text-xs font-semibold uppercase text-white">Select Painting</span>
                                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="w-5 h-5 " :class="open ? 'text-blue-600': 'text-white'" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </span>
                                    <div
                                        x-show="open"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                        class="absolute z-10 w-full mt-1 bg-green-400 rounded-md shadow-lg">
                                        <ul
                                            role="listbox"
                                            tabindex="-1"
                                            class="py-1 overflow-auto text-base leading-6 rounded shadow-sm border max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                            @foreach($painting as $a)
                                            <li
                                                role="option"
                                                class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                                <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                    <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- sensory -->
                            <div class="w-full flex flex-col ">
                                <div
                                    x-data="{ open: false }"
                                    @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="relative">
                                    <span class="inline-block w-full rounded-md shadow-sm">
                                        <button
                                            x-ref="button"
                                            @click="open = !open"
                                            :aria-expanded="open"
                                            aria-haspopup="listbox"
                                            class="relative z-0 w-full py-2 pl-3 pr-10 text-left transition duration-150 ease-in-out bg-yellow-400 border border-yellow-500 rounded-md cursor-default focus:outline-none focus:shadow-outline-blue focus:border-blue-600 sm:text-sm sm:leading-5">
                                            <span class="truncate text-xs font-semibold uppercase text-white">Select Sensory</span>
                                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                                <svg class="w-5 h-5 " :class="open ? 'text-blue-600': 'text-white'" viewBox="0 0 20 20" fill="none" stroke="currentColor">
                                                    <path d="M7 7l3-3 3 3m0 6l-3 3-3-3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </span>
                                        </button>
                                    </span>
                                    <div
                                        x-show="open"
                                        x-transition:leave="transition ease-in duration-100"
                                        x-transition:leave-start="opacity-100"
                                        x-transition:leave-end="opacity-0"
                                        x-cloak
                                        class="absolute z-10 w-full mt-1 bg-yellow-400 rounded-md shadow-lg">
                                        <ul
                                            role="listbox"
                                            tabindex="-1"
                                            class="py-1 overflow-auto text-base leading-6 rounded shadow-sm border max-h-60 focus:outline-none sm:text-sm sm:leading-5">
                                            @foreach($sensory as $a)
                                            <li
                                                role="option"
                                                class="relative w-full text-white font-semibold select-none hover:text-white hover:bg-indigo-600">
                                                <a href="{{ url('activities/'.$a->slug) }}" class="w-full ">
                                                    <span class="block truncate py-1.5 pl-3 text-xs capitalize figtree-reguler">{{ $a->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-6 md:mt-12 flex justify-between items-center">
                <span class="flex px-3 py-1 bg-gray-700 text-white text-sm rounded-full w-fit font-medium figtree-reguler">{{ $title }}</span>
                <span class="text-gray-800 text-lg md:text-2xl pl-3 figtree-medium">
                    Found <span class="font-bold">{{ $count }}</span> results</span>
            </div>
            <!--  -->
            @if($activities->count() > 0)
            <div class="mt-4 md:mt-6 mx-auto grid max-w-7xl grid-cols-2 gap-2 md:gap-6 lg:gap-8 md:grid-cols-3 lg:grid-cols-4"><!--[-->
                @foreach($activities as $act)
                <article class="relative flex flex-col shadow-stack-sm items-start justify-between w-full h-full bg-white p-2 md:p-4 group rounded-lg md:rounded-2xl border-2 border-gray-800 hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.12)]">
                    <a href="{{ url('activity/'. $act->slug) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
                    <div class="w-full mb-4">
                        <div class="relative aspect-[16/9] w-full h-[150px] md:h-[166px] xl:h-[216px] rounded-md md:rounded-xl bg-gray-100 overflow-hidden">
                            @if($act->original)
                            <img
                                src="{{ asset('storage/'.$act->original) }}"
                                data-src="{{ asset('storage/'.$act->original) }}"
                                data-srcset="{{ asset('storage/'.$act->original. ' 860w') }},
                                            {{ asset('storage/'.$act->original. ' 640w') }},
                                            {{ asset('storage/'.$act->original. ' 420w') }}"
                                alt="{{ $act->title }}"
                                class="max-w-full md:max-w-none w-full h-full object-cover md:-mx-4 md:-mt-4 mb-0 rounded-xl"
                                loading="lazy"
                                width="345" height="216">
                            @else
                            <img
                                src="{{ asset('frontend/img/Image-not-found.png') }}"
                                data-src="{{ asset('frontend/img/Image-not-found.png') }}"
                                data-srcset="{{ asset('frontend/img/Image-not-found.png 860w') }},
                                            {{ asset('frontend/img/Image-not-found.png 640w') }},
                                            {{ asset('frontend/img/Image-not-found.png 420w') }}"
                                class="w-full md:max-w-none h-full object-cover md:-mx-4 md:-mt-4 mb-0 rounded-xl" alt="" loading="lazy">
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col justify-between w-full h-full">
                        <div>
                            <span class="flex px-2 py-1 bg-orange-500 text-white text-xs rounded-full w-fit font-medium figtree-reguler">{{ $act->category->name }}</span>
                            <h2 class="mt-2 text-base leading-tight md:text-lg md:leading-[27px] xl:text-2xl font-semibold text-gray-800 figtree-medium group-hover:text-orange-500">{{ $act->title }}</h2>
                        </div>
                        <div class="flex items-center mt-4 space-x-2 text-[#00989d] !hover:text-[#06329d]">
                            <a href="{{ url('activity/'. $act->slug) }}" class="text-xs lg:text-base font-bold leading-6 figtree-reguler flex gap-2 items-center uppercase">Read more</a>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 stroke-2">
                                    <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </div>

                    </div>
                </article>
                @endforeach

            </div>
            @else
            <div class="flex items-center justify-center mx-auto w-full">
                <span class="font-semibold text-md text-red-500 figtree-medium">No record found!</span>
            </div>
            @endif
            <div class="bg-white mt-0 md:mt-1">
                <!-- paginate -->
                {{ $activities->links() }}
            </div>
        </div>
    </div><!--]-->
</main>

@endsection