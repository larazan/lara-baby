@extends('frontend.layout')

@section('content')
<div class="flex flex-col bg-white min-h-screen pt-[60px] md:pt-[100px]">
<div class="container px-6">
    <h1>How to Convert an Image to webp in Laravel? - ItSolutionStuff.com</h1>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="row">
        <div class="col-md-4">
            <strong>Original Image:</strong>
            <br />
            <img src="/images/{{ Session::get('imageName') }}" width="300px" />
        </div>
    </div>
    @endif

    <form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <br />
                <input type="file" name="image" class="image">
            </div>
            <div class="col-md-12">
                <br />
                <button type="submit" class="btn btn-success">Upload Image</button>
            </div>
        </div>
    </form>
</div>
</div>

@endsection