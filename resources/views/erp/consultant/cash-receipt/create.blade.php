@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Consultant</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cash Receipt</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Cash Receipt</h4>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.consultant.cash-receipt.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.consultant.cash-receipt.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i>Save Bank Receipt</label>
                            <label for="formSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('erp.consultant.cash-receipt.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Bank/Cash <i class="text-danger">*</i></label>
                            <select name='account_id' class="form-control form-control-sm form-select" id="account_id" required>
                                <option value="">Select cash account</option>
                                @foreach ($cashBankAccounts as $account)
                                    <option value="{{ $account->id }}" balance="{{$account->opening_balance}}" parent-name="{{$account->account_group->name}}"  {{ old('account_id') == $account->id ? 'selected' : '' }}>
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
                                <input type="text" class="form-control form-control-sm" name="balance" value="" id="balance" disabled>
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
                            <input type="date" class="form-control form-control-sm" value="{{old('date') ? old('date') : date('Y-m-d')}}" 
                                name="date" required>
                            @error('date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Vou No</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('vou_no') }}" 
                                name="vou_no" placeholder="Enter Voucher Number">
                            @error('vou_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Opp. A/c. <i class="text-danger">*</i></label>
                            <select name='opposite_account_id' class="form-control form-control-sm form-select" required>
                                <option value="">Select Opposite Account</option>
                                @foreach ($oppAccounts as $account)
                                    <option value="{{ $account->id }}" {{ old('opposite_account_id') == $account->id ? 'selected' : '' }}>
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
                                    <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? 'selected' : '' }}>
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
                            <input type="number" class="form-control form-control-sm" value="{{ old('amount') }}" name="amount" placeholder="Enter Amount" required>
                            @error('amount')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 doc">
                            <label class="form-label"> Doc No.</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('doc_no') }}" 
                                name="doc_no" placeholder="Enter Doc No" disabled>
                            @error('doc_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 doc">
                            <label class="form-label"> Doc Date</label>
                            <input type="date" class="form-control form-control-sm" value="{{ old('doc_date') }}" name="doc_date" disabled>
                            @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 chq_dd">
                            <label class="form-label"> Chq/DD No.</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('chq_dd_no') }}" 
                                name="chq_dd_no" placeholder="Enter Chq DD No">
                            @error('chq_dd_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4 chq_dd">
                            <label class="form-label"> Chq/DD Date</label>
                            <input type="date" class="form-control form-control-sm" value="{{ old('chq_dd_date') ? old('chq_dd_date') : date('Y-m-d') }}" name="chq_dd_date">
                            @error('chq_dd_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Narration</label>
                            <textarea class="form-control form-control-sm" value="skcmskcmskms" 
                                name="narration" placeholder="Enter Narration"></textarea>
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
                var balance = $('#account_id :selected').attr('balance');
                $('#balance').val(balance);

                var parent_account = $('#account_id :selected').attr('parent-name');
                if ((parent_account == 'Bank Accounts (Banks)') || (parent_account == 'Bank OCC a/c')){
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
