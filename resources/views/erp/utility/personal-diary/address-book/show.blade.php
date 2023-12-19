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
                        <li class="breadcrumb-item active" aria-current="page">Show</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.utility.personal-diary.address-book.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.utility.personal-diary.address-book.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mt-3">
                            <div class="form-group col-lg-4 col-md-6 mt-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name" value="{{$addressBook->name}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="contact_person">Contact person</label>
                                <input type="text" class="form-control form-control-sm" id="contact_person" value="{{$addressBook->contact_person}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="gst_commodity">Address</label>
                                <input type="address" class="form-control form-control-sm" id="address" value="{{$addressBook->address}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="pincode">Pincode</label>
                                <input type="text" class="form-control form-control-sm" id="pincode" value="{{$addressBook->pincode}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="city_id">City</label>
                                <input type="text" class="form-control form-control-sm" id="city_id" value="{{$addressBook->city ? $addressBook->city->name : ''}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="state_id">State</label>
                                <input type="text" class="form-control form-control-sm" id="state_id" value="{{$addressBook->state ? $addressBook->state->name : ''}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="area">Area</label>
                                <input type="text" class="form-control form-control-sm" id="area" value="{{$addressBook->area}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="address_category_id">Address category</label>
                                <input type="text" class="form-control form-control-sm" id="address_category_id" value="{{$addressBook->address_category_id ? $addressBook->addressCategory->name : ''}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="phone_1_o">Phone 1 (O)</label>
                                <input type="text" class="form-control form-control-sm" id="phone_1_o" value="{{$addressBook->phone_1_o}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="phone_1_r">Phone 1 (R)</label>
                                <input type="text" class="form-control form-control-sm" id="phone_1_r" value="{{$addressBook->phone_1_r}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="phone_2_o">Phone 2 (O)</label>
                                <input type="text" class="form-control form-control-sm" id="phone_2_o" value="{{$addressBook->phone_2_o}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="phone_2_r">Phone 2 (R)</label>
                                <input type="text" class="form-control form-control-sm" id="phone_2_r" value="{{$addressBook->phone_2_r}}" disabled>
                            </div>
                        
                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="phone_f">Phone (F)</label>
                                <input type="text" class="form-control form-control-sm" id="phone_f" value="{{$addressBook->phone_f}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="fax_1">Fax 1</label>
                                <input type="text" class="form-control form-control-sm" id="fax_1" value="{{$addressBook->fax_1}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="mobile_1">Mobile 1</label>
                                <input type="text" class="form-control form-control-sm" id="mobile_1" value="{{$addressBook->mobile_1}}" disabled>
                            </div>
                        
                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="mobile_2">Mobile 2</label>
                                <input type="text" class="form-control form-control-sm" id="mobile_2" value="{{$addressBook->mobile_2}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control form-control-sm" id="email" value="{{$addressBook->email}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="website">Website</label>
                                <input type="text" class="form-control form-control-sm" id="website" value="{{$addressBook->website}}" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
@endsection
