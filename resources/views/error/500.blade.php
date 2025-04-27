@title('Something went wrong')

@extends('frontend.layout')

@section('content')
<div class="flex flex-col bg-gray-100 min-h-full pt-20 md:pt-[80px]">
    <div class="flex flex-col mt-14 mb-12 text-center text-gray-800">
        <h1 class="text-9xl font-bold">500</h1>
        <h1 class="text-3xl md:text-5xl font-semibold">{{ $title }}</h1>
        <p class="text-lg">
            We've been notified and will try to fix the problem as soon as possible.<br>
            Please <a href="https://github.com/laravelio/laravel.io/issues/new" class="text-lio-700">open a Github issue</a> if the problem persists.
        </p>
    </div>
    </div>
@endsection
