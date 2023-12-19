@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cash Book</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.account.create', ['add_type' => 'cash_book']) }}" class="btn btn-sm btn-primary d-none me-0 d-sm-inline-block">
                                <i class="fas fa-plus me-1"></i>
                                {{ __('lang.add') }}
                            </a>
                            <a href="{{ route('erp.master.account.create', ['add_type' => 'cash_book']) }}" class="btn btn-sm btn-primary me-0 d-sm-none">
                                <i class="fas fa-plus me-1"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Cash Account Name</th>
                                <th class="bg-primary text-white">Closing Mount</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accounts as $account)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $account->name }}</td>
                                    <td class="{{ ($account->ledger_account_balance->last() ? $account->ledger_account_balance->last()->closing_balance < 0 : false)  ? 'text-danger' : ''}}">{{ count($account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $account->ledger_account_balance->last()->closing_balance)) : '' }}
                                    </td>
                                    <td>
                                        <a href="{{route('erp.report.account-book.cash-book.show', $account->id)}}" class="btn btn-sm btn-outline-success">Show</a>
                                        @if($account->is_default)
                                            <a href="{{ route('erp.master.account.edit', $account->id) }}?edit_type=cash_book" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#is-default-modal">
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
                                            <a href="{{ route('erp.master.account.edit', $account->id) }}?edit_type=cash_book" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
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
            </div>
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

@endsection

@section('customJs')
@endsection