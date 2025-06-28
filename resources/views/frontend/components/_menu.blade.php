@php
$categories = \App\Models\Category::select(['name', 'slug', 'parent_id'])->whereNull('parent_id')->get();
@endphp

<div>
    <ul
        id="menubar" x-cloak
        x-show="menuOpen"
        :class="menuOpen ? 'opacity-100' : 'top-full'"
        class="z-40 fixed flex max-w-full top-[56px] md:top-[60px] inset-x-0 bottom-0 w-screen  flex-col gap-2 overflow-y bg-white px-0 pt-0 pb-[24px]"
        x-transition:enter="transition ease-gentle duration-300"
        x-transition:enter-start="-translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition ease-gentle duration-300"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-full">
        <li class="block md:hidden">
            <div class="px-4">
                <x-search />
            </div>
            {{-- 
            <form action="{{ route('search') }}" method="GET" class="mt-3 mx-auto max-w-md md:max-w-xl w-full py-1 px-6 rounded-full bg-gray-50 border flex focus-within:border-gray-300">
                @csrf
                <input type="text" placeholder="Search anything" class="bg-transparent w-full focus:outline-none pr-4 font-semibold border-0 focus:ring-0 px-0 py-0" name="keyword">
                <button type="submit" class="flex flex-row items-center justify-center min-w-[100px] px-4 rounded-full font-medium tracking-wide border disabled:cursor-not-allowed disabled:opacity-50 transition ease-in-out duration-150 text-base bg-black text-white font-medium tracking-wide border-transparent py-1.5 h-[38px] -mr-5">
                    Search
                </button>
            </form>
            --}}
        </li>
        <li class="text-large2 overflow-auto" data-open="true">
            <div class="w-full px-0 border-t-1 border-t-gray-300">
                <!-- submenu -->
                <div class="w-full px-6" x-data="{ subOpen:false }">
                    <button :class="subOpen ? 'text-[#02979a]' : 'text-[#475569] hover:text-orange-500 border-b'" @click="subOpen = !subOpen" type="button" aria-expanded="true" class="w-full flex justify-between items-center gap-2  py-3 md:py-4 text-md md:text-[18px] font-bold">
                        <span>Pregnancy</span>
                        <span>
                            <svg :class="subOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-8 md:h-8 transition-all">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>
                    <div
                        x-show="subOpen"
                        class="px-2 pb-4 md:pb-8 border-b border-[#a6b8cf] "
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-6"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-6">
                        <div class="grid grid-cols-1">
                            <div class="py-0 lg:py-6 px-4 xl:py-8 xl:px-6 order-1 lg:order-2">
                                <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                                    <li>
                                        <a href="/profil" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Pregnancy Tracker</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/organisasi" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Trying to Conceive</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/pejabat" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Signs & Symptoms</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/balai-upt" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Pregnancy Health</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/balai-upt" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>High Risk Pregnancies</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/balai-upt" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Preparing for Baby</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/balai-upt" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Concerns & Complications</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/balai-upt" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Labor & Delivery</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/balai-upt" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Postpartum</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!--  -->

                <!-- submenu -->
                <div class="w-full px-6" x-data="{ subOpen:false }">
                    <button :class="subOpen ? 'text-[#02979a]' : 'text-[#475569] hover:text-orange-500 border-b'" @click="subOpen = !subOpen" type="button" aria-expanded="true" class="w-full flex justify-between items-center gap-2 py-3 md:py-4 text-md md:text-[18px] font-bold">
                        <span>Parenting</span>
                        <span>
                            <svg :class="subOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-8 md:h-8 transition-all">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>
                    <div
                        x-show="subOpen"
                        class="px-2 pb-4 md:pb-8 border-b border-[#a6b8cf] "
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-6"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-6">
                        <div class="grid grid-cols-1">

                            <div class="py-0 lg:py-6 px-4 xl:py-8 xl:px-6 order-1 lg:order-2">
                                <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                                    <li>
                                        <a href="/profil" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Babies</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/organisasi" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Toddlers</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/pejabat" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Kids</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/pejabat" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Teens</p>
                                        </a>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!--  -->
                <!-- submenu -->
                <div class="w-full px-6" x-data="{ subOpen:false }">
                    <button :class="subOpen ? 'text-[#02979a]' : 'text-[#475569] hover:text-orange-500 border-b'" @click="subOpen = !subOpen" type="button" aria-expanded="true" class="w-full flex justify-between items-center gap-2 py-3 md:py-4 text-md md:text-[18px] font-bold">
                        <span>Baby Names</span>
                        <span>
                            <svg :class="subOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-8 md:h-8 transition-all">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>
                    <div
                        x-show="subOpen"
                        class="px-2 pb-4 md:pb-8 border-b border-[#a6b8cf] "
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-6"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-6">
                        <div class="grid grid-cols-1">

                            <div class="py-0 lg:py-6 px-4 xl:py-8 xl:px-6 order-1 lg:order-2">
                                <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                                    <li>
                                        <a href="/profil" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Browse All Baby Names</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/organisasi" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Top Girl Names</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/pejabat" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Top Boy Names</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/profil/balai-upt" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>Trending Names</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!--  -->
                <!-- activity -->
                <div class="w-full px-6" x-data="{ subOpen:false }">
                    <button :class="subOpen ? 'text-[#02979a]' : 'text-[#475569] hover:text-orange-500 border-b'" @click="subOpen = !subOpen" type="button" aria-expanded="true" class="w-full flex justify-between items-center gap-2 py-3 md:py-4 text-md md:text-[18px] font-bold">
                        <span>Activities</span>
                        <span>
                            <svg :class="subOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-8 md:h-8 transition-all">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>
                    <div
                        x-show="subOpen"
                        class="px-2 pb-4 md:pb-8 border-b border-[#a6b8cf] "
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-6"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-6">
                        <div class="grid grid-cols-1">

                            <div class="py-0 lg:py-6 px-4 xl:py-8 xl:px-6 order-1 lg:order-2">
                                <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                                    @foreach($categories as $c)
                                    <li>
                                        <a href="{{ url('activities/'.$c->slug) }}" class="flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                                            <p>{{ $c->name }}</p>
                                        </a>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <!--  -->
                <!-- submenu -->
                <div class="w-full px-6">
                    <a href="{{ url('articles') }}" class="w-full flex justify-between items-center gap-2 py-3 md:py-4 text-md md:text-[18px] font-bold text-[#475569] hover:text-orange-500">
                        <span>News</span>
                    </a>
                    
                </div>
                <!--  -->
            </div>
            <div class="flex flex-col md:flex-row gap-[20px] px-[24px] py-10 md:justify-center">
                <a
                    class="z-0 group relative inline-flex items-center justify-center rounded-full box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent data-[pressed=true]:scale-[0.97] outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-4 text-small rounded-medium [&amp;>svg]:max-w-[theme(spacing.8)] transition-transform-colors-opacity motion-reduce:transition-none text-default-foreground data-[hover=true]:opacity-hover min-w-[110px] h-[53px] gap-[12px] bg-transparent  disabled:border-gray-400 disabled:text-gray-400 focus:bg-indigo-100 focus:border-[2px] hover:bg-indigo-100 active:bg-indigo-100 active:border-[2px] data-[hover=true]:opacity-1 shadow-menu border-2 border-gray-800"
                    role="button"
                    tabindex="0"
                    type="button"
                    href="{{ url('login') }}">
                    <p dir="ltr" class="text-[18px]2 leading-[29px]2 font-semibold  pointer-events-none !text-[16px] !leading-[22px] text-indigo-600">Log in</p>
                </a>
                <a
                    class="z-0 group relative inline-flex items-center justify-center rounded-full box-border appearance-none select-none whitespace-nowrap font-normal subpixel-antialiased overflow-hidden tap-highlight-transparent data-[pressed=true]:scale-[0.97] outline-none data-[focus-visible=true]:z-10 data-[focus-visible=true]:outline-2 data-[focus-visible=true]:outline-focus data-[focus-visible=true]:outline-offset-2 px-4 text-small rounded-medium [&amp;>svg]:max-w-[theme(spacing.8)] transition-transform-colors-opacity motion-reduce:transition-none text-default-foreground data-[hover=true]:opacity-hover min-w-[110px]  h-[53px] gap-[12px] bg-indigo-600  active:bg-indigo-700  focus:bg-indigo-700 hover:bg-indigo-700 data-[hover=true]:opacity-1 shadow-menu border-2 border-gray-600"
                    role="button"
                    tabindex="0"
                    type="button"
                    href="{{ url('register') }}">
                    <p dir="ltr" class="text-[18px]2 leading-[29px]2 font-semibold  text-gray-100 pointer-events-none !text-[16px] !leading-[22px]">Register</p>
                </a>
            </div>
        </li>
    </ul>
</div>