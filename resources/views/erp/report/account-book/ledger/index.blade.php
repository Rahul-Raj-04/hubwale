@extends('erp.app')
@section('content')

    @livewire('erp.report.account-book.ledger.index')

@endsection

@section('customJs')
    <script>
    window.addEventListener('report_table', event => {
        $('.report_table').css("width","100%");
        $('.report_table').DataTable({
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
    });

    $(document).ready(function() {
        $('.report_table').css("width","100%");
        $('.report_table').DataTable({
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
    });
    </script>
@endsection