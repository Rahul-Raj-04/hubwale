@extends('erp.app')
@section('content')

    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <div>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Accounts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Index</li>
                        </ol>
                    </div>
                </div>

                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Account Name</th>
                                    <th class="bg-primary text-white">City</th>
                                    <th class="bg-primary text-white">Group Name</th>
                                    <th class="bg-primary text-white">Opening Balance</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($accounts as $key => $account)
                                    <tr>
                                        <td>{{ $account->name }}</td>
                                        <td>{{ $account->city ? $account->city->name : '-' }}</td>
                                        <td>{{ $account->account_group->name }}</td>
                                        <td>{{ $account->opening_balance ? $account->opening_balance : '-' }}</td>
                                        <td>
                                            
                                            {{-- <a href="{{route('erp.master.account.show', $account->id)}}" class="btn btn-sm btn-outline-success">Show</a> --}}
                                                @if($account->is_default)
                                                    <a href="#" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#is-default-modal">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </apan>
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#is-default-modal">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @else
                                                    <a href="{{route('erp.master.account.edit', $account->id)}}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $account->id }}">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.account.create') }}" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fas fa-plus me-1"></i>
                                Add Account
                            </a>

                            <a href="{{ route('erp.master.account.create') }}" class="btn btn-primary btn-sm d-sm-none me-1">
                                <i class="fas fa-plus"></i>
                            </a>
                            
                            <a href="{{ route('erp.master.account.export') }}" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>

                            <a href="{{ route('erp.master.account.export') }}" class="btn btn-primary btn-sm d-sm-none me-1">
                                <i class="fa fa-print me-0"></i>
                            </a>
                            
                            <button class="btn btn-primary btn-sm d-none d-sm-inline-block me-1" data-bs-toggle="modal" data-bs-target="#filter_account"><i class="fas fa-filter"></i> Filter</button>
                            <button class="btn btn-primary btn-sm d-sm-none me-1" data-bs-toggle="modal" data-bs-target="#filter_account">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>
                    {{-- modals --}}
                    @foreach ($accounts as $key => $account)
                        <div class="modal fade" id="delete-modal-{{ $account->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.master.account.destroy', $account->id)}}" method="POST" class="btn">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Default account group is not be update or delete --}}
                    <div class="modal fade" id="is-default-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-body text-center p-4 pb-5">
                                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                    <h4 class="text-danger">Account cannot be deleted, because it is created by External Module(Due to Default Account)</h4>
                                    <button class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Account Model -->
    <div class="modal fade" id="filter_account" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('erp.master.account.filter') }}" method="GET">
                        @method('GET')
                        <div class="row">
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Account Name</label>
                                <input type="text" name="filter[name]" value="{{old('filter.name')}}" class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Group Name</label>
                                <input type="text" name="filter[account_group.name]" value="{{old('filter.account_group.name')}}" class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">City</label>
                                <input type="text" name="filter[city.name]"class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Opening Balance</label>
                                <input type="text" name="filter[opening_balance]"class="form-control form-control-sm">
                            </div>
                        </div>
                      <input type="submit" id="SaveAreaName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveAreaName" class="btn btn-primary ">OK</label>
                    <a href="{{route('erp.master.account.index')}}" class="btn btn-danger" >Reset</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')
@endsection