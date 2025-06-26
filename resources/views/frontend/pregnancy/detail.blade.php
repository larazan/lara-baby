@extends('frontend.layout')

@section('content')

{{ $article->id }}
@dump($allRecords)
@dump($countBefore)
@dump($countAfter)

<h2>detail</h2>
<ul>
    @foreach($allRecords as $r)
    <li>{{ $r->id }}</li>
    @endforeach
</ul>


@endsection