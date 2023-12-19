<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                    <li class="breadcrumb-item"><a href="#">Stock Report</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Partywise Report</li>
                </ol>
            </div>
            <div class="card-body p-2">
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <select class="form-control form-control-sm">
                                <option>Default Format</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Party Name</th>
                                <th class="bg-primary text-white">City Name</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $key => $account)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td>{{ $account->city ? $account->city->name : '' }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('erp.report.stock-report.partywise-report.show', $account->id) }}" class="btn btn-sm btn-outline-success">Show</a>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-sm-none me-1">
                                <i class="fa fa-print me-0"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Master
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Filter
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Date
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                order
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Format
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>