@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Services</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Provisional Invoice</a></li>
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
                    <h4 class="card-title">Edit Provisional Invoice</h4>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.consultant.provisional-invoice.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.consultant.provisional-invoice.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save
                                Provisional Invoice</label>
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('erp.consultant.provisional-invoice.update', $provisionalInvoice->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Party A/c.</label>
                                <select name='account_id' class="form-control form-control-sm form-select @error('account_id') is-invalid @enderror" required>
                                    <option value=>Select Party A/c</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}"
                                            {{ (old('account_id') ?? $provisionalInvoice->account_id) == $account->id ? 'selected' : '' }}>{{ $account->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('account_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Invoice Type<i class="text-danger">*</i></label>
                                <select name='invoice_type' class="form-control form-control-sm form-select @error('invoice_type') is-invalid @enderror" required>
                                    <option value=>Select Invoice Type</option>
                                    @foreach ($invoiceTypes as $key => $val)
                                        <option value="{{ $key }}"
                                            {{ (old('invoice_type') ?? $provisionalInvoice->invoice_type) == $key ? 'selected' : '' }}>{{ $val }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('invoice_type')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"> Bill No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('bill_no') is-invalid @enderror" 
                                    name="bill_no" value="{{old('bill_no') ?? $provisionalInvoice->bill_no}}" placeholder="Enter Bill No" required>
                                @error('bill_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"> Bill Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('bill_date') is-invalid @enderror" 
                                    name="bill_date" value="{{old('bill_date') ??  date('Y-m-d', strtotime($provisionalInvoice->bill_date))}}" required>
                                @error('bill_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"> Particulars <i class="text-danger">*</i></label>
                                <select name='particulars' class="form-control form-control-sm form-select @error('particulars') is-invalid @enderror" required>
                                    <option value="">Select Particulars</option>
                                    @foreach ($particulars as $particular)
                                        <option value="{{ $particular->id }}" 
                                            {{ (old('particulars') ?? $provisionalInvoice->particulars) == $particular->id ? 'selected' : '' }}>
                                        {{ $particular->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('particulars')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label"> Amount <i class="text-danger">*</i></label>
                                <input type="number" class="form-control form-control-sm @error('amount') is-invalid @enderror" 
                                    name="amount" value="{{old('amount') ?? $provisionalInvoice->amount}}" placeholder="Enter Amount" required>
                                @error('amount')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>                        

                        </div>
                        <div>
                            <input type="submit" value="save" id="formSubmitBtn" class="d-none">
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->

@endsection

@section('customJs')
@endsection
