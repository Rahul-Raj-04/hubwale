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
                    <form>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-control form-select form-control-sm" wire:model="gstr1_type">
                                    <option value="Summary For B2B">Summary For B2B, SEZ, DE(4A, 4B, 6B, 6C)</option>
                                    <option value="Business to consumer summary">Business to consumer summary</option>
                                    <option value="Credit note to registered">Credit note to registered customer</option>
                                    <option value="Credit note to UN-registered">Credit note to UN-registered customer</option>
                                    <option value="Export">Export</option>
                                    <option value="Summary Of documents">Summary Of documents</option>
                                </select>
                            </div>
                            <div class="col-auto"></div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 col-form-label text-end">
                                        Return period
                                    </div>
                                    <div class="col-md-6">
                                        <select wire:model="return_period" class="form-control form-select form-control-sm" name="return_period">
                                            @foreach (getReportPeriod($report_period) as $monthId => $month)
                                                <option value="{{ $monthId }}">{{ $month }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 col-form-label text-end">
                                        From
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control form-control-sm" id="from" name="from">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 col-form-label text-end">
                                        To
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control form-control-sm" type="date" name="to">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if($gstr1_type == 'Summary For B2B')
                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white">GSTIN Status</th>
                                        <th class="bg-primary text-white">GSTIN/UIN of Recipient</th>
                                        <th class="bg-primary text-white">Party Name</th>
                                        <th class="bg-primary text-white">City Name</th>
                                        <th class="bg-primary text-white">Invoice Number</th>
                                        <th class="bg-primary text-white">Invoice Date</th>
                                        <th class="bg-primary text-white">Invoice Value</th>
                                        <th class="bg-primary text-white">Place of Supply</th>
                                        <th class="bg-primary text-white">Reverse Charge</th>
                                        <th class="bg-primary text-white">Invoice Type</th>
                                        <th class="bg-primary text-white">E-Commerce GSTIN No</th>
                                        <th class="bg-primary text-white">Rate</th>
                                        <th class="bg-primary text-white">Taxable Value</th>
                                        <th class="bg-primary text-white">Integrated Tax</th>
                                        <th class="bg-primary text-white">Central Tax</th>
                                        <th class="bg-primary text-white">State/UT Tax</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($saleEntries as $saleEntry)
                                        <tr>
                                            <td></td>
                                            <td>{{ $saleEntry->party_ac->gstin_no }}</td>
                                            <td>{{ $saleEntry->party_ac->name }}</td>
                                            <td>{{ $saleEntry->party_ac->city ? $saleEntrie->party_ac->city->name : '' }}</td>
                                            <td>{{ $saleEntry->bill_no}}</td>
                                            <td>{{ $saleEntry->bill_date }}</td>
                                            <td>{{ $saleEntry->total_amount }}</td>
                                            <td>{{ $saleEntry->party_ac->state ? $saleEntrie->party_ac->state->name : '' }}</td>
                                            <td></td>
                                            <td>Regular B2B</td>
                                            <td></td>
                                            <td>{{ $saleEntry->erp_product->gst_commodity ? $saleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                            <td>{{ $saleEntry->amount }}</td>
                                            <td></td>
                                            <td>{{ $saleEntry->sale_purchase_taxe->central_tax }}</td>
                                            <td>{{ $saleEntry->sale_purchase_taxe->state_ut_tax }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @elseif($gstr1_type == 'Business to consumer summary')
                        @if($showB2csEntry)
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
                                            <td>{{ $b2csSaleEntry->party_ac->state ? $b2csSaleEntry->party_ac->state->name : '' }}</td>
                                            <td>{{ $b2csSaleEntry->bill_no }}</td>
                                            <td>{{ $b2csSaleEntry->bill_date }}</td>
                                            <td>{{ $b2csSaleEntry->party_ac->name }}</td>
                                            <td>{{ $b2csSaleEntry->total_invoice_value }}</td>
                                            <td>{{ $b2csSaleEntry->erp_product->gst_commodity ? $b2csSaleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                            <td>{{ $b2csSaleEntry->sale_purchase_taxe->central_tax + $b2csSaleEntry->sale_purchase_taxe->state_ut_tax }}</td>
                                            <td></td>
                                            <td>{{ $b2csSaleEntry->sale_purchase_taxe->central_tax }}</td>
                                            <td>{{ $b2csSaleEntry->sale_purchase_taxe->state_ut_tax }}</td>
                                            <td></td>
                                            <td>Intra</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">Type</th>
                                            <th class="bg-primary text-white">Place of Supply</th>
                                            <th class="bg-primary text-white">Rate</th>
                                            <th class="bg-primary text-white">Taxable Value</th>
                                            <th class="bg-primary text-white">Integrated Tax</th>
                                            <th class="bg-primary text-white">Central Tax</th>
                                            <th class="bg-primary text-white">State/UT Tax</th>
                                            <th class="bg-primary text-white">E-Commerce GSTIN No</th>
                                            <th class="bg-primary text-white">Supply Type</th>
                                            <th class="bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($saleEntries as $saleEntry)
                                            <tr>
                                                <td>OE</td>
                                                <td>{{ $saleEntry->party_ac->state ? $saleEntrie->party_ac->state->name : '' }}</td>
                                                <td>{{ $saleEntry->erp_product->gst_commodity ? $saleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                                <td>{{ $saleEntry->total_taxable_value}}</td>
                                                <td>{{ $saleEntry->total_integrated_tax}}</td>
                                                <td>{{ $saleEntry->total_central_tax}}</td>
                                                <td>{{ $saleEntry->total_integrated_tax}}</td>
                                                <td></td>
                                                <td>intra</td>
                                                <td><button class="btn btn-outline-primary btn-sm" wire:click="showB2csEntry({{ $saleEntry->id }})">Show</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @elseif($gstr1_type == 'Credit note to registered')
                        @if($showCnrEntry)
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">GSTIN Status</th>
                                            <th class="bg-primary text-white">GSTIN/UIN of Recipient</th>
                                            <th class="bg-primary text-white">Party Name</th>
                                            <th class="bg-primary text-white">City Name</th>
                                            <th class="bg-primary text-white">Note Number</th>
                                            <th class="bg-primary text-white">Note Date</th>
                                            <th class="bg-primary text-white">Note Type</th>
                                            <th class="bg-primary text-white">Place of Supply with Code</th>
                                            <th class="bg-primary text-white">Reverse Charge</th>
                                            <th class="bg-primary text-white">Note Supply Type</th>
                                            <th class="bg-primary text-white">Note Value</th>
                                            <th class="bg-primary text-white">Reason for Issuing Document</th>
                                            <th class="bg-primary text-white">Integrated Tax</th>
                                            <th class="bg-primary text-white">Taxable Amount</th>
                                            <th class="bg-primary text-white">State/UT Tax</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cnrSaleEntries as $saleEntry)
                                            <tr>
                                                <td></td>
                                                <td>{{ $saleEntry->party_ac->gstin_no }}</td>
                                                <td>{{ $saleEntry->party_ac->name }}</td>
                                                <td>{{ $saleEntry->party_ac->city ? $saleEntrie->party_ac->city->name : '' }}</td>
                                                <td>{{ $saleEntry->bill_no}}</td>
                                                <td>{{ $saleEntry->bill_date }}</td>
                                                <td>C</td>
                                                <td>{{ $saleEntry->party_ac->state ? $saleEntrie->party_ac->state->name : '' }}</td>
                                                <td>N</td>
                                                <td>Regular B2B</td>
                                                <td>{{ $saleEntry->total_invoice_value}}</td>
                                                <td>-</td>
                                                <td>{{ $saleEntry->erp_product->gst_commodity ? $saleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                                <td>{{ $saleEntry->sale_purchase_taxe->state_ut_tax + $saleEntry->sale_purchase_taxe->central_tax }}</td>
                                                <td>{{ $saleEntry->sale_purchase_taxe->state_ut_tax }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">GSTIN Status</th>
                                            <th class="bg-primary text-white">GSTIN/UIN of Recipient</th>
                                            <th class="bg-primary text-white">Party Name</th>
                                            <th class="bg-primary text-white">City Name</th>
                                            <th class="bg-primary text-white">Note Number</th>
                                            <th class="bg-primary text-white">Note Date</th>
                                            <th class="bg-primary text-white">Note Type</th>
                                            <th class="bg-primary text-white">Place of Supply with Code</th>
                                            <th class="bg-primary text-white">Reverse Charge</th>
                                            <th class="bg-primary text-white">Note Supply Type</th>
                                            <th class="bg-primary text-white">Note Value</th>
                                            <th class="bg-primary text-white">Reason for Issuing Document</th>
                                            <th class="bg-primary text-white">Integrated Tax</th>
                                            <th class="bg-primary text-white">Taxable Amount</th>
                                            <th class="bg-primary text-white">State/UT Tax</th>
                                            <th class="bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($saleEntries as $saleEntry)
                                            <tr>
                                                <td></td>
                                                <td>{{ $saleEntry->party_ac->gstin_no }}</td>
                                                <td>{{ $saleEntry->party_ac->name }}</td>
                                                <td>{{ $saleEntry->party_ac->city ? $saleEntrie->party_ac->city->name : '' }}</td>
                                                <td>{{ $saleEntry->bill_no}}</td>
                                                <td>{{ $saleEntry->bill_date }}</td>
                                                <td>C</td>
                                                <td>{{ $saleEntry->party_ac->state ? $saleEntrie->party_ac->state->name : '' }}</td>
                                                <td>N</td>
                                                <td>Regular B2B</td>
                                                <td>{{ $saleEntry->total_invoice_value}}</td>
                                                <td>-</td>
                                                <td>{{ $saleEntry->erp_product->gst_commodity ? $saleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                                <td>{{ $saleEntry->total_taxable_value}}</td>
                                                <td>{{ $saleEntry->sale_purchase_taxe->state_ut_tax }}</td>
                                                <td><button class="btn btn-outline-primary btn-sm" wire:click="showCnrEntry({{ $saleEntry->group_id }})">Show</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        @elseif($gstr1_type == 'Credit note to UN-registered')
                        @if($showCnurEntry)
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">UR Type</th>
                                            <th class="bg-primary text-white">Note Number</th>
                                            <th class="bg-primary text-white">Note Date</th>
                                            <th class="bg-primary text-white">Note Type</th>
                                            <th class="bg-primary text-white">Reason for Issuing Document</th>
                                            <th class="bg-primary text-white">Place of Supply with Code</th>
                                            <th class="bg-primary text-white">Note Value</th>
                                            <th class="bg-primary text-white">Integrated Tax</th>
                                            <th class="bg-primary text-white">Taxable Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cnurSaleEntries as $saleEntry)
                                            <tr>
                                                <td></td>
                                                <td>{{ $saleEntry->bill_no}}</td>
                                                <td>{{ $saleEntry->bill_date }}</td>
                                                <td>C</td>
                                                <td>-</td>
                                                <td>{{ $saleEntry->party_ac->state ? $saleEntrie->party_ac->state->name : '' }}</td>
                                                <td>{{ $saleEntry->total_amount}}</td>
                                                <td>{{ $saleEntry->erp_product->gst_commodity ? $saleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                                <td>{{ $saleEntry->sale_purchase_taxe->state_ut_tax +  $saleEntry->sale_purchase_taxe->central_tax }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                                    <thead>
                                        <tr>
                                            <th class="bg-primary text-white">UR Type</th>
                                            <th class="bg-primary text-white">Note Number</th>
                                            <th class="bg-primary text-white">Note Date</th>
                                            <th class="bg-primary text-white">Note Type</th>
                                            <th class="bg-primary text-white">Reason for Issuing Document</th>
                                            <th class="bg-primary text-white">Place of Supply with Code</th>
                                            <th class="bg-primary text-white">Note Value</th>
                                            <th class="bg-primary text-white">Integrated Tax</th>
                                            <th class="bg-primary text-white">Taxable Amount</th>
                                            <th class="bg-primary text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($saleEntries as $saleEntry)
                                            <tr>
                                                <td></td>
                                                <td>{{ $saleEntry->bill_no}}</td>
                                                <td>{{ $saleEntry->bill_date }}</td>
                                                <td>C</td>
                                                <td>-</td>
                                                <td>{{ $saleEntry->party_ac->state ? $saleEntrie->party_ac->state->name : '' }}</td>
                                                <td>{{ $saleEntry->total_invoice_value}}</td>
                                                <td>{{ $saleEntry->erp_product->gst_commodity ? $saleEntry->erp_product->gst_commodity->gst_slab->integrated_tax : ''}}</td>
                                                <td>{{ $saleEntry->total_taxable_value}}</td>
                                                <td><button class="btn btn-outline-primary btn-sm" wire:click="showCnurEntry({{ $saleEntry->group_id }})">Show</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- modal for setting report period and the year -->
    <div class="modal {{$isReportModal ? 'd-block' : 'd-none' }}" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-report-for" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report For</h5>
                </div>
                <div class="modal-body">
                    <form class="row" action="#">
                        <div class="form-group mt-2 col-6">
                            <label for="category_name">Report Period</label>
                            <select wire:model="report_period" class="form-control form-select" name="report_period">
                                <option value="">- Select -</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="annual">Annual</option>
                            </select>
                        </div>
                        <div class="form-group mt-2 col-6">
                            <label for="date_range">Report Period</label>
                            <select wire:model="return_period" class="form-control form-select" name="return_period">
                                @if($report_period != "")
                                    @foreach (getReportPeriod($report_period) as $monthId => $month)
                                            <option value="{{ $monthId }}">{{ $month }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </form>
                    <div class="modal-footer d-flex justify-content-right">
                        <button type="submit" wire:click.prevent="setReportPeriod()" class="btn btn-primary" >Set Period</button>
                    </div>
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