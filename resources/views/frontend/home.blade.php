@extends('frontend.layout')

@push('meta')
<meta name="title" content="{{ config('app.name') }}">
<meta name="keywords" content="topic, quotes, author">
@endpush

@section('content')

{{--
@include('frontend.components._ads_modal')
--}}

@include('frontend.components._marquee')

<div class="container max-w-screen-lg mx-auto flex flex-wrap justify-between px-4 py-10">

    <main class="main relative w-full lg:max-w-[640px]">
      
        @include('frontend.components._home-article')
        
        @include('frontend.components._home-tracker')

        @include('frontend.components._home-babyname')

        @include('frontend.components._home-activity')
        
        @include('frontend.components._home-pregnant')
    </main>

</div>

@endsection

@push('style')



@endpush