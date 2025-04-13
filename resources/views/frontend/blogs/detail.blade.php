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
            <a href="{{ URL::previous() }}" class="items-center text-xs md:text-sm flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                <span class=" ml-1">Back</span>
            </a>
        </div>
        <h1 class="font-extrabold text-2xl md:text-4xl text-center pally-medium" style="text-wrap: balance;">{{ $article->title }}</h1>
        <h4 class=" flex flex-col sm:flex-row items-center text-center gap-3 sm:gap-1 w-full justify-center ">
            <div class="border-white rounded-full border-3 text-[20px] leading-9 text-center w-11 h-11 left-11 -top-6 roundedShadow sm:block border-1.5 ">
                        <img src="{{ Avatar::create(ucwords($article->user->name))->toBase64() }}" alt="{{ $article->user->name }}" aria-hidden="true" class="rounded-full w-full border-2 border-white" />
                    </div>
            <span class="flex sm:flex-row flex-col items-center sm:gap-1"><b class="hidden md:block">by</b> <span class="font-bold">
                <p class="capitalize">{{ $article->user->name }}</p>
                </span>
                @if( $article->updated_at == null )
                    Published on {{ $article->created_at->format('d M Y') }}
                @else
                    Updated on {{ $article->updated_at->format('d M Y') }}
                @endif
            </span>
        </h4>
        <div class="flex justify-around md:justify-between max-w-2xl w-full mx-auto">
        <div class="shadow-sm rounded-2xl">
          <a class="w-full justify-center inline-flex items-center px-4 py-1 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500" href="">{{ $article->category($article->category_id) }}</a>
        </div>
        <div class="flex justify-center items-center">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.00001 0.583374C3.9039 0.583374 0.583344 3.90393 0.583344 8.00004C0.583344 12.0962 3.9039 15.4167 8.00001 15.4167C12.0961 15.4167 15.4167 12.0962 15.4167 8.00004C15.4167 3.90393 12.0961 0.583374 8.00001 0.583374ZM2.08334 8.00004C2.08334 4.73236 4.73233 2.08337 8.00001 2.08337C11.2677 2.08337 13.9167 4.73236 13.9167 8.00004C13.9167 11.2677 11.2677 13.9167 8.00001 13.9167C4.73233 13.9167 2.08334 11.2677 2.08334 8.00004ZM8.75001 5.33337C8.75001 4.91916 8.41422 4.58337 8.00001 4.58337C7.5858 4.58337 7.25001 4.91916 7.25001 5.33337V8.00004C7.25001 8.2508 7.37533 8.48498 7.58398 8.62408L9.58398 9.95741C9.92863 10.1872 10.3943 10.094 10.624 9.7494C10.8538 9.40475 10.7607 8.9391 10.416 8.70934L8.75001 7.59865V5.33337Z" fill="#404040"></path>
            </svg>
            <p class="text-sm text-[#404040] leading-5 pl-2">{{ $article->readTime() }} min read</p>
        </div>
        </div>
    </header>

   

    <article class="prose max-w-full sm:max-w-[740px] px-6 text-gray-800 markdown-blog">
    {!! $contents['html'] !!}
    {{-- {!! $article->body !!} --}}
    </article>
    <!--  -->

    <div class="flex flex-row w-full mx-auto mt-6 px-6 py-6 md:py-8 mb-102 bg-[#fefbec] border-b-4 border-[#fed24b]">
        <div class="flex flex-col space-y-3 md:space-y-0 md:flex-row mx-auto w-10/12 md:w-8/12 ">
            <div class="flex flex-col w-full md:w-1/2 ">
                <div>
                    <span class="text-sm font-semibold text-gray-700">Related Tags</span>
                </div>
                @if(!empty($tags))
                <div>
                    <div class="flex flex-wrap ">
                        @foreach($tags as $t)
                        <a href="{{ url('articles/tag/' . $t) }}" class="flex mr-2 mt-2 rounded px-2 py-1 items-center bg-blue-100 hover:bg-blue-200">
                            <span class=" font-semibold text-[#002f6c] text-sm">{{ $t }}</span>
                        </a>
                        @endforeach

                    </div>
                </div>
                @else
                <div></div>
                @endif
            </div>
            <div class="flex flex-col w-1/2 space-y-3">
                <div>
                    <span class="text-sm font-semibold text-gray-700">Share this article</span>
                </div>
                {!! $shareComponent !!}

            </div>
        </div>

        <!--  -->

    </div>



    <x-article-list :articles="$articles" />


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
.markdown-blog h4
{
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