@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Price Lists</li>
                        <li class="breadcrumb-item active" aria-current="page">Price Lists Entry</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.price-list.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.master.price-list.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="table-responsive"> -->
                        <div class="row">
                            <div class="form-group col-md-12  mb-4">
                                <lable>Price List : {{$priceList->name}}</lable>
                            </div>
                            <div class="form-group col-md-12  mb-4">
                                <lable>{{json_decode($priceList->product_level)[0]}} : </lable>
                            </div>
                            <div class="form-group col-md-12  mb-4">
                                <lable>{{json_decode($priceList->party_level)[0]}} : </lable>
                            </div>
                        </div>
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Product Name</th>
                                    @if(json_decode($priceList->party_level)[0] == 'product')
                                        <th class="bg-primary text-white">Parchase Rate</th>
                                    @endif
                                    <th class="bg-primary text-white">Discount %</th>
                                    <th class="bg-primary text-white">Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $service->name }}</td>
                                        @if($priceList->party_level == 'product')
                                            <td></td>
                                        @endif
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
@endsection