@extends('erp.app')
@section('content')
    <!-- Row -->
    <div class="row m-1">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Price Lists</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.price-list.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Save Price List</label>
                            <label for="formSubmitBtn" class="btn btn-sm btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{ route('erp.master.price-list.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Name <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('name') }}" required placeholder="Enter name"
                                    name="name" >
                                @error('name')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">From <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm" value="{{ old('from') }}" required name="from" >
                                @error('from')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">To <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm" value="{{ old('to') }}" required name="to" >
                                @error('to')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Sale/Purchase <i class="text-danger">*</i></label>
                                <select name='sale_purchase' class="form-control form-control-sm form-select" required>
                                    @foreach ($priceListEnums['salePurchases'] as $salePurchase)
                                        <option value="{{ $salePurchase['key'] }}"
                                            {{ old('sale_purchase') == $salePurchase['key'] ? 'selected' : '' }}>{{ $salePurchase['val'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sale_purchase')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Active/Deactive <i class="text-danger">*</i></label>
                                <select name='active_deactive' class="form-control form-control-sm form-select" required>
                                    <option value="active" {{ old('active_deactive') == "active" ? 'selected' : '' }}>Active</option>
                                    <option value="deactive" {{ old('active_deactive') == "deactive" ? 'selected' : '' }}>Deactive</option>
                                </select>
                                @error('active_deactive')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Level <i class="text-danger">*</i></label>
                                <select name='level' id="level" class="form-control form-control-sm form-select" required>
                                    <option value="single_level" {{ old('level') == "single_level" ? 'selected' : '' }}>Single level</option>
                                    <option value="multi_level" {{ old('level') == "multi_level" ? 'selected' : '' }}>Multi Level</option>
                                </select>
                                @error('level')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 single_select">
                                <label class="form-label">Party Level <i class="text-danger">*</i></label>
                                <select name='party_level[]' class="single_select_required form-control form-control-sm form-select" required>
                                    <option value=''>Select Party Level</option>
                                    @foreach ($priceListEnums['partyLevels'] as $partyLevel)
                                        <option value="{{ $partyLevel['key'] }}"
                                            {{ old('party_level') == $partyLevel['key'] ? 'selected' : '' }}>{{ $partyLevel['val'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('party_level')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 single_select">
                                <label class="form-label">Product Level <i class="text-danger">*</i></label>
                                <select name='product_level[]' class="single_select_required form-control form-control-sm form-select" required>
                                    <option value=""> Select Product level</option>
                                    @foreach ($priceListEnums['productLevels'] as $productLevel)
                                        <option value="{{ $productLevel['key'] }}">{{ $productLevel['val'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_level')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 multiple_select d-none">
                                <label class="form-label">Party Level <i class="text-danger">*</i></label>
                                <select name='multiple_party_level[]' id="party_level" multiple>
                                    <option value=''>Select Party Level</option>
                                    @foreach ($priceListEnums['partyLevels'] as $partyLevel)
                                        <option value="{{ $partyLevel['key'] }}"
                                            {{ old('party_level') == $partyLevel['key'] ? 'selected' : '' }}>{{ $partyLevel['val'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('party_level')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 multiple_select d-none">
                                <label class="form-label">Product Level <i class="text-danger">*</i></label>
                                <select name='multiple_product_level[]' id="product_level" multiple>
                                    <option value="">Select Party level</option>
                                    @foreach ($priceListEnums['productLevels'] as $productLevel)
                                        <option value="{{ $productLevel['key'] }}">{{ $productLevel['val'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_level')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Rate Type <i class="text-danger">*</i></label>
                                <select name='rate_type' class="form-control form-control-sm form-select" required>
                                    @foreach ($priceListEnums['rateTypes'] as $rateType)
                                        <option value="{{ $rateType['key'] }}"
                                            {{ old('rate_type') == $rateType['key'] ? 'selected' : '' }}>{{ $rateType['val'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('rate_type')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ask On <i class="text-danger">*</i></label>
                                <select name='ask_on' class="form-control form-control-sm form-select" required>
                                    @foreach ($priceListEnums['askOns'] as $askOn)
                                        <option value="{{ $askOn['key'] }}"
                                            {{ old('ask_on') == $askOn['key'] ? 'selected' : '' }}>{{ $askOn['val'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ask_on')
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
        new TomSelect("#party_level", {
                create: false,
                sortField: {
                    field: 'text',
                    direction: 'asc'
                },
                plugins: ['remove_button']
            });
        new TomSelect("#product_level", {
                create: false,
                sortField: {
                    field: 'text',
                },
                plugins: ['remove_button']
            });
         $(document).ready( function () {
             $('#level').change(function (){
                if($("#level :selected").val() == 'single_level'){
                    $('.single_select').removeClass('d-none');
                    $('.multiple_select').addClass('d-none');

                    $('#party_level').removeAttr('required', 'required');
                    $('#product_level').removeAttr('required', 'required');

                    $('.single_select_required').attr('required');
                } else {
                    
                    $('.single_select_required').removeAttr('required');

                    $('#party_level').attr('required', 'required');
                    $('#product_level').attr('required', 'required');

                    $('.multiple_select').removeClass('d-none');
                    $('.single_select').addClass('d-none');
                }
             });
         });
    </script>
@endsection
