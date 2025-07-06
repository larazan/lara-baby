@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $article->meta_description }}">
<meta name="keywords" content="{{ $article->keyword }}">
@endpush

@section('content')

@include('frontend.components._bread')
@include('frontend.components._toc2')
<div x-data="scrollProgress()" x-init="init()" x-cloak class="fixed inset-x-0 top-0 z-50">
    <div class="h-1 bg-blue-500" :style="`width: ${percent}%`"></div>
</div>

<main class="overflow-hidden pt-0"><!--[--><!--[-->
    <div class="bg-white py-2 md:py-10">
        <div class="mx-auto max-w-[994px] px-6 lg:px-10 xl:px-0">
            <div>

                <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] figtree-bold lg:leading-[48px] font-bold text-gray-900" isnews="true"><!--[-->
                    <span>{{ $title }}</span><!--]-->
                </h2>
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
                        <div class="flex space-x-1 items-center figtree-reguler">
                            <span class="hidden md:block text-muted">|</span>
                            <span class="flex text-gray-600 text-sm">
                                @if( $article->updated_at == null )
                                <span class="hidden md:block pr-1">Published on</span> {{ $article->created_at->format('d M Y') }}
                                @else
                                <span class="hidden md:block pr-1">Updated on</span> {{ $article->updated_at->format('d M Y') }}
                                @endif
                            </span>
                            <span class="text-muted">|</span>
                            <span class="text-gray-600 text-sm">
                                {{ $article->readTime() }} min read
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-3 md:mt-6">
                <div>
                    <img onerror="this.setAttribute('data-error', 1)" width="994" height="480" alt="Kepala BMKG Tegaskan Komitmen STMKG Cetak SDM Unggul Berdaya Saing Global di Hadapan Komisi V DPR RI" loading="lazy" data-nuxt-img="" class="w-full h-[240px] md:h-[360px] lg:h-[480px] object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 2x">

                    <div class="flex justify-between items-center w-full mx-auto mt-0 pt-3 pb-8">
                        <div class="shadow-sm rounded-2xl">
                            <a href="" class="w-full justify-center no-underline figtree-medium inline-flex items-center px-4 py-1 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500">
                                {{ $article->category($article->category_id) }}
                            </a>
                        </div>
                        <div class="flex justify-end items-end">
                            {!! $shareComponent !!}
                        </div>
                    </div>

                    <div class="news mt-0 md:mt-0 prose md:prose-md lg:prose-lg figtree-reguler text-[#334155] max-w-none hover:prose-a:text-blue-primary">
                        {!! $contents['html'] !!}
                    </div>

                    
                </div>

            </div>
        </div>
    </div>
    @include('components.related-article')
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

    .news h2, .news h3 {
    scroll-margin-block-start: 130px;
  /*Adds margin to the top of the viewport*/
  
  scroll-margin-block-end: 110px;
  /*Adds margin to the bottom of the viewport*/
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