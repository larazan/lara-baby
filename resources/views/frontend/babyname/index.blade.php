@extends('frontend.layout')

@section('content')

<main class="overflow-hidden pt-0">
    <div class="relative">
        <div class="relative">
            <div class="w-full h-full absolute bg-indigo-400"></div>
            <div class="pb-[62px] pt-4 md:py-20 relative">
                <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-lg leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-white figtree-bold">Baby Name</h1>
                        </div>
                        <div>
                            <div class="flex flex-wrap items-center gap-1 md:gap-2 justify-center md:justify-center mx-auto w-12/12 md:w-10/12 ">
                                @foreach($letters as $l)
                                <a
                                    href="{{ url('baby-name/letter/'.$l) }}"
                                    class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10  px-2 md:px-4 py-1 border-2 border-gray-900 @if(Request::segment(3) == $l){{ 'bg-orange-300 text-white' }}@else{{ 'bg-white text-gray-900 hover:bg-orange-300 hover:text-white' }}@endif">
                                    <span class="uppercase font-bold figtree-reguler">{{ $l }}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative mx-auto max-w-6xl w-full px-6 lg:px-10 xl:px-0 -mt-7 pb-10">
            <div class="w-full mx-auto md:max-w-[618px] xl:max-w-[790px] relative md:!max-w-[585px] ">
                <x-dropdown-search />

            </div>
            <div class="mt-0 md:mt-6 mx-auto grid2 max-w-7xl grid-cols-12 gap-62 lg:gap-82 md:grid-cols-22 lg:grid-cols-32">

                <div class="py-3 md:py-1 md:pb-5 col-span-full col-start-1 flex flex-col gap-4 mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                    <form action="{{ url('baby-name') }}" method="GET">
                        <div class="py-2 md:py-1 pt-2 md:pb-5 col-span-full w-full col-start-1 flex flex-row items-center justify-between gap-2 md:col-start-52 md:flex-nowrap xl:col-start-4 xl:col-end-12">
                            <div class="flex w-full gap-2 ">

                                <div class="flex flex-col w-1/2 md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                    <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                        <label for="religion" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide figtree-reguler">Religion</label>
                                        <select name="religion" class="figtree-reguler h-10 rounded border block appearance-none w-full bg-white @if(Request::get('religion')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
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
                                        <select name="origin" class="figtree-reguler h-10 rounded border block appearance-none w-full bg-white @if(Request::get('origin')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
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
                                        <select name="country" class="figtree-reguler h-10 rounded border block appearance-none w-full bg-white @if(Request::get('country')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
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
                                        <select name="gender" class="figtree-reguler h-10 rounded border block appearance-none w-full bg-white  @if(Request::get('gender')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide  py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
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
                            <button type="submit" class="flex w-full figtree-bold mx-auto py-2 md:py-3 rounded-full border-2 border-gray-800 shadow-menu items-center justify-center bg-blue-700 hover:bg-blue-800 font-semibold text-white">
                                Browse
                            </button>
                        </div>
                    </form>
                </div>



                <!--  -->
                <div class="bg-white pb-0 md:pb-10">
                    <div class="mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0">
                        <div class="flex justify-between">
                            <h2 class="text-md md:text-[24px] figtree-medium md:leading-[33px] lg:text-[32px] lg:leading-[48px] font-bold text-gray-900">
                                Found {{ $countNames }} Names
                                @if(Request::get('search'))
                                <span> for "{{ Request::get('search') }}" </span>
                                @endif
                            </h2>
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
                            class=""
                        >
                            <div class="relative mt-6 md:mt-12 grid gap-4 lg:gap-8 grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"><!--[-->
                                @foreach($babynames as $baby)
                                <div
                                    aria-label="Selengkapnya"
                                    class="@if($baby->gender_id == 1){{ 'bg-[#dbebfa]' }}@elseif($baby->gender_id == 2){{ 'bg-orange-200' }}@else{{ 'bg-green-200' }}@endif hover:shadow-[0px_8px_32px_0px_rgba(100,_116,_139,_0.08)] cursor-pointer border border-gray-700 flex justify-between items-center gap-3 p-3 md:px-4 md:py-3 rounded-lg drop-shadow-md transition hover:scale-105"
                                    @click="showDetail({{ json_encode($baby) }}, $event)"
                                >
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
                                                                <div class="text-sm figtree-medium"><span x-text="popedBaby.religion_id"></span></div>
                                                            </div>
                                                            <div class="flex justify-between items-center  border-gray-800 py-3 px-3">
                                                                <div class="text-sm figtree-medium">Origin</div>
                                                                <div class="text-sm figtree-medium"><span x-text="popedBaby.origin_id"></span></div>
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


                        </div>
                    </div>
                    <!--  -->
                    <div class="flex flex-col w-full md:px-6 mt-6">
                        <div class="flex items-center gap-2">
                            <div class="flex px-1 py-1 w-10 bg-[#dbebfa] border border-gray-700"></div>
                            <span class="font-semibold text-md text-gray-700 figtree-bold">Boy</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex px-1 py-1 w-10 bg-orange-200 border border-gray-700"></div>
                            <span class="font-semibold text-md text-gray-700 figtree-bold">Girl</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex px-1 py-1 w-10 bg-green-200 border border-gray-700"></div>
                            <span class="font-semibold text-md text-gray-700 figtree-bold">Unisex</span>
                        </div>
                    </div>
                    <!--  -->
                </div>

            </div>
            <div class="bg-white md:mt-0">
                <!-- paginate -->
                {{ $babynames->links() }}
            </div>
        </div>
    </div><!--]-->
</main>

@endsection

@push('style')
<style>
    .mini-detail-popup {
        position: absolute;
        z-index: 100;
        /* Ensure it's on top */
        min-width: 280px;
        /* Slightly wider for more content */
        max-width: 380px;
        /* Add shadow and border for better visibility */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
        background-color: white;
        border-radius: 0.5rem;
        padding: 1rem;
    }
</style>
@endpush