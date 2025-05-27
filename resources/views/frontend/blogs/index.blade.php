@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ config('app.name') }} Blogs">
<meta name="description" content="Wander Blog | Tech Startup | Luxury Vacation Rentals | Corporate Retreat | REIT Stock | Travel to California Luxury Vacation Rentals and more. ">
<meta name="keywords" content="Wander,Home,Experience,Vacation,Workstation,Find,Happy,Place">
@endpush

@section('content')

<main class="overflow-hidden">
  <div class="relative">
    <div class="relative">
      <div class="w-full h-full absolute bg-[rgb(237,246,251)]/75"></div>
      <div class="pb-12 md:pb-[72px] pt-10 md:py-20 relative">
        <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
          <div class="flex flex-col items-center justify-center gap-4">

            <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
              <h1 class="text-2xl leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900">News</h1>
            </div>

            <div class="flex flex-wrap items-center gap-2 md:gap-3 mt-2 md:mt-2">
              <button type="button" class="bg-[#0133CC1A] border-blue-primary hover:bg-[#0133CC1A] text-blue-primary inline-flex items-center justify-center text-xs md:text-sm rounded-full px-5 py-[6px] md:py-[9px] leading-[22px] font-bold md:font-medium border">All</button>
              @foreach($categories as $cat)
                <a href="{{ url('articles/'.$cat->slug) }}">
                  <button type="button" class="bg-[#0133CC1A] border-blue-primary hover:bg-[#0133CC1A] text-blue-primary inline-flex items-center justify-center text-xs md:text-sm rounded-full px-5 py-[6px] md:py-[9px] leading-[22px] font-bold md:font-medium border !bg-white !border-[#CBD5E1] hover:!bg-[#0133CC1A] !text-gray-primary">{{ $cat->name }}</button>
                </a>
              @endforeach
                  
            </div>
        </div>
      </div>
    </div>
    <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 pb-10 md:pb-20">
      <div class="mt-6 md:mt-12 mx-auto grid max-w-7xl grid-cols-1 gap-6 lg:gap-8 md:grid-cols-2 lg:grid-cols-3"><!--[-->
        @if($articles->count() > 0)
          @foreach($articles as $a)
        <article class="relative flex flex-col items-start justify-between w-full h-full group bg-white p-4 rounded-2xl border border-[#CBD5E1] hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.12)] drop-shadow md:focus-within:ring ring-violet-300 md:hover:shadow-violet-300 md:focus-within:shadow-violet-300 transition-all sm:shadow-violet-300">
          <a href="{{ url('/article/' . $a->slug) }}" class="absolute top-0 left-0 w-full h-full z-[5] rounded-2xl" aria-label="Baca selengkapnya"></a>
          <div class="w-full mb-4">
            <div class="relative aspect-[16/9] w-full h-[166px] xl:h-[216px] rounded-xl bg-gray-100 overflow-hidden">
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
                  width="345" height="216"
                >
                @else
                <img 
                  src="{{ asset('frontend/img/ci-cd-cover.png') }}"
                  data-src="{{ asset('frontend/img/ci-cd-cover.png') }}"
                  data-srcset="{{ asset('frontend/img/ci-cd-cover.png 860w') }},
                          {{ asset('frontend/img/ci-cd-cover.png 640w') }},
                          {{ asset('frontend/img/ci-cd-cover.png 420w') }}" 
                  class="max-w-full md:max-w-none h-64 md:h-52 object-fit md:-mx-4 md:-mt-4 mb-0 rounded-xl" alt="" loading="lazy">
              @endif
            </div>
          </div>
          <div class="flex flex-col justify-between w-full h-full">
            <div>
              <time class="text-xs leading-[22px] text-gray-600 font-bold flex items-center">{{ $a->created_at->diffForHumans() }}</time>
              <h2 class="mt-2 text-sm leading-[25px] md:text-base md:leading-[27px] xl:text-2xl font-bold text-gray-800 group-hover:text-orange-500">
                {{ $a->title }}
              </h2>
            </div>
            <div class="flex items-center mt-4 space-x-2 text-[#00989d] !hover:text-[#06329d]">
              <a href="{{ url('/article/' . $a->slug) }}" class="text-xs lg:text-base font-bold leading-6  flex gap-2 items-center uppercase">Read more</a>
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-5 h-5 stroke-2">
                  <path fill-rule="evenodd" d="M3 10a.75.75 0 0 1 .75-.75h10.638L10.23 5.29a.75.75 0 1 1 1.04-1.08l5.5 5.25a.75.75 0 0 1 0 1.08l-5.5 5.25a.75.75 0 1 1-1.04-1.08l4.158-3.96H3.75A.75.75 0 0 1 3 10Z" clip-rule="evenodd"></path>
                </svg>
              </span>
            </div>
          </div>
        </article>
        @endforeach

@else
<div class="flex items-center justify-center mx-auto w-full ">
  <span class="font-semibold text-md text-red-500">No record found!</span>
</div>
@endif
        
      </div>
      <!-- paginate -->
      {{ $articles->links() }}
    </div>
  </div>
</main>

@endsection