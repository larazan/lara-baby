@extends('frontend.layout')

@push('meta')
<meta name="description" content="{{ $fact->title }}">
<meta name="keywords" content="{{ $fact->tags }}">
@endpush

@section('content')

@include('frontend.components._download-message')

<livewire:frontend.show.index  :title="$fact->title" :tags="$tags" :description="$fact->description" :bgColor="$fact->bgColor" :fontColor="$fact->color" :beta="$fact->beta" :historyTime="$fact->history_time" />

@endsection

@push('js')
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.esm.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.js"></script> -->
<script>

  // html2canvas
  $(document).ready(function() {
    $("#download").click(function() {
      screenshot();
    });
  });

  function screenshot() {
    html2canvas(document.getElementById("photo")).then(function(canvas) {
      downloadImage(canvas.toDataURL(), "million-facts.png");
    });
  }

  function downloadImage(uri, filename) {
    var link = document.createElement('a');
    if (typeof link.download !== 'string') {
      window.open(uri);
    } else {
      link.href = uri;
      link.download = filename;
      accountForFirefox(clickLink, link);
    }
  }

  function clickLink(link) {
    link.click();
  }

  function accountForFirefox(click) {
    var link = arguments[1];
    document.body.appendChild(link);
    click(link);
    document.body.removeChild(link);
  }
</script>
@endpush