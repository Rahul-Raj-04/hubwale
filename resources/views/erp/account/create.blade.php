@extends('erp.app')
@section('customCss')
    <style type="text/css">
        @media screen and (min-width: 768px) {
            .address-detail-hr {
                display: none;
            }
        }
    </style>
@endsection
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </div>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">                            
                            @if(Request::get('add_type') == 'bank_book')
                                <a href="{{route('erp.report.account-book.bank-book.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                            @elseif(Request::get('add_type') == 'provisional_outstanding')
                                <a href="{{route('erp.consultant.provisional-outstanding.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                            @elseif(Request::get('add_type') == 'cash_book')
                                <a href="{{route('erp.report.account-book.cash-book.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                            @elseif(Request::get('add_type') == 'ledger')
                                <a href="{{route('erp.report.account-book.ledger.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                            @elseif(Request::get('edit_type') == 'opening_balance')
                                <a href="{{route('erp.report.balance-sheet.trial-balance.opening-balance')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                            @else
                                <a href="{{route('erp.master.account.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                            @endif
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-primary d-none btn-sm d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> {{ __('lang.save') }}</label>
                            <label for="formSubmitBtn" class="btn btn-primary d-sm-none btn-sm btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    @livewire('erp.account.add-account')
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->

@endsection

@section('customJs')
    <script>
        window.addEventListener('entry_table', event => {
            $('.entry_table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false
                paging: false,
                ordering: false,
                info: false,
                searching:false
            });
        });

        $(document).ready(function() {
            $('.entry_table').DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                "ordering": false,
                paging: false,
                ordering: false,
                info: false,
                searching:false
            });
        });
    </script>
@endsection
