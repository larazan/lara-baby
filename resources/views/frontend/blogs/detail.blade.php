@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $article->meta_description }}">
<meta name="keywords" content="{{ $article->keyword }}">
@endpush

@section('content')

<!-- @dump($contents) -->

@include('frontend.components._toc')

<div x-data="scrollProgress()" x-init="init()" x-cloak class="fixed inset-x-0 top-0 z-50">
    <div class="h-1 bg-blue-500" :style="`width: ${percent}%`"></div>
</div>

<div class="flex flex-col justify-center w-full items-center gap-82 bg-white min-h-screen pt-0 md:pt-[60px]">

    <header class="max-w-[800px] flex flex-col gap-4 p-6 relative z-10 pt-24 md:pt-16">
        <div class="absolute top-16 md:top-2 left-2 flex  px-2 py-1 rounded-full border border-gray-900 text-gray-900 hover:text-white hover:bg-gray-800 items-center justify-between">
            <a href="{{ url('articles') }}" class="items-center text-xs md:text-sm flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                <span class=" ml-1">Back</span>
            </a>
        </div>

        <div class="mt-0">
            <div>
                <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900"><!--[--><span>{{ $article->title }}</span><!--]--></h1>
                <div class="flex flex-wrap items-center gap-2 mt-4">
                    <div class="border-white rounded-full border-3 text-[20px] leading-9 text-center w-11 h-11 left-11 -top-6 roundedShadow sm:block border-1.5 ">
                        <img src="{{ Avatar::create(ucwords($article->user->name))->toBase64() }}" alt="{{ $article->user->name }}" aria-hidden="true" class="rounded-full w-full border-2 border-white" />
                    </div>

                    <span class="flex sm:flex-row flex-col2 items-center gap-1">
                        <span class="font-bold text-gray-800">
                            <p class="capitalize">{{ $article->user->name }}</p>
                        </span>
                        <span class="text-muted">|</span>
                        <span class="text-gray-600 text-sm">
                            @if( $article->updated_at == null )
                            Published on {{ $article->created_at->format('d M Y') }}
                            @else
                            Updated on {{ $article->updated_at->format('d M Y') }}
                            @endif
                        </span>
                    </span>

                </div>
            </div>
            <div class="mt-3">
                <img onerror="this.setAttribute('data-error', 1)" width="994" height="480" alt="BMKG Gelar Rapat Rekonsiliasi Aloptama, Perkuat Keandalan Peralatan Operasional di Seluruh Indonesia" loading="lazy" data-nuxt-img="" class="w-full h-[240px] md:h-[360px] lg:h-[480px] object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_9456.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_9456.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/IMG_9456.jpg?fit=1280%2C853&amp;ssl=1 2x">
            </div>
        </div>
        <div class="flex justify-around md:justify-between  w-full mx-auto mt-3">
            <div class="shadow-sm rounded-2xl">
                <a class="w-full justify-center inline-flex items-center px-4 py-1 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500" href="">{{ $article->category($article->category_id) }}</a>
            </div>
            <div class="flex justify-center items-center">
                {!! $shareComponent !!}
            </div>
        </div>

    </header>
<!-- toc -->
    <div class="flex max-w-2xl w-full px-6 md:px-0">

        <div id="sticky-anchor"></div>
        <div class="toc-js down-arrow bg-pale-blue border border-primary my-4 mobile" id="toc-js-node-2529916" data-selectors="h2.toc-heading" data-selectors-minimum="3" data-container=".articles_body, .node" data-prefix="" data-list-type="ul" data-back-to-top="0" data-back-to-top-label="Back to top" data-smooth-scrolling="1" data-scroll-to-offset="100" data-highlight-on-scroll="1" data-highlight-offset="0" data-sticky="0" data-sticky-offset="0" data-sticky-stop="" data-sticky-stop-padding="0" data-component-id="fentheme_radix:toc" style="display: none;">
            <div class="toc-title h4 fw-bold">Table of contents
                <svg class="svg-inline--fa fa-caret-down ms-2" aria-hidden="true" focusable="false" data-prefix="fass" data-icon="caret-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M320 240L160 384 0 240l0-48 320 0 0 48z"></path>
                </svg>
            </div>
            <nav aria-label="Table of contents">
                <ul class="list-unstyled">
                    <li class="py-1 md:py-1.5 toc-active">
                        <a href="#baby-girl-names-inspired-by-the-beatles-" class="link-faded-black">Baby Girl Names Inspired by The Beatles &nbsp;</a>
                        <svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fass" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M112 96L256 256 112 416l-48 0L64 96l48 0z"></path>
                        </svg>
                    </li>
                    <li class="py-1 md:py-1.5">
                        <a href="#the-beatles-names-for-boys" class="link-faded-black">The Beatles Names for Boys</a>
                        <svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fass" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M112 96L256 256 112 416l-48 0L64 96l48 0z"></path>
                        </svg>
                    </li>
                    <li class="py-1 md:py-1.5">
                        <a href="#unisex-baby-names-inspired-by-the-beatles" class="link-faded-black">Unisex Baby Names Inspired by The Beatles</a>
                        <svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fass" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M112 96L256 256 112 416l-48 0L64 96l48 0z"></path>
                        </svg>
                    </li>
                    <li class="py-1 md:py-1.5">
                        <a href="#finding-inspiration-that-lasts-" class="link-faded-black">Finding Inspiration That Lasts &nbsp;</a>
                        <svg class="svg-inline--fa fa-caret-right" aria-hidden="true" focusable="false" data-prefix="fass" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M112 96L256 256 112 416l-48 0L64 96l48 0z"></path>
                        </svg>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="flex w-full max-w-full px-5 py-6 bg-[#dbebfa] border border-blue-700 my-4"  style="display: block;">
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
<!--  -->
    <article class="prose max-w-full sm:max-w-[740px] px-6 text-gray-800 markdown-blog pb-12">
        {!! $contents['html'] !!}
        {{-- {!! $article->body !!} --}}
    </article>
    <!--  -->







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
            min-width: 280px;
        }

        div#social-links ul li {
            display: inline-block;
            margin: 2px;
        }

        div#social-links ul li a {
            border-radius: 100%;
            padding: 7px 10px;
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
            padding: 0;
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