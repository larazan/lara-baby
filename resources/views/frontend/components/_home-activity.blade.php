<section class="section section--category px-4 md:px-10">
    
    <div class="box box-category mb-6 bg-[#fefeee] p-6 rounded border">
        <div class="box-title relative mb-4 text-lg font-bold text-gray-800 tracking-wide flex flex-col justify-center items-center">
            <span>Activities</span>
        </div>
        <ul class="lg:columns-2">
        @foreach($activities as $act)
            <li class="item flex items-start gap-x-3 pb-4 relative mb-4 border-b border-gray-300 dark:border-white/10">
                <a href="{{ url('activity/'. $act->slug) }}" class="item-img shrink-0 overflow-hidden rounded aspect-square w-[100px] relative">
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
                </a>
                <div class="item-detail flex flex-col items-start gap-y-1 z-10">
                    <a href="{{ url('activities/'. $act->category->slug) }}" class="item-tag text-[12px] text-emerald-600 tracking-wide font-semibold uppercase">
                    {{ $act->category->name }}
                    </a>
                    <span class="item-title font-bold text-sm line-clamp-3 text-gray-800">
                        <a href="{{ url('activity/'. $act->slug) }}">{{ $act->title }}</a>
                    </span>
                    <p class="item-description hidden">{{ $act->excerpt() }}</p>
                    <time datetime="2025-05-29 15:06:00" class="item-date text-xs text-zinc-500">{{ $act->created_at->diffForHumans() }}</time>
                </div>
            </li>
        @endforeach
            
        </ul>
        <a href="{{ url('/activities') }}" class="box-category-btn uppercase text-emerald-600 tracking-wide font-semibold uppercase mt-2 font-semibold text-sm flex items-center gap-2 justify-center lg:hidden" data-trackp="mav_parent_click_track" data-track="mav_click_track" data-fname="category_article" data-floc="bottom" data-fpos="2:others" data-flnk="/politik/" data-fcap="Selengkapnya" data-aid="0">
            <span data-track="mav_sub_click_track">Read more</span>
            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12.0266L5 12.0266M19 12.0266L13 18.0266M19 12.0266L13 6.02661" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </a>
    </div>
</section>

<style>
        .box-category ul .item:first-child {
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            border-bottom-width: 0px;
            padding-top: 0px;
            padding-bottom: 0px
        }

        .box-category ul .item:first-child .item-detail {
            position: absolute;
            inset: 0px;
            justify-content: flex-end;
            background-image: linear-gradient(to top, var(--tw-gradient-stops));
            --tw-gradient-from: RGB(0 0 0/0.8) var(--tw-gradient-from-position);
            --tw-gradient-to: RGB(0 0 0/0) var(--tw-gradient-to-position);
            --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
            --tw-gradient-to: transparent var(--tw-gradient-to-position);
            padding: 1rem;
            color: RGB(var(--color-white));
        }

        .box-category ul .item:first-child .item-title {
            color: white;
        }
        

        .box-category ul .item:first-child .item-tag,
        .box-category ul .item:first-child .item-date {
            color: RGB(var(--color-white))
        }

        .box-category ul .item:first-child .item-img {
            aspect-ratio: 357 / 219;
            width: 100%
        }

        @media (min-width: 1024px) {
            .box-category ul .item:first-child {
                margin-bottom: 2rem
            }

            .box-category ul .item:first-child .item-img {
                height: 233px
            }
        }
    </style>