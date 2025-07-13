@extends('frontend.layout')

@section('content')

<!-- {{ $article->id }}
@dump($countBefore)
@dump($countAfter) -->

@include('frontend.components._toc2')
<div x-data="scrollProgress()" x-init="init()" x-cloak class="fixed inset-x-0 top-0 z-50">
    <div class="h-1 bg-blue-500" :style="`width: ${percent}%`"></div>
</div>

<div class="flex flex-col gap-4 w-full py-6">
    <div class="flex mx-auto w-full justify-center">
    <h2 class="text-lg font-semibold figtree-bold">Pregnancy Week by Week</h2>
    </div>
    <ul class="flex gap-2 md:gap-2 px-2 mx-auto w-full max-w-3xl md:max-w-3xl h-fit overflow-x-auto scroll-smooth custom-scrollbar">
        @if(count($countBefore) > 0)
            @foreach($countBefore as $b)
                <li class="flex rounded-full w-14 h-14 md:w-2 md:h-20 px-1 py-4 md:px-2 md:py-2">
                    <div style="visibility: hidden;" class="flex flex-col rounded-full w-14 h-14 md:w-2 md:h-20 px-1 py-1 md:px-2 md:py-2   border border-gray-300 shadow-lg justify-center items-center">
                        <span class="text-[11px] md:text-[11px] ">week</span>
                        <div class="text-lg font-semibold">
                            zero
                        </div>
                    </a>
                </li>
            @endforeach
        @endif
        @foreach($allRecords as $r)
        <li class="py-4">
            <a href="{{ url('pregnancy/tracker/'.$r->categorySlug($r->category_id).'/'.$r->slug) }}" class="flex flex-col rounded-full w-14 h-14 md:w-14 md:h-14 px-1 py-1 md:px-2 md:py-2  @if($r->id == $article->id){{ 'text-white bg-purple-700 transition scale-125 mx-2' }}@else{{ 'text-gray-800 bg-gray-200' }}@endif border-2 border-gray-800 shadow-menu justify-center items-center">
                <span class="pt-1 text-[11px] md:text-[11px] figtree-reguler">week</span>
                <div class="text-lg font-semibold figtree-reguler">
                    @php
                        $arr = explode(" ",$r->title)
                    @endphp
                    {{ $arr[1] }}
                </div>
            </a>
        </li>
        @endforeach
        @if(count($countAfter) > 0)
            @foreach($countAfter as $b)
                <li class="flex rounded-full w-14 h-14 md:w-2 md:h-20 px-1 py-4 md:px-2 md:py-2">
                    <div style="visibility: hidden;" class="flex flex-col rounded-full w-14 h-14 md:w-2 md:h-20 px-1 py-1 md:px-2 md:py-2   border border-gray-300 shadow-lg justify-center items-center">
                        <span class="text-[11px] md:text-[11px]">week</span>
                        <div class="text-lg font-semibold">
                            zero
                        </div>
                    </a>
                </li>
            @endforeach
        @endif
    </ul>
</div>

<main class="overflow-hidden pt-0"><!--[-->
    <div class="relative">
        <div class="relative">
        @php
        $arr = explode("-", $article->slug)
        @endphp
            <div style="background-color: {{ $pregData[$arr[1]]['color'] }};" class="w-full h-full absolute"></div>
            <div class="p-6  relative">
                <div style="background: rgba(253, 252, 250, 0.5);" class="bg-purple-500 mx-auto w-full rounded-lg px-6 py-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-5">
                        
                        <div class="flex flex-col items-center text-center max-w-[700px]">
                            <h1 class="figtree-bold text-lg leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-white figtree-bold">{{ $arr[1] }} Weeks Pregnant</h1>
                            <p class="figtree-medium text-white text-sm">{{ 40 - $arr[1] }} Weeks to Go!</p>
                        </div>
                        <div class="flex justify-center gap-5">
                            <div class="flex flex-col text-center">
                                <h3 class="figtree-bold text-white text-lg">{{ $pregData[$arr[1]]['height'] }}</h3>
                                <p class="figtree-reguler text-white text-sm">inches</p>
                            </div>
                            <div>
                                
                                <img src="{{ asset('frontend/pregnant/week_'.$arr[1].'.svg') }}"  class="h-12 w-12 ">
                            </div>
                            <div class="flex flex-col text-center">
                                <h3 class="figtree-bold text-white text-lg">{{ $pregData[$arr[1]]['weight'] }}</h3>
                                <p class="figtree-reguler text-white text-sm">ounces</p>
                            </div>
                        </div>
                        <div>
                            <p class=" md: md:leading-[25px] text-white text-center max-w-[905px] figtree-reguler">
                            Baby is as big as an <span class="capitalize">{{ $pregData[$arr[1]]['fruit'] }}</span>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 pb-10 md:pb-20">
        <div class="mt-3 md:mt-6">
                <div>

            

                    <div class="news mt-0 md:mt-0 prose md:prose-md lg:prose-lg figtree-reguler text-[#334155] max-w-none hover:prose-a:text-blue-primary">
                        {!! $contents['html'] !!}
                    </div>

                    
                </div>

            </div>
        </div>

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