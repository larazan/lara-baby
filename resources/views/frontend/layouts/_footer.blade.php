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

<footer class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto bg-[#f2f2f2] border-t-2 border-blue-800">
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6 mb-10">
        <div class="col-span-full hidden lg:col-span-1 lg:block">
            <a class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 via-teal-5002 via-emerald-500 to-pink-500 inline-flex items-center gap-x-2 text-xl font-extrabold dark:text-white" href="/">
                <img class="w-32 h-auto " src="/frontend/img/logo.png" alt="Million Facts">
                <span class="block2 hidden mr-10">Million Facts</span>
            </a>
        </div>
        <div>
            <h4 class="text-xs font-semibold text-gray-900 uppercase dark:text-gray-100">Product</h4>
            <div class="mt-3 grid space-y-3 text-sm">
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/">Browse Facts</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/articles">Articles</a></p>
            </div>
        </div>
        <div>
            <h4 class="text-xs font-semibold text-gray-900 uppercase dark:text-gray-100">Company</h4>
            <div class="mt-3 grid space-y-3 text-sm">
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ url('about') }}">About us</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ url('advertise') }}">Advertise</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ url('faqs') }}">Faqs</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ url('contact') }}">Contact</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="{{ url('terms') }}">Terms &amp; Conditions</a></p>
            </div>
        </div>
        <div>
            <h4 class="text-xs font-semibold text-gray-900 uppercase dark:text-gray-100">Follow Us</h4>
            <div class="mt-3 grid space-y-3 text-sm">
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" target="_blank" href="{{ $facebook }}">Facebook</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" target="_blank" href="{{ $pinterest }}">Pinterest</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" target="_blank" href="{{ $instagram }}">Instagram</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" target="_blank" href="{{ $twitter }}">𝕏 / Twitter</a></p>
            </div>
        </div>
        <div>
            <h4 class="mt-0 text-xs font-semibold text-gray-900 uppercase dark:text-gray-100">Other Sites</h4>
            <div class="mt-3 grid space-y-3 text-sm">
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" target="_blank" href="https://hotelsforkids.net">Million Quotes</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" target="_blank" href="https://calculating.world">Million Quiz</a></p>
                <p><a class="inline-flex gap-x-2 text-gray-600 hover:text-[#20bd70] dark:text-gray-400 dark:hover:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" target="_blank" href="https://calculating.world">Million Tips</a></p>
            </div>
        </div>
    </div>
    <div class="pt-5 mt-5 border-t border-gray-200 dark:border-gray-700">
        <div class="sm:flex sm:justify-between sm:items-center">
            <div class="flex items-center gap-x-3">
                <span class="hidden sm:block text-sm text-gray-500 sm:text-center dark:text-gray-400">© <!-- -->{{ date('Y') }}<!-- -->.<!-- --> <a class="hover:underline" href="/">Million Facts</a> <!-- -->. All rights reserved.</span>
            </div>
            <div class="flex justify-between items-center">
                <div class="mt-3 sm:hidden">
                    <a class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 via-teal-5002 via-emerald-500 to-pink-500 inline-flex items-center gap-x-2 text-xl font-extrabold dark:text-white" href="/">
                        <img class="w-20 h-auto " src="/frontend/img/logo.png" alt="Million Facts">
                    </a>
                    <p class="mt-1 text-xs sm:text-sm text-gray-600 dark:text-gray-400"> <!-- -->© <!-- -->{{ date('Y') }}<!-- -->.<!-- --> <a class="hover:underline" href="/">Million Facts</a> <!-- -->. All rights reserved.</p>
                </div>
                <div class="space-x-4 flex">
                    <a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank" href="{{ $facebook }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank" href="{{ $instagram }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank" href="{{ $twitter }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                        </svg>
                    </a>
                    <a class="text-gray-500 hover:text-gray-900 dark:hover:text-white" target="_blank" href="{{ $pinterest }}">
                        <svg class="w-5 h-5" fill="currentColor" version="1.1" viewBox="0 0 512 512" width="100%" xmlns="http://www.w3.org/2000/svg">
                            <path d="M255.998,0.001c-141.384,0 -255.998,114.617 -255.998,255.998c0,108.456 67.475,201.171 162.707,238.471c-2.24,-20.255 -4.261,-51.405 0.889,-73.518c4.65,-19.978 30.018,-127.248 30.018,-127.248c0,0 -7.659,-15.334 -7.659,-38.008c0,-35.596 20.632,-62.171 46.323,-62.171c21.839,0 32.391,16.399 32.391,36.061c0,21.966 -13.984,54.803 -21.203,85.235c-6.03,25.482 12.779,46.261 37.909,46.261c45.503,0 80.477,-47.976 80.477,-117.229c0,-61.293 -44.045,-104.149 -106.932,-104.149c-72.841,0 -115.597,54.634 -115.597,111.095c0,22.004 8.475,45.596 19.052,58.421c2.09,2.535 2.398,4.758 1.776,7.343c-1.945,8.087 -6.262,25.474 -7.111,29.032c-1.117,4.686 -3.711,5.681 -8.561,3.424c-31.974,-14.884 -51.963,-61.627 -51.963,-99.174c0,-80.755 58.672,-154.915 169.148,-154.915c88.806,0 157.821,63.279 157.821,147.85c0,88.229 -55.629,159.232 -132.842,159.232c-25.94,0 -50.328,-13.476 -58.674,-29.394c0,0 -12.838,48.878 -15.95,60.856c-5.782,22.237 -21.382,50.109 -31.818,67.11c23.955,7.417 49.409,11.416 75.797,11.416c141.389,0 256.003,-114.612 256.003,-256.001c0,-141.381 -114.614,-255.998 -256.003,-255.998Z" fill-rule="nonzero"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>