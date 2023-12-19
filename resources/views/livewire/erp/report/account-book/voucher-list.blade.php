<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Book</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Voucher List</li>
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
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Voucher Type</th>
                                <th class="bg-primary text-white">Last No</th>
                                <th class="bg-primary text-white">Date</th>
                                <th class="bg-primary text-white">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
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
    <script>
	    window.addEventListener('report_table', event => {
	        $('.report_table').DataTable({
	            language: {
	                searchPlaceholder: 'Search...',
	                sSearch: '',
	            }
	        });
	    });

	    document.addEventListener('livewire:load', function () {
	        $('.report_table').DataTable({
	            language: {
	                searchPlaceholder: 'Search...',
	                sSearch: '',
	            }
	        });
        });
    </script>
</section>