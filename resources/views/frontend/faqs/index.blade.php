@extends('frontend.layout')

@section('content')


<main class="flex bg-white min-h-screen pt-10 pb-24 md:pt-[70px] max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="flex flex-row w-full">
        <div class="flex flex-1 flex-col items-center justify-center relative">
            <div class="flex flex-1 flex-col w-full pb-18 max-w-2xl md:max-w-2xl ">
                <section class="w-full mx-auto mt-0 py-6 md:py-12 md:px-5 bg-[#f4f4f4] rounded-md">
                    <h5 class="font-semibold2 md:font-bold text-2xl font-bold text-black md:text-3xl pally-bold text-center ">FAQs</h5>
                    <dl class="w-full mt-6 space-y-4 ">
                        @foreach($faqs as $faq)
                        <div class="w-full py-3 md:py-5 px-4 rounded-xl"  x-data="{ open:false }">
                            <dt class="w-full text-lg">
                                <button
                                    class="flex items-start justify-between w-full rounded-lg text-left "
                                    id="headlessui-disclosure-button-11"
                                    type="button"
                                    aria-expanded="true"
                                    aria-controls="headlessui-disclosure-panel-12"
                                    @click="open = !open">
                                    <span :class="open ? 'text-[#02979a]' : 'text-gray-800 hover:text-orange-500'" class="w-full font-semibold ">{{ $faq->question }}</span>
                                    <span class="flex items-center ml-6 h-7">
                                        <span class=" text-primary font-normal text-2xl">
                                            <svg :class="open ? 'rotate-45 transition duration-300 text-[#02979a]' : 'transition duration-300 text-gray-700'" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                            </svg>
                                        </span>
                                    </span>
                                </button>
                            </dt>

                            <dd class="pr-12 mt-2" x-show="open" id="headlessui-disclosure-panel-12"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform -translate-y-6"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-6">
                                <p class="text-base text-gray-700">
                                
                                    {{ $faq->answer }}
                                
                                </p>
                            </dd>
                        </div>
                        @endforeach

                    </dl>

                </section>




            </div>

        </div>
    </div>
</main>


@endsection