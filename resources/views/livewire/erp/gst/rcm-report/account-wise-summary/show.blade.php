<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                        <li class="breadcrumb-item active" aria-current="page">RMC Report</li>
                        <li class="breadcrumb-item active" aria-current="page">Account Wise Summary</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.gst.rcm-report.account-wise.index') }}" class="btn btn-sm btn-default d-none d-sm-inline-block mx-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Go Back</a>

		                    <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" wire:click="export">Export</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table-responsive table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Date</th>
                                <th class="bg-primary text-white">Voucher Type</th>
                                <th class="bg-primary text-white">Vou No</th>
                                <th class="bg-primary text-white">Doc No</th>
                                <th class="bg-primary text-white">City Name</th>
                                <th class="bg-primary text-white">Sale/Purch.A/C Name</th>
                                <th class="bg-primary text-white">GST 3%</th>
                                <th class="bg-primary text-white">GST 5%</th>
                                <th class="bg-primary text-white">GST 12%</th>
                                <th class="bg-primary text-white">GST 18%</th>
                                <th class="bg-primary text-white">GST 28%</th>
                            </tr>
                        </thead>
                        <tbody>
                           	@foreach ($rcmVouchers as $key => $rcmVoucher)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $rcmVoucher->date }}</td>
                                    <td>{{ $rcmVoucher->vou_type == 'bank_payment' ? 'RCMBp' : 'RCMCp' }}</td>
                                    <td>{{ $rcmVoucher->vou_no }}</td>
                                    <td>{{ $rcmVoucher->doc_no }}</td>
                                    <td>{{ $rcmVoucher->account->city ? $rcmVoucher->account->city->name : '' }}</td>
                                    <td>{{ $rcmVoucher->account->name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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