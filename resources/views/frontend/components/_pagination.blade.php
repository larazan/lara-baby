<section>
        <div class="py-6 bg-gray-50 sm:py-8 lg:py-10">
            <div class="px-4 px-auto max-w-7xl xl:max-w-full sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-5 lg:gap-6 lg:grid-cols-5 xl:grid-cols-5 2xl:grid-cols-7">

                <!-- CTA 1 / Copy to Clipboard -->
                <div class="relative bg-white flex flex-col justify-between border border-purple-100 rounded-lg shadow-sm shadow-purple-200">

                    <div class="p-5">
                        <div>
                            <p class="text-base font-bold">Open a Free Account Now</p>
                            <p class="mt-1 text-xs font-normal text-gray-500">⌛️</p>
                        </div>
                    </div>

                        <div x-data="{ input: 'Open a Free Account Now', showMsg: false }" >
                        
                            <div class="w-full overflow-hidden">
    
                                <a type="button" @click="navigator.clipboard.writeText(input), showMsg = true, setTimeout(() => showMsg = false, 1000)" class="group inline-flex w-full items-center justify-center px-5 text-sm font-normal text-center text-black border-t border-purple-50  hover:bg-purple-50 truncate rounded-b cursor-copy">

                                <button id="clipboard" class="relative pl-1 py-4 cursor-copy text-xs font-medium">Copy to Clipboard</button>
                                    <div x-show="showMsg" @click.away="showMsg = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;">
                                        <p class="p-3 flex items-center justify-center text-green-600">Copied to Clipboard</p>
                                    </div>
                                </a>
            
                            </div>
                        </div>
                    </div>
                

                <!-- CTA 2 / Copy to Clipboard -->
                <div class="relative bg-white flex flex-col justify-between border border-purple-100 rounded-lg shadow-sm shadow-purple-200">

                    <div class="p-5">
                        <div>
                            <p class="text-base font-bold">Sign Up Free</p>
                            <p class="mt-1 text-xs font-normal text-gray-500"></p>
                        </div>
                    </div>

                        <div x-data="{ input: 'Sign Up Free', showMsg: false }" >
                        
                            <div class="w-full h-full overflow-hidden">
    
                                <a type="button" @click="navigator.clipboard.writeText(input), showMsg = true, setTimeout(() => showMsg = false, 1000)" class="group inline-flex w-full items-center justify-center px-5 text-sm font-normal text-center text-black border-t border-purple-50  hover:bg-purple-50 truncate rounded-b cursor-copy">

                                <button id="clipboard" class="relative pl-1 py-4 cursor-copy text-xs font-medium">Copy to Clipboard</button>
                                    <div x-show="showMsg" @click.away="showMsg = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;">
                                        <p class="p-3 flex items-center justify-center text-green-600">Copied to Clipboard</p>
                                    </div>
                                </a>
            
                            </div>
                        </div>
                    </div>
                

                <!-- CTA 3 / Copy to Clipboard -->
                <div class="relative bg-white flex flex-col justify-between border border-purple-100 rounded-lg shadow-sm shadow-purple-200">

                    <div class="p-5">
                        <div>
                            <p class="text-base font-bold">Start Free Trial</p>
                            <p class="mt-1 text-xs font-normal text-gray-500"></p>
                        </div>
                    </div>

                        <div x-data="{ input: 'Start Free Trial', showMsg: false }" >
                        
                            <div class="w-full overflow-hidden">
    
                                <a type="button" @click="navigator.clipboard.writeText(input), showMsg = true, setTimeout(() => showMsg = false, 1000)" class="group inline-flex w-full items-center justify-center px-5 text-sm font-normal text-center text-black border-t border-purple-50  hover:bg-purple-50 truncate rounded-b cursor-copy">

                                <button id="clipboard" class="relative pl-1 py-4 cursor-copy text-xs font-medium">Copy to Clipboard</button>
                                    <div x-show="showMsg" @click.away="showMsg = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;">
                                        <p class="p-3 flex items-center justify-center text-green-600">Copied to Clipboard</p>
                                    </div>
                                </a>
            
                            </div>
                        </div>
                    </div>
                


                <!-- CTA 4 / Copy to Clipboard -->
                <div class="relative bg-white flex flex-col justify-between border border-purple-100 rounded-lg shadow-sm shadow-purple-200">

                    <div class="p-5">
                        <div>
                            <p class="text-base font-bold">Get Started Free</p>
                            <p class="mt-1 text-xs font-normal text-gray-500"></p>
                        </div>
                    </div>

                        <div x-data="{ input: 'Get Started Free', showMsg: false }" >
                        
                            <div class="w-full overflow-hidden">
    
                                <a type="button" @click="navigator.clipboard.writeText(input), showMsg = true, setTimeout(() => showMsg = false, 1000)" class="group inline-flex w-full items-center justify-center px-5 text-sm font-normal text-center text-black border-t border-purple-50  hover:bg-purple-50 truncate rounded-b cursor-copy">

                                <button id="clipboard" class="relative pl-1 py-4 cursor-copy text-xs font-medium">Copy to Clipboard</button>
                                    <div x-show="showMsg" @click.away="showMsg = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;">
                                        <p class="p-3 flex items-center justify-center text-green-600">Copied to Clipboard</p>
                                    </div>
                                </a>
            
                            </div>
                        </div>
                    </div>
                


                <!-- CTA 5 / Copy to Clipboard -->
                <div class="relative bg-white flex flex-col justify-between border border-purple-100 rounded-lg shadow-sm shadow-purple-200">

                    <div class="p-5">
                        <div>
                            <p class="text-base font-bold">Join Free for a Month</p>
                            <p class="mt-1 text-xs font-normal text-gray-500"></p>
                        </div>
                    </div>

                        <div x-data="{ input: 'Join Free for a Month', showMsg: false }" >
                        
                            <div class="w-full overflow-hidden">
    
                                <a type="button" @click="navigator.clipboard.writeText(input), showMsg = true, setTimeout(() => showMsg = false, 1000)" class="group inline-flex w-full items-center justify-center px-5 text-sm font-normal text-center text-black border-t border-purple-50  hover:bg-purple-50 truncate rounded-b cursor-copy">

                                <button id="clipboard" class="relative pl-1 py-4 cursor-copy text-xs font-medium">Copy to Clipboard</button>
                                    <div x-show="showMsg" @click.away="showMsg = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;">
                                        <p class="p-3 flex items-center justify-center text-green-600">Copied to Clipboard</p>
                                    </div>
                                </a>
            
                            </div>
                        </div>
                    </div>
                


                </div>
            </div>
        </div>        
      </section>