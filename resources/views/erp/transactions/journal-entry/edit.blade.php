@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Journal Entry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(str_replace( '_', ' ', $vouType)) }}</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            @if(Request::get('edit_type') == 'ledger')
                                <a href="{{ route('erp.report.account-book.ledger.allShow', ['id' => Request::get('account_id'), 'type' => 'account_ladger']) }}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                <a href="{{ route('erp.report.account-book.ledger.allShow', ['id' => Request::get('account_id'), 'type' => 'account_ladger']) }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i></a>
                            @else
                                <a href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => $vouType]) }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                <a href="{{ route('erp.account-transaction.journal-entry.index', ['vouType' => $vouType]) }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                            @endif
                        </div>
                        <div class="btn-list">
                            <label for="FormSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save {{ ucfirst(str_replace( '_', ' ', $vouType)) }}</label>
                            <label for="FormSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <div>
                        @livewire('erp.transaction.journal-entry.edit', ['vou_type' => $vouType, 'journalEntry' => $journalEntry])
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
                    paging: false,
                    ordering: false,
                    info: false,
                    sScrollY : 350,
                    searching:true,
                    sScrollX : true,
                    scrollX : true,
                });
                $('.entry-table').addClass('mt-2');
                $('.entry-table').css("width","100%");
                $('.dataTables_scrollHeadInner').css("width","100%");                    
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
                    sScrollY : 350,
                    searching:true,
                    sScrollX : true,
                    scrollX : true,
            });
                $('.entry-table').addClass('mt-2');
                $('.entry-table').css("width","100%");
                $('.dataTables_scrollHeadInner').css("width","100%");
        });
    </script>
@endsection