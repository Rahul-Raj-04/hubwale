@extends('erp.app')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Register</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales Register</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="d-flex">
                            <form class="me-3 d-flex">
                                <div>
                                <select class="form-control form-control-sm">
                                    <option value="Account Ledger">Select option</option>
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
                                    <th class="bg-primary text-white"></th>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Bill Date</th>
                                    <th class="bg-primary text-white">Bill No</th>
                                    <th class="bg-primary text-white">C/D</th>
                                    <th class="bg-primary text-white">Party Name</th>
                                    <th class="bg-primary text-white">City Name</th>
                                    <th class="bg-primary text-white">Bill Amount</th>
                                    <th class="bg-primary text-white">Product Name</th>
                                    <th class="bg-primary text-white">Product Qty</th>
                                    <th class="bg-primary text-white">Rate</th>
                                    <th class="bg-primary text-white">Product Amount</th>
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
    <!-- Is Audit Alert -->
    <div class="modal fade" id="sales-register-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5">
                    <form>
                            <div class="form-group row  mb-4">
                                <label for="type" class="form-label">Sales Register Formate List</label>
                                <select class="form-control form-control-sm form-select" name="type" id="type" required>
                                    <option value="">Select type</option>
                                    <option value="">Sales register ( with gst expese)</option>
                                </select>
                                @error('type')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                    </form>
                    <button class="btn btn-sm btn-primary pd-x-25" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
<script type="text/javascript">
    $(document).ready(function() {
        $('#sales-register-modal').modal('show');
    });
</script>
@endsection