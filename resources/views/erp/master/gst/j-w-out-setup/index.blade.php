@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            @livewire('erp.master.gst.j-w-out-setup.index-j-w-out-setup')
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        window.addEventListener('entry-table', event => {
            $('.entry-table').css("width","100%");
            $('.entry-table').DataTable({
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
            $('.entry-table').css("width","100%");
            $('.entry-table').DataTable({
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