@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Products</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('erp.products.index')}}">General</a></li>
                <li class="breadcrumb-item"><a href="{{route('erp.products.index')}}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product</h4>
                    <div class="col-auto ms-auto d-print-none d-flex pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.products.index') }}" class="btn btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                            <a href="{{ route('erp.products.index') }}" class="btn btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                        </div>                        
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row justify-content-center">
                                @if ($product->image)
                                    @foreach($product->image as $key => $image)
                                        <div class="col-md-1 p-0 text-center me-6 mb-4 position-relative">
                                            <img src="{{ $image->getUrl() }}" style="height:100px;width:100px;" class="bg-secondary">
                                        </div>
                                    @endforeach
                                @else
                                    <label class="card d-flex justify-content-center align-items-center text-muted"
                                        style="height:200px;width:200px;">
                                        <small class="text-muted">Image not found</small>
                                    </label>
                                @endif
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-lg-6 col-md-6 mt-2">
                                <label for="group_id">Group</label>
                                <select class="form-select form-control form-control-sm" id="group_id" disabled>
                                    <option value="" selected>{{$product->group->name}}</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 col-md-6  mt-2">
                                <label for="category_id">Category</label>
                                <select class="form-select form-control form-control-sm" id="category_id" disabled>
                                    <option value="" selected>{{$product->category->name}}</option>
                                </select>
                            </div>
                        </div>
                        <hr class="my-3"/>
                        <div class="row">

                            <div class="form-group col-lg-4 col-md-6 mt-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control form-control-sm" id="name" value="{{$product->name}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="alias">Alias</label>
                                <input type="text" class="form-control form-control-sm" id="alias" value="{{$product->alias}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="gst_commodity">GST commodity</label>
                                <select class="form-select form-control form-control-sm" id="category_id" disabled>
                                    <option value="" selected>{{$product->gst_commodities ? $product->gst_commodities->description : ''}}</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="number">Number</label>
                                <input type="text" class="form-control form-control-sm" id="number" value="{{$product->number}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="size">Size</label>
                                <input type="text" class="form-control form-control-sm" id="size" value="{{$product->size}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="brand">Brand</label>
                                <input type="text" class="form-control form-control-sm" id="brand" value="{{$product->brand}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="description">Description</label>
                                <input type="text" class="form-control form-control-sm" id="description" value="{{$product->description}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="packaging_type">Packaging Type</label>
                                <input type="text" class="form-control form-control-sm" id="packaging_type" value="{{$product->packaging_type}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="price_per_piece">Price per piece</label>
                                <input type="text" class="form-control form-control-sm" id="price_per_piece" value="{{$product->price_per_piece}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="weight_per_piece">Weight per piece</label>
                                <input type="text" class="form-control form-control-sm" id="weight_per_piece" value="{{$product->weight_per_piece}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="quantity_per_package">Quantity per package</label>
                                <input type="text" class="form-control form-control-sm" id="quantity_per_package" value="{{$product->quantity_per_package}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="price_per_package">Price per package</label>
                                <input type="text" class="form-control form-control-sm" id="price_per_package" value="{{$product->price_per_package}}" disabled>
                            </div>
                        
                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="weight_per_package">Weight per package</label>
                                <input type="text" class="form-control form-control-sm" id="weight_per_package" value="{{$product->weight_per_package}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="color">Color</label>
                                <input type="text" class="form-control form-control-sm" id="color" value="{{$product->color}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="grade">Grade</label>
                                <input type="text" class="form-control form-control-sm" id="grade" value="{{$product->grade}}" disabled>
                            </div>
                        
                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control form-control-sm" id="unit" value="{{$product->unit}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="surface">Surface</label>
                                <input type="text" class="form-control form-control-sm" id="surface" value="{{$product->surface}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="available_pieces_quantity">Available pieces quantity</label>
                                <input type="text" class="form-control form-control-sm" id="available_pieces_quantity" value="{{$product->available_pieces_quantity}}" disabled>
                            </div>
                        
                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="available_packages_quantity">Available packages quantity</label>
                                <input type="text" class="form-control form-control-sm" id="available_packages_quantity" value="{{$product->available_packages_quantity}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="defective_pieces_quantity">Defective pieces quantity</label>
                                <input type="text" class="form-control form-control-sm" id="defective_pieces_quantity" value="{{$product->defective_pieces_quantity}}" disabled>
                            </div>

                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="defective_packages_quantity">Defective packages quantity</label>
                                <input type="text" class="form-control form-control-sm" id="defective_packages_quantity" value="{{$product->defective_packages_quantity}}" disabled>
                            </div>
                        
                            @foreach($custom_fields as $key => $field)
                                <div class="form-group col-lg-4 col-md-6  mt-2">
                                    <label for="surface">{{$field['field_name']}}</label>
                                    <input type="text" class="form-control form-control-sm" value="{{$field['field_value']}}" disabled>
                                </div>
                            @endforeach

                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mt-2">
                                <label for="custom_size">Custom size</label>
                                <div class="mt-2">
                                    @foreach($custom_size as $key => $size)
                                        <p class="bg-primary text-white py-1 px-2 m-0 mt-1 d-flex justify-content-between"><span>{{$size}}</span></p>
                                    @endforeach
                                    @if(empty($custom_size))
                                        <p class="bg-primary text-white py-1 px-2 m-0 mt-1 d-flex justify-content-between"><span>NaN</span></p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 mt-2">
                                <label for="custom_color">Custom color's</label>
                                <div class="mt-2">
                                    @foreach($custom_color as $key => $color)
                                        <p class="bg-primary text-white py-1 px-2 m-0 mt-1 d-flex justify-content-between"><span>{{$color}}</span></p>
                                    @endforeach
                                    @if(empty($custom_color))
                                        <p class="bg-primary text-white py-1 px-2 m-0 mt-1 d-flex justify-content-between"><span>NaN</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row END -->
@endsection
