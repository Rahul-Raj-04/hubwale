<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                    <li class="breadcrumb-item"><a href="#">Stock Report</a></li>
                    <li class="breadcrumb-item"><a href="#">Product Ledger</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Show</li>
                </ol>
                <div class="col-auto ms-auto d-print-none d-flex pe-0">
                    <div class="btn-list">
                        <a href="{{ route('erp.report.stock-report.product-ledger.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>
                        <a href="{{ route('erp.report.stock-report.product-ledger.index') }}" class="btn btn-sm btn-default d-sm-none mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body p-2">
                <form>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>{{ $product->name }}</h4>
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-1">
                            <label>From</label>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control form-control-sm">
                        </div>
                        
                        <div class="col-md-1">
                            <label>To</label>
                        </div>
                        <div class="col-md-2">
                            <input type="date" class="form-control form-control-sm">
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Bill Date</th>
                                <th class="bg-primary text-white">Type</th>
                                <th class="bg-primary text-white">Vou No</th>
                                <th class="bg-primary text-white">Receipt Qty</th>
                                <th class="bg-primary text-white">Amount</th>
                                <th class="bg-primary text-white">Issue Qty</th>
                                <th class="bg-primary text-white">Amount</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productEntries as $key => $productEntry)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ array_key_exists('vou_date', $productEntry) ? $productEntry['vou_date'] : $productEntry['bill_date']}}</td>
                                    <td>{{ $productEntry['type'] == 'purchase_invoice' || $productEntry['type'] == 'purchase_return' || $productEntry['type'] == 'cheque_from_purchase' ? 'Purc' : 'Sale' }}</td>
                                    <td>{{ $productEntry['bill_no']}}</td>
                                    <td>{{ $productEntry['type'] == 'purchase_invoice' || $productEntry['type'] == 'purchase_return' || $productEntry['type'] == 'cheque_from_purchase' ? $productEntry['qty'] : ''}}</td>
                                    <td>{{ $productEntry['type'] == 'purchase_invoice' || $productEntry['type'] == 'purchase_return' || $productEntry['type'] == 'cheque_from_purchase' ? $productEntry['amount'] : ''}}</td>
                                    <td>{{ $productEntry['type'] == 'sales_invoice' || $productEntry['type'] == 'sales_return' ? $productEntry['qty'] : ''}}</td>
                                    <td>{{ $productEntry['type'] == 'sales_invoice' || $productEntry['type'] == 'sales_return' ? $productEntry['amount'] : ''}}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" wire:click="edit({{$key}})">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{$key}}">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><b>Total</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>{{ $receipt_qty_total }}</b></td>
                                <td><b>{{ $receipt_amount_total }}</b></td>
                                <td><b>{{ $issue_qty_total }}</b></td>
                                <td><b>{{ $issue_amount_total }}</b></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-sm-none me-1">
                                <i class="fa fa-print me-0"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Vou.Cancel
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Detail
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Setup
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Audit
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Date
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Filter
                            </a>
                            
                            <a href="#" class="btn btn-primary btn-sm me-1">
                                Order
                            </a>
                        </div>
                    </div>
                </div>

                {{-- modals --}}
                @foreach($productEntries as $deleteKey => $productEntry)
                    <div class="modal fade" id="delete-modal-{{ $deleteKey }}">
                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-body text-center p-4 pb-5">
                                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                    <h4 class="text-danger">Are you sure you want to delete?</h4>
                                    <button class="btn btn-danger pd-x-25" wire:click="delete({{ $deleteKey }})" data-bs-dismiss="modal"
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