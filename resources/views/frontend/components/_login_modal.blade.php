<div x-data="{open:false}">
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
</div>