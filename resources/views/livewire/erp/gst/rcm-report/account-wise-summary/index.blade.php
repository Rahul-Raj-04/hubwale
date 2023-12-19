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
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Party Name</th>
                                    <th class="bg-primary text-white">GST 3%</th>
                                    <th class="bg-primary text-white">GST 5%</th>
                                    <th class="bg-primary text-white">GST 12%</th>
                                    <th class="bg-primary text-white">GST 18%</th>
                                    <th class="bg-primary text-white">GST 28%</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               	@foreach ($rcmVoucherAccounts as $key => $rcmVoucherAccount)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $rcmVoucherAccount->opposite_account->name }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><a class="btn btn-sm btn-outline-success" href="{{route('erp.gst.rcm-report.account-wise.show', $rcmVoucherAccount->opposite_account_id) }}">Show</a></td>
                                    </tr>
                                @endforeach
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