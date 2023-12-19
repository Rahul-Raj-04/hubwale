<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item active" aria-current="page">E-Way Bill</li>
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

                <div class="card-body" wire:ignore>
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <select class="form-control form-select form-control-sm" id="format-input">
                                    <option>E-Way Bill (All)</option>
                                </select>
                            </div>
                            <div class="col"></div>

                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6 text-end col-form-label">
                                        From
                                    </div>
                                    <div class="col-md-6">
                                        <input wire:model="from_date" class="form-control form-control-sm" type="date" id="from" name="from">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-6 text-end col-form-label">
                                        To
                                    </div>
                                    <div class="col-md-6">
                                        <input wire:model="to_date" type="date" name="to" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white" colspan="8" style="border-bottom-width: 1px;"></th>
                                    <th class="bg-primary text-white" colspan="6" style="border-bottom-width: 1px;">Consignor Details</th>
                                    <th class="bg-primary text-white" colspan="10" style="border-bottom-width: 1px;">Consignee Details</th>
                                    <th class="bg-primary text-white" colspan="8" style="border-bottom-width: 1px;">Transporter Details</th>
                                </tr>
                                <tr>
                                    <th class="bg-primary text-white">Sub Supply Type</th>
                                    <th class="bg-primary text-white">E-Way Bill Number</th>
                                    <th class="bg-primary text-white">Valid From</th>
                                    <th class="bg-primary text-white">Valid Until</th>
                                    <th class="bg-primary text-white">Upload Type</th>
                                    <th class="bg-primary text-white">Document Type</th>
                                    <th class="bg-primary text-white">Document No</th>
                                    <th class="bg-primary text-white">Document Date</th>
                                    <th class="bg-primary text-white">GSTIN of the Consignor</th>
                                    <th class="bg-primary text-white">Legal Name of consignor</th>
                                    <th class="bg-primary text-white">Address of consignor - Line 1 <br> Address of consignor - Line 2</th>
                                    <th class="bg-primary text-white">Place of consignor <br> Pincode of consignor</th>
                                    <th class="bg-primary text-white">State of consignor</th>
                                    <th class="bg-primary text-white">Dispatch From</th>
                                    <th class="bg-primary text-white">GSTIN of consignee</th>
                                    <th class="bg-primary text-white">Legal Name of consignee</th>
                                    <th class="bg-primary text-white">Address of consignee - Line 1 <br> Address of consignee - Line 2</th>
                                    <th class="bg-primary text-white">Place of consignor <br> Pincode of consignor</th>
                                    <th class="bg-primary text-white">State of Supply</th>
                                    <th class="bg-primary text-white">Ship To State Name</th>
                                    <th class="bg-primary text-white">Taxable Amount</th>
                                    <th class="bg-primary text-white">Central Tax</th>
                                    <th class="bg-primary text-white">State/UT Tax</th>
                                    <th class="bg-primary text-white">Integrated Tax</th>
                                    <th class="bg-primary text-white">Mode of Trans</th>
                                    <th class="bg-primary text-white">Distance of Trans</th>
                                    <th class="bg-primary text-white">Transporter Name</th>
                                    <th class="bg-primary text-white">Transporter GSTIN</th>
                                    <th class="bg-primary text-white">Transporter Doc No</th>
                                    <th class="bg-primary text-white">Transporter Doc Date</th>
                                    <th class="bg-primary text-white">Vehicle No</th>
                                    <th class="bg-primary text-white">Vehicle Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    window.addEventListener('report-table', event => {
        $('.report_table').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });

    $(document).ready(function() {
        $('.report_table').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            }
        });
    });
    </script>
</section>