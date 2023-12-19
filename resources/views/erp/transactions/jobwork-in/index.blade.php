@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        @if (in_array(Request::get('type'), \App\Enum\Enum::MASTER_JOBWORK_IN_OUT_TYPES)) 
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Other Info</a></li>
                        @else
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Transactions</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Jobwork In</a></li>
                        @endif
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ ucfirst(str_replace( '_', ' ', Request::get('type'))) }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.account-transaction.jobwork-in.create', ['type' => Request::get('type'), 'module' => Request::get('module')]) }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add {{ ucfirst(str_replace(['jobwork_in_', 'jobwork_out_', '_', ], ' ', Request::get('type'))) }}
                            </a>

                            <a href="{{ route('erp.account-transaction.jobwork-in.create', ['type' => Request::get('type'), 'module' => Request::get('module')]) }}" class="btn btn-sm btn-primary d-sm-none me-0">
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
                                    <th class="bg-primary text-white"></th>
                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER_OPENING)
                                        <th class="bg-primary text-white">Date</th>
                                        <th class="bg-primary text-white">Order No</th>
                                    @endif
                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE_OTHER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT_OPENING)
                                        <th class="bg-primary text-white">Date</th>
                                        <th class="bg-primary text-white">challan no</th>
                                    @endif

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION_OPENING)
                                        <th class="bg-primary text-white">Date</th>
                                        <th class="bg-primary text-white">Voucher No</th>
                                    @endif

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_BILLING)
                                        <th class="bg-primary text-white">Date</th>
                                        <th class="bg-primary text-white">billing no</th>
                                    @endif

                                    <th class="bg-primary text-white">account name</th>
                                    <th class="bg-primary text-white">city</th>

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_BILLING ||  Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER_OPENING)
                                        <th class="bg-primary text-white">Amount</th>
                                    @endif

                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $val)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><input class="{{'is_audit_'.$val->group_id}}" id="{{'is_audit_'.$val->id}}" type="checkbox" onchange="updateIsAudit({{ $val->id }}, {{ $val->group_id }})" value="{{$val->id}}" {{ $val->is_audit == 1 ? 'checked = checked' : ''}}></td>

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER_OPENING)
                                        <td>{{  date('d-m-Y', strtotime($val->order_date)) }}</td>
                                        <td>{{ $val->order_no }}</td>
                                    @endif
                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE_OTHER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT_OPENING)
                                        <td>{{  date('d-m-Y', strtotime($val->challan_date)) }}</td>
                                        <td>{{ $val->challan_no }}</td>
                                    @endif

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION_OPENING)
                                        <td>{{  date('d-m-Y', strtotime($val->voucher_date)) }}</td>
                                        <td>{{ $val->voucher_no }}</td>
                                    @endif

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_BILLING)
                                        <td>{{  date('d-m-Y', strtotime($val->voucher_date)) }}</td>
                                        <td>{{ $val->bill_no }}</td>
                                    @endif

                                        <td>{{ $val->account->name }}</td>
                                        <td>{{ $val->account->city->name ?? '-' }}</td>

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_BILLING)
                                        <td>{{ $val->amount }}</td>
                                    @endif

                                    @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER_OPENING)
                                        <td>{{ $val->qty*$val->jobwork_rate }}</td>
                                    @endif

                                        <td>
                                            <div class="{{ $val->is_audit == 1 ? '' : 'd-none'}} {{'not-edited-'.$val->group_id}}">
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
                                            <div class="{{ $val->is_audit == 1 ? 'd-none' : ''}} {{'edited-'.$val->group_id}}">
                                                <a href="{{route('erp.account-transaction.jobwork-in.edit', [ 'jobwork_in' => $val->id, 'type' => Request::get('type'), 'module' => Request::get('module')])}}" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $val->id }}">
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
                    @foreach ($data as $key => $val)
                        <div class="modal fade" id="delete-modal-{{ $val->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{ route('erp.account-transaction.jobwork-in.destroy', [ 'jobwork_in' => $val->id, 'type' => Request::get('type'), 'module' => Request::get('module')]) }}" method="POST" class="btn">
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
                    <form action="{{ route('erp.account-transaction.jobwork-in.filter') }}" method="GET">
                        @method('GET')
                        <div class="row">
                            @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ORDER_OPENING)
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">Date</label>
                                    <input type="date" name="filter[order_date]" class="form-control form-control-sm">
                                </div>
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">Order No</label>
                                    <input type="text" name="filter[order_no]" class="form-control form-control-sm">
                                </div>
                            @endif
                            @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_ISSUE_OTHER || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_RECEIPT_OPENING)
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">Date</label>
                                    <input type="date" name="filter[challan_date]" class="form-control form-control-sm">
                                </div>
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">challan no</label>
                                    <input type="text" name="filter[challan_no]" class="form-control form-control-sm">
                                </div>
                            @endif

                            @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION || Request::get('type') == \App\Enum\Enum::JOBWORK_IN_PRODUCTION_OPENING)
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">Date</label>
                                    <input type="date" name="filter[voucher_date]" class="form-control form-control-sm">
                                </div>
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">Vaucher no</label>
                                    <input type="text" name="filter[voucher_no]" class="form-control form-control-sm">
                                </div>
                            @endif

                            @if(Request::get('type') == \App\Enum\Enum::JOBWORK_IN_BILLING)
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">Date</label>
                                    <input type="date" name="filter[voucher_date]" class="form-control form-control-sm">
                                </div>
                                <div class="form-group col-md-6  mb-4">
                                    <label for="type" class="form-label">Billing no</label>
                                    <input type="text" name="filter[billing_no]" class="form-control form-control-sm">
                                </div>
                            @endif
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">Account Name</label>
                                <input type="text" name="filter[account.name]" class="form-control form-control-sm">
                            </div>
                            <div class="form-group col-md-6  mb-4">
                                <label for="type" class="form-label">City</label>
                                <input type="text" name="filter[account.city.name]"class="form-control form-control-sm">
                            </div>
                            
                        </div>
                      <input type="text" value="{{Request::get('type')}}" name="type" class="d-none">
                      <input type="submit" id="SaveAreaName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveAreaName" class="btn btn-primary ">OK</label>
                    <a href="{{ route('erp.account-transaction.jobwork-in.index', ['type' => Request::get('type'), 'module' => Request::get('module')]) }}" class="btn btn-danger" >Reset</a>
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
                 url: "{{ route('erp.account-transaction.jobwork-in.update-is-audit')}}",
                 data: {_token: '{{ csrf_token() }}', group_id:group_id, is_audit:is_audit},  
                 success: function() {
                    
                 }
            }); 
        }
    </script>
@endsection