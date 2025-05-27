@extends('frontend.layout')

@section('content')

@include('frontend.components._newsfeed')

<main class="flex bg-white min-h-screen pt-0 md:pt-[0px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="container mx-auto px-5 my-8">
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto" x-data="{open:false}">
            <button
                class="py-2 px-4 rounded-md border text-gray-600 border-gray-600 mb-3 shadow-sm"
                x-on:click="open = !open">
                Open Modal
            </button>

            <!-- Modal -->
            <div
                x-show="open"
                role="dialog"
                aria-modal="true"
                style="display: none;"
                x-id="['modal-title']"
                aria-labelledby="modal-title-3"
                :aria-labelledby="$id('modal-title')"
                x-on:keydown.escape.prevent.stop="open = false"
                class="fixed inset-0 z-50 w-screen overflow-y-hidden">
                <!-- Overlay -->
                <div
                    x-show="open"
                    x-transition.opacity=""
                    style="display: none;"
                    class="fixed inset-0 bg-gray-500 bg-opacity-50">
                </div>
                <!-- Panel -->
                <div
                    x-show="open"
                    x-on:click="open = false"
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
                        x-trap.noscroll.inert="open"
                        class="relative w-full max-w-sm overflow-y-auto shadow-2xl bg-white ring-1 ring-gray-200 rounded-3xl p-10">
                        <div class="relative">
                            <div class="flex flex-col text-center">
                                <p class="text-lg font-medium text-gray-500 lg:text-xl">
                                    Log in to your account
                                </p>
                            </div>
                            <form class="mt-12">

                                <div class="space-y-3">
                                    <div class="">
                                        <label
                                            for="name"
                                            class="block mb-3 text-sm font-medium text-black sr-only">
                                            First name
                                        </label>
                                        <input
                                            id="name"
                                            name="text"
                                            type="text"
                                            placeholder="Your name"
                                            aria-placeholder="Your name"
                                            class="block w-full h-12 px-4 py-3 placeholder-gray-500 bg-gray-100 border-0 rounded-lg appearance-none text-blue-500 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-blue-500 focus:ring-inset text-xs" />
                                    </div>
                                    <div class="col-span-full">
                                        <label
                                            for="password"
                                            class="block mb-3 text-sm font-medium text-black sr-only">Password</label>
                                        <input
                                            id="password"
                                            name="password"
                                            type="password"
                                            placeholder="Type password here..."
                                            aria-placeholder="Type password here..."
                                            class="block w-full h-12 px-4 py-3 placeholder-gray-500 bg-gray-100 border-0 rounded-lg appearance-none text-blue-500 focus:border-blue-500 focus:bg-white focus:outline-none focus:ring-blue-500 focus:ring-inset text-xs" />
                                    </div>
                                    <div class="flex items-center justify-between py-4">
                                        <div class="flex items-center">
                                            <input
                                                id="remember-me"
                                                type="checkbox"
                                                name="remember-me"
                                                class="size-4 text-indigo-600 bg-gray-100 border border-gray-200 rounded focus:ring-white focus:border-white" />
                                            <label
                                                class="block ml-2 text-sm font-medium leading-tight text-gray-500"
                                                for="remember-me">Remember me</label>
                                        </div>
                                        <div class="text-sm">
                                            <a
                                                class="font-medium text-gray-500 hover:text-indigo-500"
                                                href="#">Forgot your password?</a>
                                        </div>
                                    </div>
                                    <div class="col-span-full">
                                        <a
                                            class="flex items-center justify-center h-10 px-4 py-2 text-base font-semibold text-white transition-all duration-200 rounded-full bg-gradient-to-b from-blue-500 to-indigo-600 hover:to-indigo-700 shadow-button shadow-blue-600/50 focus:ring-2 focus:ring-blue-950 focus:ring-offset-2 ring-offset-gray-200 hover:shadow-none"
                                            href="#">Log in
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <p
                                        class="mx-auto text-sm font-medium leading-tight text-center text-black">
                                        Not a have a password yet? <a
                                            class="ml-3 text-indigo-600 hover:text-black"
                                            href="/signup">Sign up now</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="gap-y-8 lg:gap-y-0 lg:gap-x-12">
                <div class="lg:col-span-2">
                    <div class="md:py-8 lg:pr-8">
                        <div class="space-y-5 lg:space-y-8">
                            <!-- generator  -->
                            <div class="w-full">
                                <div class=" w-full max-w-2xl mx-auto">
                                    <div class="relative flex flex-col w-full px-5 py-6 bg-[#fffdf0] border border-gray-700 rounded-md my-4">
                                        <button class="absolute flex top-2 right-2 rounded-full bg-transparent px-1 py-1 hover:bg-black text-black hover:text-white transition duration-150 cursor-pointer">
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
                                        <div class="text-lg md:text-2xl font-bold text-black capitalize">Baby name generator</div>

                                        <div class="container mx-auto py-4" x-data="{ tab: 'tab1' }">
                                            <ul class="flex justify-between w-full border-b-2 mt-0">
                                                <li class="flex justify-center w-1/2 text-center  ">
                                                    <a
                                                        class="flex w-full justify-center items-center text-lg text-blue-700 font-semibold hover:text-blue-800 hover:border-b-2 hover:border-blue-700" href="#"
                                                        :class="{ 'text-blue-700 border-b-2 border-blue-700': tab == 'tab1'}"
                                                        @click.prevent="tab = 'tab1'">Search</a>
                                                </li>
                                                <li class="flex justify-center w-1/2 text-center ">
                                                    <a
                                                        class="flex w-full justify-center items-center text-lg text-blue-700 font-semibold hover:text-blue-800 hover:border-b-2 hover:border-blue-700"
                                                        href="#"
                                                        :class="{ 'text-blue-700 border-b-2 border-blue-700': tab == 'tab2'}"
                                                        @click.prevent="tab = 'tab2'">Filter</a>
                                                </li>

                                            </ul>
                                            <div class="content  px-4 py-4  pt-4">
                                                <div x-show="tab == 'tab1'">
                                                    <div class="w-full mt-4 lg:col-span-2 space-y-6 divide-y-2">
                                                        <div class="flex flex-col space-y-4">
                                                            <div class="flex">
                                                                <input type="text" placeholder="Enter name..."
                                                                    class="w-full px-3 h-10 md:h-12 rounded-l border-2 border-sky-500 focus:outline-none focus:border-sky-500">
                                                                <button type="submit" class="bg-sky-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
                                                            </div>
                                                            <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-[#fffdf0] text-gray-700 font-medium">
                            Or
                        </span>
                    </div>
                </div>
                                                            <div>
                                                                <div class="flex flex-wrap items-center gap-1 md:gap-2 justify-center md:justify-center mx-auto w-11/12 md:w-10/12 ">
                                                                    @foreach($letters as $l)
                                                                    <a
                                                                        href="#{{ $l }}"
                                                                        class="flex justify-center items-center w-8 h-8 md:w-10 md:h-10 bg-white hover:!bg-orange-300 px-2 md:px-4 py-1 border-2 text-gray-900 hover:text-white border-gray-900 @if(Request::segment(3) == $l){{ 'bg-blue-800 text-white' }}@else{ 'bg-white text-gray-900' }@endif">
                                                                        <span class="uppercase font-bold ">{{ $l }}</span>
                                                                    </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div x-show="tab == 'tab2'">
                                                    <div class="w-full mt-4 lg:col-span-2 space-y-6 divide-y-2">
                                                        <form wire:submit.prevent="import">
                                                            <div class="flex flex-col space-y-4">

                                                                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                                                    <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                                                        <label for="locale" class=" block text-sm font-medium text-gray-700 pb-1">Religion</label>
                                                                        <select wire:model="religionId" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                                            <option value="">Select Religion</option>
                                                                            @foreach($religions as $r)
                                                                            <option value="{{ $r->id }}">{{ $r->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                                                        <label for="locale" class=" block text-sm font-medium text-gray-700 pb-1">Origin</label>
                                                                        <select wire:model="locale" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                                            <option value="">Select Origin</option>
                                                                            @foreach($origins as $o)
                                                                            <option value="{{ $o->id }}">{{ $o->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-2 md:justify-between">
                                                                    <div class="w-full md:w-1/2  flex flex-col col-span-6 sm:col-span-3">
                                                                        <label for="locale" class=" block text-sm font-medium text-gray-700 pb-1">Country</label>
                                                                        <select wire:model="countryId" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                                            <option value="">Select Country</option>
                                                                            @foreach($countries as $c)
                                                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-span-6 sm:col-span-3 w-full md:w-1/2 ">
                                                                        <label for="locale" class=" block text-sm font-medium text-gray-700 pb-1">Gender</label>
                                                                        <select wire:model="genderId" class="h-10 rounded border block appearance-none w-full bg-white border-gray-600 text-gray-700 py-2 px-4 pr-0 leading-tight focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none">
                                                                            <option value="">Select Gender</option>
                                                                            @foreach($genders as $key => $value)
                                                                            <option value="{{ $key }}">{{ $value }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </form>

                                                        <div class="flex w-full pt-4 justify-center md:justify-end">
                                                            <div class="flex items-end justify-end space-x-2">
                                                                <a href="{{ url('admin/babynames') }}" class="flex px-4 font-medium py-2 rounded bg-white border border-slate-200 hover:border-slate-300 text-indigo-500">Clear</a>
                                                                <button type="button" wire:click="import" class="flex px-4 font-medium py-2 rounded border border-gray-200 bg-indigo-500 hover:bg-indigo-600 text-white">Search</button>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <h1 class="text-3xl font-bold lg:text-4xl text-gray-800 ">About Million Facts</h1>
                            <div class="flex items-center gap-x-5">
                                <p class="text-xs sm:text-sm text-gray-800 dark:text-gray-200">Last updated: June 2024</p>
                            </div>
                            <div class="font-serif2 text-gray-800 prose text-xl leading-8">
                                <p>Hi 👋 Welcome to Million Facts, your ultimate destination for the most intriguing and random facts across a multitude of topics. From the animal kingdom to the glitz of celebrity life, from mouthwatering food trivia to cinematic gems, we’ve got something to pique everyone’s curiosity. Dive in and discover that you can learn something new about everything!</p>
                                <p>At Million Facts, our mission is to ignite curiosity and inspire knowledge by delivering fascinating facts that entertain and educate. We aim to make learning fun and accessible, transforming everyday moments into opportunities for discovery.</p>
                                <p>We commit to providing accurate, reliable, and well-researched facts that our audience can trust.</p>
                                <p>We believe that knowledge belongs to everyone and strive to share diverse topics that resonate with all.</p>
                                <p>Learning should never be boring! We infuse excitement into every piece of trivia we share. </p>

                            </div>
                            <div></div>
                            <figure class="float-left mr-8 !mb-8"></figure>
                            <div class="prose text-lg text-gray-800 dark:text-gray-200 font-serif"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection


@push('style')
<style>
    [x-cloak] {
        display: none;
    }

    .duration-300 {
        transition-duration: 300ms;
    }

    .ease-in {
        transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
    }

    .ease-out {
        transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }

    .scale-90 {
        transform: scale(.9);
    }

    .scale-100 {
        transform: scale(1);
    }
</style>
@endpush

{{--
    1. About Company

Introduction: Welcome to Million Facts, your ultimate destination for the most intriguing and random facts across a multitude of topics. From the animal kingdom to the glitz of celebrity life, from mouthwatering food trivia to cinematic gems, we’ve got something to pique everyone’s curiosity. Dive in and discover that you can learn something new about everything!

2. Mission

Statement: At Million Facts, our mission is to ignite curiosity and inspire knowledge by delivering fascinating facts that entertain and educate. We aim to make learning fun and accessible, transforming everyday moments into opportunities for discovery.

3. Vision

Statement: Our vision is to be the go-to platform for fact enthusiasts around the globe. We aspire to create a vibrant community where knowledge thrives, and every individual feels empowered to explore the wonders of the world through captivating information.

4. Core Values

Curiosity: We celebrate the spirit of inquiry and encourage exploration of the unknown.

Integrity: We commit to providing accurate, reliable, and well-researched facts that our audience can trust.

Inclusivity: We believe that knowledge belongs to everyone and strive to share diverse topics that resonate with all.

Fun: Learning should never be boring! We infuse excitement into every piece of trivia we share.

Community: We value our audience and foster engagement, creating a space where everyone can share their love for facts.

5. Team

Introduction: Meet the passionate team behind Million Facts! Our diverse group of fact-lovers, researchers, and content creators work tirelessly to curate and craft the most compelling facts out there. Each member brings unique expertise and creativity to the table, ensuring that our content remains fresh, engaging, and, most importantly, fun! Together, we’re on a mission to make the world a more knowledgeable place, one fact at a time.



About FactRepublic.com
FactRepublic.com is where curiosity meets clarity. Here, you can dive into a vast collection of unbelievable, unknown, and uncommon facts about everyday life, all in one well-organized space backed by reliable sources. Whether you’re seeking a quick burst of knowledge or a deep dive into the hidden truths of the world, FactRepublic offers it all with a commitment to accuracy and entertainment.

Our Mission
At FactRepublic, our mission is to provide you with facts you won’t find anywhere else on the internet. We aim to deliver these nuggets of knowledge in a format that is not only short, concise, and easy to read but also backed by rigorous research. We stand by the accuracy of every fact we publish, offering sources for every piece of information, and even brief summaries of the source articles through our custom algorithm. This ensures that even if the original source disappears, you still have access to the core information.

--}}