<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="https://beta.hubwale.com/img/new/blue-bg-small.png" type="image/x-icon">

    <!-- TITLE -->
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('bundle/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('bundle/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('bundle/css/dark-style') }}.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('bundle/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('bundle/colors/color1.css') }}" />
        
    {{-- alpine --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    
    {{-- bootstrap datepicker --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    {{-- onesignal --}}
    <script src="{{ asset('OneSignalSDKWorker.js') }}"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" defer></script>
    <script>
        window.OneSignal = window.OneSignal || [];
      OneSignal.push(function() {
        OneSignal.init({
          appId: "b4a85622-9196-4455-ad7e-d56cdc6f146b",
        });
      });
    </script>

    {{-- livewire --}}
    @livewireStyles()
    @livewireScripts()
    
    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    {{-- Custom js --}}
    @yield('customCss')
</head>

<body class="app ltr landing-page horizontal">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('bundle/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
        @include('sweetalert::alert')

            <!--FOOTER OPEN -->
            @include('welcome.layout.header')
            <!-- FOOTER CLOSED -->

            <!--app-content open-->
            <div class="main-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container">
                        @yield('content')
                    </div>
                    <!-- CONTAINER CLOSED-->
                </div>
            </div>
            <!--app-content closed-->
        </div>

        <!-- FOOTER OPEN -->
        @include('welcome.layout.footer')
        <!-- FOOTER CLOSED -->
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('bundle/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('bundle/plugins/bootstrap/js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bundle/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- COUNTERS JS-->
    <script src="{{ asset('bundle/plugins/counters/counterup.min.js') }}"></script>
    <script src="{{ asset('bundle/plugins/counters/waypoints.min.js') }}"></script>
    <script src="{{ asset('bundle/plugins/counters/counters-1.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('bundle/plugins/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('bundle/plugins/company-slider/slider.js') }}"></script>

    <!-- Star Rating Js-->
    <script src="{{ asset('bundle/plugins/rating/jquery-rate-picker.js') }}"></script>
    <script src="{{ asset('bundle/plugins/rating/rating-picker.js') }}"></script>

    <!-- Star Rating-1 Js-->
    <script src="{{ asset('bundle/plugins/ratings-2/jquery.star-rating.js') }}"></script>
    <script src="{{ asset('bundle/plugins/ratings-2/star-rating.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('bundle/js/sticky.js') }}"></script>

    <!-- Datepicker js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('bundle/js/landing.js') }}"></script>

    {{-- Custom js --}}
    @yield('customJs')

</body>

</html>