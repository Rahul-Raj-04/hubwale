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
                        <div class="col-auto ms-auto d-print-none pe-0">
                            <div class="d-flex">
                                <div class="btn-list">
                                    <a href="{{ route('erp.report.account-book.cash-book.index') }}" class="btn btn-sm btn-default d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i>{{ __('lang.cancel') }}</a>
                                    <a href="#" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                                    <button class="btn btn-sm btn btn-sm btn-primary d-none me-3">Export</button>
                                    <a href="#" class=" btn btn-sm btn btn-sm btn-primary me-0 d-none">
                                        <i class="fas fa-plus me-1"></i>
                                        {{ __('lang.add') }}
                                    </a>

                                    <a href="" class="btn btn-sm btn btn-sm btn-primary d-sm-none me-0">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <div class="row mb-5">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <h6 class="mb-0">Ledger : {{$account->name}}</h6>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="mb-0">Group : {{$account->account_group->name}}</h6>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Type</th>
                                    <th class="bg-primary text-white">Vou/Doc No</th>
                                    <th class="bg-primary text-white">Account Name</th>
                                    <th class="bg-primary text-white">Credit</th>
                                    <th class="bg-primary text-white">Debit</th>
                                    <th class="bg-primary text-white">Closing Balance</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($account_ledgers as $account_ledger)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $account_ledger->type == 'opening_balance' ? '' : $account_ledger->date }}</td>
                                        <td>{{ $account_ledger->type == 'opening_balance' ? '' : $account_ledger->type }}</td>
                                        <td>{{ $account_ledger->type == 'opening_balance' ? '' : $account_ledger->vou_doc_no }}</td>
                                        <td>
                                            @if($account_ledger->type != 'opening_balance')
                                                @if($account_ledger->opposite_account)
                                                    {{$account_ledger->opposite_account->name}}
                                                @else
                                                    @if($account_ledger->model_name == 'JournalEntry')
                                                        @foreach($account_ledger->model as $journalEntry)
                                                            @if($journalEntry->account->id != $account_ledger->account_id)
                                                                <div> {{ $journalEntry->account->name }}</div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $account_ledger->balance_type == 'credit' ? $account_ledger->balance : '' }}</td>
                                        <td>{{ $account_ledger->balance_type == 'debit' ? $account_ledger->balance : '' }}</td>
                                        <td class="{{ $account_ledger->closing_balance < 0 ? 'text-danger' : ''}}">{{ ucfirst(str_replace( '-', '', $account_ledger->closing_balance)) }}</td>
                                        <td>
                                            <a href="{{route('erp.report.account-book.cash-book.edit', $account_ledger->id)}}?account_id={{$account->id}}" class="{{$account_ledger->type == 'opening_balance' ? 'd-none' : ''}} btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger {{$account_ledger->type == 'opening_balance' ? 'd-none' :''}}" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $account_ledger->id }}">
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
                    @foreach($account_ledgers as $account_ledger)
                        <div class="modal fade" id="delete-modal-{{ $account_ledger->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{ route('erp.report.account-book.cash-book.destroy', $account_ledger->id) }}" method="POST" class="btn">
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