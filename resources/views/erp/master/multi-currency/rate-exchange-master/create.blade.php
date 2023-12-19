@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Multi Currency</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Rate Exchange Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.multi-currency.rate-exchange-master.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.master.multi-currency.rate-exchange-master.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="FormSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Rate Exchange Master</label>
                            <label for="FormSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <div>
                        <form action="{{ route('erp.master.multi-currency.rate-exchange-master.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Currency<i class="text-danger">*</i></label>
                                    <select name="currency_master_id" class="form-control form-control-sm form-select" id="country_id">
                                        <option value="">Select Currency</option>
                                        @foreach ($currencyMasters as $currencyMaster)
                                            <option value="{{ $currencyMaster->id }}" {{old('currency_master_id') == $currencyMaster->id ? 'selected' : ''}}>
                                                {{ $currencyMaster->country->name."  |  ".$currencyMaster->symbol }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('currency_master_id')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Date <i class="text-danger">*</i></label>
                                    <input type="date" class="form-control form-control-sm" value="{{ old('date') }}" name="date">
                                    @error('date')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Standard Rate<i class="text-danger">*</i></label>
                                    <input type="number" step="0.0001" class="form-control form-control-sm" value="{{ old('standard_rate') }}"
                                           placeholder="Enter standard rate" name="standard_rate">
                                    @error('standard_rate')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Selling Rate<i class="text-danger">*</i></label>
                                    <input type="number" step="0.0001" class="form-control form-control-sm" value="{{ old('selling_rate') }}" placeholder="Enter Selling Rate" name="selling_rate">
                                    @error('selling_rate')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Buying Rate<i class="text-danger">*</i></label>
                                    <input type="number" step="0.0001" class="form-control form-control-sm" value="{{ old('buyung_rate') }}" placeholder="Enter Buying Rate"name="buyung_rate">
                                    @error('buyung_rate')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" id="FormSubmit" class="d-none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
@endsection