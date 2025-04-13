@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ config('app.name') }} Blogs">
<meta name="description" content="Wander Blog | Tech Startup | Luxury Vacation Rentals | Corporate Retreat | REIT Stock | Travel to California Luxury Vacation Rentals and more. ">
<meta name="keywords" content="Wander,Home,Experience,Vacation,Workstation,Find,Happy,Place">
@endpush

@section('content')



<main class="relative bg-[#f5f3ff] pb-12">
  <div class=" mx-auto max-w-screen-lg ">
    <div
      class="px-6 pt-24 md:pt-24 pb-8 md:pb-10">
      <h1 class="text-4xl sm:text-3xl md:text-4xl pally-medium lg:text-5xl font-headline font-black tracking-snug text-center leading-12 sm:leading-15 md:leading-19 lg:leading-26 text-gray-800">
        <span>Article</span>
      </h1>
      <!-- <p class="text-gray-600 text-lg md:text-2xl text-center leading-normal md:leading-9 mt-3 md:mt-6">
              Get inspiring jokes .
            </p> -->

    </div>

    <div class="my-0 px-6">
      @if (!empty($tag))
      <div class="font-semibold text-black tracking-tight text-lg">tag by: <span class="text-lg md:text-3xl text-black font-semibold md:font-bold uppercase">{{ $tag }}</span></div>
      @else
      <div class="h-0 md:h-0"></div>
      @endif
    </div>

    <div class="flex md:hidden px-6 pb-6">
      <div class="relative" x-data="{ isCatOpen: false}">
        <button
          @click="isCatOpen = !isCatOpen"
          @keydown.escape="isCatOpen = false"
          class="flex items-center justify-center px-3 py-2 space-x-1 text-gray-900 hover:bg-gray-200 rounded-sm border shadow border-gray-300 cursor-pointer bg-white hover:text-black pally-medium"
          title="share">
          <span class="text-sm">Category</span>
          <svg class="-ml-1" :class="isCatOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
            <path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z" class="heroicon-ui"></path>
          </svg>
        </button>
        <ul x-show="isCatOpen"
          @click.away="isCatOpen = false"
          class="absolute bg-white shadow overflow-hidden rounded min-w-28 border mt-1 py-0 right-0 z-20">
          @foreach($categories as $cat)
          <li>
            <a class="flex items-center space-x-1 px-2 py-2 text-sm hover:bg-gray-200" href="{{ url('articles/'.$cat->slug) }}">
              <span class="pally-medium">{{ $cat->name }}</span>
            </a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="">
      <div class="px-6 mx-auto flex w-full space-x-4">
        <div class="w-full md:w-9/12 grid grid-flow-row grid-cols-1 md:grid-cols-2 gap-5">

          @if($articles->count() > 0)
          @foreach($articles as $a)

          <article class="flex flex-col md:w-full h-full py-4 md:py-6 px-4 md:p-6 group bg-white drop-shadow md:focus-within:ring ring-violet-300 md:hover:shadow-violet md:focus-within:shadow-violet transition-all relative rounded-2xl md:shadow-sm-violet ">
            <a href="{{ url('/article/' . $a->slug) }}" class="flex flex-col">
              
              @if($a->original)
                <img 
                  src="{{ asset('storage/'.$a->original) }}"
                  data-src="{{ asset('storage/'.$a->original) }}"
                  data-srcset="{{ asset('storage/'.$a->original. ' 860w') }},
                          {{ asset('storage/'.$a->original. ' 640w') }},
                          {{ asset('storage/'.$a->original. ' 420w') }}"
                  alt="{{ $a->title }}" 
                  class="max-w-full md:max-w-none h-64  md:h-52 object-fit md:-mx-4 md:-mt-4 mb-0 rounded-xl" 
                  loading="lazy"
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
              
                <div class="flex flex-col">
              <h1 class="font-heading text-[1.4rem] font-semibold text-navy-900 my-4 group-hover:text-violet-700">
              {{ $a->title }}
              </h1>
              <p class="text-base line-clamp-3 mb-5">
              {{ $a->excerpt() }}
              </p>
            </div>
            <div class="absolute2 bottom-0 inset-0 pb-0  mt-auto flex justify-start">
              <div class="flex items-center">
                <div class="w-10 h-10">
                  <img
                    src="{{ Avatar::create(ucwords($a->user->name))->toBase64() }}"
                    alt="{{ $a->user->name }}"
                    class="rounded-full w-full" />
                </div>
                <div class="ml-3 leading-6">
                  <div
                    class="font-medium text-gray-600 capitalize">
                    {{ $a->user->name }}
                  </div>
                  <div class="text-sm text-gray-500">
                    <time datetime="2021-29-00">{{ $a->created_at->diffForHumans() }}</time>
                    <span> · </span>
                    <span>{{ $a->readTime() }} min read</span>
                  </div>
                </div>
              </div>
            </div>
            </a>
          </article>

          <div class="hidden relative rounded-lg bg-white drop-shadow overflow-hidden">
            <h2 class="px-4 py-6 text-center md:text-left bg-[#fed44e]">
              <a
                href="{{ url('/article/' . $a->slug) }}"
                class="text-2xl md:text-3xl leading-8 md:leading-8 font-bold pally-medium text-gray-800 hover:text-[#20bd70] transition ease-in-out duration-150">
                {{ $a->title }}
              </a>
            </h2>
            <p class="px-4 py-5 min-h-56 line-clamp-2 text-base text-gray-600 md:leading-normal text-center md:text-left">
              {{ $a->excerpt() }}
            </p>
            <div class="absolute2 bottom-0 px-4 pb-5 flex justify-center md:justify-start">
              <div class="flex items-center">
                <div class="w-10 h-10">
                  <img
                    src="{{ Avatar::create(ucwords($a->user->name))->toBase64() }}"
                    alt="{{ $a->user->name }}"
                    class="rounded-full w-full" />
                </div>
                <div class="ml-3 leading-6">
                  <div
                    class="font-medium text-gray-600 capitalize">
                    {{ $a->user->first_name }} {{ $a->user->last_name }}
                  </div>
                  <div class="text-sm text-gray-500">
                    <time datetime="2021-29-00">{{ $a->created_at->diffForHumans() }}</time>
                    <span> · </span>
                    <span>{{ $a->readTime() }} min read</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          @else
          <div class="flex items-center justify-center mx-auto w-full ">
            <span class="font-semibold text-md text-red-500">No record found!</span>
          </div>
          @endif
        </div>
        <div class="w-3/12 hidden md:flex justify-start items-center flex-col pb-4">
          <div class="space-y-0 inline-flex justify-between w-full px-4">
            <div class="w-full ">
              <div class="flex items-center mb-2">
                <h3 class="font-semibold text-2xl text-gray-900  pally-bold ">Category</h3>
              </div>
              <div class="flex flex-wrap items-center2 justify-center md:justify-start mx-auto">
                  @foreach($categories as $cat)
                  <a href="{{ url('articles/'.$cat->slug) }}">
                      <div class=" mr-2 mt-1 mb-1 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-2xl shadow-sm text-white transition duration-150 bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cool-indigo-500 cursor-pointer">
                          <div class="truncate tracking-wide text-xs font-semibold capitalize">{{ $cat->name }}</div>
                      </div>
                  </a>
                  @endforeach
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{ $articles->links() }}

  </div>

</main>


@endsection