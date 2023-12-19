@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Products</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('erp.products.index')}}">General</a></li>
                <li class="breadcrumb-item"><a href="{{route('erp.products.index')}}">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Products</h3>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.products.create') }}" class="btn btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Product
                            </a>

                            <a href="{{ route('erp.products.create') }}" class="btn btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Product image</th>
                                    <th class="bg-primary text-white">Product number</th>
                                    <th class="bg-primary text-white">Product name</th>
                                    <th class="bg-primary text-white">Product category</th>
                                    <th class="bg-primary text-white">Product size</th>
                                    <th class="bg-primary text-white">Product brand</th>
                                    <th class="bg-primary text-white">Product price (per piece)</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ $product->getFirstMediaUrl('image') }}" style="width:30px;"></td>
                                        <td>{{ $product->number }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->group->name }}</td>
                                        <td>{{ $product->brand }}</td>
                                        <td>{{ $product->price_per_piece }}</td>
                                        <td>
                                            <a href="{{route('erp.products.edit', $product->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            <a href="{{route('erp.products.show', $product->id)}}" class="btn btn-sm btn-outline-success">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $product->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($products as $key => $product)
                        <div class="modal fade" id="delete-modal-{{ $product->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.products.destroy', $product->id)}}" method="POST" class="btn">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
@endsection