<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST Return</a></li>
                        <li class="breadcrumb-item active" aria-current="page">GSTR 3B (as per GSTR 2B)</li>
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
                            <div class="col">
                                <select class="form-control form-select form-control-sm" id="format-input">
                                    <option>GSTR 3B as per GSTR 2B</option>
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
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                                <tr>
                                    <th class="bg-primary text-white">GSTR 3B Grouping</th>
                                    <th class="bg-primary text-white"></th>
                                    <th class="bg-primary text-white">Taxable Amount</th>
                                    <th class="bg-primary text-white">Integrated Tax</th>
                                    <th class="bg-primary text-white">Central Tax</th>
                                    <th class="bg-primary text-white">State/UT Tax</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" class="text-danger">3.1 Detail of outword supplies and inword supplies liable to reverse charges</td>
                                </tr>
                                <tr>
                                    <td>(a) Outward taxable supplies (other than zero rated, nil rated and exempted)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.1 Detail of outword supplies and inword supplies liable to reverse charges', 'sub_text' => '(a) Outward taxable supplies (other than zero rated, nil rated and exempted)']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(b) Outward taxable supplies (zero rated)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.1 Detail of outword supplies and inword supplies liable to reverse charges', 'sub_text' => '(b) Outward taxable supplies (zero rated)']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(c) Outward taxable supplies (Nil rated, exempted)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.1 Detail of outword supplies and inword supplies liable to reverse charges', 'sub_text' => '(c) Outward taxable supplies (Nil rated, exempted)']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(d) Inward supplies (Liable to reverse charge)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.1 Detail of outword supplies and inword supplies liable to reverse charges', 'sub_text' => '(d) Inward supplies (Liable to reverse charge)']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(e) Non GST outward supplies</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.1 Detail of outword supplies and inword supplies liable to reverse charges', 'sub_text' => '(e) Non GST outward supplies']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-danger">Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-danger">3.2 of the supplies shown in 3.1 (a) above, details of liner-state supplies made to unregistered persons, composition taxable person ad UIN holders</td>
                                </tr>
                                <tr>
                                    <td>Supplies made to Unregistered person</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.2 of the supplies shown in 3.1 (a) above, details of liner-state supplies made to unregistered persons, composition taxable person ad UIN holders', 'sub_text' => 'Supplies made to Unregistered person']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>Supplies made to composition taxable person</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.2 of the supplies shown in 3.1 (a) above, details of liner-state supplies made to unregistered persons, composition taxable person ad UIN holders', 'sub_text' => 'Supplies made to composition taxable person']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>Supplies made to UIN holders</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '3.2 of the supplies shown in 3.1 (a) above, details of liner-state supplies made to unregistered persons, composition taxable person ad UIN holders', 'sub_text' => 'Supplies made to UIN holders']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-danger">Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-danger">4. Eligible ITC</td>
                                </tr>
                                <tr>
                                    <td><b>(A) ITC Available (whether in full or part)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>(1) Import of goods</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '4. Eligible ITC', 'sub_text' => '(1) Import of goods']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(2) Import of services</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => 'Eligible ITC', 'sub_text' => '(2) Import of services']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(3) Inward supplies liable to reverse charge (other than 1 & 2 above)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => 'Eligible ITC', 'sub_text' => '(3) Inward supplies liable to reverse charge (other than 1 & 2 above)']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(4) Inward supplies from ISD</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => 'Eligible ITC', 'sub_text' => '(4) Inward supplies from ISD']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(5) All other ITC</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => 'Eligible ITC', 'sub_text' => '(5) All other ITC']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td><b>(B)ITC Reversed</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>(1) As per rules 42 & 43 of CGST rules</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '(B)ITC Reversed', 'sub_text' => '(1) As per rules 42 & 43 of CGST rules']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(2)Others</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '(B)ITC Reversed', 'sub_text' => '(2) Others']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td><b>(C)Net ITC Available (A) - (B)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><b>(D)Ineligible ITC</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>(1) As per secction 17(5)</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '(D)Ineligible ITC', 'sub_text' => '(1) As per secction 17(5)']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>(2) Others</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '(D)Ineligible ITC', 'sub_text' => '(2) Others']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-danger">5. Values of exempt, nil-rated and non-GST inward supplies (Inter state)</td>
                                </tr>
                                <tr>
                                    <td>From a supplier under composition schema, exempt and nil rated supply</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '5. Values of exempt, nil-rated and non-GST inward supplies (Inter state)', 'sub_text' => 'From a supplier under composition schema, exempt and nil rated supply']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>Non GST supply</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '5. Values of exempt, nil-rated and non-GST inward supplies (Inter state)', 'sub_text' => 'Non GST supply']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-danger">Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-danger">5. Values of exempt, nil-rated and non-GST inward supplies (Intra state)</td>
                                </tr>
                                <tr>
                                    <td>From a supplier under composition schema, exempt and nil rated supply</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '5. Values of exempt, nil-rated and non-GST inward supplies (Inter state)', 'sub_text' => 'From a supplier under composition schema, exempt and nil rated supply']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td>Non GST supply</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a href="{{ route('erp.gst.gstr-return.gstr-3-b-as-per-gstr-2-b.show', ['report_period' => $report_period, 'parent_text' => '5. Values of exempt, nil-rated and non-GST inward supplies (Inter state)', 'sub_text' => 'Non GST supply']) }}" class="btn btn-sm btn-outline-success">Show</a></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-danger">Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                            <div class="btn-list">
                                <a class="btn btn-primary btn-sm">
                                    Date
                                </a>
                                
                                <a class="btn btn-primary btn-sm">
                                    Format
                                </a>
                                
                                <a class="btn btn-primary btn-sm">
                                    Print
                                </a>
                            </div>
                        </div>
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