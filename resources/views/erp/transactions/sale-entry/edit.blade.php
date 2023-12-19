@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Sale Entry</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ ucfirst(str_replace( '_', ' ', Request::get('type'))) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            @if(Request::get('return_type') == 'product_ledger')
                                <a href="{{ route('erp.report.stock-report.product-ledger.show', Request::get('return_id')) }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                <a href="{{ route('erp.report.stock-report.product-ledger.show', Request::get('return_id')) }}" class="btn btn-default btn-sm d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            @elseif(Request::get('return_type') == 'partywise_report')
                                <a href="{{ route('erp.report.stock-report.partywise-report.show', Request::get('return_id')) }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                <a href="{{ route('erp.report.stock-report.partywise-report.show', Request::get('return_id')) }}" class="btn btn-default btn-sm d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            @else
                                <a href="{{ route('erp.account-transaction.sale-entry.index', ['type' => Request::get('type')]) }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                                <a href="{{ route('erp.account-transaction.sale-entry.index', ['type' => Request::get('type')]) }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            @endif
                        </div>
                        <div class="btn-list">
                            <label for="formSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i>Save {{ ucfirst(str_replace('_', ' ', Request::get('type'))) }}</label>
                            <label for="formSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    @livewire('erp.transaction.sale-entry.edit', [ 'id' => $id, 'type' => Request::get('type'), 'return_type' => Request::get('return_type'), 'return_id' => Request::get('return_id')])     
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    
    <script>
        window.addEventListener('entry-table', event => {
            $('.entry-table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false,
                "bDestroy": true,
                paging: false,
                ordering: false,
                searching:true,
                info: false,
            });
        });
    
        $(document).ready(function() {
            $('.entry-table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false,
                "bDestroy": true,
                paging: false,
                ordering: false,
                searching:true,
                info: false,
            });
        });
    </script>
@endsection