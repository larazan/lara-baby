@extends('frontend.layout')

@section('content')

<main class="overflow-hidden pt-0">
    <div class="relative">
        <div class="relative">
            <div class="w-full h-full absolute  @if($babyname->gender_id == 1){{ 'bg-[#dbebfa]' }}@elseif($babyname->gender_id == 2){{ 'bg-pink-200' }}@else{{ 'bg-green-200' }}@endif"></div>
            <div class="pb-[62px] pt-4 md:py-20 relative">
                <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-lg leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900 figtree-bold">Meaning of the name <span class="underline underline-offset-2 capitalize">{{ $babyname->name }}</span></h1>
                        </div>
                        <div>
                            <div class="flex flex-wrap items-center gap-1 md:gap-2 justify-center md:justify-center mx-auto w-12/12 md:w-10/12 ">
                                @foreach($letters as $l)
                                <a
                                    href="{{ url('baby-name/letter/'.$l) }}"
                                    class="flex justify-center items-center figtree-reguler w-8 h-8 md:w-10 md:h-10  px-2 md:px-4 py-1 border-2 border-gray-900 @if(Request::segment(3) == $l){{ 'bg-orange-300 text-white' }}@else{{ 'bg-white text-gray-900 hover:bg-orange-300 hover:text-white' }}@endif">
                                    <span class="uppercase font-bold ">{{ $l }}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 -mt-7 pb-10">
            <div class="w-full mx-auto md:max-w-[618px] xl:max-w-[790px] relative md:!max-w-[585px]">
                <x-dropdown-search />

            </div>
            <div class="mt-0 md:mt-6 mx-auto grid2 max-w-7xl grid-cols-12 gap-62 lg:gap-82 md:grid-cols-22 lg:grid-cols-32">

                <div class="py-3 md:py-1 md:pb-5 col-span-full col-start-1 flex flex-col gap-4 mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                    <form action="{{ url('baby-name') }}" method="GET">
                        <div class="py-2 md:py-1 pt-2 md:pb-5 col-span-full w-full col-start-1 flex flex-row items-center justify-between gap-2 md:col-start-52 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                            <div class="flex w-full gap-2 ">

                                <div class="flex flex-col w-1/2 md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                    <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                        <label for="religion" class="figtree-reguler hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Religion</label>
                                        <select name="religion" class="figtree-reguler h-10 rounded border-2 block appearance-none w-full bg-white @if(Request::get('religion')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                            <option value="">Select Religion</option>
                                            @foreach($religions as $r)
                                            <option
                                                value="{{ $r->id }}"
                                                @if(Request::get('religion')==$r->id)
                                                selected
                                                @endif
                                                >{{ $r->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                        <label for="origin" class="figtree-reguler hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Origin</label>
                                        <select name="origin" class="figtree-reguler h-10 rounded border-2 block appearance-none w-full bg-white @if(Request::get('origin')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                            <option value="">Select Origin</option>
                                            @foreach($origins as $o)
                                            <option
                                                value="{{ $o->id }}"
                                                @if(Request::get('origin')==$o->id)
                                                selected
                                                @endif
                                                >{{ $o->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="flex flex-col w-1/2 md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                    <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                        <label for="country" class="figtree-reguler hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Country</label>
                                        <select name="country" class="figtree-reguler h-10 rounded border-2 block appearance-none w-full bg-white @if(Request::get('country')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $c)
                                            <option
                                                value="{{ $c->id }}"
                                                @if(Request::get('country')==$c->id)
                                                selected
                                                @endif
                                                >{{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                        <label for="gender" class="figtree-reguler hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Gender</label>
                                        <select name="gender" class="figtree-reguler h-10 rounded border-2 block appearance-none w-full bg-white  @if(Request::get('gender')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide  py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                            <option value="">Select Gender</option>
                                            @foreach($genders as $key => $value)
                                            <option
                                                value="{{ $key }}"
                                                @if(Request::get('gender')==$key)
                                                selected
                                                @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="flex mx-auto w-full max-w-2xl px-0 py-3 ">
                            <button type="submit" class="flex w-full mx-auto py-2 md:py-3 figtree-medium rounded-full border-2 border-gray-800 shadow-menu items-center justify-center bg-blue-700 hover:bg-blue-800 font-semibold text-white">
                                Browse
                            </button>
                        </div>
                    </form>
                </div>



                <!--  -->
                <div class="bg-white pb-0 md:pb-10">
                    <div class="mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0">

                        <div class="pt-6 pb-0 border-b-2 border-slate-200 border-dashed dark:border-slate-600">
                            <h1 class="text-black text-2xl font-semibold tracking-wide figtree-bold">What is the meaning of the name <span class="capitalize">{{ $babyname->name }}</span>?</h1>
                        </div>

                        <article class="pt-4 text-[14px] font-main leading-6 dark:text-slate-300 figtree-reguler">
                            The name <span class="capitalize"><strong>{{ $babyname->name }}</strong></span>
                            is primarily a <span>@if($babyname->gender_id == 1) Male @endif @if($babyname->gender_id == 2) Female @endif</span> name
                            @if($babyname->origin_id)<span>of {{ $babyname->origin->name }} origin</span>@endif
                            and have <span>{{ $babyname->count() }}</span> letters
                            that means <span class="underline">{{ $babyname->meaning }}</span>.
                        </article>

                        <div class="w-full my-6 flex justify-center border border-gray-800 rounded shadow-stack-sm  bg-white">
                            <div class="flex flex-col w-full text-gray-900">
                                <div class="border-b border-gray-800 py-3 px-3 leading-tight justify-center text-center w-full">
                                    <span class="text-md font-bold text-gray-900 uppercase figtree-bold">{{ trim($babyname->name) }}</span>
                                </div>
                                <div class="flex w-full justify-between items-center border-b border-gray-800 py-3 px-3">
                                    <div class="w-1/2 text-sm figtree-medium">Meaning</div>
                                    <div class="w-1/2 text-sm figtree-medium justify-end text-right">{{ $babyname->meaning }}</div>
                                </div>
                                <div class="flex justify-between items-center border-b border-gray-800 py-3 px-3">
                                    <div class="text-sm figtree-medium">Gender</div>
                                    <div class="text-sm figtree-medium">
                                        @if($babyname->gender_id == 1)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gender-male">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                                <path d="M19 5l-5.4 5.4" />
                                                <path d="M19 5h-5" />
                                                <path d="M19 5v5" />
                                            </svg>
                                        </span>
                                        @endif
                                        @if($babyname->gender_id == 2)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                                <path d="M12 14v7" />
                                                <path d="M9 18h6" />
                                            </svg>
                                        </span>
                                        @endif
                                        @if($babyname->gender_id == 3)
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gender-trasvesti">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M15 20a5 5 0 1 1 0 -10a5 5 0 0 1 0 10z" />
                                                <path d="M6 6l5.4 5.4" />
                                                <path d="M4 8l4 -4" />
                                            </svg>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex justify-between items-center border-b border-gray-800 py-3 px-3">
                                    <div class="text-sm figtree-medium">Religion</div>
                                    <div class="text-sm figtree-medium">@if($babyname->religion_id){{ $babyname->religion->name }}@endif</div>
                                </div>
                                <div class="flex justify-between items-center  border-gray-800 py-3 px-3">
                                    <div class="text-sm figtree-medium">Origin</div>
                                    <div class="text-sm figtree-medium">@if($babyname->origin_id){{ $babyname->origin->name }}@endif</div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <!--  -->
                    <div class="mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0">
                        <div class="flex justify-between">
                            <h2 class="text-md md:text-[24px] md:leading-[33px] lg:text-[32px] lg:leading-[48px] font-bold text-gray-900 figtree-medium">Related Names</h2>
                        </div>
                        <div
                            x-data="{
                            popedBaby: null, // Stores the entire baby object when hovered
                            showMiniDetail: false,
                            popupPosition: { top: 0, left: 0 }, // For absolute positioning

                            // Function to call on mouseover for each baby item
                            showDetail(baby, event) {
                                this.popedBaby = baby;
                                this.showMiniDetail = true;

                                // Calculate position relative to the hovered element
                                const targetRect = event.currentTarget.getBoundingClientRect();
                                // Position 10px below the hovered element, aligned with its left edge
                                this.popupPosition.top = window.scrollY + targetRect.top + targetRect.height + 10;
                                this.popupPosition.left = window.scrollX + targetRect.left;
                            },

                            // Function to call on mouseleave
                            hideDetail() {
                                this.showMiniDetail = false;
                                this.popedBaby = null; // Clear data when not hovered
                            }
                        }"
                            class="">
                            @if($relatedNames->count() > 0)
                            <div class="relative mt-6 md:mt-12 grid gap-4 lg:gap-8 grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"><!--[-->
                                @foreach($relatedNames as $baby)
                                <div
                                    aria-label="Selengkapnya"
                                    class="@if($baby->gender_id == 1){{ 'bg-[#dbebfa]' }}@elseif($baby->gender_id == 2){{ 'bg-pink-200' }}@else{{ 'bg-green-200' }}@endif hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.08)] cursor-pointer border border-gray-700 flex justify-between items-center gap-3 p-3 md:px-4 md:py-3 rounded-lg drop-shadow-md transition hover:scale-105"
                                    @click="showDetail({{ json_encode($baby) }}, $event)">
                                    <div class="md:flex items-center gap-3">
                                        <p class="md:mt-0 text-xs leading-5 md:text-base md:leading-[25px] font-bold text-gray-800 capitalize figtree-medium">{{ $baby->name }}</p>
                                    </div>
                                    <div class="hidden2 md:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 stroke-2 text-[#475569]">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                                        </svg>
                                    </div>
                                </div>
                                @endforeach

                                <!-- Modal -->
                                <div
                                    x-show="showMiniDetail"
                                    role="dialog"
                                    aria-modal="true"
                                    style="display: none;"
                                    x-id="['modal-title']"
                                    aria-labelledby="modal-title-3"
                                    :aria-labelledby="$id('modal-title')"
                                    x-on:keydown.escape.prevent.stop="showMiniDetail = false"
                                    class="fixed inset-0 z-50 w-screen overflow-y-hidden">
                                    <!-- Overlay -->
                                    <div
                                        x-show="showMiniDetail"
                                        x-transition.opacity=""
                                        style="display: none;"
                                        class="fixed inset-0 bg-gray-500 bg-opacity-50">
                                    </div>
                                    <!-- Panel -->
                                    <div
                                        x-show="showMiniDetail"
                                        x-on:click="showMiniDetail = false"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="transform opacity-0 translate-y-full"
                                        x-transition:enter-end="transform opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="transform opacity-100 translate-y-0"
                                        x-transition:leave-end="transform opacity-0 translate-y-full"
                                        class="relative flex min-h-screen items-center justify-center p-4"
                                        style="display: none;">
                                        <div
                                            x-on:click.stop=""
                                            x-trap.noscroll.inert="showMiniDetail"
                                            class="relative w-full max-w-sm overflow-y-auto shadow-2xl bg-white ring-1 ring-gray-200 rounded-2xl p-5">
                                            <div class="">
                                                <div class="flex py-2">
                                                    <button class="absolute flex top-1 right-1 rounded-full bg-white border border-gray-900 text-gray-900 px-1 py-1 hover:bg-gray-900 hover:text-white cursor-pointer" @click="showMiniDetail = false">
                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            fill="none"
                                                            viewBox="0 0 24 24"
                                                            stroke-width=3
                                                            stroke="currentColor"
                                                            class="w-5 h-5 ">
                                                            <path
                                                                stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <template x-if="popedBaby">
                                                    <div class="flex flex-col w-full gap-2">
                                                        <div class="w-full my-2 flex justify-center border border-gray-800 rounded shadow-stack-sm  bg-white">
                                                            <div class="flex flex-col w-full text-gray-900">
                                                                <div class="border-b border-gray-800 py-3 px-3 leading-tight justify-center text-center w-full">
                                                                    <span class="text-md font-bold text-gray-900 uppercase figtree-bold" x-text="popedBaby.name"></span>
                                                                </div>
                                                                <div class="flex w-full justify-between items-center border-b border-gray-800 py-3 px-3">
                                                                    <div class="w-1/2 text-sm figtree-medium">Meaning</div>
                                                                    <div class="w-1/2 text-sm figtree-medium justify-end text-right"><span x-text="popedBaby.meaning"></span></div>
                                                                </div>
                                                                <div class="flex justify-between items-center border-b border-gray-800 py-3 px-3">
                                                                    <div class="text-sm figtree-medium">Gender</div>
                                                                    <div class="text-sm figtree-medium">
                                                                        <!-- icon -->
                                                                        <span x-show="popedBaby.gender_id == 1">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gender-male">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                                <path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                                                                <path d="M19 5l-5.4 5.4" />
                                                                                <path d="M19 5h-5" />
                                                                                <path d="M19 5v5" />
                                                                            </svg>
                                                                        </span>
                                                                        <span x-show="popedBaby.gender_id == 2">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                                <path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" />
                                                                                <path d="M12 14v7" />
                                                                                <path d="M9 18h6" />
                                                                            </svg>
                                                                        </span>
                                                                        <span x-show="popedBaby.gender_id == 3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gender-trasvesti">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                                <path d="M15 20a5 5 0 1 1 0 -10a5 5 0 0 1 0 10z" />
                                                                                <path d="M6 6l5.4 5.4" />
                                                                                <path d="M4 8l4 -4" />
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex justify-between items-center border-b border-gray-800 py-3 px-3">
                                                                    <div class="text-sm figtree-medium">Religion</div>
                                                                    <div class="text-sm figtree-medium">
                                                                        <span x-text="popedBaby.religionName"></span>
                                                                        {{--
                                                                        <span x-show="popedBaby.religion_id == 1">Christianity</span>
                                                                        <span x-show="popedBaby.religion_id == 2">Muslim</span>
                                                                        <span x-show="popedBaby.religion_id == 3">Hinduism</span>
                                                                        <span x-show="popedBaby.religion_id == 4">Buddhism</span>
                                                                        <span x-show="popedBaby.religion_id == 5">Judaism</span>
                                                                        <span x-show="popedBaby.religion_id == 6">Catholic</span>
                                                                        <span x-show="popedBaby.religion_id == 7">Shintoism</span>
                                                                        <span x-show="popedBaby.religion_id == 8">Sikhism</span>
                                                                        <span x-show="popedBaby.religion_id == 9">Zoroastrianism</span>
                                                                        --}}
                                                                    </div>
                                                                </div>
                                                                <div class="flex justify-between items-center  border-gray-800 py-3 px-3">
                                                                    <div class="text-sm figtree-medium">Origin</div>
                                                                    <div class="text-sm figtree-medium">
                                                                        <span x-text="popedBaby.originName"></span>
                                                                        {{-- 
                                                                        <span x-show="popedBaby.origin_id == 1">African</span>
                                                                        <span x-show="popedBaby.origin_id == 2">Arabic</span>
                                                                        <span x-show="popedBaby.origin_id == 3">American</span>
                                                                        <span x-show="popedBaby.origin_id == 4">English</span>
                                                                        <span x-show="popedBaby.origin_id == 5">Indonesian</span>
                                                                        <span x-show="popedBaby.origin_id == 6">Sanskrit</span>
                                                                        <span x-show="popedBaby.origin_id == 7">Korean</span>
                                                                        <span x-show="popedBaby.origin_id == 8">Japanese</span>
                                                                        <span x-show="popedBaby.origin_id == 9">Roman</span>
                                                                        <span x-show="popedBaby.origin_id == 10">Russian</span>
                                                                        <span x-show="popedBaby.origin_id == 11">Hindi</span>
                                                                        --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a :href="'/baby-name/'+ popedBaby.slug" class="w-full mx-auto py-2 md:py-3 rounded-lg border border-gray-800 items-center justify-center bg-blue-700 hover:bg-blue-800 font-semibold text-white text-center figtree-medium">View Full Details &rarr;</a>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="flex items-center justify-center mx-auto w-full">
                                <span class="font-semibold text-md text-red-500 figtree-medium">No record found!</span>
                            </div>
                            @endif
                        </div>

                    </div>
                    <!--  -->

                    <div class="mx-auto max-w-6xl md:px-6 py-6 lg:px-10 xl:px-0 ">
                        

                        @if($namelists->count() > 0)
                        <div class="w-full mt-4 border border-slate-200 rounded-t-lg overflow-x-auto">
                            <table class="w-full divide-y divide-slate-200">
                                <thead class="bg-indigo-200 text-slate-800 figtree-reguler">
                                    <tr>
                                        <th class="px-4 py-2 text-start">Full Name</th>
                                        <th class="px-4 py-2 text-start">Meaning</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-200 bg-white text-slate-800 ">
                                    @foreach($namelists as $f)
                                    <tr class="hover:bg-slate-100 cursor-pointer odd:bg-white even:bg-slate-50">
                                        <td class="px-4 py-2 figtree-medium">{{ $f->full_name }}</td>
                                        <td class="px-4 py-2 figtree-reguler leading-tight">{{ $f->meaning }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="flex items-center justify-center mx-auto w-full">
                            <span class="font-semibold text-md text-red-500 figtree-medium">No record found!</span>
                        </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </div><!--]-->
</main>

@endsection

@push('style')
<style>
    .shadow-stack-sm {
        --tw-shadow: 3px 3px 0 -1px #fff, 3px 3px 0 #191a1b !important;
    }

    .shadow-menu,
    .shadow-stack,
    .shadow-stack-sm {
        box-shadow: 0 0 transparent, 0 0 transparent, var(--tw-shadow) !important;
        box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow) !important;
    }
</style>
@endpush