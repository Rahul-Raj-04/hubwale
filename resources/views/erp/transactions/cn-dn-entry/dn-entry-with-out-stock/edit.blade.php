@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">DN Entry With Out Stock</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">CN/DN Entry</a></li>
                <li class="breadcrumb-item active" aria-current="page">DN Entry w/o Stock</li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit DN Entry With Out Stock</h4>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.account-transaction.cn-dn-entry.dn-entry-with-out-stock.index') }}" class="btn btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.account-transaction.cn-dn-entry.dn-entry-with-out-stock.index') }}" class="btn btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="FormSubmit" class="btn btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save DN Entry w/o Stock</label>
                            <label for="FormSubmit" class="btn btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @livewire('erp.transaction.cn-dn-entry.dn-entry-with-out-stock.edit', ['dnEntryWithOutStock' => $dnEntryWithOutStock])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    <script>
        window.addEventListener('entry_table', event => {
            $('.entry_table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false
            });
        });

        $(document).ready(function() {
            $('.entry_table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                }.
                "ordering": false
            });
        });
    </script>
@endsection