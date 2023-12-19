@extends('erp.app')

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Utility</a></li>
                        <li class="breadcrumb-item"><a href="">Personal diary</a></li>
                        <li class="breadcrumb-item"><a href="">Address Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.address-book.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.address-book.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                        <div class="btn-list">
                            <label for="formSubmitBtn" class="btn btn-primary d-none d-sm-inline-block me-0"><i class="fas fa-save me-1"></i> Update
                                Address Book</label>
                            <label for="formSubmitBtn" class="btn btn-primary d-sm-none btn-icon me-0"><i class="fas fa-plus mx-2"></i></label>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('erp.utility.personal-diary.address-book.update', $addressBook->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Name <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('name') ? old('name') : $addressBook->name }}" placeholder="Enter Name"
                                    name="name">
                                @error('name')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact person</label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('contact_person') ? old('contact_person') : $addressBook->contact_person }}" placeholder="Enter contact person"
                                    name="contact_person">
                                @error('contact_person')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('address') ? old('address') : $addressBook->address }}" name="address" placeholder="Enter address">
                                @error('address')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Pincode</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('pincode') ? old('pincode') : $addressBook->pincode }}" name="pincode"
                                    placeholder="Enter pincode"> 
                                @error('pincode')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">State</label>
                                <select name='state_id' class="form-control form-control-sm form-select">
                                    <option value=>Select state</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}"
                                            {{ (old('state_id') ? old('state_id') : $addressBook->state_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('state_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">City</label>
                                <select name='city_id' class="form-control form-control-sm form-select">
                                    <option value=>Select city</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ (old('city_id') ? old('city_id') : $addressBook->city_id) == $city->id ? 'selected' : '' }}>{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('city_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Area</label>
                                <input class="form-control form-control-sm" type="text" placeholder="Enter area" name="area" value="{{ old('area') ? old('area') : $addressBook->area }}">
                                @error('area')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Category</label>
                                <select name='address_category_id' class="form-control form-control-sm form-select">
                                    <option value=>Select category</option>
                                    @foreach ($address_categories as $address_category)
                                        <option value="{{ $address_category->id }}"
                                            {{ (old('address_category_id') ? old('address_category_id') : $addressBool->address_category_id) == $address_category->id ? 'selected' : '' }}>{{ $address_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('address_category')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone 1 (O)</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('phone_1_o') ? old('phone_1_o') : $addressBook->phone_1_o }}" name="phone_1_o" placeholder="Enter phone 1 (O)">
                                @error('phone_1_o')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone 1 (R)</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('phone_1_r') ? old('phone_1_r') : $addressBook->phone_1_r }}" name="phone_1_r"
                                    placeholder="Enter phone 1 (R)"> 
                                @error('phone_1_r')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone 2 (O)</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('phone_2_o') ? old('phone_2_o') : $addressBook->phone_2_o }}" name="phone_2_o" placeholder="Enter phone 2 (O)">
                                @error('phone_2_o')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone 2 (R)</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('phone_2_r') ? old('phone_2_r') : $addressBook->phone_2_r }}" name="phone_2_r"
                                    placeholder="Enter phone 2 (R)"> 
                                @error('phone_2_r')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone F</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('phone_f') ? old('phone_f') : $addressBook->phone_f }}" name="phone_f" placeholder="Enter phone f">
                                @error('phone_f')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Fax 1</label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('fax_1') ? old('fax_1') : $addressBook->fax_1 }}" name="fax_1" placeholder="Enter phone 2 (R)"> 
                                @error('fax_1')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Mobile 1</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('mobile_1') ? old('mobile_1') : $addressBook->mobile_1 }}" name="mobile_1" placeholder="Enter mobile 1">
                                @error('mobile_1')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Mobile 2</label>
                                <input type="number" class="form-control form-control-sm" value="{{ old('mobile_2') ? old('mobile_2') : $addressBook->mobile_2 }}" name="mobile_2" placeholder="Enter mobile 2"> 
                                @error('mobile_2')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control form-control-sm" value="{{ old('email') ? old('email') : $addressBook->email }}" name="email" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control form-control-sm" value="{{ old('website') ? old('website') : $addressBook->website }}" name="website" placeholder="Enter website"> 
                                @error('website')
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
