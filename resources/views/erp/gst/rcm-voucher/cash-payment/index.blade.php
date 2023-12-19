@extends('erp.app')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item active" aria-current="page">RMC Voucher</li>
                        <li class="breadcrumb-item active" aria-current="page">Cash Payment</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.gst.rcm.cash-payment.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Cash Payment
                            </a>

                            <a href="{{ route('erp.gst.rcm.cash-payment.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Vou No</th>
                                    <th class="bg-primary text-white">Cash Account</th>
                                    <th class="bg-primary text-white">Doc No</th>
                                    <th class="bg-primary text-white">Doc Date</th>
                                    <th class="bg-primary text-white">Opposite A/C</th>
                                    <th class="bg-primary text-white">Amount</th>
                                    <th class="bg-primary text-white">Currancy</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               	@foreach ($cashPayments as $key => $cashPayment)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $cashPayment->date }}</td>
                                        <td>{{ $cashPayment->vou_no }}</td>
                                        <td>{{ $cashPayment->account->name }}</td>
                                        <td>{{ $cashPayment->doc_no }}</td>
                                        <td>{{ $cashPayment->doc_date }}</td>
                                        <td>{{ $cashPayment->opposite_account->name }}</td>
                                        <td>{{ $cashPayment->amount }}</td>
                                        <td>{{ $cashPayment->currency->symbol }}</td>

                                        <td>
                                            <a href="{{route('erp.gst.rcm.cash-payment.edit', $cashPayment->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $cashPayment->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($cashPayments as $key => $cashPayment)
                        <div class="modal fade" id="delete-modal-{{ $cashPayment->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.gst.rcm.cash-payment.destroy', $cashPayment->id)}}" method="POST" class="btn">
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