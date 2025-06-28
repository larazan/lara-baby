@extends('frontend.layout')

@section('content')
@include('frontend.components._share')

<main class="overflow-hidden pt-0">
    <div class="relative">
        <div class="relative">
            <div class="w-full h-full absolute  @if($babyname->gender_id == 1){{ 'bg-[#dbebfa]' }}@elseif($babyname->gender_id == 2){{ 'bg-orange-200' }}@else{{ 'bg-green-200' }}@endif"></div>
            <div class="pb-[62px] pt-4 md:py-20 relative">
                <div class="mx-auto max-w-6xl px-6 lg:px-10 xl:px-0">
                    <div class="flex flex-col items-center justify-center gap-4">
                        <div class="flex items-center gap-2.5 text-center max-w-[700px]"><!---->
                            <h1 class="text-lg leading-[33px] md:text-[32px] md:leading-[48px] xl:text-[40px] xl:leading-[54px] font-bold text-gray-900">Arti Nama <span class="underline underline-offset-2 capitalize">{{ $babyname->name }}</span></h1>
                        </div>
                        <div>
                            <div class="flex flex-wrap items-center gap-1 md:gap-2 justify-center md:justify-center mx-auto w-12/12 md:w-10/12 ">
                                @foreach($letters as $l)
                                <a
                                    href="{{ url('baby-name/letter/'.$l) }}"
                                    class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10  px-2 md:px-4 py-1 border-2 border-gray-900 @if(Request::segment(3) == $l){{ 'bg-orange-300 text-white' }}@else{{ 'bg-white text-gray-900 hover:bg-orange-300 hover:text-white' }}@endif">
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
                                    <label for="religion" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Religion</label>
                                    <select name="religion" class="h-10 rounded border block appearance-none w-full bg-white @if(Request::get('religion')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Religion</option>
                                        @foreach($religions as $r)
                                        <option 
                                            value="{{ $r->id }}"
                                            @if(Request::get('religion') == $r->id) 
                                                selected
                                            @endif
                                        >{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                    <label for="origin" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Origin</label>
                                    <select name="origin" class="h-10 rounded border block appearance-none w-full bg-white @if(Request::get('origin')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Origin</option>
                                        @foreach($origins as $o)
                                        <option 
                                            value="{{ $o->id }}"
                                            @if(Request::get('origin') == $o->id) 
                                                selected
                                            @endif
                                        >{{ $o->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-col w-1/2 md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                    <label for="country" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Country</label>
                                    <select name="country" class="h-10 rounded border block appearance-none w-full bg-white @if(Request::get('country')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $c)
                                        <option 
                                            value="{{ $c->id }}"
                                            @if(Request::get('country') == $c->id) 
                                                selected
                                            @endif
                                        >{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                    <label for="gender" class="hidden md:block text-sm md:text-md font-semibold text-gray-700 pb-1 tracking-wide">Gender</label>
                                    <select name="gender" class="h-10 rounded border block appearance-none w-full bg-white  @if(Request::get('gender')){{ 'border-red-500 text-red-500' }}@else{{ 'border-gray-600 text-gray-500' }}@endif text-[11px] md:text-[13px] font-bold uppercase pl-2 tracking-wide  py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                        <option value="">Select Gender</option>
                                        @foreach($genders as $key => $value)
                                        <option 
                                            value="{{ $key }}" 
                                            @if(Request::get('gender') == $key) 
                                                selected
                                            @endif
                                        >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            </div>
                        </div>
                        <div class="flex mx-auto w-full max-w-2xl px-0 py-3 ">
                            <button type="submit" class="flex w-full mx-auto py-2 md:py-3 rounded-full border border-blue-800 items-center justify-center bg-blue-700 hover:bg-blue-800 font-semibold text-white">
                                Browse
                            </button>
                        </div>
                    </form>
                </div>



                <!--  -->
                <div class="bg-white pb-0 md:pb-10">
                    <div class="mx-auto max-w-6xl md:px-6 lg:px-10 xl:px-0">

                        <div class="pt-6 pb-4 border-b-2 border-slate-200 border-dashed dark:border-slate-600">
                            <h1 class="font-luckiest-guy text-info text-2xl tracking-widest">Arti Nama {{ $babyname->name }} ({{ $babyname->origin_id }})</h1>
                        </div>

                        <article class="text-[14px] font-main leading-6 dark:text-slate-300">
                            Berikut adalah arti dari <strong>nama bǎo</strong> yang berasal dari Tionghoa yang memiliki jumlah huruf sebanyak <span>{{ $babyname->count() }}</span> huruf.
                            <br>
                            <br>Nama bǎo cocok untuk bayi berjenis kelamin Perempuan, Silahkan apabila Anda hendak melihat <a href="https://cekartinama.com/cari-arti-nama/bǎo.html" class="decorated">arti lain dari nama bǎo</a>.
                        </article>

                        <div class="w-full my-6 flex justify-center border border-gray-800 rounded shadow-stack-sm  bg-white">
                            <div class="flex flex-col w-full text-gray-900">
                                <div class="border-b border-gray-800 py-3 px-3 leading-tight justify-center text-center w-full">
                                    <span class="text-md font-bold text-gray-900 uppercase ">{{ trim($babyname->name) }}</span>
                                </div>
                                <div class="flex w-full justify-between items-center border-b border-gray-800 py-3 px-3">
                                    <div class="w-1/2 text-sm font-mabrybold">Meaning</div>
                                    <div class="w-1/2 text-sm font-mabry justify-end text-right">{{ $babyname->meaning }}</div>
                                </div>
                                <div class="flex justify-between items-center border-b border-gray-800 py-3 px-3">
                                    <div class="text-sm font-mabrybold">Gender</div>
                                    <div class="text-sm font-mabry">
                                        @if($babyname->gender_id == 1)
                                        <span>
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-male"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M19 5l-5.4 5.4" /><path d="M19 5h-5" /><path d="M19 5v5" /></svg>
                                        </span>
                                        @endif
                                        @if($babyname->gender_id == 2)
                                        <span>
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-female"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0" /><path d="M12 14v7" /><path d="M9 18h6" /></svg>
                                        </span>
                                        @endif
                                        @if($babyname->gender_id == 3)
                                        <span>
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-gender-trasvesti"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 20a5 5 0 1 1 0 -10a5 5 0 0 1 0 10z" /><path d="M6 6l5.4 5.4" /><path d="M4 8l4 -4" /></svg>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex justify-between items-center border-b border-gray-800 py-3 px-3">
                                    <div class="text-sm font-mabrybold">Religion</div>
                                    <div class="text-sm font-mabry">@if($babyname->religion_id){{ $babyname->religion($babyname->religion_id) }}@endif</div>
                                </div>
                                <div class="flex justify-between items-center  border-gray-800 py-3 px-3">
                                    <div class="text-sm font-mabrybold">Origin</div>
                                    <div class="text-sm font-mabry">{{ $babyname->origin_id }}</div>
                                </div>
                            </div>
                        </div>

                       

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

.shadow-menu, .shadow-stack, .shadow-stack-sm {
    box-shadow: 0 0 transparent, 0 0 transparent, var(--tw-shadow) !important;
    box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow) !important;
}
</style>
@endpush