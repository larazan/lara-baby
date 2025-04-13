@php
$categories = \App\Models\Category::select(['name', 'slug'])->where('parent_id', null)->get();

@endphp

<div class="hidden relative md:inline-flex" x-data="{ open: false }">

  <button class="hidden sm:inline-block group relative items-center text-gray-900" aria-haspopup="true" @click.outside="open = false" @click.prevent="open = !open" :aria-expanded="open">
    <span class=" cursor-pointer flex flex-row items-end gap-1">Browse
      <svg :class="open ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20" height="20">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
      </svg>
    </span>

  </button>


  <div class="flex origin-top-right z-30 p-6 absolute top-full shadow-menu2 right-0 -mr-2 md:-mr-2 sm:mr-0 w-[300px] bg-white rounded border border-slate-300 shadow-lg overflow-hidden mt-1.5 md:mt-1.5" enter="transition ease-out duration-200 transform" enterStart="opacity-0 -translate-y-2" enterEnd="opacity-100 translate-y-0" leave="transition ease-out duration-200" leaveStart="opacity-100" leaveEnd="opacity-0" @keydown.escape.window="open = false" x-show="open" x-transition:enter="transition ease-out duration-200 transform" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-cloak>
    <div class="flex flex-col w-full">

      <div class="">
        <div class="flex flex-col gap-3">
          <a class="text-base font-semibold uppercase text-gray-500 hover:text-gray-700 pally-regular" href="{{ url('categories') }}">Categories</a>
          <div class="grid grid-cols-2 gap-3">
            @foreach($categories as $cat)
            <a class="flex flex-row items-center gap-2 text-sm hover:text-[#20bd70] text-gray-600" href="{{ url('categories/' . $cat->slug) }}">
              <span class="whitespace-nowrap">{{ $cat->name }}</span>
            </a>
            @endforeach
          </div>
        </div>
        
      </div>

    </div>
  </div>

</div>