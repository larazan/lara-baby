@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $article->meta_description }}">
<meta name="keywords" content="{{ $article->keyword }}">
@endpush

@section('content')

<!-- @dump($contents) -->

<!-- @include('frontend.components._toc') -->

<div x-data="scrollProgress()" x-init="init()" x-cloak class="fixed inset-x-0 top-0 z-50">
    <div class="h-1 bg-blue-500" :style="`width: ${percent}%`"></div>
</div>

<main class="flex flex-col justify-center w-full items-center gap-82 bg-white min-h-screen pt-0 md:pt-[60px]">

    <header class="max-w-[800px] flex flex-col gap-4 p-6 relative z-10 pt-24 md:pt-16">
        <div class="absolute top-16 md:top-2 left-6 flex  px-2 py-1 rounded-full border border-gray-900 text-gray-900 hover:text-white hover:bg-gray-800 items-center justify-between">
            <a href="{{ url('articles') }}" class="items-center text-xs md:text-sm flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                <span class=" ml-1 figtree-reguler">Back</span>
            </a>
        </div>

        <div class="mt-0">
            <div>
                <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900 figtree-bold"><!--[--><span>{{ $article->title }}</span><!--]--></h1>
                    
                <div class="flex flex-wrap items-center gap-2 mt-4">
                    <div class="border-white rounded-full border-3 text-[20px] leading-9 text-center w-11 h-11 left-11 -top-6 roundedShadow sm:block border-1.5 ">
                        <img src="{{ Avatar::create(ucwords($article->user->name))->toBase64() }}" alt="{{ $article->user->name }}" aria-hidden="true" class="rounded-full w-full border-2 border-white" />
                    </div>

                    <div class="flex md:flex-row flex-col items-center2">
                        <div class="flex justify-start text-right pr-1">
                            <span class="font-bold text-gray-800">
                                <p class="capitalize figtree-reguler">{{ $article->user->name }}</p>
                            </span>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <span class="hidden md:block text-muted">|</span>
                            <span class="flex text-gray-600 text-sm figtree-reguler">
                                @if( $article->updated_at == null )
                                <span class="hidden md:block pr-1">Published on </span> {{ $article->created_at->format('d M Y') }}
                                @else
                                <span class="hidden md:block pr-1">Updated on </span> {{ $article->updated_at->format('d M Y') }}
                                @endif
                            </span>
                            <span class="text-muted">|</span>
                            <span class="text-gray-600 text-sm figtree-reguler">
                                {{ $article->readTime() }} min read
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-3">
                <img onerror="this.setAttribute('data-error', 1)" width="994" height="480" alt="BMKG Gelar Rapat Rekonsiliasi Aloptama, Perkuat Keandalan Peralatan Operasional di Seluruh Indonesia" loading="lazy" class="w-full h-[240px] md:h-[360px] lg:h-[480px] object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_9456.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_9456.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_9456.jpg?fit=1280%2C853&amp;ssl=1 2x">
            </div>
        </div>
        <div class="flex justify-between items-center w-full mx-auto mt-0">
            <div class="shadow-sm rounded-2xl">
                <a class="w-full justify-center inline-flex items-center px-4 py-1 border border-transparent figtree-medium text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500" href="">{{ $article->category($article->category_id) }}</a>
            </div>
            <div class="flex justify-end items-end">
                {!! $shareComponent !!}
            </div>
        </div>

    </header>

    <!-- toc -->
    <div class="hidden2 flex flex-col w-full">

        <div id="sticky-anchor"></div>
        <div x-data="{ open:false }" class="fixed top-[40px] z-20 flex flex-col w-full px-5 py-3 bg-[#dbebfa] border-y border-blue-800 my-4 shadow-md">
            <div class="flex w-full max-w-2xl mx-auto justify-center items-center space-x-1 cursor-pointer" @click="open = !open">
                <span class="font-bold text-lg text-gray-800 figtree-medium">Table of contents</span>
                <span class="text-primary font-normal text-2xl">
                    <!-- <svg :class="open ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6 md:w-8 md:h-8 transition-all">
                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
                    </svg> -->
                    <svg :class="open ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-caret-down"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 9c.852 0 1.297 .986 .783 1.623l-.076 .084l-6 6a1 1 0 0 1 -1.32 .083l-.094 -.083l-6 -6l-.083 -.094l-.054 -.077l-.054 -.096l-.017 -.036l-.027 -.067l-.032 -.108l-.01 -.053l-.01 -.06l-.004 -.057v-.118l.005 -.058l.009 -.06l.01 -.052l.032 -.108l.027 -.067l.07 -.132l.065 -.09l.073 -.081l.094 -.083l.077 -.054l.096 -.054l.036 -.017l.067 -.027l.108 -.032l.053 -.01l.06 -.01l.057 -.004l12.059 -.002z" /></svg>
                </span>
            </div>
            <nav x-show="open" aria-label="Table of contents"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform -translate-y-6"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-6"
                class="py-2"
            >
                <ul class="list-unstyled">
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

        <div class=" w-full max-w-2xl mx-auto px-6">
            <div class="flex flex-col w-full px-5 py-6 bg-[#dbebfa] border border-blue-700 my-4">
                <div class="text-lg md:text-2xl font-bold text-black">Table of contents</div>
                <nav aria-label="Table of contents">
                    <ul class="">
                        <li class="py-1 md:py-1.5">
                            <a href="#baby-girl-names-inspired-by-the-beatles-" class="text-base md:text-lg text-gray-900 hover:text-orange-500 font-semibold">Baby Girl Names Inspired by The Beatles &nbsp;</a>
                        </li>
                        <li class="py-1 md:py-1.5">
                            <a href="#the-beatles-names-for-boys" class="text-base md:text-lg text-gray-900 hover:text-orange-500 font-semibold">The Beatles Names for Boys</a>
                        </li>
                        <li class="py-1 md:py-1.5">
                            <a href="#unisex-baby-names-inspired-by-the-beatles" class="text-base md:text-lg text-gray-900 hover:text-orange-500 font-semibold">Unisex Baby Names Inspired by The Beatles</a>
                        </li>
                        <li class="py-1 md:py-1.5">
                            <a href="#finding-inspiration-that-lasts-" class="text-base md:text-lg text-gray-900 hover:text-orange-500 font-semibold">Finding Inspiration That Lasts &nbsp;</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--  -->
    <article class="prose max-w-full sm:max-w-[740px] px-6 text-gray-800 markdown-blog pb-12 figtree-reguler">
        {!! $contents['html'] !!}
        {{-- {!! $article->body !!} --}}
    </article>
    <!--  -->

    <div class="w-full">
    @include('components.related-article')
    </div>
