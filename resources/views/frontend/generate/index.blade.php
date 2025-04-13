@extends('frontend.layout')


@section('content')

<div x-data="scrollProgress()" x-init="init()" x-cloak class="fixed inset-x-0 top-0 z-50">
    <div class="h-1 bg-blue-500" :style="`width: ${percent}%`"></div>
</div>

<div class="flex flex-col justify-center w-full items-center gap-82 bg-white min-h-screen pt-0 md:pt-[60px]">

    <article class="prose max-w-full sm:max-w-[740px] px-6 text-gray-800 markdown-blog">
        <div class="message">
        @foreach($collection as $key=>$value)
            @if($key==0)
                <h1>{{ $collection[0]['title'] }}</h1>
            @else
                <h3>{{ $key }}. {{ $collection[$key]['title'] }}</h3>
                @if($collection[$key]['description'])
                    <p>{{ $collection[$key]['description'] }}</p>
                @endif
            @endif
            
        @endforeach
        </div>
    </article>
    
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
    <style>
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