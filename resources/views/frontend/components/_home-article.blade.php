<section class="section section--headline px-4 md:px-10">
    <div class="box box-headline mb-8 ">
        <ul class="divide-y divide-gray-300 dark:divide-white/10 lg:flex lg:flex-wrap lg:px-4">

            <!--  -->


            <!--  -->
            @foreach($articles as $a)
            <li class="item flex items-start gap-x-3 py-4 relative lg:w-1/2" >
                <a href="{{ url('/article/' . $a->slug) }}" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative" aria-label="VIDEO: KDM Kembali Senyum Usai Ngamuk ke Suporter Persikas &quot;Tak Masalah Jadi Gorengan Politik&quot;">
                    @if($a->original)
                    <img
                    src="{{ asset('storage/'.$a->original) }}"
                    data-src="{{ asset('storage/'.$a->original) }}"
                    data-srcset="{{ asset('storage/'.$a->original. ' 860w') }},
                            {{ asset('storage/'.$a->original. ' 640w') }},
                            {{ asset('storage/'.$a->original. ' 420w') }}"
                    alt="{{ $a->title }}"
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
                    class="w-full h-full object-fit md:-mx-4 md:-mt-4 mb-0 rounded-xl" alt="" loading="lazy">
                    @endif
                </a>
                <div class="item-detail flex flex-col items-start">
                    <a href="/tag/berita-update" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                        {{ $a->category->name }}
                    </a>
                    <h1 class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                        <a href="{{ url('/article/' . $a->slug) }}" >{{ $a->title }}</a>
                    </h1>
                    <p class="item-description hidden">{{ $a->excerpt() }}</p>
                    <time datetime="2025-05-30 16:29:00" class="item-date text-xs text-zinc-500">{{ $a->created_at->diffForHumans() }}</time>
                </div>
            </li>
            @endforeach
           
        </ul>
    </div>
</section>

<style>
    .box-headline ul {
        --ornament-paper: 1.5rem
    }

    .box-headline ul .item:first-child {
        margin-right: -1rem;
        flex-direction: column;
        padding-top: 0px
    }

    .box-headline ul .item:first-child .item-detail {
        position: relative;
        z-index: 10;
        margin-top: -0.5rem;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.5rem
    }

    .box-headline ul .item:first-child .item-tag {
        order: 1;
        font-size: 0.75rem;
        line-height: 1rem
    }

    .box-headline ul .item:first-child .item-date {
        order: 2
    }

    .box-headline ul .item:first-child .item-title {
        order: 3;
        width: 100%;
        flex-shrink: 0;
        font-size: 1.5rem;
        line-height: 2rem
    }

    .box-headline ul .item:first-child .item-description {
        order: 4;
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 2;
        width: 100%;
        flex-shrink: 0
    }

    .box-headline ul .item:first-child .item-img {
        aspect-ratio: 357 / 219;
        width: 100%;
        border-radius: 0px
    }

    .box-headline ul .item:first-child .item-img::before {
        content: '';
        height: var(--ornament-paper);
        position: absolute;
        bottom: -1px;
        left: 0px;
        background-color: RGB(var(--color-white));
        width: calc(100% - var(--ornament-paper));
        z-index: 1;
        right: var(--ornament-paper)
    }

    .box-headline ul .item:first-child .item-img::after {
        content: '';
        width: 0px;
        height: 0px;
        border-style: solid;
        border-width: var(--ornament-paper) 0 0 var(--ornament-paper);
        border-color: transparent transparent transparent RGB(var(--color-light1));
        transform: rotate(0deg);
        position: absolute;
        right: 0;
        bottom: -1px;
        z-index: 1
    }

    .dark .box-headline ul .item:first-child .item-img::before {
        background-color: RGB(24 24 27)
    }

    .section--headline:not(.--index) .datepicker {
        display: none
    }

    @media (min-width: 1024px) {
        .box-headline ul .item:first-child {
            margin-left: -1rem;
            margin-right: -1rem;
            width: auto;
            padding-left: 0px;
            padding-right: 0px
        }

        .box-headline ul .item:first-child .item-detail {
            padding-left: 1rem;
            padding-right: 1rem
        }

        .section--headline:not(.--index) .box-headline ul .item:nth-child(2),
        .section--headline:not(.--index) .box-headline ul .item:nth-child(4) {
            padding-right: .5rem
        }

        .section--headline:not(.--index) .box-headline ul .item:nth-child(3),
        .section--headline:not(.--index) .box-headline ul .item:nth-child(5) {
            padding-left: .5rem
        }

        .section--headline.--index .box-headline ul .item:not(:first-child) {
            width: 100%
        }
    }

    .datepicker-btn-detail-input::-webkit-calendar-picker-indicator {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        cursor: pointer
    }

    .datepicker-btn-detail-date::after {
        content: '';
        width: 0px;
        height: 0px;
        border-style: solid;
        border-width: 7px 6px 0 6px;
        border-color: RGB(var(--color-light1)) transparent transparent transparent;
        transform: rotate(0deg);
        position: absolute;
        right: -1rem;
        top: 0;
        bottom: 0;
        margin: auto
    }

    .datepicker.active .datepicker-btn-detail-date::after {
        transform: rotate(180deg)
    }

    .dark .datepicker-btn-detail-date::after {
        border-color: RGB(var(--color-white)) transparent transparent transparent
    }
</style>