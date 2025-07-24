@extends('frontend.layout')

@section('content')

<!-- @include('frontend.components._bread') -->
<main class="overflow-hidden pt-0">
    <div class="relative">
        <img onerror="this.setAttribute('data-error', 1)" width="300" height="480" alt="Kepala BMKG Tegaskan Komitmen STMKG Cetak SDM Unggul Berdaya Saing Global di Hadapan Komisi V DPR RI" loading="lazy" data-nuxt-img="" class="w-full h-[240px] md:h-[360px] lg:h-[480px] object-cover" src="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1" srcset="https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 1x, https://i0.wp.com/content.bmkg.go.id/wp-content/uploads/621A0225.jpg?fit=1280%2C853&amp;ssl=1 2x">
        <div class="absolute z-10 bottom-0 h-56 w-full bg-gradient-to-b from-transparent to-[#0a1016]"></div>
        <div class="absolute z-20 bottom-0 h-full w-full rounded-md px-2 pt-0 ">
            <div class="absolute top-2 left-2">
                <a href="{{ url('activities') }}" class="flex  px-2 py-2 rounded-full border bg-white border-gray-200 text-gray-700 hover:text-white hover:bg-gray-700 items-center justify-between text-xs md:text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
            </div>
            <div class="absolute top-2 right-2">
                <a href="{{ url('activities') }}" class="flex  px-2 py-2 rounded-full border bg-white border-gray-200 text-gray-700 hover:text-white hover:bg-gray-700 items-center justify-between text-xs md:text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
</svg>

                </a>
            </div>
            <div class="absolute bottom-3 left-2">
                <div class="px-4">
                    <h2 class="text-xl md:text-[24px] md:leading-[33px] lg:text-[32px] figtree-bold lg:leading-[48px] font-bold text-white">
                        <span>{{ $title }}</span>
                    </h2>
                </div>
                <div class="pl-4 flex flex-wrap items-center gap-2 mt-4">
                    <div class="border-white rounded-full border text-[20px] leading-9 text-center w-11 h-11 left-11 -top-6  sm:block ">
                        <img src="{{ Avatar::create(ucwords($activity->user->name))->toBase64() }}" alt="{{ $activity->user->name }}" aria-hidden="true" class="rounded-full w-full border-2 border-white" />
                    </div>

                    <div class="flex md:flex-row flex-col items-center2">
                        <div class="flex justify-start text-right pr-1">
                            <span class="font-bold text-white">
                                <p class="capitalize figtree-reguler">{{ $activity->user->name }}</p>
                            </span>
                        </div>
                        <div class="flex space-x-1 items-center figtree-reguler">
                            <span class="hidden md:block text-muted">|</span>
                            <span class="flex text-white text-sm">
                                @if( $activity->updated_at == null )
                                <span class="hidden md:block pr-1">Published on</span> {{ $activity->created_at->format('d M Y') }}
                                @else
                                <span class="hidden md:block pr-1">Updated on</span> {{ $activity->updated_at->format('d M Y') }}
                                @endif
                            </span>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="bg-white py-0 pb-10">
        <div class="mx-auto max-w-[994px] px-6 lg:px-10 xl:px-0">
            <div class="mt-0 md:mt-0">
                <div>
                    <div class="flex justify-between items-center w-full mx-auto mt-0 pt-3 pb-8">
                        <div class="shadow-sm rounded-2xl">
                            <a href="" class="w-full justify-center no-underline figtree-medium inline-flex items-center px-4 py-1 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500">
                                {{ $activity->category($activity->category_id) }}
                            </a>
                        </div>
                        <div class="flex justify-end items-end">
                            {!! $shareComponent !!}
                        </div>
                    </div>

                    <div class="news mt-0 md:mt-0 prose md:prose-md lg:prose-lg figtree-reguler text-[#334155] max-w-none hover:prose-a:text-blue-primary">
                        {{ $activity->body }}
                    </div>
                </div>
                <div class="flex flex-col gap-4 mt-5">
                    <div>
                        <h4 class="text-black text-lg md:text-2xl font-semibold figtree-medium">Materials You’ll Need</h4>
                    </div>
                    <ul class="list-disc pl-4 text-black">
                        @foreach($materials as $m)
                        <li class="figtree-reguler">{{ $m->name }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="flex flex-col gap-4 mt-5">
                    <div>
                        <h4 class="text-black text-lg md:text-2xl font-semibold figtree-medium">How to Make</h4>
                    </div>
                    <div>
                        @php
                        $i = 1
                        @endphp
                        @foreach($steps as $s)
                        <article class="flex flex-col gap-1 px-0 py-4">                            
                            <div class="flex flex-col gap-1">
                                <div class="flex gap-2 items-center2">
                                    <div class="flex justify-center items-center h-6 w-6 px-3 py-3 rounded-full border bg-gray-700 text-sm text-white figtree-reguler">{{ $i++ }}</div>
                                    <div class="text-black prose md:prose-md lg:prose-lg font-semibold leading-tight md:leading-4 figtree-medium">{{ $s->title }}</div>
                                </div>
                                <div class=" text-[#334155] pl-9 max-w-none hover:prose-a:text-blue-primary figtree-reguler">{{ $s->description }}</div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-comment :commentable-type="'activities'" :commentable-id="$activity->id" />
    @include('components.related-activity')
</main>

@endsection

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
</style>

@endpush