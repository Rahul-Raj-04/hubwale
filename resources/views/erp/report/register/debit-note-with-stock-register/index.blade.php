@extends('erp.app')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Register</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Debit Note With Stock Register</li>
                    </ol>

                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="d-flex">
                            <form class="me-3 d-flex">
                                <div>
                                <select class="form-control form-control-sm">
                                    <option value="Account Ledger">Select option</option>
                                    <option value="Account Ledger">Debit Note With Stock Register</option>
                                </select>
                                </div>
                                <div class="row align-items-center ps-3">
                                        <div class="col-md-3">
                                            <h6 class="mb-0">From</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control form-control-sm" />
                                         </div>
                                    </div>
                                    <div class="row align-items-center ps-3">
                                        <div class="col-md-3">
                                            <h6 class="mb-0">To</h6>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control form-control-sm" />
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

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Vou/Bill Date</th>
                                    <th class="bg-primary text-white"></th>
                                    <th class="bg-primary text-white">Vou/Bill No</th>
                                    <th class="bg-primary text-white">V.Type (L)</th>
                                    <th class="bg-primary text-white">Party Name</th>
                                    <th class="bg-primary text-white">City Name</th>
                                    <th class="bg-primary text-white">Party GSTIN No</th>
                                    <th class="bg-primary text-white">Nill Rated Assessable Amount</th>
                                    <th class="bg-primary text-white">GST Assessable Amount</th>
                                    <th class="bg-primary text-white">Central Tax Amount</th>
                                    <th class="bg-primary text-white">State/UT Tax Amount</th>
                                    <th class="bg-primary text-white">Integrated Tax Amount</th>
                                    <th class="bg-primary text-white">Bill Amount</th>
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div>
                                            <a href="" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#is-audit-modal">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </apan>
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#is-audit-modal">
                                                <span class="ttt" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection