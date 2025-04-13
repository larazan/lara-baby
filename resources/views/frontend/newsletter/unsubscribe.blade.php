@extends('frontend.layout')

@section('content')


    <main class="flex bg-white min-h-screen pt-0 md:pt-[0px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="container mx-auto px-5 my-8">
        @include('frontend.components._alert')
            <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
                <div class="gap-y-8 lg:gap-y-0 lg:gap-x-12">
                    <div class="lg:col-span-2">
                        <div class="md:py-8 lg:pr-8">
                            <div class="space-y-5 lg:space-y-8">
                                <h1 class="text-3xl font-bold lg:text-4xl text-gray-800 ">About ColorBliss</h1>
                                <div class="flex items-center gap-x-5">
                                    <p class="text-xs sm:text-sm text-gray-800 dark:text-gray-200">Last updated: June 2024</p>
                                </div>
                                <div class="font-serif2 text-gray-800 prose text-xl leading-8">
                                    <p>Hi 👋 and thanks for checking out ColorBliss!</p>
                                    <p>With ColorBliss, you can create any coloring sheet you can imagine for your kids, your students, your nieces, your nephews, and even for yourself. Just type a description of what you want to color and in seconds you'll have an image you can print and start coloring!</p>
                                    <p>ColorBliss is a labor of love made by me, Ben Robertson, with the support of my 3 kids and my amazing wife.</p>
                                    <p>My kids (5, 4, and 1) all love to color, and they always have big ideas on what they want on their coloring sheets. Most of the time, I can't find what they want. So I began to wonder - could we use AI to help bring their dreams to reality?</p>
                                    <p>In September 2023 I quit my job as customer success leader to spend more time with my family and try to make an income as an independent software developer (you can find out more about me at<!-- --> <a href="https://ben.robertson.is/">ben.robertson.is</a>). As I was thinking about what to build, I kept coming back to this idea of custom coloring pages.<!-- --> </p>
                                    <p>I started testing out different ways of making the coloring sheets, and roped in the kids to help see what they thought. They did not hold anything back in their feedback. But once we got to a good spot, I decided to put it out into the world and that's how ColorBliss.art came to be!<!-- --> </p>
                                    <p>I love working on ColorBliss, I love making coloring sheets and I love seeing what you make with ColorBliss.<!-- --> </p>
                                    <p>From me and my family - thank you for using ColorBliss!<!-- --> </p>
                                    <p class="mb-0">Happy coloring,</p>
                                    <div class="flex items-center gap-x-4">
                                        <p>Ben Robertson </p>
                                    </div>
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

