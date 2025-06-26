@extends('frontend.layout')

@section('content')

<main class="flex h-max py-8 md:py-20 bg-[#fefbec]2 bg-white pt-20 md:pt-[120px]" x-data="{ alertShow: true }">
    <div class="flex  w-full2">

        <div class="max-w-full xl:max-w-[1800px] mx-auto flex flex-col justify-center items-center">

            <div class="flex flex-col md:flex-row w-full space-y-3 md:divide-x-2 px-10 md:space-y-0 max-w-full">

                <div class="flex justify-center flex-col md:flex-row">
                    <div class="flex flex-col md:pr-[72px] md:max-w-[50%] md:w-[50%] pb-[48px] md:pb-0 ">
                        <div class="flex flex-col space-y-3 border-b pb-6">
                            <h3 class="text-5xl md:text-5xl font-bold leading-12 text-black">
                                We can't wait to hear from you.
                            </h3>
                            <div>

                                <p class="text-gray-900 py-2 text-2xl leading-tight">
                                    Let us know what you’re looking to achieve using the form, and one of our team will be in touch shortly.
                                </p>

                                <p class="text-gray-900  py-2 text-2xl leading-tight">
                                    Otherwise please feel free to call us during UK business office hours, or schedule a call.
                                </p>

                            </div>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="h-[1px] w-auto md:w-[1px] md:h-auto bg-slate-400/50"></div>

                    <div class="md:max-w-[50%] md:w-[50%] md:pl-[72px] pt-[48px] md:pt-0 ">
                        @if ($message = Session::get('success'))
                        <div class="bg-green-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
                            <svg viewBox="0 0 24 24" class="text-green-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                                <path fill="currentColor"
                                    d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                                </path>
                            </svg>
                            <span class="text-green-800">{{ $message }}</span>
                        </div>
                        @endif

                        @if ($message = Session::get('error'))
                        <div class="bg-red-200 px-6 py-4 mx-2 my-4 rounded-md text-lg flex items-center mx-auto max-w-lg">
                            <svg viewBox="0 0 24 24" class="text-red-600 w-5 h-5 sm:w-5 sm:h-5 mr-3">
                                <path fill="currentColor"
                                    d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                                </path>
                            </svg>
                            <span class="text-red-800">{{ $message }}</span>
                        </div>
                        @endif


                        <!-- <div class="flex justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded" role="alert" x-show="alertShow">
                        <ul>
                            <li>
                                <span class="block sm:inline pl-2">
                                    error
                                </span>
                            </li>
                        </ul>
                        <span class="inline" @click="alertShow = !alertShow">
                            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path
                                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div> -->

                        <!-- message error -->
                        @if($errors->any())
                        <div class="flex justify-between bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded" role="alert" x-show="alertShow">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>
                                    <span class="block sm:inline pl-2">
                                        {{ $error }}
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                            <span class="inline" @click="alertShow = !alertShow">
                                <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                </svg>
                            </span>
                        </div>
                        @endif

                        <div class="flex flex-col justify-start mx-auto max-w-md space-y-4 md:space-y-5 px-4 py-6 shadow-stack-sm  border-2 border-gray-800 shadow-lg rounded bg-[#fcfcfc]">
                            <div class="flex flex-col space-y-1 md:space-y-2">
                                <h2 class="text-2xl md:text-3xl tracking font-semibold text-black">
                                    Talk with Us
                                </h2>
                            </div>
                            <form method="POST" action="{{ route('contact.submit') }}">
                                @csrf
                                <div class="flex flex-col max-w-md space-y-4 md:space-y-5 ">
                                    <div class="relative w-full">
                                        <p class="text-black text-[11px] font-semibold uppercase tracking">
                                            NAME
                                        </p>
                                        <div class="relative items-center">
                                            <input class="flex w-full px-2 py-2 md:px-2 md:py-2 border bg-white border-gray-700 rounded-sm font-medium placeholder:font-normal" type="text" id="name" name="name" required />
                                        </div>
                                    </div>
                                    <div class="relative w-full">
                                        <p class="text-black text-[11px] font-semibold uppercase tracking">
                                            Email Address
                                        </p>
                                        <input type="email" id="email" name="email" required class="flex w-full px-2 py-2 md:px-2 md:py-2 border bg-white border-gray-700 rounded-sm font-medium placeholder:font-normal" />
                                    </div>
                                    <div class="relative w-full">
                                        <p class="text-black text-[11px] font-semibold uppercase tracking">
                                            subject
                                        </p>
                                        <input type="text" id="subject" name="subject" required class="flex w-full px-2 py-2 md:px-2 md:py-2 border border-gray-700 rounded-sm font-medium placeholder:font-normal" />
                                    </div>
                                    <div class="relative w-full">
                                        <p class="text-black text-[11px] font-semibold uppercase tracking">
                                            message
                                        </p>
                                        <textarea rows="4" cols="50" id="message" name="message" required class="flex w-full px-2 py-2 md:px-2 md:py-2 border bg-white border-gray-700 rounded-sm font-medium placeholder:font-normal"></textarea>
                                    </div>

                                    <button class="hidden relative inline-block2 text-lg group py-4" href="#">
                                        <span class="relative flex w-full z-10 button px-3 py-4 justify-center overflow-hidden leading-tight text-sm font-mabrybold text-gray-800 transition-colors duration-300 ease-out border-2 border-gray-800 rounded text-md font-bold cursor-pointer">
                                            <span class="absolute inset-0 w-full h-full px-5 py-4 rounded bg-yellow-200 group-hover:bg-yellow-300"></span>
                                            <span class="relative">Submit</span>
                                        </span>
                                    </button>
                                    <button type="submit" class="text-md font-bold rounded-sm transition-all duration-300 ease-out cursor-pointer bg-[#fd5f54] text-white border-2 border-[#fd5f54] hover:bg-white hover:text-[#fd5f54] hover:border-solid py-3 px-7 w-full">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>


@endsection