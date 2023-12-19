@extends('erp.app')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Outstanding</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Receivable</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="d-flex">
                            <form class="me-3 d-flex">
                                <div>
                                <select class="form-control form-control-sm">
                                    <option value="Account Ledger">Select option</option>
                                </select>
                                    
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-5 text-center me-0">
                                        <h6 class="mb-0">Report Date : </h6>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="date" value="{{ date('Y-m-d')}}" class="form-control form-control-sm form-control form-control-sm-lg" />
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
                                    <th class="bg-primary text-white">Party Name</th>
                                    <th class="bg-primary text-white">City</th>
                                    <th class="bg-primary text-white">Pending Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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