@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Cost Centre</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cost Category</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.cost-centre.cost-category.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Cost Category
                            </a>

                            <a href="{{ route('erp.master.cost-centre.cost-category.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>
                            <a class="btn btn-sm btn-primary d-none d-sm-inline-block ms-3" href="{{ route('erp.master.cost-centre.cost-category.export')}}">Print</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               	@foreach ($costCategories as $key => $costCategorie)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $costCategorie->name }}</td>
                                        <td>
                                            <a href="{{route('erp.master.cost-centre.cost-category.edit', $costCategorie->id)}}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $costCategorie->id }}">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($costCategories as $key => $costCategorie)
                        <div class="modal fade" id="delete-modal-{{ $costCategorie->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.master.cost-centre.cost-category.destroy', $costCategorie->id)}}" method="POST" class="btn">
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