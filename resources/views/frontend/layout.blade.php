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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
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

    .figtree-medium {
      font-family: "Figtree", sans-serif;
      font-optical-sizing: auto;
      font-weight: 700;
      font-style: normal;
    }

    .figtree-bold {
      font-family: "Figtree", sans-serif;
      font-optical-sizing: auto;
      font-weight: 800;
      font-style: normal;
    }

    .figtree-reguler {
      font-family: "Figtree", sans-serif;
      font-optical-sizing: auto;
      font-weight: 600;
      font-style: normal;
    }

    html {
      line-height: 1.5;
      -webkit-text-size-adjust: 100%;
      -moz-tab-size: 4;
      -o-tab-size: 4;
      tab-size: 4;
      font-family: "Figtree", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
      font-feature-settings: normal;
      font-variation-settings: normal;
      scroll-behavior: smooth;
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

    .shadow-menu {
      box-shadow: 0 0 transparent, 0 0 transparent, var(--tw-shadow) !important;
      box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow) !important;
      --tw-shadow: 2px 2px 0 #191a1b !important;
    }

    .shadow-stack,
    .shadow-stack-sm {
      box-shadow: 0 0 transparent, 0 0 transparent, var(--tw-shadow) !important;
      box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow) !important;
    }

    .shadow-stack-sm {
      --tw-shadow: 3px 3px 0 -1px #fff, 3px 3px 0 #191a1b !important;
    }

    .button:hover {
      box-shadow: none !important;
      transform: translate(2px, 2px);
    }

    .button {
      --tw-bg-opacity: 1 !important;
      --tw-text-opacity: 1 !important;
      --tw-shadow: 2px 2px 0 #191a1b !important;
      background-color: rgba(250, 247, 125, var(--tw-bg-opacity)) !important;
      border-radius: 0.25rem !important;
      border-width: 1px !important;
      box-shadow: 0 0 transparent, 0 0 transparent, var(--tw-shadow) !important;
      box-shadow: var(--tw-ring-offset-shadow, 0 0 transparent), var(--tw-ring-shadow, 0 0 transparent), var(--tw-shadow) !important;
      color: rgba(25, 26, 27, var(--tw-text-opacity)) !important;
      display: inline-block !important;
      *font-family: tenon, sans-serif !important;
      *font-size: 1rem !important;
      font-weight: 400 !important;
      line-height: 1.5rem !important;
      padding: 0.25rem 1.25rem !important;
      position: relative !important;
      text-decoration: none !important;
      transition-duration: .15s !important;
      transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter !important;
      transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter !important;
      transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter !important;
      transition-timing-function: cubic-bezier(.4, 0, .2, 1) !important;
      white-space: nowrap !important;
    }

    .input-select {
      border-width: 1px;
      box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .input-select {
      --tw-bg-opacity: 1;
      --tw-shadow: 3px 3px 0 #002f3c;
      --tw-shadow-colored: 3px 3px 0 var(--tw-shadow-color);
      -webkit-appearance: none;
      background-color: rgb(255 255 255/var(--tw-bg-opacity));
      background-image: url('frontend/img/chev-down.svg');
      background-position: 96% 50%;
      background-size: 10px;
      background-repeat: no-repeat;
      border-radius: 0;
      display: block;
      padding: 0.5rem;
      position: relative;
      width: 100%;
      z-index: 1;
    }
  </style>
  <style>
    :root {
      --color-dark0: 20 20 20;
      --color-dark1: 47 0 85;
      --color-dark2: 41 6 88;
      --color-dark3: 67 32 0;
      --color-dark4: 85 23 13;
      --color-dark5: 60 50 0;
      --color-dark6: 46 45 46;
      --color-light0: 255 255 255;
      --color-light1: 142 1 255;
      --color-light2: 104 12 227;
      --color-light3: 255 167 84;
      --color-light4: 243 79 52;
      --color-light5: 248 229 105;
      --color-light6: 224 208 183;
      --color-lightlite: 239 226 255;
      --bgcolor-adsActive: 255 255 255;
      --color-adsActive: 0 0 0;
      --color-white: 255 255 255;
      --color-black: 0 0 0;
      --font-primary1: 'Inter', sans-serif;
      --font-primary2: 'Merriweather', sans-serif
    }

    @-ms-viewport {
      width: device-width
    }

    html,
    body {
      min-height: 100%;
      overflow-x: clip;
      font-family: var(--font-primary1)
    }

    .overlay-landscape {
      display: none;
      pointer-events: none
    }

    .overflow-x-auto,
    .overflow-y-auto {
      -ms-overflow-style: none
    }

    .overflow-x-auto::-webkit-scrollbar,
    .overflow-y-auto::-webkit-scrollbar {
      width: 0 !important;
      display: none
    }

    img {
      display: inline-block;
      color: transparent;
      vertical-align: middle
    }

    article {
      margin: 0
    }

    button.disabled {
      pointer-events: none;
      opacity: .3
    }

    .animate {
      --delay: 0ms;
      opacity: 0;
      -webkit-transition: opacity 800ms var(--delay), -webkit-transform 800ms cubic-bezier(0.13, 0.07, 0.26, 0.99) var(--delay);
      transition: opacity 800ms var(--delay), transform 800ms cubic-bezier(0.13, 0.07, 0.26, 0.99) var(--delay)
    }

    .animate--fadeIn {
      -webkit-transform: scale(1, 0.1);
      transform: scale(1, 1)
    }

    .animate--fadeInUp {
      -webkit-transform: translate3d(0, 1rem, 0);
      transform: translate3d(0, 1rem, 0)
    }

    .animate--fadeInLeft {
      -webkit-transform: translate3d(-1rem, 0, 0);
      transform: translate3d(-1rem, 0, 0)
    }

    .animate--fadeInRight {
      -webkit-transform: translate3d(1rem, 0, 0);
      transform: translate3d(1rem, 0, 0)
    }

    .animate--fadeInDown {
      -webkit-transform: translate3d(0, -1rem, 0);
      transform: translate3d(0, -1rem, 0)
    }

    .snap-y,
    .snap-x {
      -ms-overflow-style: none;
      scrollbar-width: none
    }

    .snap-y::-webkit-scrollbar,
    .snap-x::-webkit-scrollbar {
      display: none
    }

    .aspect-375 {
      aspect-ratio: 375 / 225
    }

    .aspect-landscape {
      aspect-ratio: 2 / 1
    }

    .inline-block {
      vertical-align: middle
    }

    .text-transparent {
      text-indent: -999px
    }

    .form-control {
      border: 0;
      outline: none;
      resize: none;
      width: 100%
    }

    .form-control::placeholder {
      color: inherit
    }

    [data-submenu].is-active svg {
      transform: rotate(180deg)
    }

    [data-submenu-open] {
      transition: max-height .3s ease, padding .3s ease;
      overflow: hidden;
      max-height: 0
    }

    [data-submenu-open].open {
      max-height: 20rem;
      overflow-y: auto
    }

    [data-toggle-open] {
      transition: .3s ease
    }

    [data-toggle-open].open {
      pointer-events: auto;
      opacity: 1
    }

    [data-toggle-open].open.-translate-x-full,
    [data-toggle-open].open.translate-x-full {
      transform: translateX(0)
    }

    [data-toggle-open].open .animate {
      opacity: 1;
      -webkit-transform: scale(1, 1) translate3d(0, 0, 0);
      transform: scale(1, 1) translate3d(0, 0, 0)
    }

    .nav-item:nth-child(1) a {
      --delay: 50ms
    }

    .nav-item:nth-child(2) a {
      --delay: 100ms
    }

    .nav-item:nth-child(3) a {
      --delay: 150ms
    }

    .nav-item:nth-child(4) a {
      --delay: 200ms
    }

    .nav-item:nth-child(5) a {
      --delay: 250ms
    }

    .nav-item:nth-child(6) a {
      --delay: 300ms
    }

    .nav-item:nth-child(7) a {
      --delay: 350ms
    }

    .nav-item:nth-child(8) a {
      --delay: 400ms
    }

    .nav-item:nth-child(9) a {
      --delay: 450ms
    }

    .nav-item:nth-child(10) a {
      --delay: 500ms
    }

    .nav-item:nth-child(11) a {
      --delay: 550ms
    }

    .nav-item:nth-child(12) a {
      --delay: 600ms
    }

    .nav-item:nth-child(13) a {
      --delay: 650ms
    }

    .nav-item:nth-child(14) a {
      --delay: 700ms
    }

    .nav-item:nth-child(15) a {
      --delay: 750ms
    }

    .nav-item:nth-child(16) a {
      --delay: 800ms
    }

    .nav-item:nth-child(17) a {
      --delay: 850ms
    }

    .nav-item:nth-child(18) a {
      --delay: 900ms
    }

    .nav-item:nth-child(19) a {
      --delay: 950ms
    }

    .nav-item:nth-child(20) a {
      --delay: 1000ms
    }

    .nav-item:nth-child(21) a {
      --delay: 1050ms
    }

    .nav-item:nth-child(22) a {
      --delay: 1100ms
    }

    .nav-item:nth-child(23) a {
      --delay: 1150ms
    }

    .nav-item:nth-child(24) a {
      --delay: 1200ms
    }

    .nav-item:nth-child(25) a {
      --delay: 1250ms
    }

    .nav-item:nth-child(26) a {
      --delay: 1300ms
    }

    .nav-item:nth-child(27) a {
      --delay: 1350ms
    }

    .nav-item:nth-child(28) a {
      --delay: 1400ms
    }

    .nav-item:nth-child(29) a {
      --delay: 1450ms
    }

    .nav-item:nth-child(30) a {
      --delay: 1500ms
    }

    .switchTheme-option {
      transition: .3s ease;
      opacity: 0;
      pointer-events: none
    }

    .switchTheme-option.open {
      pointer-events: auto;
      opacity: 1
    }

    .switchTheme-option-item.active {
      color: RGB(var(--color-light1))
    }

    .dark .dark\:text-gray-400,
    .dark .text-gray-400,
    .dark .text-gray-500 {
      color: RGB(156 165 177)
    }

    @media (min-width: 768px) {
      .nav-item a {
        padding: 0
      }

      .nav-item .animate {
        opacity: 1;
        transform: none
      }

      [data-submenu-open].open {
        padding-top: 1rem;
        padding-bottom: 1rem
      }
    }
  </style>
  <style>
    .box-popular {
      min-height: 430px
    }

    .box-popular-list {
      counter-reset: counter
    }

    .box-popular-list li::before {
      content: counter(counter);
      counter-increment: counter;
      position: absolute;
      top: 0.25rem;
      left: 0px;
      display: flex;
      aspect-ratio: 1 / 1;
      width: 22px;
      align-items: center;
      justify-content: center;
      border-radius: 9999px;
      background-color: RGB(var(--color-black));
      line-height: 1;
      color: RGB(var(--color-white))
    }

    aside .box-popular {
      position: sticky;
      top: 4rem
    }
  </style>
  <!-- insertion -->
  <style>
    @media (min-width: 1024px) {
      .section--insertion {
        width: calc(50% - .75rem)
      }
    }
  </style>
  <style>
    .is-visible:nth-last-child(3)~div#page-paging {
      visibility: hidden;
    }

    .header-sticky .btn--summary,
    .header-stickyBottom .btn--summary {
      display: flex;
    }

    .header-sticky .ais-backdrop,
    .header-stickyBottom .ais-backdrop {
      display: block;
    }

    .ais-backdrop .ais-backdrop-close.hidden,
    .ais-backdrop .ais-backdrop-btn.hidden {
      display: flex;
    }

    @media (min-width: 1024px) {
      [data-theme]:is([data-theme="dt-information"]) .ais-backdrop .header-sticky .ais-backdrop-btn.hidden {
        display: flex;
      }
    }

    [data-section="mobile-billboard"]:has(~ [data-template="News-Quran-Ayat-v1.1"]) .title-lcp,
    [data-section="mobile-billboard"]:has(~ [data-template="News-Quran-Index-v1.1"]) .title-lcp {
      opacity: 0 !important;
      pointer-events: none;
    }

    body:has(.title-lcp) .title-lcp {
      min-height: 22rem;
    }
  </style>
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