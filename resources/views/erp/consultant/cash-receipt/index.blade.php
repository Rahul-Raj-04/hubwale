@extends('erp.app')
@section('content')

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Cash Receipt</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cash Receipt</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Cash Receipt</h3>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.consultant.cash-receipt.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Cash Receipt
                            </a>

                            <a href="{{ route('erp.consultant.cash-receipt.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Cash Account</th>
                                    <th class="bg-primary text-white"></th>
                                    <th class="bg-primary text-white">Vou No</th>
                                    <th class="bg-primary text-white">Opposite A/c.</th>
                                    <th class="bg-primary text-white">Amount</th>
                                    <th class="bg-primary text-white">Currency</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cashReceipts as $key => $cashReceipt)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ date('d-m-Y', strtotime($cashReceipt->date)) }}</td>
                                        <td>{{ $cashReceipt->account->name }}</td>
                                        <td><input id="{{'is_audit_'.$cashReceipt->id}}" type="checkbox" onchange="updateIsAudit({{ $cashReceipt->id }})" value="{{$cashReceipt->id}}" {{ $cashReceipt->is_audit == 1 ? 'checked' : ''}}></td>
                                        <td>{{ $cashReceipt->vou_no }}</td>
                                        <td>{{ $cashReceipt->opposite_account->name }}</td>
                                        <td>{{ $cashReceipt->amount }}</td>
                                        <td>{{ $cashReceipt->currency->symbol }}</td>
                                        <td>
                                            <div class="{{ $cashReceipt->is_audit == 1 ? '' : 'd-none'}} not-edited" id="{{'not-edited-'.$cashReceipt->id}}">
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
                                            <div class="{{ $cashReceipt->is_audit == 1 ? 'd-none' : ''}}" id="{{'edited-'.$cashReceipt->id}}">
                                                <a href="{{ route('erp.consultant.cash-receipt.edit', $cashReceipt->id) }}" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $cashReceipt->id }}">
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
                    @foreach ($cashReceipts as $key => $cashReceipt)
                        <div class="modal fade" id="delete-modal-{{ $cashReceipt->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.consultant.cash-receipt.destroy', $cashReceipt->id)}}" method="POST" class="btn">
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

@endsection

@section('customJs')
    <script type="text/javascript">
        function updateIsAudit(id) {
            var is_audit = 0;
            if ($("#is_audit_" + id).prop("checked") == true) {
                is_audit = 1
                $('#not-edited-' + id).removeClass('d-none');
                $('#edited-' + id).addClass('d-none');
            } else {
                $('#edited-' + id).removeClass('d-none');
                $('#not-edited-' + id).addClass('d-none');
            }
            $.ajax({
                 type: "post",
                 url: "{{ route('erp.consultant.cash-receipt.update-is-audit')}}",
                 data: {_token: '{{ csrf_token() }}', id:id, is_audit:is_audit},  
                 success: function() {
                    
                 }
            }); 
        }
    </script>
@endsection