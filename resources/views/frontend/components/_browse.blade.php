@php
$categories = \App\Models\Category::select(['name', 'slug'])->where('parent_id', null)->get();

@endphp

<div class="hidden relative md:inline-flex">

  <button class="hidden sm:inline-block group relative items-center text-gray-900" aria-haspopup="true" @click.outside="categoryOpen = false" @click.prevent="categoryOpen = !categoryOpen" :aria-expanded="categoryOpen">
    <span class=" cursor-pointer flex flex-row items-end gap-1 figtree-medium">Menu
      <svg :class="categoryOpen ? 'rotate-180 transition duration-300' : 'transition duration-300'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20" height="20">
        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"></path>
      </svg>
    </span>

  </button>

</div>

<div
  class="flex origin-top-right z-30 p-6 fixed top-[58px] mt-0 inset-x-0  w-screen bg-white border border-slate-300 shadow-lg overflow-hidden "
  enter="transition ease-out duration-200 transform"
  enterStart="opacity-0 -translate-y-2"
  enterEnd="opacity-100 translate-y-0"
  leave="transition ease-out duration-200"
  leaveStart="opacity-100"
  leaveEnd="opacity-0"
  @keydown.escape.window="categoryOpen = false"
  x-show="categoryOpen"
  :class="categoryOpen ? 'opacity-100' : 'top-full'"
  x-transition:enter="transition ease-out duration-200 transform"
  x-transition:enter-start="opacity-0 -translate-y-2"
  x-transition:enter-end="opacity-100 translate-y-0"
  x-transition:leave="transition ease-out duration-200"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  x-cloak>
  <div class="flex flex-col w-full">

    <div class="">
      <div class="flex flex-col gap-3">
        <div class="grid grid-cols-4 gap-3">
          <!-- pregnancy -->
          <div class="">
            <h1 class="text-purple-500 text-lg figtree-bold">Pregnancy</h1>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                  <a href="{{ url('/pregnancy') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Pregnancy Tracker</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/pregnancy/tracker/first-trimester') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>1st Trimester</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/pregnancy/tracker/second-trimester') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>2nd Trimester</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/pregnancy/tracker/third-trimester') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>3rd Trimester</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/balai-upt" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Preparing for Baby</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/balai-upt" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Postpartum</p>
                  </a>
                </li>
              </ul>
            </div>
          </div>

          <!-- parenting -->
          <div class="">
            <h1 class="text-orange-500 text-lg figtree-bold">Parenting</h1>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                  <a href="/profil" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Babies</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/organisasi" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Toddlers</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/pejabat" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Kids</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/pejabat" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Teens</p>
                  </a>
                </li>

              </ul>
            </div>

          </div>

          <!-- activities -->
          <div class="">
            <h1 class="text-green-500 text-lg figtree-bold">Activities</h1>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                    <a href="{{ url('activities/') }}" class="figtree-reguler flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                        <p>Activities</p>
                    </a>
                </li>
                @foreach($categories as $c)
                @if($c->slug != 'activities')
                <li>
                  <a href="{{ url('activities/'.$c->slug) }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>{{ $c->name }}</p>
                  </a>
                </li>
                @endif
                @endforeach

              </ul>
            </div>

          </div>

          <!-- babynames -->
          <div class="">
            <h1 class="text-sky-500 text-lg figtree-bold">Baby names</h1>
            <div class="py-0 lg:py-6 px-0 xl:py-8  order-1 lg:order-2">
              <ul class="text-sm leading-[22px] font-medium text-[#475569] mt-[14px] xl:mt-4 flex flex-col gap-[14px]">
                <li>
                  <a href="/baby-name" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Browse All Baby Names</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/baby-name?religion=&origin=&country=&gender=2') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Top Girl Names</p>
                  </a>
                </li>
                <li>
                  <a href="{{ url('/baby-name?religion=&origin=&country=&gender=1') }}" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Top Boy Names</p>
                  </a>
                </li>
                <li>
                  <a href="/profil/balai-upt" class="figtree-reguler text-[#475569] hover:text-orange-500 flex gap-3 hover:text-blue-primary hover:underline" aria-label="Selengkapnya">
                    <p>Trending Names</p>
                  </a>
                </li>
              </ul>
            </div>

          </div>

        </div>

      </div>

    </div>
  </div>