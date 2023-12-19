<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                    <li class="breadcrumb-item"><a href="#">Stock Report</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Ledger</li>
                </ol>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Product name</th>
                                <th class="bg-primary text-white">Category Alias</th>
                                <th class="bg-primary text-white">Group Alias</th>
                                <th class="bg-primary text-white">Op.Qty</th>
                                <th class="bg-primary text-white">Closing Qty</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category ? $product->category->short_name : ''}}</td>
                                    <td>{{ $product->group ? $product->group->short_name : ''}}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" wire:click="edit({{ $product->id }})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('erp.report.stock-report.product-ledger.show', $product->id) }}" class="btn btn-sm btn-outline-success">Show</a>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $product->id }}">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.product.create', ['return_type' => 'product_ledger']) }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-1">
                                <i class="fas fa-plus me-1"></i>
                                Add
                            </a>

                            <a href="#" class="btn btn-sm btn-primary d-sm-none me-1">
                                <i class="fas fa-plus"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-sm-none me-1">
                                <i class="fa fa-print me-0"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Tabular
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                User Field
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Master
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Filter
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Date
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Order
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Format
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Next
                            </a>
                        </div>
                    </div>
                </div>

                {{-- modals --}}
                @foreach($products as $product)
                    <div class="modal fade" id="delete-modal-{{ $product->id }}">
                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-body text-center p-4 pb-5">
                                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                    <h4 class="text-danger">Are you sure you want to delete?</h4>
                                    <button class="btn btn-danger pd-x-25" wire:click="delete({{ $product->id }})" data-bs-dismiss="modal"
                                        aria-label="Close">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('entry_table', event => {
        $(".datatable-common1").DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            paging: false,
            ordering: false,
            info: false,
            sScrollY : 350,
            searching:true,
            sScrollX : true,
            scrollX : true,
        });
        $('.datatable-common1').addClass('mt-2');
        $('.datatable-common1').css("width","100%");
        $('.dataTables_scrollHeadInner').css("width","100%");
    });

    $(document).ready(function() {
        $(".datatable-common1").DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            paging: false,
            ordering: false,
            info: false,
            sScrollY : 350,
            searching:true,
            sScrollX : true,
            scrollX : true,
        });
        $('.datatable-common1').addClass('mt-2');
        $('.datatable-common1').css("width","100%");
        $('.dataTables_scrollHeadInner').css("width","100%");
    });

</script>