@extends('erp.app')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST Entry</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Utilization Entry</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.gst.gst-entry.utilization-entry.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Utilization Entry
                            </a>

                            <a href="{{ route('erp.gst.gst-entry.utilization-entry.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Vou no</th>
                                    <th class="bg-primary text-white">Utilization From</th>
                                    <th class="bg-primary text-white">From A/C</th>
                                    <th class="bg-primary text-white">Utilization For</th>
                                    <th class="bg-primary text-white">For A/C</th>
                                    <th class="bg-primary text-white">Amount</th>
                                    <th class="bg-primary text-white">From Date</th>
                                    <th class="bg-primary text-white">To Date</th>
                                    <th class="bg-primary text-white">Utilization Type</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($utilizationEntries as $key => $utilizationEntrie)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{  date('d-m-Y', strtotime($utilizationEntrie->date)) }}</td>
                                        <td>{{ $utilizationEntrie->vou_no }}</td>
                                        <td>{{ $utilizationEntrie->utilization_from }}</td>
                                        <td>{{ $utilizationEntrie->from_account->name }}</td>
                                        <td>{{ $utilizationEntrie->utilization_for }}</td>
                                        <td>{{ $utilizationEntrie->for_account->name }}</td>
                                        <td>{{ $utilizationEntrie->amount }}</td>
                                        <td>{{ date('01-m-Y', strtotime($utilizationEntrie->period_of_utilization)) }}</td>
                                        <td>{{ date('t-m-Y', strtotime($utilizationEntrie->period_of_utilization)) }}</td>
                                        <td>{{ $utilizationEntrie->utilization_type }}</td>
                                        <td>
                                            <a href="{{route('erp.gst.gst-entry.utilization-entry.edit', $utilizationEntrie->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $utilizationEntrie->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- modals --}}
                    @foreach ($utilizationEntries as $key => $utilizationEntrie)
                        <div class="modal fade" id="delete-modal-{{ $utilizationEntrie->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.gst.gst-entry.utilization-entry.destroy', $utilizationEntrie->id)}}" method="POST" class="btn">
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