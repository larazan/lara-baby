
<div>

    <!-- Sidebar -->

    <!-- Sidebar backdrop (mobile only) -->
    <div 
        class="hidden m w bg-slate-900 pu tb tex ted bz wr" 
        :class="sidebarOpen ? 'ba opacity-100' : 'opacity-0 pointer-calendar-none'" 
        aria-hidden="true" 
        x-cloak>
    </div>

    <!-- Sidebar -->
    <div 
        id="sidebar" 
        class="flex ak g tb x k tea tec teh tts ss lp tth l or tej ttz 2xl:!w-64 ub hs dw we wr wu" 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-64'" 
        @click.outside="sidebarOpen = false" 
        @keydown.escape.window="sidebarOpen = false" x-cloak="lg">


        <!-- Sidebar header -->
        <div class="flex fe nx vq j_">
            <!-- Close button -->
            <button class="tex text-slate-500 xl" @click.stop="sidebarOpen = !sidebarOpen" aria-controls="sidebar" :aria-expanded="sidebarOpen" aria-expanded="false">
                <span class="d">Close sidebar</span>
                <svg class="oi so du" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z"></path>
                </svg>
            </button>
            <!-- Logo -->
            <a class="block" href="index.html">
                <svg width="32" height="32" viewBox="0 0 32 32">
                    <defs>
                        <linearGradient x1="28.538%" y1="20.229%" x2="100%" y2="108.156%" id="logo-a">
                            <stop stop-color="#A5B4FC" stop-opacity="0" offset="0%"></stop>
                            <stop stop-color="#A5B4FC" offset="100%"></stop>
                        </linearGradient>
                        <linearGradient x1="88.638%" y1="29.267%" x2="22.42%" y2="100%" id="logo-b">
                            <stop stop-color="#38BDF8" stop-opacity="0" offset="0%"></stop>
                            <stop stop-color="#38BDF8" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <rect fill="#6366F1" width="32" height="32" rx="16"></rect>
                    <path d="M18.277.16C26.035 1.267 32 7.938 32 16c0 8.837-7.163 16-16 16a15.937 15.937 0 01-10.426-3.863L18.277.161z" fill="#4F46E5"></path>
                    <path d="M7.404 2.503l18.339 26.19A15.93 15.93 0 0116 32C7.163 32 0 24.837 0 16 0 10.327 2.952 5.344 7.404 2.503z" fill="url(#logo-a)"></path>
                    <path d="M2.223 24.14L29.777 7.86A15.926 15.926 0 0132 16c0 8.837-7.163 16-16 16-5.864 0-10.991-3.154-13.777-7.86z" fill="url(#logo-b)"></path>
                </svg>
            </a>
        </div>

        <!-- Links -->
        <div class="ff">
            <!-- Pages group -->
            <div>
                <h3 class="go gv text-slate-500 gh vz">
                    <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
                    <span class="tex ttj 2xl:block">Pages</span>
                </h3>
                <ul class="nk">
                    <!-- Dashboard -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['dashboard'])){{ 'bg-slate-900' }}@else{{ '' }}@endif">
                        <a class="block gj xc ld wt wi" href="{{ url('admin/dashboard') }}">
                            <div class="flex items-center">
                                <svg class="ub so oi" viewBox="0 0 24 24">
                                    <path class="du @if(in_array(Request::segment(2), ['dashboard'])){{ 'text-indigo-500' }}@else{{ 'gq' }}@endif" d="M12 0C5.383 0 0 5.383 0 12s5.383 12 12 12 12-5.383 12-12S18.617 0 12 0z"></path>
                                    <path class="du @if(in_array(Request::segment(2), ['dashboard'])){{ 'text-indigo-600' }}@else{{ 'g_' }}@endif" d="M12 3c-4.963 0-9 4.037-9 9s4.037 9 9 9 9-4.037 9-9-4.037-9-9-9z"></path>
                                    <path class="du @if(in_array(Request::segment(2), ['dashboard'])){{ 'text-indigo-200' }}@else{{ 'gq' }}@endif" d="M12 15c-1.654 0-3-1.346-3-3 0-.462.113-.894.3-1.285L6 6l4.714 3.301A2.973 2.973 0 0112 9c1.654 0 3 1.346 3 3s-1.346 3-3 3z"></path>
                                </svg>
                                <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Dashboard</span>
                            </div>
                        </a>
                    </li>

                    <!-- Facts -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['categories', 'fact'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du @if(in_array(Request::segment(2), ['categories', 'fact'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" d="M20 7a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 0120 7zM4 23a.75.75 0 01-.75-.75 1.5 1.5 0 00-1.5-1.5.75.75 0 110-1.5 1.5 1.5 0 001.5-1.5.75.75 0 111.5 0 1.5 1.5 0 001.5 1.5.75.75 0 110 1.5 1.5 1.5 0 00-1.5 1.5A.75.75 0 014 23z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['categories', 'fact'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" d="M17 23a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 010-2 4 4 0 004-4 1 1 0 012 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1zM7 13a1 1 0 01-1-1 4 4 0 00-4-4 1 1 0 110-2 4 4 0 004-4 1 1 0 112 0 4 4 0 004 4 1 1 0 010 2 4 4 0 00-4 4 1 1 0 01-1 1z"></path>
                                    </svg>

                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Facts</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['categories', 'fact'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                               
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['categories', 'fact'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['fact'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/fact/all') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Facts</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['categories'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/categories') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Categories</span>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>
                    </li>
                   
                    <!-- News -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['article', 'category-article'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du @if(in_array(Request::segment(2), ['article', 'category-article'])){{ 'text-indigo-500' }}@else{{ 'gq' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['article', 'category-article'])){{ 'text-indigo-500' }}@else{{ 'gz' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['article', 'category-article'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"></path>
                                    </svg>
                    
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">News</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['article', 'category-article'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                                <!-- <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                    <svg class="w-3 h-3 ub nz du gq ao" :class="open ? 'as' : 'ao'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                    </svg>
                                </div> -->
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['article', 'category-article'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['article'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/article/all') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Article</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['category-article'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/category-article') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Category</span>
                                    </a>
                                </li>
                              
                                <!-- <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['products'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/tags') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Comment</span>
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </li>

                    <!-- Tags -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['tags', 'tagslist'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <circle class="du @if(in_array(Request::segment(2), ['tags', 'tagslist'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" cx="18.5" cy="5.5" r="4.5"></circle>
                                        <circle class="du @if(in_array(Request::segment(2), ['tags', 'tagslist'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" cx="5.5" cy="5.5" r="4.5"></circle>
                                        <circle class="du @if(in_array(Request::segment(2), ['tags', 'tagslist'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" cx="18.5" cy="18.5" r="4.5"></circle>
                                        <circle class="du @if(in_array(Request::segment(2), ['tags', 'tagslist'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" cx="5.5" cy="18.5" r="4.5"></circle>
                                    </svg>

                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Tags</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['tags', 'tagslist'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                               
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['tags', 'tagslist'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['tags'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/tags') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Tags</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['tagslist'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/tagslist') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Tag list</span>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>
                    </li>

                    <!-- Pages -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['faqs', 'about-us', 'privacy-policy', 'term-condition', 'refund-policy', 'shipping-policy'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du @if(in_array(Request::segment(2), ['faqs', 'about-us', 'privacy-policy', 'term-condition', 'refund-policy', 'shipping-policy'])){{ 'text-indigo-500' }}@else{{ 'gq' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['faqs', 'about-us', 'privacy-policy', 'term-condition', 'refund-policy', 'shipping-policy'])){{ 'text-indigo-500' }}@else{{ 'gz' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['faqs', 'about-us', 'privacy-policy', 'term-condition', 'refund-policy', 'shipping-policy'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"></path>
                                    </svg>
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Pages</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['about-us', 'privacy-policy', 'term-condition', 'refund-policy', 'shipping-policy'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['faqs', 'about-us', 'privacy-policy', 'term-condition', 'refund-policy', 'shipping-policy'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['faqs'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/faqs') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">FAQs</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['about-us'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/about-us') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">About Us</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['term-condition'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/term-condition') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Term and Condition</span>
                                    </a>
                                </li>
                               
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['privacy-policy'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/privacy-policy') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Privacy Policy</span>
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>

                    <!-- Advertising -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <circle class="du @if(in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'text-indigo-500' }}@else{{ 'gq' }}@endif" cx="16" cy="8" r="8"></circle>
                                        <circle class="du @if(in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'text-indigo-300' }}@else{{ 'g_' }}@endif" cx="8" cy="16" r="8"></circle>
                                    </svg>
                                    <!-- <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du @if(in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'text-indigo-500' }}@else{{ 'gq' }}@endif" d="M13 15l11-7L11.504.136a1 1 0 00-1.019.007L0 7l13 8z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'text-indigo-500' }}@else{{ 'gz' }}@endif" d="M13 15L0 7v9c0 .355.189.685.496.864L13 24v-9z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" d="M13 15.047V24l10.573-7.181A.999.999 0 0024 16V8l-11 7.047z"></path>
                                    </svg> -->
                                    
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Advertisement</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['newsletters', 'adv-segments', 'advertisings'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['newsletters'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/newsletters') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Newsletter</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['adv-segments'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/adv-segments') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Segment</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['advertisings'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/advertisings') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Advertisings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    
                </ul>
            </div>
            <!-- Pages group -->
            <div>
                <h3 class="go gv text-slate-500 gh vz">
                    <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
                    <span class="tex ttj 2xl:block">User Management</span>
                </h3>
                <ul class="nk">
                <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['users', 'roles', 'permissions'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                    <path class="du @if(in_array(Request::segment(2), ['users', 'roles', 'permissions'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" d="M12 6a3 3 0 110-6 3 3 0 010 6zm2 18h-4a1 1 0 01-1-1v-6H6v-6a3 3 0 013-3h6a3 3 0 013 3v6h-3v6a1 1 0 01-1 1z"></path>
                                    </svg>

                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Users</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['users', 'roles', 'permissions'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                                <!-- <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                    <svg class="w-3 h-3 ub nz du gq ao" :class="open ? 'as' : 'ao'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                    </svg>
                                </div> -->
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['users', 'roles', 'permissions'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['users'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/users') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Users</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['roles'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/roles') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Roles</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['permissions'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/permissions') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Permissions</span>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <!-- More group -->
            <div>
                <h3 class="go gv text-slate-500 gh vz">
                    <span class="hidden tey ttq 2xl:hidden gn oi" aria-hidden="true">•••</span>
                    <span class="tex ttj 2xl:block">More</span>
                </h3>
                <ul class="nk">
                    <!-- Settings -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['payment-method', 'social-medias', 'settings', 'currencies'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <path class="du @if(in_array(Request::segment(2), ['payment-method', 'social-medias', 'settings', 'currencies'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" d="M19.714 14.7l-7.007 7.007-1.414-1.414 7.007-7.007c-.195-.4-.298-.84-.3-1.286a3 3 0 113 3 2.969 2.969 0 01-1.286-.3z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['payment-method', 'social-medias', 'settings', 'currencies'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" d="M10.714 18.3c.4-.195.84-.298 1.286-.3a3 3 0 11-3 3c.002-.446.105-.885.3-1.286l-6.007-6.007 1.414-1.414 6.007 6.007z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['payment-method', 'social-medias', 'settings', 'currencies'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" d="M5.7 10.714c.195.4.298.84.3 1.286a3 3 0 11-3-3c.446.002.885.105 1.286.3l7.007-7.007 1.414 1.414L5.7 10.714z"></path>
                                        <path class="du @if(in_array(Request::segment(2), ['payment-method', 'social-medias', 'settings', 'currencies'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" d="M19.707 9.292a3.012 3.012 0 00-1.415 1.415L13.286 5.7c-.4.195-.84.298-1.286.3a3 3 0 113-3 2.969 2.969 0 01-.3 1.286l5.007 5.006z"></path>
                                    </svg>
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Settings</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['payment-method', 'social-medias', 'settings', 'currencies'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['payment-method', 'social-medias', 'settings', 'currencies'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                               
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['settings'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/settings') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Setting</span>
                                    </a>
                                </li>
                              
                               

                            </ul>
                        </div>
                    </li>
                    
                    <!-- Utility -->
                    <li class="vn vr rounded-sm n_ ww @if(in_array(Request::segment(2), ['slides', 'reports', 'subscribers', 'contacts'])){{ 'bg-slate-900' }}@else{{ '' }}@endif" x-data="{ open: false }">
                        <a class="block gj xc ld wt wi" href="#0" @click.prevent="sidebarExpanded ? open = !open : sidebarExpanded = true">
                            <div class="flex items-center fe">
                                <div class="flex items-center">
                                    <svg class="ub so oi" viewBox="0 0 24 24">
                                        <circle class="du @if(in_array(Request::segment(2), ['slides', 'reports', 'subscribers', 'contacts'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" cx="18.5" cy="5.5" r="4.5"></circle>
                                        <circle class="du @if(in_array(Request::segment(2), ['slides', 'reports', 'subscribers', 'contacts'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" cx="5.5" cy="5.5" r="4.5"></circle>
                                        <circle class="du @if(in_array(Request::segment(2), ['slides', 'reports', 'subscribers', 'contacts'])){{ 'text-indigo-500' }}@else{{ 'g_' }}@endif" cx="18.5" cy="18.5" r="4.5"></circle>
                                        <circle class="du @if(in_array(Request::segment(2), ['slides', 'reports', 'subscribers', 'contacts'])){{ 'text-indigo-300' }}@else{{ 'gq' }}@endif" cx="5.5" cy="18.5" r="4.5"></circle>
                                    </svg>
                                    <span class="text-sm gp ml-3 ttw tnn 2xl:opacity--100 wr">Utility</span>
                                </div>
                                <!-- Icon -->
                                <div class="flex shrink-0 ml-2 lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100 duration-200">
                                    <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-slate-400 @if(in_array(Request::segment(2), ['slides', 'reports', 'subscribers', 'contacts'])){{ 'rotate-180' }}@endif" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                                    </svg>
                                </div>
                                <!-- <div class="flex ub nq ttw tnn 2xl:opacity--100 wr">
                                    <svg class="w-3 h-3 ub nz du gq ao" :class="open ? 'as' : 'ao'" viewBox="0 0 12 12">
                                        <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z"></path>
                                    </svg>
                                </div> -->
                            </div>
                        </a>
                        <div class="tex ttj 2xl:block">
                            <ul class="me re @if(!in_array(Request::segment(2), ['slides', 'reports', 'subscribers', 'contacts'])){{ 'hidden' }}@else{ !block }@endif" :class="open ? '!block' : 'hidden'">
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['subscribers'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/subscribers') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Subscribers</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['reports'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/reports') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Reports</span>
                                    </a>
                                </li> 
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['slides'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/slides') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Slide</span>
                                    </a>
                                </li>
                                <li class="rt ww">
                                    <a class="block @if(in_array(Request::segment(2), ['contacts'])){{ 'text-indigo-500' }}@else{{ 'gq hover--text-slate-200' }}@endif wt wi ld" href="{{ url('admin/contacts') }}">
                                        <span class="text-sm gp ttw tnn 2xl:opacity--100 wr">Contacts</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <div class="mt hidden tew 2xl:hidden justify-end rn">
            <div class="vn vr">
                <button @click="sidebarExpanded = !sidebarExpanded">
                    <span class="d">Expand / collapse sidebar</span>
                    <svg class="oi so du _o" viewBox="0 0 24 24">
                        <path class="gq" d="M19.586 11l-5-5L16 4.586 23.414 12 16 19.414 14.586 18l5-5H7v-2z"></path>
                        <path class="g_" d="M3 23H1V1h2z"></path>
                    </svg>
                </button>
            </div>
        </div>

    </div>
</div>