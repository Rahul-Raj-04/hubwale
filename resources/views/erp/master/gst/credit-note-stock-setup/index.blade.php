@extends('erp.app')
@section('content')

    <div class="row row-sm m-1">
        <div class="col-lg-12">
            @livewire('erp.master.gst.credit-note-stock-setup.index-credit-note-stock-setup')
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        window.addEventListener('entry-table', event => {
            $('.datatable-common-index').css("width","100%");
            $('.datatable-common-index').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false,
                paging: false,
                ordering: false,
                info: false,
                sScrollY : 350,
                searching:true,
                sScrollX : true,
                scrollX : true,
            });
        });

        $(document).ready(function() {
            $('.datatable-common-index').css("width","100%");
            $('.datatable-common-index').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false,
                paging: false,
                ordering: false,
                info: false,
                sScrollY : 350,
                searching:true,
                sScrollX : true,
                scrollX : true,
            });
        });
    </script>
@endsection