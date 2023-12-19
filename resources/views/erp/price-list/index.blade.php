@extends('erp.app')
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Price Lists</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.price-list.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Price List
                            </a>

                            <a href="{{ route('erp.master.price-list.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>
                            
                            <a class="btn btn-sm btn-primary d-none d-sm-inline-block ms-3" href="{{ route('erp.master.price-list.export') }}">Print</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Type</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">From</th>
                                    <th class="bg-primary text-white">To</th>
                                    <th class="bg-primary text-white">A/D</th>
                                    <th class="bg-primary text-white">Rate of</th>
                                    <th class="bg-primary text-white">Rate for</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($priceLists as $key => $priceList)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $priceList->sale_purchase == "jobwork_in" ? "Jobwork In" : ($priceList->sale_purchase == "jobwork_out" ? "Jobwork Out" : ucfirst($priceList->sale_purchase)) }}</td>
                                        <td>{{ $priceList->name }}</td>
                                        <td>{{ date('Y-m-d', strtotime($priceList->from)) }}</td>
                                        <td>{{ date('Y-m-d', strtotime($priceList->to)) }}</td>
                                        <td><input id="{{'status_'.$priceList->id}}" type="checkbox" onchange="updateIsAudit({{ $priceList->id }})" value="{{$priceList->id}}" {{ $priceList->active_deactive == 'active' ? 'checked' : ''}}></td>
                                        
                                        <td>{{ $priceList->party_level ? str_replace( array('[', ']', '"' ), ' ',$priceList->party_level) : '' }}</td>
                                        <td>{{ $priceList->product_level ? str_replace( array('[', ']', '"' ), ' ',$priceList->product_level) : '-' }}</td>
                                        <td>
                                            <a href="{{route('erp.master.price-list.edit', $priceList->id)}}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-outline-success d-none">Show</a>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $priceList->id }}">
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </button>
                                            <a class="btn btn-sm btn-outline-danger" href="{{ route('erp.master.price-list.entry.show', $priceList->id)}}">Entry</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($priceLists as $key => $priceList)
                        <div class="modal fade" id="delete-modal-{{ $priceList->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                                        <form action="{{route('erp.master.price-list.destroy', $priceList->id)}}" method="POST" class="btn">
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
<script type="text/javascript">
    function updateIsAudit(id) {
            var active_deactive = 0;
            if ($("#status_" + id).prop("checked") == true) {
                active_deactive = 1;
            }
            $.ajax({
                 type: "post",
                 url: "{{ route('erp.master.price-list.active-deactive')}}",
                 data: {_token: '{{ csrf_token() }}', id:id, active_deactive:active_deactive},  
                 success: function() {
                    
                 }
            }); 
        }
</script>
@endsection