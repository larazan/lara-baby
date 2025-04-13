@php

$f = \App\Models\Setting::select(['key', 'value'])->where('key', '=', 'facebook')->first();
$t = \App\Models\Setting::select(['key', 'value'])->where('key', '=', 'twitter')->first();
$i = \App\Models\Setting::select(['key', 'value'])->where('key', '=', 'instagram')->first();
$p = \App\Models\Setting::select(['key', 'value'])->where('key', '=', 'pinterest')->first();

$facebook = $f->value;
$twitter = $t->value;
$instagram = $i->value;
$pinterest = $p->value;

@endphp

<div>
    <div class="fixed inset-0 z-50 overflow-hidden flex items-start top-[20%] md:top-[20%] mb-4 justify-center transform px-4 sm:px-6 " x-show="showModalInfo">
        <div class="relative bg-white overflow-auto max-w-lg w-full max-h-full rounded shadow-lg" @click.away="showModalInfo = false" x-transition:enter="motion-safe:ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100">

            <section class="overflow-hidden  shadow-2xl md:grid md:grid-cols-1">

                <button class="absolute flex top-1 right-1 md:top-2 md:right-2 rounded-full border bg-white shadow-xl px-1 py-1 md:p-1 cursor-pointer" @click="showModalInfo = !showModalInfo">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width=3 stroke="currentColor" class="w-5 h-5 text-[#1d494e]">
                        <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="p-4 text-center sm:p-6 md:col-span-2 lg:p-8">
                    <h2 class="py-2 text-bold poppins-medium">
                    Say thanks by supporting us!
                    </h2>
                    <p class="text-md text-gray-900">
                        Our website is made possible by displaying online advertisement to our visitors. Please consider supporting to us by disabling your ad blocker. 
                    </p>

                    <!--  -->
                    <div class="flex mt-10">
                    <ul class="flex gap-4 mx-auto w-full justify-center">
                <li>
                  <a href="{{ $facebook }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#3b5998]">
                    <span class="sr-only">Facebook</span>

                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fillRule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clipRule="evenodd" />
                    </svg>
                  </a>
                </li>

                <li>
                  <a href="{{ $instagram }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#e1306c]">
                    <span class="sr-only">Instagram</span>

                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path fillRule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clipRule="evenodd" />
                    </svg>
                  </a>
                </li>

                <li>
                  <a href="{{ $twitter }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#1DA1F2]">
                    <span class="sr-only">Twitter</span>

                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                      <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                    </svg>
                  </a>
                </li>

                <li>
                  <a href="{{ $pinterest }}" rel="noreferrer" target="_blank" class="font-bold text-gray-900 transition hover:text-[#C8232C]">
                    <span class="sr-only">Pinterest</span>

                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-pinterest"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 20l4 -9" /><path d="M10.7 14c.437 1.263 1.43 2 2.55 2c2.071 0 3.75 -1.554 3.75 -4a5 5 0 1 0 -9.7 1.7" /><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /></svg>
                  </a>
                </li>

              </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="opacity-50 fixed inset-0 z-40 bg-black" x-show="showModalInfo"></div>