@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">RMC Voucher</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Bank Payment</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.gst.rcm.bank-payment.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.gst.rcm.bank-payment.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Bank Payment</label>
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('erp.gst.rcm.bank-payment.update', $bankPayment->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Cash/Bank<i class="text-danger">*</i></label>
                                <select name='account_id' class="form-control form-control-sm form-select" id="account_id" required>
                                    <option value=>Select account</option>
                                    @foreach ($bankAccounts as $account)
                                        <option value="{{ $account->id }}" balance="{{$account->opening_balance}}"
                                            {{ (old('account_id') ? old('account_id') : $bankPayment->account_id)  == $account->id ? 'selected' : '' }}>{{ $account->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('account_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Bank A/C Balance<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-sm" name="bank_ac_balance" value="{{ $bankPayment->account->opening_balance}}" id="bank_ac_balance" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control form-control-sm" value="{{ old('date') ? old('date') : $bankPayment->date }}" name="date" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Vou No</label>
                                <input type="text" class="form-control form-control-sm" 
                                    name="vou_no" placeholder="Enter vou no" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">GST Type</label>
                                <select name='gst_type' class="form-control form-control-sm form-select" required>
                                    @foreach ($gst_types as $gst_type)
                                        <option value="{{ $gst_type }}"
                                            {{ (old('gst_type') ? old('gst_type') : $bankPayment->gst_type) == $gst_type ? 'selected' : '' }}>{{ $gst_type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">GST Commodity<i class="text-danger">*</i></label>
                                <select name='gst_commodity_id' class="form-control form-control-sm form-select" required>
                                    <option value="">Select GST Commodity</option>
                                    @foreach ($gstCommodities as $gstCommodity)
                                        <option value="{{ $gstCommodity->id }}" {{ (old('gst_commodity_id') ? old('gst_commodity_id') : $bankPayment->gst_commodity_id ) == $gstCommodity->id ? 'selected' : '' }}>
                                        {{ $gstCommodity->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gst_commodity_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">ITC ?</label>
                                <select name='i_t_c' class="form-control form-control-sm form-select" required>
                                    <option value="1" {{ (old('i_t_c') ? old('i_t_c') : $bankPayment->i_t_c ) == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ (old('i_t_c') ? old('i_t_c') : $bankPayment->i_t_c ) == '0' ? 'selected' : '' }}>No</option>
                                </select>
                                @error('i_t_c')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>  
                            <div class="col-md-6">
                                <label class="form-label">Opp. A/C <i class="text-danger">*</i></label>
                                <select name='opposite_account_id' class="form-control form-control-sm form-select" id="opposite_account_id" required>
                                    <option value=>Select account</option>
                                    @foreach ($oppAccounts as $account)
                                        <option value="{{ $account->id }}" balance="{{$account->opening_balance}}"
                                            {{ (old('opposite_account_id') ? old('opposite_account_id') : $bankPayment->opposite_account_id)  == $account->id ? 'selected' : '' }}>{{ $account->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('opposite_account_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Opp A/C Balance<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control form-control-sm" name="opp_ac_balance" value="{{ $bankPayment->opposite_account->opening_balance}}" id="opp_ac_balance" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Currency <i class="text-danger">*</i></label>
                                <select name='currency_id' class="form-control form-control-sm form-select" required>
                                    <option value=>Select Currency</option>
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->id }}"
                                            {{ (old('currency_id') ? old('currency_id') : $bankPayment->currency_id) == $currency->id ? 'selected' : '' }}>{{ $currency->symbol }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('currency_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>            

                            <div class="col-md-6">
                                <label class="form-label">Bank Amount<i class="text-danger">*</i></label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('amount') ? old('amount') : $bankPayment->amount }}" 
                                    name="amount" placeholder="Enter amount" id="bank_amount">
                                @error('amount')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Chq/DD No</label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('chq_dd_no') ? old('chq_dd_no') : $bankPayment->chq_dd_no }}" 
                                    name="chq_dd_no" placeholder="Enter Chq/DD No">
                                @error('chq_dd_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Chq/DD Date</label>
                                <input type="date" class="form-control form-control-sm" value="{{ old('chq_dd_date') ? old('chq_dd_date') : $bankPayment->chq_dd_date }}" 
                                    name="chq_dd_date" placeholder="Enter Chq/DD Date">
                                @error('chq_dd_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Narration</label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('narration') ? old('narration') : $bankPayment->narration }}"
                                    name="narration" placeholder="Enter narration">
                                @error('narration')
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
<script type="text/javascript">
        $(document).ready(function(){
            $("#account_id").change(function(){
                var account_balance = parseInt($('#account_id :selected').attr('balance')) ? parseInt($('#account_id :selected').attr('balance')) : 0;
                var amount = parseInt($("#bank_amount").val()) ? parseInt($("#bank_amount").val()) : 0;
                $('#bank_ac_balance').val(account_balance + amount);
            });

            $("#opposite_account_id").change(function(){
                var account_balance = parseInt($('#opposite_account_id :selected').attr('balance')) ? parseInt($('#opposite_account_id :selected').attr('balance')) : 0;
                var amount = parseInt($("#bank_amount").val()) ? parseInt($("#bank_amount").val()) : 0;
                $('#opp_ac_balance').val(account_balance + amount);
            });

            $( "#bank_amount" ).bind( "change", function() {
                var amount = parseInt($("#bank_amount").val()) ? parseInt($("#bank_amount").val()) : 0;

                var bank_ac_balance = parseInt($('#account_id :selected').attr('balance')) ? parseInt($('#account_id :selected').attr('balance')) : 0;
                if($('#account_id :selected').val() == {{$bankPayment->opposite_account_id}}) {
                    var bank_ac_balance = bank_ac_balance - {{$bankPayment->amount}};
                }

                $('#bank_ac_balance').val(bank_ac_balance + amount);

                var opp_ac_balance = parseInt($('#opposite_account_id :selected').attr('balance')) ? parseInt($('#opposite_account_id :selected').attr('balance')) : 0;
                if($('#opposite_account_id :selected').val() == {{$bankPayment->opposite_account_id}}) {
                    var opp_ac_balance = opp_ac_balance - {{$bankPayment->amount}};
                }

                $('#opp_ac_balance').val(opp_ac_balance + amount);
            });
        });
    </script>
@endsection
