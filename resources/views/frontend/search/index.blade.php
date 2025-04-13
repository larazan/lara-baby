@extends('frontend.layout')

@section('content')

<main class="pt-[60px] md:pt-[80px] min-h-screen pt-162 h-full bg-white">

    <div class="max-w-5xl mx-auto">

       
        <div class="px-6 py-2 md:py-2 mb-5 min-h-[100px]">
            <div class="grid grid-cols-1">
                <div class="flex flex-col space-y-4">
                    <div class="flex items-center space-x-2">
                        <div><span class="text-lg md:text-2xl text-black font-semibold">Search for:</span></div><span class="text-lg md:text-2xl text-black font-bold uppercase underline underline-offset-4">{{ $keyword }}</span>
                    </div>
                     
                    <!-- facts -->
                    @if($facts->count() > 0)
                    <div class="px-6 py-2 mb-5">
                        <div>
                            <div class="py-0 md:py-5">
                                <ul class="list-disc space-y-2" >
                                    @foreach($facts as $q)
                                    <li class="">
                                        <a class="flex flex-col group space-y-1 leading-tight search" href="{{ url('fact/'.$q->uuid) }}">
                                            <span class="leading-tight text-slate-800 group-hover:text-[#20bd70]">"{!! $q->title !!}" </span>
                                            <span>{!! $q->description !!}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- end facts -->
                    
                </div>
            </div>
        </div>

    </div>
</main>

@endsection