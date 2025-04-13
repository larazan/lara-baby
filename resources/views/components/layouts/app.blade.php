<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="The Laravel portal for problem solving, knowledge sharing and community building." />
    @stack('meta')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->

    <!-- @trixassets -->
    @livewireStyles

    <link href="{{ URL::asset('admin/css/app.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('admin/css/style.css') }}" rel="stylesheet" />

    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <style>
        input[type=file] {
            width: 100%;
            max-width: 100%;
            color: #444;
            padding: 3px;
            background: #fff;
            border-radius: 3px;
            border: 1px solid #555;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #1e293b;
            padding: 6px 14px;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
    @stack('styles')

</head>

<body class="font-inter antialiased bg-slate-100 text-slate-600" :class="{ 'sidebar-expanded': sidebarExpanded }" x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }" x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))">
    <!-- <x-banner /> -->
    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>

    <!-- Page wrapper -->
    <div class="flex h-screen overflow-hidden ss la ">

        <x-app.sidebar />

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if($attributes['background']){{ $attributes['background'] }}@endif y flex ak ug ll lc bg-white" x-ref="contentarea">

            <x-app.header />

            <main>
                {{ $slot }}
            </main>

        </div>

    </div>

    @stack('modals')

    @livewireScripts
    @stack('js')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>

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

        // var inputField = document.querySelector('#numbers-only');

        // inputField.onkeydown = function(event) {
        //   Only allow if the e.key value is a number or if it's 'Backspace'
        //   if (isNaN(event.key) && event.key !== 'Backspace') {
        //     event.preventDefault();
        //   }
        // };

        function onlyNumberKey(evt) {

            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        }
    </script>

</body>

</html>