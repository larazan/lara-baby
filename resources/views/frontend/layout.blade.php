<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="author" content="John Doe">
  <!-- <link rel="canonical" href="{{ url()->current() }}" /> -->
  <title>
    {{ isset($title) ? $title.' | ' : '' }}
    {{ config('app.name') }}
    {{ App\Helpers\General::is_active('home') ? '- The most interesting & random facts' : '' }}
  </title>
  @if(App\Helpers\General::is_active('home'))
  <meta name="description" content="The Laravel portal for problem solving, knowledge sharing and community building." />
  @endif
  <link rel="icon" href="/frontend/img/favicons/favicon.ico">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <!-- <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" /> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />

  <!-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="{{ asset('frontend/js/lazysizes.min.js') }}"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  @stack('meta')

  @include('frontend.layouts._favicons')
  @include('frontend.layouts._social')

  <!-- CSS -->
  @stack('style')
  @livewireStyles

  <style>
    [x-cloak] {
        display: none !important;
    }

    @font-face {
      font-family: 'Pally-Bold';
      src: local('Pally-Bold'), url(../../fonts/Pally-Bold.ttf) format('truetype');
    }
    @font-face {
      font-family: 'Pally-Medium';
      src: local('Pally-Medium'), url(../../fonts/Pally-Medium.ttf) format('truetype');
    }
    @font-face {
      font-family: 'Pally-Regular';
      src: local('Pally-Regular'), url(../../fonts/Pally-Regular.ttf) format('truetype');
    }
    @font-face {
      font-family: 'Pally-Variable';
      src: local('Pally-Variable'), url(../../fonts/Pally-Variable.ttf) format('truetype');
    }

    html {
      line-height: 1.5;
      -webkit-text-size-adjust: 100%;
      -moz-tab-size: 4;
      -o-tab-size: 4;
      tab-size: 4;
      font-family: "Pally-Regular",ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
      font-feature-settings: normal;
      font-variation-settings: normal;
      scroll-behavior: smooth;
  }

    .pally-bold {
      font-family: "Pally-Bold";
    }
    .pally-medium {
      font-family: "Pally-Medium";
    }
    .pally-regular {
      font-family: "Pally-Regular";
    }
    .pally-variable {
      font-family: "Pally-Variable";
    }

    #background-bar:after {
      content: "";
      background-color: #fff;
      opacity: 1;
      height: 250px;
      width: 150%;
      margin-left: -100px;
      transform: rotate(2deg);
      top: -25px;
      z-index: 0;
    }

    #background-bar,
    #background-bar:after {
      position: absolute;
      left: 0;
      pointer-events: none;
    }

    #background-bar {
      top: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    .custom-scrollbar::-webkit-scrollbar {
      height: 10px;
      width: 10px
    }

    .custom-scrollbar::-webkit-scrollbar-track {
      background: transparent
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: transparent
    }

    .custom-scrollbar:hover::-webkit-scrollbar-thumb {
      background: #b2b7b8;
      border-radius: 0px;
      border: 4px solid #b2b7b8;
    }

    .search p {
      margin-bottom: 1rem;
      line-height: 1.2rem;
    }

    .description p {
      margin-bottom: 1rem;
      line-height: 1.2rem;
    }

    .bg-text {
        background: #fff none repeat scroll 0 0;
        -webkit-box-decoration-break: clone;
        box-decoration-break: clone;
        display: inline;
        padding: 0 5px;
        bottom: 10px;
        line-height: 1.5;
        color: #20bd70;
        /* box-shadow: 45px 0 0 #f00,-45px 0 0 #f00; */
    }
  </style>
  <style>:root{--color-dark0:20 20 20;--color-dark1:47 0 85;--color-dark2:41 6 88;--color-dark3:67 32 0;--color-dark4:85 23 13;--color-dark5:60 50 0;--color-dark6:46 45 46;--color-light0:255 255 255;--color-light1:142 1 255;--color-light2:104 12 227;--color-light3:255 167 84;--color-light4:243 79 52;--color-light5:248 229 105;--color-light6:224 208 183;--color-lightlite:239 226 255;--bgcolor-adsActive:255 255 255;--color-adsActive:0 0 0;--color-white:255 255 255;--color-black:0 0 0;--font-primary1:'Inter', sans-serif;--font-primary2:'Merriweather', sans-serif}@-ms-viewport{width:device-width}html,body{min-height:100%;overflow-x:clip;font-family:var(--font-primary1)}.overlay-landscape{display:none;pointer-events:none}.overflow-x-auto,.overflow-y-auto{-ms-overflow-style:none}.overflow-x-auto::-webkit-scrollbar,.overflow-y-auto::-webkit-scrollbar{width:0 !important;display:none}img{display:inline-block;color:transparent;vertical-align:middle}article{margin:0}button.disabled{pointer-events:none;opacity:.3}.animate{--delay:0ms;opacity:0;-webkit-transition:opacity 800ms var(--delay),-webkit-transform 800ms cubic-bezier(0.13, 0.07, 0.26, 0.99) var(--delay);transition:opacity 800ms var(--delay),transform 800ms cubic-bezier(0.13, 0.07, 0.26, 0.99) var(--delay)}.animate--fadeIn{-webkit-transform:scale(1, 0.1);transform:scale(1, 1)}.animate--fadeInUp{-webkit-transform:translate3d(0, 1rem, 0);transform:translate3d(0, 1rem, 0)}.animate--fadeInLeft{-webkit-transform:translate3d(-1rem, 0, 0);transform:translate3d(-1rem, 0, 0)}.animate--fadeInRight{-webkit-transform:translate3d(1rem, 0, 0);transform:translate3d(1rem, 0, 0)}.animate--fadeInDown{-webkit-transform:translate3d(0, -1rem, 0);transform:translate3d(0, -1rem, 0)}.snap-y,.snap-x{-ms-overflow-style:none;scrollbar-width:none}.snap-y::-webkit-scrollbar,.snap-x::-webkit-scrollbar{display:none}.aspect-375{aspect-ratio:375 / 225}.aspect-landscape{aspect-ratio:2 / 1}.inline-block{vertical-align:middle}.text-transparent{text-indent:-999px}.form-control{border:0;outline:none;resize:none;width:100%}.form-control::placeholder{color:inherit}[data-submenu].is-active svg{transform:rotate(180deg)}[data-submenu-open]{transition:max-height .3s ease, padding .3s ease;overflow:hidden;max-height:0}[data-submenu-open].open{max-height:20rem;overflow-y:auto}[data-toggle-open]{transition:.3s ease}[data-toggle-open].open{pointer-events:auto;opacity:1}[data-toggle-open].open.-translate-x-full,[data-toggle-open].open.translate-x-full{transform:translateX(0)}[data-toggle-open].open .animate{opacity:1;-webkit-transform:scale(1, 1) translate3d(0, 0, 0);transform:scale(1, 1) translate3d(0, 0, 0)}.nav-item:nth-child(1) a{--delay:50ms}.nav-item:nth-child(2) a{--delay:100ms}.nav-item:nth-child(3) a{--delay:150ms}.nav-item:nth-child(4) a{--delay:200ms}.nav-item:nth-child(5) a{--delay:250ms}.nav-item:nth-child(6) a{--delay:300ms}.nav-item:nth-child(7) a{--delay:350ms}.nav-item:nth-child(8) a{--delay:400ms}.nav-item:nth-child(9) a{--delay:450ms}.nav-item:nth-child(10) a{--delay:500ms}.nav-item:nth-child(11) a{--delay:550ms}.nav-item:nth-child(12) a{--delay:600ms}.nav-item:nth-child(13) a{--delay:650ms}.nav-item:nth-child(14) a{--delay:700ms}.nav-item:nth-child(15) a{--delay:750ms}.nav-item:nth-child(16) a{--delay:800ms}.nav-item:nth-child(17) a{--delay:850ms}.nav-item:nth-child(18) a{--delay:900ms}.nav-item:nth-child(19) a{--delay:950ms}.nav-item:nth-child(20) a{--delay:1000ms}.nav-item:nth-child(21) a{--delay:1050ms}.nav-item:nth-child(22) a{--delay:1100ms}.nav-item:nth-child(23) a{--delay:1150ms}.nav-item:nth-child(24) a{--delay:1200ms}.nav-item:nth-child(25) a{--delay:1250ms}.nav-item:nth-child(26) a{--delay:1300ms}.nav-item:nth-child(27) a{--delay:1350ms}.nav-item:nth-child(28) a{--delay:1400ms}.nav-item:nth-child(29) a{--delay:1450ms}.nav-item:nth-child(30) a{--delay:1500ms}.switchTheme-option{transition:.3s ease;opacity:0;pointer-events:none}.switchTheme-option.open{pointer-events:auto;opacity:1}.switchTheme-option-item.active{color:RGB(var(--color-light1))}.dark .dark\:text-gray-400,.dark .text-gray-400,.dark .text-gray-500{color:RGB(156 165 177)}@media (min-width: 768px){.nav-item a{padding:0}.nav-item .animate{opacity:1;transform:none}[data-submenu-open].open{padding-top:1rem;padding-bottom:1rem}}</style>
  <style>.box-popular{min-height:430px}.box-popular-list{counter-reset:counter}.box-popular-list li::before{content:counter(counter);counter-increment:counter;position:absolute;top:0.25rem;left:0px;display:flex;aspect-ratio:1 / 1;width:22px;align-items:center;justify-content:center;border-radius:9999px;background-color:RGB(var(--color-black));line-height:1;color:RGB(var(--color-white))}aside .box-popular{position:sticky;top:4rem}</style>
    <!-- insertion -->
    <style>@media (min-width: 1024px){.section--insertion{width:calc(50% - .75rem)}}</style>
    <style>.is-visible:nth-last-child(3) ~ div#page-paging {
    visibility: hidden;
} 
.header-sticky .btn--summary, .header-stickyBottom .btn--summary {
    display: flex;
} 
.header-sticky .ais-backdrop, .header-stickyBottom .ais-backdrop {
    display: block;
} 
.ais-backdrop .ais-backdrop-close.hidden,
.ais-backdrop .ais-backdrop-btn.hidden{
    display: flex;
}  
@media (min-width: 1024px) {
  [data-theme]:is([data-theme="dt-information"]) .ais-backdrop .header-sticky .ais-backdrop-btn.hidden {
    display: flex;
  }
} [data-section="mobile-billboard"]:has(~ [data-template="News-Quran-Ayat-v1.1"]) .title-lcp, [data-section="mobile-billboard"]:has(~ [data-template="News-Quran-Index-v1.1"]) .title-lcp {
  opacity: 0 !important;
  pointer-events: none;
} body:has(.title-lcp) .title-lcp {
            min-height: 22rem;
        }</style>
</head>

<body x-data="{ filterOpen: false, openSearch: false, customizeOpen: false, showModalInfo: false, menuOpen: false }">

<!-- <div id="background-bar"></div> -->

  @include('frontend.components._header')
  @include('frontend.components._menu')
  
  @include('frontend.components._gotop')

  @yield('content')

 
  @include('frontend.components._footer')

  @stack('modals')

  @livewireScripts
  @stack('js')

  <script>
    window.addEventListener('banner-message', event => {
      toastr[event.detail.style](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
        "closeButton": true,
        "progressBar": true,
      }
    });

    @if(Session::has('pesan'))
    toastr. {
      {
        Session::get('alert')
      }
    }("{{Session::get('pesan')}}");
    @endif
  </script>

</body>

</html>