@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Ledger</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Account Book</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ledger</li>
                <li class="breadcrumb-item active" aria-current="page">Ledger</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="col-auto ms-auto d-print-none pe-0">
                            <div class="d-flex">
                                <form class="me-2 d-flex">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 text-center">
                                            <h6 class="mb-0">Ledger</h6>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control form-control-sm form-control form-control-sm-lg" />
                                         </div>
                                    </div>
                                    <div class="row align-items-center ps-3">
                                        <div class="col-md-3">
                                            <h6 class="mb-0">Group</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control form-control-sm form-control form-control-sm-lg" />
                                         </div>
                                    </div>
                                </form>
                                <div class="btn-list">
                                    <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-3">Export</button>
                                    <a href="" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                        <i class="fas fa-plus me-1"></i>
                                        Add
                                    </a>

                                    <a href="" class="btn btn-sm btn-primary d-sm-none me-0">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
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
                                    <th class="bg-primary text-white">Type</th>
                                    <th class="bg-primary text-white">Vou/Doc No</th>
                                    <th class="bg-primary text-white">Account Name</th>
                                    <th class="bg-primary text-white">Withdrawal</th>
                                    <th class="bg-primary text-white">Deposit</th>
                                    <th class="bg-primary text-white">Closing Balance</th>
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

                                        <td>
                                            <a href="" class="btn btn-sm btn-outline-info">Edit</a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-">Delete</button>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}

                        <div class="modal fade" id="delete-modal-">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="" method="POST" class="btn">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
@endsection