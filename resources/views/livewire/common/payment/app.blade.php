<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/new/blue-bg-small.png') }}" type="image/x-icon">

    <script src="{{asset('js/app.js')}}"></script>
    
    {{-- livewire --}}
    @livewireStyles()
    @livewireScripts()

    {{-- custom css --}}
    @yield('customCss')

    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('bundle/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('bundle/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('bundle/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('bundle/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('bundle/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('bundle/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('bundle/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr light-mode">

    @include('sweetalert::alert')
        <!--app-content open-->
            <!-- <div class="main-content app-content mt-0"> -->
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        @yield('content')
                    </div>
                    <!-- CONTAINER END -->
                </div>
            <!-- </div> -->
        <!--app-content close-->

    <!-- JQUERY JS -->
    <script src="{{ asset('bundle/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('bundle/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bundle/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    {{-- custom js --}}
    @yield('customJs')
</body>

</html>
