<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item active" aria-current="page">GSTR 2B Match</li>
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
                                <select class="form-control form-control-sm form-select " id="format-input">
                                    <option>2B Data Matched</option>
                                </select>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 text-end col-form-label">
                                        Ignore Difference
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control form-control-sm" type="date" id="return_period" name="ignore_difference">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 text-end">
                                        <input class="col-form-label" type="checkbox"  name="ignore_date">
                                    </div>
                                    <div class="col-md-6 col-form-label">
                                        Ignore Date
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 text-end">
                                        Return period
                                    </div>
                                    <div class="col-md-6">
                                        <select wire:model="return_period" class="form-control form-control-sm form-select" name="return_period">
                                            @foreach (getReportPeriod($report_period) as $monthId => $month)
                                                <option value="{{ $monthId }}">{{ $month }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-6 text-end col-form-label">
                                        From
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control form-control-sm" type="date" id="from" name="from">
                                    </div>
                                </div>
                            </div>
                            <div class="col"> 
                                <div class="row">
                                    <div class="col-md-6 text-end col-form-label">
                                        To
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control form-control-sm" type="date" name="to">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Sr No</th>
                                    <th class="bg-primary text-white">ITC Status</th>
                                    <th class="bg-primary text-white">ITC Return Period</th>
                                    <th class="bg-primary text-white">Invoice No</th>
                                    <th class="bg-primary text-white">Vou No.</th>
                                    <th class="bg-primary text-white">Source</th>
                                    <th class="bg-primary text-white">Invoice Date</th>
                                    <th class="bg-primary text-white">Original Bill No</th>
                                    <th class="bg-primary text-white">Original Bill Date</th>
                                    <th class="bg-primary text-white">Section</th>
                                    <th class="bg-primary text-white">Supplier Name</th>
                                    <th class="bg-primary text-white">Supplier GSTIN NO.</th>
                                    <th class="bg-primary text-white">State Of Supply</th>
                                    <th class="bg-primary text-white">Supply Type</th>
                                    <th class="bg-primary text-white">Invoice Type</th>
                                    <th class="bg-primary text-white">Reverse Change</th>
                                    <th class="bg-primary text-white">Taxable Amount</th>
                                    <th class="bg-primary text-white">Integrated Tax</th>
                                    <th class="bg-primary text-white">Central Tax</th>
                                    <th class="bg-primary text-white">State/UT Tax</th>
                                    <th class="bg-primary text-white">Invoice Value</th>
                                    <th class="bg-primary text-white">Return Filled BY CP</th>
                                    <th class="bg-primary text-white">Remarks</th>
                                    <th class="bg-primary text-white">Remarks</th>
                                    <th class="bg-primary text-white">Return Period</th>
                                    <th class="bg-primary text-white">GSTR-1/5 Period</th>
                                    <th class="bg-primary text-white">GSTR-1/5 Filling Date</th>
                                    <th class="bg-primary text-white">ITC Availability</th>
                                    <th class="bg-primary text-white">Reason</th>
                                    <th class="bg-primary text-white">Applicable % of Tax Rate</th>
                                    <th class="bg-primary text-white">Source</th>
                                    <th class="bg-primary text-white">IRN </th>
                                    <th class="bg-primary text-white">IRN Date</th>
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
                                    <td></td>
                                    <!-- <td></td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- modal for setting report period and the year -->
    <div class="modal {{$isReportModal ? 'd-block' : 'd-none' }}" data-bs-backdrop="static" data-bs-keyboard="false" id="modal-report-for" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">GSTR 2B Match</h5>
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
                            <label for="date_range">Date Range</label>
                            <select wire:model="return_period" class="form-control form-select" name="return_period">
                                @if($report_period != "")
                                    @foreach (App\Enum\Enum::getReportPeriod($report_period) as $monthId => $month)
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