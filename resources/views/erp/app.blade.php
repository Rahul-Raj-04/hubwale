<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{ asset('img/new/blue-bg-small.png') }}" type="image/x-icon">

    {{-- livewire --}}
    @livewireStyles()
    @livewireScripts()

    {{-- custom css --}}
    @yield('customCss')
    
    <!-- Calendar css -->    
    <link href="{{ asset('css/calendar.css') }}" rel="stylesheet">

    {{-- sweet alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
    <link href="{{asset('bundle/css/skin-modes.css')}}" rel="stylesheet" />

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
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- bootstrap datepicker --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    
    <style>
        .swal2-container {
            z-index: 99999 !important;
        }

        #responsive-datatable_wrapper div:nth-child(2) div {
            overflow-x: auto;
            padding: 0;
        }

        #responsive-datatable_wrapper div:nth-child(2) {
            margin: 0;
        }
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

<body class="app ltr light-menu layout-fullwidth horizontal-hover horizontal" data-new-gr-c-s-check-loaded="14.1088.0"
    data-gr-ext-installed="">
    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('bundle/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    @include('sweetalert::alert')

    <div class="page">
        <div class="page-main">
            @include('erp.layout.header')
            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="container-fluid ps-3 pe-3 mt-3" style="min-height:650px">
                        @yield('content')
                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            @livewire('erp.setting.security.menu-option')
            @livewire('erp.setting.voucher-format')
            @livewire('erp.setting.voucher-number')
            <!--app-content close-->
        </div>
        @include('erp.layout.footer')
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
    <script src="{{ asset('bundle/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('bundle/plugins/p-scroll/pscroll-1.js') }}"></script>

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
    <!-- <script src="{{ asset('bundle/plugins/bootstrap5-typehead/autocomplete.js') }}"></script>
    <script src="{{ asset('bundle/js/typehead.js') }}"></script> -->

    <!-- INTERNAL INDEX JS -->
    <script src="{{ asset('bundle/js/index1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('bundle/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('bundle/js/custom.js') }}"></script>

    <!-- DATA TABLE JS-->
    <script src="{{ asset('bundle/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('bundle/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('bundle/js/table-data.js')}}"></script>

    <!-- Print this CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js.map"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>

    <script>
        $(".datatable-common").DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            paging: false,
            ordering: false,
            info: false,
            sScrollY : 350,
            searching:true,
            sScrollX : true,
            scrollX : true,
        });
        $('.datatable-common').addClass('mt-2');
        $('.datatable-common').css("width","100%");
        $('.dataTables_scrollHeadInner').css("width","100%");


        // hide backdrop of modals
        $(document).on('hide.bs.modal', '.modal', function () {
            if ($(".modal-backdrop").length > 1) {
                $(".modal-backdrop").remove();
            }
        });

    </script>

    <!-- Tabs -->

    <!--- TABS JS -->
    <script src="{{ asset('bundle/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ asset('bundle/plugins/tabs/tab-content.js') }}"></script>

    {{-- custom js --}}
    @yield('customJs')
</body>

</html>