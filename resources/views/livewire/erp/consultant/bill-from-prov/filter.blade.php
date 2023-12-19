<section>
    <div class="row row-sm d-none" id="list_table">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Consultant</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Bill From Prov. vou</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Provisional Invoice List</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list d-none">
                            <a href="{{ route('erp.consultant.provisional-invoice.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block me-0">
                                <i class="fas fa-plus me-1"></i>
                                Add Provisional Invoice
                            </a>

                            <a href="{{ route('erp.consultant.provisional-invoice.create') }}" class="btn btn-sm btn-primary d-sm-none me-0">
                                <i class="fas fa-plus"></i>
                            </a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom list_table">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Index No.</th>
                                    <th class="bg-primary text-white">Bill no</th>
                                    <th class="bg-primary text-white">Date</th>
                                    <th class="bg-primary text-white">Party Name</th>
                                    <th class="bg-primary text-white">Amount</th>
                                    <th class="bg-primary text-white">Receipt Amount</th>
                                    <th class="bg-primary text-white">Error</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </table>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Form Model -->
    <div class="modal fade" id="filter" tabindex="-1" aria-hidden="true" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Final Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="filter">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">From <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm" required>
                                @error('from_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">To <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm" required>
                                @error('to_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Inv Type <i class="text-danger">*</i></label>
                                <select name='parent_id' class="form-control form-control-sm form-select" required>
                                    <option value=>Select Invoice Type</option>
                                </select>
                                @error('invoice_type')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Income A/C <i class="text-danger">*</i></label>
                                <select name='parent_id' class="form-control form-control-sm form-select" required>
                                    <option value=>Select Account</option>
                                </select>
                                @error('income_account')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="border mt-5">
                            <div class="row">
	                            <div class="col-md-6">
	                                <label class="form-label">Group Name <i class="text-danger">*</i></label>
	                                <select class="form-control form-control-sm form-select" wire:model="group_name">
	                                    <option value="all">All</option>
	                                    <option value="selected">Selected</option>
	                                </select>
	                                @error('group_name')
	                                    <span class="text-danger small wow flash">{{ $message }}</span>
	                                @enderror
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Area name <i class="text-danger">*</i></label>
	                                <select class="form-control form-control-sm form-select" wire:model="area_name">
	                                    <option value="all">All</option>
	                                    <option value="selected">Selected</option>
	                                </select>
	                                @error('area_name')
	                                    <span class="text-danger small wow flash">{{ $message }}</span>
	                                @enderror
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">City Name <i class="text-danger">*</i></label>
	                                <select class="form-control form-control-sm form-select" wire:model="city_name">
	                                    <option value="all">All</option>
	                                    <option value="selected">Selected</option>
	                                </select>
	                                @error('city_name')
	                                    <span class="text-danger small wow flash">{{ $message }}</span>
	                                @enderror
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Account Name <i class="text-danger">*</i></label>
	                                <select class="form-control form-control-sm form-select" wire:model="account_name">
	                                    <option value="all">All</option>
	                                    <option value="selected">Selected</option>
	                                </select>
	                                @error('account_name')
	                                    <span class="text-danger small wow flash">{{ $message }}</span>
	                                @enderror
	                            </div>
                            </div>
                        </div>
                        <input type="submit" id="Savefilter" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="Savefilter" class="btn btn-sm btn-primary">OK</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Group Model -->
    <div class="modal fade" id="group_name" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Group Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SaveGroupName">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Id</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Test</td>
                                        <td>
                                            <input type="checkbox" value="1" wire:model="group_names">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Test 2</td>
                                        <td>
                                            <input type="checkbox" value="2" wire:model="group_names">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Test 3</td>
                                        <td>
                                            <input type="checkbox" value="3" wire:model="group_names">
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <input type="submit" id="SaveGroupName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveGroupName" class="btn btn-sm btn-primary ">OK</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Model -->
    <div class="modal fade" id="area_name" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Area Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SaveAreaName">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Id</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Gujrat</td>
                                        <td>
                                            <input type="checkbox" value="1" wire:model="area_names">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Rajsthan</td>
                                        <td>
                                            <input type="checkbox" value="2" wire:model="area_names">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Surat</td>
                                        <td>
                                            <input type="checkbox" value="3" wire:model="area_names">
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <input type="submit" id="SaveAreaName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveAreaName" class="btn btn-sm btn-primary ">OK</label>
                </div>
            </div>
        </div>
    </div>

    <!-- City Model -->
    <div class="modal fade" id="city_name" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">City Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SaveCityName">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Id</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>S nagar</td>
                                        <td>
                                            <input type="checkbox" value="1" wire:model="city_names">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Vadhwan</td>
                                        <td>
                                            <input type="checkbox" value="2" wire:model="city_names">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Limdi</td>
                                        <td>
                                            <input type="checkbox" value="3" wire:model="city_names">
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <input type="submit" id="SaveCityName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveCityName" class="btn btn-sm btn-primary ">OK</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Model -->
    <div class="modal fade" id="account_name" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Account Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="SaveAreaName">
                        <table class="table table-bordered text-nowrap border-bottom" id="responsive-datatable">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Id</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">State</th>
                                    <th class="bg-primary text-white">Area</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Cash account</td>
                                    <td>Gujrat</td>
                                    <td>Gujrat</td>
                                    <td>
                                        <input type="checkbox" value="1" wire:model="account_names">
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Bank</td>
                                    <td>Rajsthan</td>
                                    <td>Rajsthan</td>

                                    <td>
                                        <input type="checkbox" value="2" wire:model="account_names">
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Cash-in-hand</td>
                                    <td>Surat</td>
                                    <td>Surat</td>
                                    <td>
                                        <input type="checkbox" value="3" wire:model="account_names">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="submit" id="SaveAreaName" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="SaveAreaName" class="btn btn-sm btn-primary ">OK</label>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	window.addEventListener('show_model', event => {
		    $('#' + event.detail.model_name).modal('show');
	    });

	    window.addEventListener('show_list', event => {
		    $('#list_table').removeClass('d-none');
		    $('#filter').modal('hide');
		   	$('.list_table').DataTable({
	            language: {
	                searchPlaceholder: 'Search...',
	                sSearch: '',
	            }
	        });
	    });
	    
	    document.addEventListener('livewire:load', function () {
		    $(window).on('load', function() {
		        $('#filter').modal('show');
		    });
        });
    </script>
</section>