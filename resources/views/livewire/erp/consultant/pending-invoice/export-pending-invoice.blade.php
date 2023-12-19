<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pending Invoice</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="d-flex">
                        	<div class="btn-list">
		                        <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" wire:click="export">Export</button>
	                        </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered text-nowrap border-bottom report_table">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Party Name</th>
                                <th class="bg-primary text-white">Particular</th>
                                <th class="bg-primary text-white">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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