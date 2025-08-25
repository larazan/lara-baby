@extends('frontend.layout')

@section('content')

<main class="flex bg-white min-h-screen pt-0 md:pt-[0px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="container mx-auto px-5 my-8">
    
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto" >
            

            <div class="gap-y-8 lg:gap-y-0 lg:gap-x-12">
                <div class="lg:col-span-2">
                    <div class="md:py-8 lg:pr-8">
                        <div class="space-y-5 lg:space-y-8">
                           
                            <h1 class="text-2xl font-bold lg:text-4xl text-gray-800 figtree-bold">About Million Facts</h1>
                            <div class="flex items-center gap-x-5">
                                <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-200 figtree-reguler">Last updated: June 2024</p>
                            </div>
                            <div class="text-gray-800 prose leading-8 figtree-reguler">
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