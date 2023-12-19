@extends('erp.app')
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item active" aria-current="page">GST Commodity</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.gst.gst-commodity.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add GST Commodity
                            </a>

                            <a href="{{ route('erp.gst.gst-commodity.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
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
                                    <th class="bg-primary text-white">Commodity Type</th>
                                    <th class="bg-primary text-white">Description</th>
                                    <th class="bg-primary text-white">Hsn Sac</th>
                                    <th class="bg-primary text-white">GST Slab</th>
                                    <th class="bg-primary text-white">Applied_At</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               	@foreach ($gstCommodities as $key => $gstCommodity)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ ucfirst($gstCommodity->commodity_type) }}</td>
                                        <td>{{ $gstCommodity->description }}</td>
                                        <td>{{ $gstCommodity->hsn_sac ? $gstCommodity->hsn_sac->number : '-' }}</td>
                                        <td>{{ $gstCommodity->gst_slab ? $gstCommodity->gst_slab->gst_slab : '-' }}</td>
                                        <td>{{  date('d-M-Y', strtotime($gstCommodity->applied_at)) }}</td>
                                        
                                        <td>
                                            <a href="{{route('erp.gst.gst-commodity.edit', $gstCommodity->id)}}" class="btn btn-sm btn-outline-info">Edit</a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $gstCommodity->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- modals --}}
                    @foreach ($gstCommodities as $key => $gstCommodity)
                        <div class="modal fade" id="delete-modal-{{ $gstCommodity->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.gst.gst-commodity.destroy', $gstCommodity->id)}}" method="POST" class="btn">
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