</main>   

    @endsection

    @push('js')
    <script type="text/javascript">
        const scrollProgress = () => {
            return {
                init() {
                    window.addEventListener('scroll', () => {
                        let winScroll = document.body.scrollTop || document.documentElement.scrollTop
                        let height = document.documentElement.scrollHeight - document.documentElement.clientHeight
                        this.percent = Math.round((winScroll / height) * 100)
                    })
                },
                circumference: 30 * 2 * Math.PI,
                percent: 0,
            }
        }
    </script>
    @endpush

    @push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        div#social-links {
            /* background-color: #ccc; */
            display: flex;
            /* margin: 0 auto; */
            min-width: 230px;
        }

        div#social-links ul li {
            display: inline-block;
            margin: 1.5px;
        }

        div#social-links ul li a {
            border-radius: 10%;
            padding: 6px 7px;
            /* border: 1px solid #ccc; */
            margin: 1px;
            font-size: 20px;
            color: #fff;
            background-color: #dbeafe;
        }

        /* facebook */
        div#social-links ul li:nth-child(1) a {
            background-color: #2d65b0;
        }

        /* twitter */
        div#social-links ul li:nth-child(2) a {
            background-color: #35bced;
        }

        /* linkedin */
        div#social-links ul li:nth-child(3) a {
            background-color: #0675a5;
        }

        /* telegram */
        div#social-links ul li:nth-child(4) a {
            background-color: #3dba92;
        }

        /* whatsapp */
        div#social-links ul li:nth-child(5) a {
            background-color: #128c7d;
        }

        /* reddit */
        div#social-links ul li:nth-child(6) a {
            background-color: #ff4a0d;
        }

        .markdown {
            --tw-text-opacity: 1;
            background-color: transparent;
            color: rgb(25 26 27/var(--tw-text-opacity));
            line-height: 1.625;
        }

        .markdown-blog p {
            font-size: 21px;
            line-height: 32px;
        }

        .markdown-blog p {
            color: #3e3e3e;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        /* .markdown-blog h2 {
  color: #1b1b1b;
  font-size: 36px;
  line-height: 56px;
} */
        .markdown-blog h1,
        .markdown-blog h2,
        .markdown-blog h3,
        .markdown-blog h4 {
            scroll-margin-block-start: 70px;
        }

        .markdown-blog h1,
        .markdown-blog h2 {
            color: #000;
            margin-top: 3.5rem;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 700;
        }

        /* .markdown-blog h3 {
  font-size: 28px; 
  line-height: 1.25rem;
} */

        .markdown-blog h3 {
            color: #000;
            margin-top: 1.4rem;
            margin-bottom: 1.0rem;
            font-size: 1.25rem;
            line-height: 1.35rem;
            font-weight: 500;
        }

        .markdown-blog ol {
            margin-left: 18px;
            color: #3e3e3e;
            margin-top: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            line-height: 1.6rem;
        }

        .markdown-blog blockquote {
            position: relative;
            margin-top: 2.25rem;
            margin-bottom: 2.25rem;
        }

        .markdown-blog section {
            position: relative;
            margin-top: 2.85rem;
            margin-bottom: 2.25rem;
        }

        .markdown-blog ul {
            margin: 0;
            padding-right: 10px !important;
            list-style-type: disc;
            margin: 20px 0;
        }

        .markdown-blog ul li {
            margin: 10px 0;
        }

        .markdown-blog li strong {
            padding-right: 10px;
        }
    </style>
    @endpush

    @push('js')
    <script>
        function checkIfOffScreen() {
            isOffScreen: false,
            checkIfOffScreen() {
                const element = document.getElementById('target-element');
                const rect = element.getBoundingClientRect();
                this.isOffScreen = rect.bottom <= 0 || rect.top >= window.innerHeight;
            },
        }
    </script>
    @endpush