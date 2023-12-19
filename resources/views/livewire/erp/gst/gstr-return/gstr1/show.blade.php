<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST Return</a></li>
                        <li class="breadcrumb-item active" aria-current="page">GSTR 1</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list d-none">
                        	<div class="d-flex">
                            	<form class="me-2">
    	                            	<input type="month" class="form-control form-control-sm btn d-none d-sm-inline-block" 
    	                                wire:model="date">
                            	</form>
		                        <!-- <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" wire:click="export">Export</button> -->
	                        </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if($gstr1_type == 'Business to consumer summary')
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">Type</th>
                                        <th class="bg-primary text-white">Place Of Supply</th>
                                        <th class="bg-primary text-white">Invoice Number</th>
                                        <th class="bg-primary text-white">Invoice Date</th>
                                        <th class="bg-primary text-white">Party Name</th>
                                        <th class="bg-primary text-white">Invoice Value</th>
                                        <th class="bg-primary text-white">Rate</th>
                                        <th class="bg-primary text-white">Taxable Value</th>
                                        <th class="bg-primary text-white">Integreted Tax</th>
                                        <th class="bg-primary text-white">Central Tax</th>
                                        <th class="bg-primary text-white">State/UT Tax</th>
                                        <th class="bg-primary text-white">E-Commerce GSTIN No</th>
                                        <th class="bg-primary text-white">Supply Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>OE</td>
                                        <td>{{ $saleEntry->party_ac->state ? $saleEntry->party_ac->state->name : '' }}</td>
                                        <td>{{ $saleEntry->bill_no }}</td>
                                        <td>{{ $saleEntry->bill_date }}</td>
                                        <td>{{ $saleEntry->party_ac->name }}</td>
                                        <td>{{ $saleEntry->total_invoice_value }}</td>
                                        <td>{{ $saleEntry->erp_product->gst_commodity ? $saleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                        <td>{{ $saleEntry->sale_purchase_taxe->central_tax + $saleEntry->sale_purchase_taxe->state_ut_tax }}</td>
                                        <td>{{ $saleEntry->sale_purchase_taxe->central_tax }}</td>
                                        <td>{{ $saleEntry->sale_purchase_taxe->state_ut_tax }}</td>
                                        <td></td>
                                        <td>Intra</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
    window.addEventListener('data-table', event => {
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
</section>