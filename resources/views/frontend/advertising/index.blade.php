@extends('frontend.layout')

@section('content')

<main class="flex bg-white min-h-screen pt-16 md:pt-[70px] max-w-[85rem] px-4 md:py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="container mx-auto my-8">
            <div class="max-w-[85rem] px-4 md:px-6 lg:px-8 mx-auto">
            <div class="max-w-3xl py-4 mx-auto space-y-6">
                <h1 class="leading-9 text-2xl pally-medium">Advertise with us</h1>

                <p class="text-gray-700">
                    Would you like to give your business a boost? Advertise in our website, newsletter and on our social media. 
                    On our website we have popup option, it show almost in every page.   
                    Here's an example:
                </p>
                <img src="/frontend/img/advertise.png" class="w-full border p-1 border-purple-100">

                <h2 class="text-lg font-medium text-[#FF6D42]">Stats</h2>
                <p class="text-gray-700">
                    Some recent analytic:
                </p>

                <div class="grid sm:grid-cols-3 border p-1 divide-y sm:divide-x sm:divide-y-0">
                    <div class="pl-4">Site visitor: 6500+ a day</div>
                    <div class="pl-4">Click Rate: 5-6%</div>
                </div>


                <h2 class="text-lg font-medium text-[#FF6D42]">Book Now</h2>

                <div class="grid sm:grid-cols-2 gap-10">

                    <div class="border p-4 rounded">
                        <p class="text-center text-lg font-bold text-gray-700">
                            3 Month ($2000 USD)
                        </p>
                        <a href="https://book.stripe.com/8wMfZ6a9w8yX3oA7sw" class="mt-4 block w-full rounded-md bg-blue-600 px-3 py-2 text-center text-base font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600  transition duration-500">
                            Book Now
                        </a>
                    </div>

                    <div class="border p-4 rounded">

                        <p class="text-center text-lg font-bold text-gray-700">
                            6 Month ($3500 USD)
                        </p>

                        <a href="https://buy.stripe.com/6oEcMUftQbL9bV6fZ1" class="mt-4 block w-full rounded-md bg-blue-600 px-3 py-2 text-center text-base font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600  transition duration-500">
                            Book Now
                        </a>
                    </div>

                </div>

                <h2 class="text-lg text-gray-700">Newsletter</h2>
                <p class="text-gray-700">
                We send out 4 newsletter emails a month. Our simple Newsletter advertisement program allows you to
                place an image-based banner inside our newsletter.
                Here's an example:
                </p>
                <img src="/frontend/img/ads-sample.jpg" class="w-full border p-1 border-purple-100">

                <h2 class="text-lg font-medium text-[#FF6D42]">Stats</h2>
                <p class="text-gray-700">
                    Some recent subscriber stats:
                </p>

                <div class="grid sm:grid-cols-3 border p-1 divide-y sm:divide-x sm:divide-y-0">
                    <div class="pl-4">Subscriber Count: 6500+</div>
                    <div class="pl-4">Open Rate: ~54%</div>
                    <div class="pl-4">Click Rate: 5-6%</div>
                </div>


                <h2 class="text-lg font-medium text-[#FF6D42]">Book Now</h2>
                <p class="text-gray-700">
                    Our pricing is incredibly simple: $250 USD per issue. However, if you book for a month (4
                    issues bundle), you'll enjoy a significant discount—only $800 USD.
                    Secure your slots now before they run out.
                </p>

                <div class="grid sm:grid-cols-2 gap-10">

                    <div class="border p-4 rounded">
                        <p class="text-center text-lg font-bold text-gray-700">
                            Single Issue ($250 USD)
                        </p>
                        <a href="https://book.stripe.com/8wMfZ6a9w8yX3oA7sw" class="mt-4 block w-full rounded-md bg-blue-600 px-3 py-2 text-center text-base font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600  transition duration-500">
                            Book Now
                        </a>
                    </div>

                    <div class="border p-4 rounded">

                        <p class="text-center text-lg font-bold text-gray-700">
                            Monthly Bundle ($800 USD)
                        </p>

                        <a href="https://buy.stripe.com/6oEcMUftQbL9bV6fZ1" class="mt-4 block w-full rounded-md bg-blue-600 px-3 py-2 text-center text-base font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600  transition duration-500">
                            Book Now
                        </a>
                    </div>

                </div>

            </div>
            </div>
        </div>
    </main>

@endsection