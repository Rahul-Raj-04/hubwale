@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Journal Entry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ ucfirst(str_replace( '_', ' ', $vouType)) }}</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.account-transaction.journal-entry.create', ['vouType' => $vouType]) }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add {{ ucfirst(str_replace( '_', ' ', $vouType)) }}
                            </a>
                            <a href="{{ route('erp.account-transaction.journal-entry.create', ['vouType' => $vouType]) }}" class="btn btn-sm btn-primary d-sm-none me-0">
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
                                    <th class="bg-primary text-white">Voucher No</th>
                                    <th class="bg-primary text-white"></th>
                                    <th class="bg-primary text-white">Account Name</th>
                                    <th class="bg-primary text-white">C/D</th>
                                    <th class="bg-primary text-white">Amount</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($journalEntries as $key => $journalEntry)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d-m-Y', strtotime($journalEntry->vou_date)) }}</td>
                                        <td>{{ $journalEntry->vou_no }}</td>
                                        <td><input class="{{'is_audit_'.$journalEntry->group_id}}" id="{{'is_audit_'.$journalEntry->id}}" type="checkbox" onchange="updateIsAudit({{ $journalEntry->id }}, {{ $journalEntry->group_id }})" value="{{$journalEntry->id}}" {{ $journalEntry->is_audit == 1 ? 'checked = checked' : ''}}></td>
                                        <td>{{ $journalEntry->account->name }}</td>
                                        <td>{{ $journalEntry->balance_type }}</td>
                                        <td>{{ $journalEntry->credit ? $journalEntry->credit : $journalEntry->debit }}</td>
                                        <td>
                                            <div class="{{ $journalEntry->is_audit == 1 ? '' : 'd-none'}} {{'not-edited-'.$journalEntry->group_id}}">
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
                                            <div class="{{ $journalEntry->is_audit == 1 ? 'd-none' : ''}} {{'edited-'.$journalEntry->group_id}}">
                                                <a href="{{route('erp.account-transaction.journal-entry.edit', [$journalEntry->id, 'vouType' => $vouType])}}" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $journalEntry->id }}">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($journalEntries as $key => $journalEntry)
                        <div class="modal fade" id="delete-modal-{{ $journalEntry->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.account-transaction.journal-entry.destroy', [$journalEntry->group_id, 'vouType' => $vouType])}}" method="POST" class="btn">
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

    <!-- Is Audit Alert -->
    <div class="modal fade" id="is-audit-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger">Audited voucher can not be  modified or deleted</h4>
                    <button class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Ok</button>
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
                    <form action="{{ route('erp.account-transaction.journal-entry.filter') }}" method="GET">
                        @method('GET')
                        <div class="row">
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Date</label>
                                <input type="date" name="filter[vou_date]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Voucher No</label>
                                <input type="text" name="filter[vou_no]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Account Name</label>
                                <input type="text" name="filter[account.name]" class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">C/D</label>
                                <input type="text" name="filter[balance_type]" class="form-control form-control-sm">
                            </div>

                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Currency</label>
                                <input type="text" name="filter[currency.symbol]"class="form-control form-control-sm">
                            </div>
                        </div>
                        <input type="hidden" name="vouType" value="{{ $vouType }}" class="d-none">
                        <input type="submit" id="SaveAreaName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveAreaName" class="btn btn-primary ">OK</label>
                    <a href="{{route('erp.account-transaction.journal-entry.index')}}" class="btn btn-danger" >Reset</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script type="text/javascript">
        function updateIsAudit(id, group_id) {
            var is_audit = 0;
            if ($("#is_audit_" + id).prop("checked") == true) {
                is_audit = 1;
                $(".is_audit_" + group_id).prop('checked', true)
                $('.not-edited-' + group_id).removeClass('d-none');
                $('.edited-' + group_id).addClass('d-none');
            } else {
                $(".is_audit_" + group_id).prop('checked', false)
                $('.edited-' + group_id).removeClass('d-none');
                $('.not-edited-' + group_id).addClass('d-none');
            }
            $.ajax({
                 type: "post",
                 url: "{{ route('erp.account-transaction.journal-entry.update-is-audit')}}",
                 data: {_token: '{{ csrf_token() }}', group_id:group_id, is_audit:is_audit},  
                 success: function() {
                    
                 }
            }); 
        }
    </script>
@endsection