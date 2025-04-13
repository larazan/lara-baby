@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ config('app.name') }}">
<meta name="keywords" content="topic, quotes, author">
@endpush

@section('content')

{{-- 
@include('frontend.components._ads_modal')
--}}

<div class="flex flex-col bg-white min-h-screen pt-[60px] md:pt-[100px]">
    @include('frontend.components._hero')
    
    @include('frontend.components._content')
    
    @include('frontend.components._category')
    
    @include('frontend.components._history')

    
</div>


@endsection