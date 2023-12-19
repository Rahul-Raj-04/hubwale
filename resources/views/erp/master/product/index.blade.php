@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.product.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Product
                            </a>

                            <a href="{{ route('erp.master.product.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Product name</th>
                                    <th class="bg-primary text-white">Category</th>
                                    <th class="bg-primary text-white">Group</th>
                                    <th class="bg-primary text-white">Purchase. Rate</th>
                                    <th class="bg-primary text-white">Sales Rate</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category ? $product->category->name : '' }}</td>
                                        <td>{{ $product->group ? $product->group->name : '' }}</td>
                                        <td>{{ $product->purchase_rate }}</td>
                                        <td>{{ $product->sales_rate }}</td>
                                        <td>
                                            <a href="{{route('erp.master.product.edit', $product->id)}}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $product->id }}">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- modals --}}
                    @foreach ($products as $key => $product)
                        <div class="modal fade" id="delete-modal-{{ $product->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.master.product.destroy', $product->id)}}" method="POST" class="btn">
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