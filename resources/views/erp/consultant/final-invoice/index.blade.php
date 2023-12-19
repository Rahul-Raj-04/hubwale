@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Final Invoice</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Final Invoice</a></li>
                <li class="breadcrumb-item active" aria-current="page">Index</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Final Invoice</h3>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list d-none">
                            <a href="{{ route('erp.master.account-group.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Account Group
                            </a>

                            <a href="{{ route('erp.master.account-group.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
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
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">C/D</th>
                                    <th class="bg-primary text-white">Bill No</th>
                                    <th class="bg-primary text-white">Tax Type</th>
                                    <th class="bg-primary text-white">Account Name</th>
                                    <th class="bg-primary text-white">City</th>
                                    <th class="bg-primary text-white">Bill Amount</th>
                                    <th class="bg-primary text-white">Currency</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info">Edit</a>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    {{-- modals --}}
    {{-- @foreach () --}}
        <div class="modal fade" id="delete-modal-">
            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body text-center p-4 pb-5">
                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                        <form action="" method="delete" class="btn">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endforeach --}}
@endsection

@section('customJs')
@endsection