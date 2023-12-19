@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Multi Currency</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rate Exchange Master</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.multi-currency.rate-exchange-master.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Rate Exchange Master
                            </a>
                            <a href="{{ route('erp.master.multi-currency.rate-exchange-master.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Symbol</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Standard Rate</th>
                                    <th class="bg-primary text-white">Selling Rate</th>
                                    <th class="bg-primary text-white">Buying Rate</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               	@foreach ($rateExchangeMasters as $key => $rateExchangeMaster)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $rateExchangeMaster->currency_master->symbol }}</td>
                                        <td>{{ $rateExchangeMaster->date }}</td>
                                        <td>{{ floatval($rateExchangeMaster->standard_rate) }}</td>
                                        <td>{{ floatval($rateExchangeMaster->selling_rate) }}</td>
                                        <td>{{ floatval($rateExchangeMaster->buyung_rate) }}</td>
                                        <td>

                                            <a href="{{route('erp.master.multi-currency.rate-exchange-master.edit', $rateExchangeMaster->id)}}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $rateExchangeMaster->id }}">
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
                    @foreach ($rateExchangeMasters as $key => $rateExchangeMaster)
                        <div class="modal fade" id="delete-modal-{{ $rateExchangeMaster->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.master.multi-currency.rate-exchange-master.destroy', $rateExchangeMaster->id)}}" method="POST" class="btn">
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