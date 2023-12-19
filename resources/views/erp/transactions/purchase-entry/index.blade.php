@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Entry</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ ucfirst(str_replace( '_', ' ', Request::get('type'))) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.account-transaction.purchase-entry.create', ['type' => Request::get('type')]) }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add {{ ucfirst(str_replace('_', ' ', Request::get('type'))) }}
                            </a>

                            <a href="{{ route('erp.account-transaction.purchase-entry.create', ['type' => Request::get('type')]) }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>
                            <button class="btn btn-sm btn-primary d-none d-sm-inline-block ms-1" data-bs-toggle="modal" data-bs-target="#filter_model"><i class="fas fa-filter"></i> Filter</button>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">C/D</th>
                                    <th class="bg-primary text-white">Bill No</th>
                                    <th class="bg-primary text-white">Voucher No</th>
                                    <th class="bg-primary text-white">Tax Type</th>
                                    <th class="bg-primary text-white">Account Name</th>
                                    <th class="bg-primary text-white">City</th>
                                    <th class="bg-primary text-white">Bill Amount</th>
                                    @if (request()->type == App\Enum\Enum::PURCHASE_RETURN)
                                        <th class="bg-primary text-white">Original Bill No</th>
                                        <th class="bg-primary text-white">Original Bill Date</th>
                                    @endif
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $val)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{  date('d-m-Y', strtotime($val->bill_date)) }}</td>
                                        <td>{{ $val->cash_debit }}</td>                            
                                        <td>{{ $val->bill_no }}</td>
                                        <td>{{ $val->vou_no ?? '-' }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ',$val->tax_bill_of_supply)) }}</td>
                                        <td>{{ $val->party_ac->name }}</td>
                                        <td>{{ $val->party_ac->city ? $val->party_ac->city->name : '-' }}</td>
                                        <td>{{ $val->amount }}</td>
                                        @if (request()->type == App\Enum\Enum::PURCHASE_RETURN)
                                            <td>{{ $val->original_bill_no }}</td>
                                            <td>{{ $val->original_bill_date }}</td>
                                        @endif
                                        <td>
                                            <a href="{{route('erp.account-transaction.purchase-entry.edit', [ 'purchase_entry' => $val->id, 'type' => Request::get('type')])}}" class="btn btn-sm btn-outline-info">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $val->id }}">
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
                    @foreach ($data as $key => $val)
                        <div class="modal fade" id="delete-modal-{{ $val->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{ route('erp.account-transaction.purchase-entry.destroy', [ 'purchase_entry' => $val->id, 'type' => Request::get('type')]) }}" method="POST" class="btn">
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
    <div class="modal fade" id="filter_model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('erp.account-transaction.purchase-entry.filter') }}" method="GET">
                        @method('GET')
                        <div class="row">
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Date</label>
                                <input type="date" name="filter[bill_date]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">C/D</label>
                                <input type="text" name="filter[cash_debit]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Bill No</label>
                                <input type="text" name="filter[bill_no]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Voucher No</label>
                                <input type="text" name="filter[vou_no]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Tax Type</label>
                                <input type="text" name="filter[tax_bill_of_supply]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Account Name</label>
                                <input type="text" name="filter[party_ac.name]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">City</label>
                                <input type="text" name="filter[party_ac.city.name]" class="form-control form-control-sm">
                            </div>
                            <input type="hidden" value="{{Request::get('type')}}" name="type" class="d-none">
                        </div>
                        <input type="submit" id="SaveAreaName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveAreaName" class="btn btn-primary ">OK</label>
                    <a href="{{route('erp.account-transaction.purchase-entry.index', ['type' => Request::get('type')])}}" class="btn btn-danger" >Reset</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
@endsection