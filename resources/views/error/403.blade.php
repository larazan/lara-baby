@title('Forbidden')

@extends('frontend.layout')

@section('content')
<div class="flex flex-col bg-gray-100 min-h-full pt-20 md:pt-[80px]">
    <div class="flex flex-col mt-14 mb-12 text-center text-gray-800">
        <h1 class="text-9xl font-bold">403</h1>
        <h1 class="text-3xl md:text-5xl font-semibold">{{ $title }}</h1>
        <p class="text-lg">You're not allowed to this page.</p>
    </div>
    </div>
@endsection
