<div x-data="{ showModal: true }"  @keydown.escape="showModal = false">
   
    <div class="fixed inset-0 z-50 overflow-hidden  flex items-start top-[10%] md:top-[20%] mb-4 justify-center transform px-4 sm:px-6" x-show="showModal">
         <div
          class="relative bg-white overflow-auto custom-scrollbar max-w-4xl md:w-full w-full md:h-96 max-h-84 rounded shadow-lg"
          @click.away="showModal = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"       
          >
          
          <section class="overflow-hidden2 h-full shadow-2xl md:grid md:grid-cols-3">
            
            <img
              alt="Trainer"
              src="{{ url('frontend/img/promo1.jpeg') }}"
              class="h-52 w-full object-cover md:h-full"
            />
            
            <button class="absolute flex top-1 right-1 rounded-full bg-gray-100 px-1 py-1 hover:bg-gray-200 cursor-pointer" @click="showModal = !showModal">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width=3
                stroke="currentColor"
                class="w-5 h-5 text-[#1d494e]"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
            
            <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
              <p class="md:text-2xl font-semibold uppercase md:tracking-widest2 text-black pally-bold">
                This is sample
              </p>

              <h2 class="mt-6 font-black capitalize">
                <span class="text-lg text-black md:text-3xl lg:text-6xl">
                  Take 20% off Your Order
                </span>

                <span class="mt-2 block text-sm text-black">
                  On your next order over $50
                </span>
              </h2>

              <a
                class="mt-8 inline-block w-full rounded-full bg-black py-4 text-sm font-bold capitalize tracking-widest text-white"
                href="{{ route('advertise') }}"
              >
                Advertise with us
              </a>

              <p class="mt-8 text-xs font-medium uppercase text-gray-600">
                Offer valid until 24th March, 2021 *
              </p>
            </div>
          </section>
        </div>
        </div>
        <div class="opacity-50 fixed inset-0 z-40 bg-black" x-show="showModal"></div>
</div>