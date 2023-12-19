@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Consultant</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cash Receipt</a></li>
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
                    <h4 class="card-title">Edit Cash Receipt</h4>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.consultant.cash-receipt.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.consultant.cash-receipt.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i>Save Cash Receipt</label>
                            <label for="formSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('erp.consultant.cash-receipt.update', $cashReceipt->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Bank/Cash <i class="text-danger">*</i></label>
                            <select name='account_id' class="form-control form-control-sm form-select" id="account_id" required>
                                <option value="">Select bank account</option>
                                @foreach ($cashBankAccounts as $account)
                                    <option value="{{ $account->id }}" balance="{{$account->opening_balance}}" parent-name="{{$account->account_group->name}}" {{ (old('account_id') ? old('account_id') : $cashReceipt->account_id )  == $account->id ? 'selected' : '' }}>
                                    {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Balance<i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" name="balance" value="{{ $cashReceipt->opening_balance }}" id="balance" disabled>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Rcpt/Pymt <i class="text-danger">*</i></label>
                            <input type="text" class="form-control form-control-sm" name="type" value="receipt" disabled>
                            @error('type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control form-control-sm" value="{{old('date') ? old('date') : $cashReceipt->date}}" 
                                name="date" required>
                            @error('date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Vou No</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('vou_no') ? old('vou_no') : $cashReceipt->vou_no }}" name="vou_no" placeholder="Enter Voucher Number">
                            @error('vou_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Opp. A/c. <i class="text-danger">*</i></label>
                            <select name='opposite_account_id' class="form-control form-control-sm form-select" required>
                                <option value="">Select Opposite Account</option>
                                @foreach ($oppAccounts as $account)
                                    <option value="{{ $account->id }}" {{ (old('opposite_account_id') ? old('opposite_account_id') : $cashReceipt->opposite_account_id) == $account->id ? 'selected' : '' }}>
                                    {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('opposite_account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Currency <i class="text-danger">*</i></label>
                            <select name='currency_id' class="form-control form-control-sm form-select" required>
                                <option value="">Select Currency</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}" {{ (old('currency_id') ? old('currency_id') : $cashReceipt->currency_id) == $currency->id ? 'selected' : '' }}>
                                    {{ $currency->symbol }}
                                    </option>
                                @endforeach
                            </select>
                            @error('currency_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Bank Amount <i class="text-danger">*</i></label>
                            <input type="number" class="form-control form-control-sm" value="{{ old('amount') ? old('amount') : $cashReceipt->amount }}" name="amount" placeholder="Enter Amount" required>
                            @error('amount')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 doc">
                            <label class="form-label"> Doc No.</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('doc_no') ? old('doc_no') : $cashReceipt->doc_no }}" 
                                name="doc_no" placeholder="Enter Doc No" disabled>
                            @error('doc_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 doc">
                            <label class="form-label"> Doc Date</label>
                            <input type="date" class="form-control form-control-sm" value="{{ old('doc_date') ? old('doc_date') : $cashReceipt->doc_date }}" name="doc_date" disabled>
                            @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 chq_dd">
                            <label class="form-label"> Chq/DD No.</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('chq_dd_no') ? old('chq_dd_no') : $cashReceipt->chq_dd_no }}" 
                                name="chq_dd_no" placeholder="Enter Chq DD No">
                            @error('chq_dd_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 chq_dd">
                            <label class="form-label"> Chq/DD Date</label>
                            <input type="date" class="form-control form-control-sm" value="{{ old('chq_dd_date') ? old('chq_dd_date') : $cashReceipt->chq_dd_date }}" name="chq_dd_date">
                            @error('chq_dd_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Narration</label>
                            <textarea class="form-control form-control-sm" name="narration" placeholder="Enter Narration">{{ old('narration') ? old('narration') : $cashReceipt->narration}}</textarea>
                            @error('narration')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" id="formSubmit" class="d-none">
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
    <script type="text/javascript">
        $(document).ready(function(){
            
            $("#account_id").change(function(){
                var parentAccount = $('#account_id :selected').attr('parent-name');
                var balance = $('#account_id :selected').attr('balance');
                $('#balance').val(balance);

                if ((parentAccount == 'Bank Accounts (Banks)') || (parentAccount == 'Bank OCC a/c')){
                    $('.chq_dd').removeClass('d-none');
                    $('.doc').addClass('d-none');
                } else {
                    $('.doc').removeClass('d-none');
                    $('.chq_dd').addClass('d-none');
                }
            });
        });
    </script>
@endsection
