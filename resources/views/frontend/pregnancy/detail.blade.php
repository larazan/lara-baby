@extends('frontend.layout')

@section('content')

<!-- {{ $article->id }}
@dump($countBefore)
@dump($countAfter) -->

<div class="flex flex-col gap-4 w-full py-6">
    <div class="flex mx-auto w-full justify-center">
    <h2 class="text-lg font-semibold">Pregnancy Week by Week</h2>
    </div>
    <ul class="flex gap-2 md:gap-2  mx-auto w-full max-w-lg md:max-w-3xl h-fit overflow-x-auto scroll-smooth custom-scrollbar">
        @if(count($countBefore) > 0)
            @foreach($countBefore as $b)
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
        @foreach($allRecords as $r)
        <li class="py-4">
            <a href="{{ url('pregnancy/tracker/'.$r->categorySlug($r->category_id).'/'.$r->slug) }}" class="flex flex-col rounded-full w-14 h-14 md:w-14 md:h-14 px-1 py-1 md:px-2 md:py-2  @if($r->id == $article->id){{ 'text-white bg-purple-700 transition scale-125 mx-2' }}@else{{ 'text-gray-800 bg-gray-200' }}@endif border-2 border-gray-800 shadow-menu justify-center items-center">
                <span class="pt-1 text-[11px] md:text-[11px]">week</span>
                <div class="text-lg font-semibold">
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
            <div class="w-full h-full absolute bg-[#f7836a] "></div>
            <div class="py-6 md:py-20 relative">
                <div class="mx-auto max-w-lg px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">
                        
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-lg leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-white">Pregnancy Tracker: Day by Day</h1>
                        </div>
                        <div>
                            <p class=" md: md:leading-[25px] text-white text-center max-w-[905px]">Get a daily look at how your baby is growing and find timely guidance for every week and trimester of your pregnancy.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 pb-10 md:pb-20">

        </div>

    </div>

</main>

@endsection