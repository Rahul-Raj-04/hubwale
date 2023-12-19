@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Cash/Bank Entry</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Cash Payment</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            @if(Request::get('edit_type') == 'bank_book')
                                <a href="{{ route('erp.report.account-book.bank-book.show', Request::get('account_id')) }}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                <a href="{{ route('erp.report.account-book.bank-book.show', Request::get('account_id')) }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i></a>
                            @elseif(Request::get('edit_type') == 'cash_book')
                                <a href="{{route('erp.report.account-book.cash-book.show', Request::get('account_id'))}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                <a href="{{ route('erp.report.account-book.cash-book.show', Request::get('account_id')) }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i></a>
                            @elseif(Request::get('edit_type') == 'day_book')
                                <a href="{{route('erp.report.account-book.day-book.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                <a href="{{route('erp.report.account-book.day-book.index')}}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i></a>
                            @elseif(Request::get('edit_type') == 'ledger')
                                <a href="{{ route('erp.report.account-book.ledger.allShow', ['id' => Request::get('account_id'), 'type' => 'account_ladger']) }}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                <a href="{{ route('erp.report.account-book.ledger.allShow', ['id' => Request::get('account_id'), 'type' => 'account_ladger']) }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i></a>
                            @else
                                <a href="{{route('erp.account-transaction.cash-bank-entry.cash-payment.index')}}" class="btn btn-default btn-sm d-none d-sm-inline-block mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                <a href="{{ route('erp.account-transaction.cash-bank-entry.cash-payment.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-times me-2" aria-hidden="true"></i></a>
                            @endif
                        </div>
                        <div class="btn-list">
                            <label for="formSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i>Save Cash Payment</label>
                            <label for="formSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    @livewire('erp.transaction.edit-cash-bank-entry', ['id' => $id])     
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
@endsection
