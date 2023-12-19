<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title inertia>{{ config('app.name', 'Laravel') }} | CRM</title>

    <link rel="shortcut icon" href="{{ asset('img/new/blue-bg-small.png') }}" type="image/x-icon">

    {{-- livewire --}}
    @livewireStyles()
    @livewireScripts()

    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    {{-- tom select --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.0/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.0/dist/js/tom-select.complete.min.js"></script>

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

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('bundle/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    @include('livewire.crm.layout.header')
        <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                        @yield('content')
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
        <!--app-content close-->
    @include('livewire.crm.layout.footer')

    <!-- JQUERY JS -->
    <script src="{{ asset('bundle/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('bundle/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bundle/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('bundle/js/jquery.sparkline.min.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('bundle/js/sticky.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('bundle/js/circle-progress.min.js') }}"></script>

    <!-- PIETY CHART JS-->
    <script src="{{ asset('bundle/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('bundle/plugins/peitychart/peitychart.init.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('bundle/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('bundle/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <!-- <script src="{{ asset('bundle/plugins/p-scroll/pscroll.js') }}"></script> -->
    <!-- <script src="{{ asset('bundle/plugins/p-scroll/pscroll-1.js') }}"></script> -->

    <!-- INTERNAL CHARTJS CHART JS-->
    <script src="{{ asset('bundle/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ asset('bundle/plugins/chart/rounded-barchart.js') }}"></script>
    <script src="{{ asset('bundle/plugins/chart/utils.js') }}"></script>

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{ asset('bundle/plugins/select2/select2.full.min.js') }}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('bundle/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('bundle/plugins/datatable/dataTables.responsive.min.js') }}"></script>

    <!-- INTERNAL APEXCHART JS -->
    <script src="{{ asset('bundle/js/apexcharts.js') }}"></script>
    <script src="{{ asset('bundle/plugins/apexchart/irregular-data-series.js') }}"></script>

    <!-- INTERNAL Flot JS -->
    <script src="{{ asset('bundle/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('bundle/plugins/flot/jquery.flot.fillbetween.js') }}"></script>
    <script src="{{ asset('bundle/plugins/flot/chart.flot.sampledata.js') }}"></script>
    <script src="{{ asset('bundle/plugins/flot/dashboard.sampledata.js') }}"></script>

    <!-- INTERNAL Vector js -->
    <script src="{{ asset('bundle/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('bundle/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- SIDE-MENU JS-->
    <script src="{{ asset('bundle/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- TypeHead js -->
    <script src="{{ asset('bundle/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('bundle/js/typehead.js') }}"></script>

    <!-- INTERNAL INDEX JS -->
    <!-- <script src="{{ asset('bundle/js/index1.js') }}"></script> -->

    <!-- Color Theme js -->
    <script src="{{ asset('bundle/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('bundle/js/custom.js') }}"></script>

    <script>
        $(".datatable-common").DataTable({
            scrollX: true,
            orderCellsTop: true
        });
        $('.datatable-common').addClass('mt-2');
    </script>

    {{-- custom js --}}
    @yield('customJs')
</body>

</html>
