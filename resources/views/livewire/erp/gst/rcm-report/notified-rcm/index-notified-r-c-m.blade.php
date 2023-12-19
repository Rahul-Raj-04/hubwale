<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item active" aria-current="page">RMC Report</li>
                        <li class="breadcrumb-item active" aria-current="page">Notified RCM</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="d-flex">
                            	<form class="me-2 d-flex">
                            		<div class="row align-items-center">
							            <div class="col-md-4 text-center">
							                <h6 class="mb-0">Return Period</h6>
							            </div>
							            <div class="col-md-8">
							                <!-- <input type="date" class="form-control form-control-sm form-control form-control-sm-lg" /> -->
                                            <select wire:model="return_period" class="form-control form-select" name="return_period">
                                                @foreach (App\Enum\Enum::getReportPeriod($report_period) as $monthId => $month)
                                                    <option value="{{ $monthId }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
							             </div>
							        </div>
							        <div class="row align-items-center ps-3">
							            <div class="col-md-3">
							                <h6 class="mb-0">From</h6>
							            </div>
							            <div class="col-md-9">
							                <input wire:model.lazy="from_date" type="date" class="form-control form-control-sm form-control form-control-sm-lg" />
							             </div>
							        </div>
							        <div class="row align-items-center ps-3">
							            <div class="col-md-3">
							                <h6 class="mb-0">To</h6>
							            </div>
							            <div class="col-md-9">
							                <input wire:model.lazy="to_date" type="date" class="form-control form-control-sm form-control form-control-sm-lg" />
							             </div>
							        </div>
                            	</form>
                        	<div class="btn-list">
		                        <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" wire:click="export">Export</button>
	                        </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table-responsive table table-bordered text-nowrap border-bottom report_table">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">GSTIN NO</th>
                                <th class="bg-primary text-white">Invoice Number</th>
                                <th class="bg-primary text-white">Invoice Date</th>
                                <th class="bg-primary text-white">Invoice Value</th>
                                <th class="bg-primary text-white">Place of Supply</th>
                                <th class="bg-primary text-white">Rate</th>
                                <th class="bg-primary text-white">Taxable Value</th>
                                <th class="bg-primary text-white">Integrated Tax</th>
                                <th class="bg-primary text-white">Central Tax</th>
                                <th class="bg-primary text-white">State/UT Tax</th>
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
                            </tr>
                        </tbody>
                    </table>
                    <!-- action button -->
                    <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                <i class="fa fa-print me-0"></i>
                                Print
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                Date
                            </a>
                            <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                                Month
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- modal for setting report period and the year -->
    @if ($isReportModal)
    <div class="modal d-block" id="modal-report-for" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Return Period</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row" action="#">
                        <div class="form-group mt-2 col-12">
                            <!-- <label for="category_name">Report Period</label> -->
                            <select wire:model="return_period" class="form-control form-select" name="report_period">
                                @foreach (App\Enum\Enum::getReportPeriod($report_period) as $monthId => $month)
                                        <option value="{{ $monthId }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <div class="modal-footer d-flex justify-content-between">
                        <button class="btn" data-dismiss="modal">Cancel</button>
                        <button type="submit" wire:click.prevent="setReportPeriod()" class="btn btn-primary" >Set Period</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    <script>

    window.addEventListener('report_table', event => {
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