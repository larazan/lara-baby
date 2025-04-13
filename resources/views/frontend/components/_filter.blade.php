@php
$categories = \App\Models\Category::all();
@endphp

<div class="hidden2 flex flex-col bg-white fixed overflow-y-auto top-0 h-full shadow-2xl w-[45vw] transition-all duration-300 z-50 custom-scrollbar"" id=" menubar" :class="filterOpen ? 'left-0' : '-left-full'" x-cloak>
    <div class="sticky top-0 flex w-full items-center justify-between px-4 py-3 border-b bg-white">
        <div class="w-1/2">
            <span class="uppercase font-bold text-gray-900">Filter</span>
        </div>

        <div class="flex justify-end w-1/2">
            <div @click.stop="filterOpen = !filterOpen" class="cursor-pointer w-8 h-8 flex justify-center items-center rounded-full shadow bg-white hover:bg-slate-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=2 stroke="currentColor" class="w-6 h-6 text-gray-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    </div>
    <form action="{{ route('categories') }}" method="GET">
        @csrf
        <div class="flex justify-start items-center flex-col gap-0  py-0 ">
            <div class="w-full bg-white space-y-4">


                <div class="px-4 py-0">
                    <h3 class="font-medium text-gray-900 pb-3">Category</h3>
                    <div class="">
                        <div class="space-y-2">
                            @foreach($categories as $cat)
                            <div class="flex items-center">
                                <a href="{{ url('categories/' . $cat->slug) }}" class="ml-1 min-w-0 flex-1 pally-medium hover:text-[#20bd70] text-sm @if(in_array(Request::segment(3), [$cat->slug])){{ 'text-[#20bd70]' }}@else{ 'text-gray-500' }@endif">{{ $cat->name }}</a>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="px-4 py-2">
                    <h3 class="font-medium text-gray-900 pb-3">Type</h3>
                    <div class="">
                        <div class="space-y-0">
                            <div class="hidden items-center">
                                <input
                                    id="facts-single"
                                    name="type[]"
                                    value="single"
                                    type="checkbox"
                                    class="h-4 w-4 rounded border text-[#20bd70] focus:ring-0"
                                    @if(is_array(Request::get('type')) && in_array('single', Request::get('type')))
                                    checked
                                    @endif>
                                <label for="facts-single" class="ml-3 min-w-0 flex-1 text-gray-500 text-sm">
                                    Single
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input
                                    id="facts-series"
                                    name="type[]"
                                    value="series"
                                    type="checkbox"
                                    class="h-4 w-4 rounded border text-[#20bd70] focus:ring-0"
                                    @if(is_array(Request::get('type')) && in_array('series', Request::get('type')))
                                    checked
                                    @endif>
                                <label for="facts-series" class="ml-3 min-w-0 flex-1 text-gray-500 text-sm">
                                    Series
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="px-4 py-2 flex2 gap-3 space-y-1 flex-col">
                    <div class="w-full">
                        <button type="submit" class="w-full border border-green-600 bg-[#20bd70] hover:bg-green-400 hover:text-green-700 text-white px-3 py-2 text-sm rounded-lg transition duration-500">
                            Filter
                        </button>
                    </div>
                    <div class="w-full flex justify-start">
                        <a href="{{ route('categories') }}" class="w-full border text-center border-gray-400 hover:border-gray-800 text-gray-400 hover:text-gray-800 px-3 py-1 text-xs rounded-lg transition duration-500">
                            Reset
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </form>


</div>

<div :class="filterOpen ? 'block' : 'hidden'" class=" opacity-30 fixed inset-0 z-30 bg-black"></div>