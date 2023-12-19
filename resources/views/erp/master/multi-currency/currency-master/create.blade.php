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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Currency Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.multi-currency.currency-master.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.master.multi-currency.currency-master.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="MultiCurrencyFormSubmit" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Currency Master</label>
                            <label for="MultiCurrencyFormSubmit" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <div>
                        <form action="{{ route('erp.master.multi-currency.currency-master.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Symbol <i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-sm" maxlength="1" value="{{ old('symbol') }}" placeholder="Enter Symbol"
                                            name="symbol">
                                    @error('symbol')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Country<i class="text-danger">*</i></label>
                                    <select name="country" class="form-control form-control-sm form-select" id="country_id">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" data="{{ $country->code }}" {{old('country') == $country->id ? 'selected' : ''}}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">GC Code<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-sm" value="{{ old('gc_code') }}"
                                            name="gc_code" id="gc_code" readonly>
                                    @error('gc_code')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Integer<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-sm" value="{{ old('integer') }}" placeholder="Enter Integer"
                                            name="integer">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Fraction<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-sm" value="{{ old('fraction') }}" placeholder="Enter Fraction"
                                            name="fraction">
                                </div>
                            </div>
                            <input type="submit" id="MultiCurrencyFormSubmit" class="d-none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->

@endsection

@section('customJs')
<script type="text/javascript">
    $( document ).ready(function() {
        $( "#country_id" ).bind( "change", function( event ) {
            var gc_code = $('#country_id').find(":selected").attr("data");
            $('#gc_code').val(gc_code);
      });
    });
</script>
@endsection