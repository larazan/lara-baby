@php
$browse = Cache::remember('browse', now()->addHour(), function () {
    return DB::table('categories')->select(['name','slug'])->where('parent_id', null)->get();
});
@endphp

<header
  class="fixed z-30 w-full px-3 md:px-10 py-2 md:py-1.5 items-center transition duration-300 ease-out bg-white "
  x-data="{ menuOpen: false, textD: 'test', isBordered: false }"
  x-init="window.addEventListener('scroll', () => { isBordered = window.scrollY > 100; })"
  :class="isBordered ? 'border-b shadow-sm bg-white/60 backdrop-filter backdrop-blur-sm' : ''">
  <div class="flex items-center justify-between mx-auto max-w-5xl">
    <div class="flex w-3/12 md:w-2/12 md:py-1 items-center text-gray-800">
      <a href="/">
        <img src="/frontend/img/logo.png" alt="logo" class="w-full h-8 md:h-10" />
        <!-- <svg xmlns="http://www.w3.org/2000/svg" width="40.000000pt" height="40.000000pt" viewBox="0 0 1025.000000 1025.000000">
        <g transform="translate(0.000000,1025.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
          <path class="fill-current" d="M5902 7524 c-54 -38 -52 18 -52 -1174 0 -999 2 -1105 16 -1136 29 -61 46 -64 309 -64 265 0 282 3 334 66 17 22 173 269 345 549 173 281 320 511 327 513 9 1 138 -200 340 -530 236 -385 336 -540 363 -562 l38 -31 248 -3 c211 -3 254 -1 279 13 65 33 61 -36 61 1180 0 962 -2 1110 -15 1135 -30 58 -39 60 -282 60 l-223 0 -32 -29 -33 -29 -5 -649 c-4 -582 -7 -648 -21 -651 -11 -2 -96 129 -303 467 -320 523 -302 501 -416 501 -115 0 -96 22 -417 -501 -201 -329 -292 -469 -303 -467 -13 3 -16 77 -20 643 -5 677 -4 666 -52 699 -33 24 -453 23 -486 0z"></path>
          <path class="fill-current" d="M1173 7515 c-18 -8 -42 -29 -53 -47 -20 -33 -20 -48 -20 -1139 l0 -1106 23 -34 c36 -54 73 -61 297 -57 209 3 220 6 258 60 15 21 18 87 22 643 5 604 6 620 24 620 15 0 130 -163 447 -630 236 -346 440 -640 454 -652 40 -35 89 -43 265 -43 187 0 220 9 252 70 17 33 18 87 18 1130 0 1022 -1 1097 -18 1130 -31 62 -61 70 -280 70 -212 0 -246 -7 -279 -56 -17 -26 -18 -69 -23 -649 -5 -612 -5 -620 -25 -620 -15 0 -120 148 -445 629 -234 346 -438 639 -453 652 -15 13 -44 28 -65 33 -57 17 -360 13 -399 -4z"></path>
          <path class="fill-current" d="M4284 7505 c-593 -105 -983 -611 -951 -1235 20 -379 175 -689 450 -897 283 -214 667 -283 1043 -188 358 91 652 369 773 731 96 287 84 646 -30 915 -144 338 -431 578 -788 660 -115 27 -382 34 -497 14z m370 -555 c170 -43 294 -144 371 -303 131 -272 87 -594 -110 -793 -118 -120 -240 -169 -420 -168 -177 1 -310 56 -422 173 -157 163 -217 439 -147 680 59 207 230 373 427 416 92 20 211 18 301 -5z"></path>
          <path fill="#FC7753" d="M1815 4816 c-195 -38 -366 -155 -455 -311 -100 -175 -105 -391 -14 -573 44 -89 75 -122 113 -122 45 0 321 134 323 157 3 38 -3 55 -39 108 -63 95 -57 197 16 278 95 106 261 117 366 25 154 -135 96 -343 -133 -477 -37 -22 -182 -95 -322 -164 -272 -134 -338 -177 -415 -275 -202 -254 -191 -609 27 -846 199 -218 524 -297 826 -201 80 26 187 89 284 168 36 29 68 47 83 47 20 0 54 -29 150 -128 l123 -127 247 0 c244 0 247 0 265 22 10 13 16 31 13 40 -2 10 -230 247 -506 526 -386 390 -507 508 -526 507 -22 0 -277 -137 -313 -168 -10 -8 -18 -29 -18 -45 0 -25 19 -49 105 -137 114 -115 118 -125 85 -189 -39 -77 -137 -134 -230 -134 -169 0 -297 122 -308 297 -4 63 -1 78 21 122 49 97 153 170 397 277 188 83 221 100 308 160 186 128 286 297 299 502 10 178 -47 333 -173 465 -40 41 -101 92 -136 113 -133 79 -315 112 -463 83z"></path>
          <path class="fill-current" d="M3510 4793 c-75 -38 -70 43 -70 -1203 0 -1101 0 -1115 20 -1148 34 -55 65 -62 286 -62 216 0 246 6 277 59 16 27 17 83 17 649 0 341 3 627 6 636 3 9 15 16 25 16 23 0 21 2 348 -531 165 -271 250 -401 268 -410 40 -21 181 -19 213 4 14 9 151 223 306 475 245 399 284 457 305 457 l24 0 5 -641 c5 -624 6 -643 25 -664 42 -46 62 -50 277 -50 186 0 206 2 236 20 65 40 62 -23 62 1197 0 1239 5 1158 -70 1196 -31 16 -61 17 -277 15 l-241 -3 -43 -30 c-35 -25 -94 -114 -373 -568 -264 -429 -335 -537 -350 -535 -13 2 -121 170 -346 538 -275 449 -335 540 -370 565 l-42 30 -241 3 c-216 2 -246 1 -277 -15z"></path>
          <path class="fill-current" d="M7195 4795 c-388 -71 -697 -315 -834 -657 -74 -184 -100 -431 -67 -633 48 -288 205 -583 417 -779 349 -323 823 -390 1249 -176 219 110 405 289 503 485 37 75 87 222 87 258 0 38 -30 90 -62 110 -32 21 -418 70 -451 58 -26 -10 -67 -56 -67 -76 0 -29 -105 -158 -163 -202 -209 -155 -456 -176 -643 -55 -77 50 -92 68 -73 87 8 7 304 149 658 314 355 166 653 309 664 319 28 25 65 92 72 133 6 30 -2 52 -54 155 -178 350 -467 585 -806 655 -107 22 -321 24 -430 4z m270 -579 c68 -18 141 -57 194 -104 35 -30 44 -45 44 -70 0 -18 -4 -37 -10 -43 -18 -18 -712 -339 -733 -339 -36 0 -60 35 -60 89 0 212 124 385 323 450 104 34 165 38 242 17z"></path>
        </g>
      </svg> -->
      </a>
    </div>
    
    <x-search-dropdown />

    <div class="flex space-x-1 md:space-x-3 font-bold text-gray-900 items-center">
      <div class="flex2 hidden items-center">
        <button @click="showSearch($event)" @keyup.window.slash="showSearch($event)" class="hover:text-lio-500">
          <span class="h-5 w-5 hidden md:block">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-06">
              <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
          </span>
        </button>

      </div>
      
      @include('frontend.components._language')
      @include('frontend.components._browse')
      <a href="{{ route('topics') }}" class="hidden md:block hover:text-[#20bd70] @if(in_array(Request::segment(1), ['topics'])){{ 'text-[#20bd70]' }}@else{ 'text-gray-900' }@endif">
        Topics
      </a>
      <a href="{{ route('articles') }}" class="hidden md:block hover:text-[#20bd70] @if(in_array(Request::segment(1), ['articles'])){{ 'text-[#20bd70]' }}@else{ 'text-gray-900' }@endif">
        Articles
      </a>
{{-- 
      <div class="hidden flex2 items-center gap-x-2 ml-auto">
        <button class="inline-flex items-center justify-center text-white text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-[#1972f5] hover:opacity-90 hover:text-accent-foreground h-9 rounded-md px-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-in h-4 w-4 mr-2">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
            <polyline points="10 17 15 12 10 7"></polyline>
            <line x1="15" x2="3" y1="12" y2="12"></line>
          </svg>
          Login
        </button>
      </div>
--}}
      


      <section class="MOBILE-MENU flex md:hidden justify-start items-between">
        <div class="HAMBURGER-ICON space-y-2 w-fit md:justify-start cursor-pointer p-1 rounded-full bg-white" @click="menuOpen = !menuOpen" aria-controls="menubar" :aria-expanded="menuOpen" aria-expanded="false">
          <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
            <path fillRule="evenodd" clipRule="evenodd" d="M3.25011 7C3.25011 6.58579 3.5859 6.25 4.00011 6.25H20.0001C20.4143 6.25 20.7501 6.58579 20.7501 7C20.7501 7.41421 20.4143 7.75 20.0001 7.75H4.00011C3.5859 7.75 3.25011 7.41421 3.25011 7ZM3.25011 12C3.25011 11.5858 3.5859 11.25 4.00011 11.25L20.0001 11.25C20.4143 11.25 20.7501 11.5858 20.7501 12C20.7501 12.4142 20.4143 12.75 20.0001 12.75L4.00011 12.75C3.5859 12.75 3.25011 12.4142 3.25011 12ZM4.00011 16.25C3.5859 16.25 3.25011 16.5858 3.25011 17C3.25011 17.4142 3.5859 17.75 4.00011 17.75H20.0001C20.4143 17.75 20.7501 17.4142 20.7501 17C20.7501 16.5858 20.4143 16.25 20.0001 16.25H4.00011Z"></path>
          </svg>
        </div>

        <div
          id="menubar" x-cloak
          x-show="menuOpen"
          :class="menuOpen ? 'right-0' : 'right-full'"
          class="flex flex-col bg-white w-full h-[100vh] z-10 fixed top-0 text-slate-900 text-4xl font-bold  flex-1 justify-between transform overflow-auto ease-in-out -translate-x-0 transition-all duration-300"
          x-transition:enter="transition ease-gentle duration-300"
          x-transition:enter-start="-translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transition ease-gentle duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="-translate-x-full">
          <div class="flex flex-col">
            <div class="flex bg-white flex-row border-b justify-between items-center px-4 py-3">
              <div class=" flex flex-row space-x-4 w-full items-center">
                <div class="flex justify-center items-center">
                  <a href="{{ url('/') }}">
                    <img src="/frontend/img/logo.png" class="h-8 w-full " alt="logo" />
                  </a>
                </div>

              </div>
              <div class="cursor-pointer rounded-full px-.5 py-1 bg-[#001838]" @click.stop="menuOpen = !menuOpen">
                <svg class="h-5 w-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
              </div>
            </div>
            <div class="w-full py-5">
              <ul class="flex flex-col min-h-[250px]">
                <li class="flex w-full text-lg md:text-2xl">
                  <a class="px-6 py-2 w-full hover:underline underline-offset-2 pally-medium tracking-wide" href="{{ url('categories') }}">
                    Browse all
                  </a>
                </li>
                <li class="flex w-full text-lg md:text-2xl">
                  <a class="px-6 py-2 w-full hover:underline underline-offset-2 pally-medium tracking-wide" href="{{ route('topics') }}">
                    Topics
                  </a>
                </li>
                <li class="flex w-full text-lg md:text-2xl">
                  <a class="px-6 py-2 w-full hover:underline underline-offset-2 pally-medium tracking-wide" href="{{ route('articles') }}">
                    Articles
                  </a>
                </li>
                <li class="flex2 w-full text-lg md:text-2xl">
                  <!-- align -->
                  <div class="bg-white py-0 flex flex-col w-full" x-data="{ open:true }">
                    <button @click="open = !open" class="flex items-center bg-gray-100 justify-between px-6 py-2 group font-semibold md:font-bold">
                      <span class="flex items-start w-full pally-medium tracking-wide">Categories</span>

                      <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 text-gray-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                      </svg>

                      <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 text-gray-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                      </svg>

                    </button>
                    <div :class="open ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'" class="grid overflow-hidden transition-all duration-300 ease-in-out text-slate-600 text-sm">
                      <!-- content filter -->
                      <div class="overflow-hidden pt-3 pb-0">
                        <div class="duration-300 px-0 pb-3">
                          <div class="px-6">
                            <div class="grid grid-cols-2 gap-3">
                              @foreach($browse as $cat)
                              <a class="flex flex-row items-center gap-2 text-sm hover:text-[#20bd70] text-gray-600" href="{{ url('categories/' . $cat->slug) }}">
                                <span class="whitespace-nowrap">{{ $cat->name }}</span>
                              </a>
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- end content filter -->
                    </div>
                  </div>
                  <!-- end align -->
                </li>

              </ul>

            </div>
          </div>
        </div>

        
      </section>
    </div>
  </div>
</header>