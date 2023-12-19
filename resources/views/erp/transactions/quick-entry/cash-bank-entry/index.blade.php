@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Quick Entry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cash Bank Entry</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list d-none">
                            <a href="{{ route('erp.account-transaction.quick-entry.cash-bank-entry.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.account-transaction.quick-entry.cash-bank-entry.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    @livewire('erp.transaction.quick-entry.add-cash-bank-entry')
                </div>
            </div>
        </div>
    </div>

    <!-- Audit Alert Model -->
    <div class="modal fade" id="is-audit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger">Audited voucher can not be  modified or deleted</h4>
                    <button class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    
<script type="text/javascript">
    window.addEventListener('entry-table', event => {
        $('.entry-table').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
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
            paging: false,
            ordering: false,
            info: false,
            searching:true,
        });
    });

    window.addEventListener('is-audit-model-show', event => {
        $('#is-audit-modal').modal('show');
    });

</script>
@endsection