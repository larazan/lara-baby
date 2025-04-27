@title('Page not found')

@extends('frontend.layout')

@section('content')
<div class="flex flex-col bg-gray-100 min-h-full pt-20 md:pt-[80px]">
    <div class="flex flex-col mt-14 mb-12 text-center text-gray-800">
        <h1 class="text-9xl font-bold">404</h1>
        <h1 class="text-3xl md:text-5xl font-semibold">{{ $title }}</h1>
        <p class="mt-4 mb-8">The page you're looking for doesn't exist or has been moved.</p>
        <div class="flex mx-auto max-w-lg">      
        <a href="{{ url('/') }}" class="px-6 py-3 bg-white font-bold rounded-full hover:bg-purple-100 transition duration-300 ease-in-out dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white">
        Go Home
        </a>
        </div>
    </div>
</div>
@endsection
