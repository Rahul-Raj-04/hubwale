<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="{{ asset('img/new/blue-bg-small.png') }}" type="image/x-icon">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{asset('bundle/login/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('bundle/login/assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('bundle/login/assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{asset('bundle/login/assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{asset('bundle/login/assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('bundle/login/assets/css/icons.css" rel="stylesheet')}}" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('bundle/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('bundle/login/assets/colors/color1.css')}}" />

    {{-- bootstrap datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- livewire --}}
    @livewireStyles()
    @livewireScripts()

    {{-- Stack style--}}
    @stack('style')

    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }

        input[type=text]:focus, input[type=number]:focus, select:focus, textarea:focus {
            box-shadow: 0 0 2px blue;
            border: 1px solid rgba(81, 203, 238, 1);
        }
    </style>
</head>

<body>


        @yield('content')
    


    <!-- JQUERY JS -->
    <script src="{{asset('bundle/login/assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('bundle/login/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bundle/login/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{asset('bundle/login/assets/js/show-password.min.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{asset('bundle/login/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{asset('bundle/login/assets/js/themeColors.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{asset('bundle/login/assets/js/custom.js')}}"></script>

</body>

</html>
