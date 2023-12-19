@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Day Book</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list d-none">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#voucher-type" class="btn btn-sm btn btn-sm btn-primary d-none me-0 d-sm-inline-block">
                                <i class="fas fa-plus me-1"></i>
                                {{ __('lang.add') }}
                            </a>
                            <a href="" class="btn btn-sm btn btn-sm btn-primary me-0 d-sm-none">
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
                                <th class="bg-primary text-white">Date</th>
                                <th class="bg-primary text-white">Type</th>
                                <th class="bg-primary text-white">Vou No</th>
                                <th class="bg-primary text-white">Account Name</th>
                                <th class="bg-primary text-white">Credit</th>
                                <th class="bg-primary text-white">Debit</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ledgerAccountBalances as $ledgerAccountBalance)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $ledgerAccountBalance->date }}</td>
                                    <td>{{ $ledgerAccountBalance->type }}</td>
                                    <td>{{ $ledgerAccountBalance->vou_doc_no }}</td>
                                    <td>
                                        @if($ledgerAccountBalance->type != 'opening_balance')
                                            @if($ledgerAccountBalance->opposite_account)
                                                {{$ledgerAccountBalance->opposite_account->name}}
                                            @else
                                                @if($ledgerAccountBalance->model_name == 'JournalEntry')
                                                    @foreach($ledgerAccountBalance->model as $journalEntry)
                                                        @if($journalEntry->account->id != $ledgerAccountBalance->account_id)
                                                            <div> {{ $journalEntry->account->name }}</div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $ledgerAccountBalance->balance_type == 'credit' ? $ledgerAccountBalance->balance : ''}}</td>
                                    <td>{{ $ledgerAccountBalance->balance_type == 'debit' ? $ledgerAccountBalance->balance : ''}}</td>
                                    <td>
                                        <a href="{{route('erp.report.account-book.day-book.edit', $ledgerAccountBalance->id)}}" class="{{$ledgerAccountBalance->type == 'opening_balance' ? 'd-none' : ''}} btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger {{$ledgerAccountBalance->type == 'opening_balance' ? 'd-none' :''}}" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $ledgerAccountBalance->id }}">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="modal fade" id="voucher-type" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Voucher Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group mt-2">
                            <label for="category_short_name">Select Voucher Type</label>
                            <select class="form-control">
                                <option>Select Voucher Type</option>
                                <option>Test 1</option>
                                <option>Test 2</option>
                                <option>Test 3</option>
                                <option>Test 4</option>
                                <option>Test 5</option>
                            </select>
                        </div>
                        <input type="submit" id="submit" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="submit" class="btn btn-sm btn-primary ">OK</label>
                </div>
            </div>
        </div>
    </div> -->
    {{-- modals --}}
    @foreach($ledgerAccountBalances as $ledgerAccountBalance)
        <div class="modal fade" id="delete-modal-{{ $ledgerAccountBalance->id }}">
            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body text-center p-4 pb-5">
                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                        <form action="{{ route('erp.report.account-book.day-book.destroy', $ledgerAccountBalance->id) }}" method="POST" class="btn">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@section('customJs')
@endsection