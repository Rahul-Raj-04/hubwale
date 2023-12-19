@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Forex Adjustment</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.account-transaction.forex-adjustment.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.account-transaction.forex-adjustment.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="FormSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Forex Adjustment</label>
                            <label for="FormSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <div>
                        @livewire('erp.transaction.forex-adjustment.create')
                    </div>
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
                paging: false,
                ordering: false,
                searching:true,
                info: false,
            });
        });
    </script>
@endsection