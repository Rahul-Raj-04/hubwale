<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="javascript:void(0)">GSTR Integrity</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ITC</li>
                </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="d-flex">
                        	<div class="btn-list">
		                        <!-- <button class="btn btn-sm btn-primary d-none d-sm-inline-block me-0" wire:click="export">Export</button> -->
	                        </div>
                        </div>
                    </div>
                </div>

                <div class="card-body" wire:ignore> 
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select class="form-control form-control-sm form-select " id="format-input">
                                <option>GST Return Data Integrity</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Index No.</th>
                                <th class="bg-primary text-white">Error</th>
                                <th class="bg-primary text-white">Voucher Date</th>
                                <th class="bg-primary text-white">Voucher No</th>
                                <th class="bg-primary text-white">Account Name</th>
                                <th class="bg-primary text-white">Product Name</th>
                                <th class="bg-primary text-white">Description</th>
                                <th class="bg-primary text-white">Bill Amount</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <td>1</td>
                                <td>GSTING Number format is invalid</td>
                                <td>2/4/2019</td>
                                <td>GT/1</td>
                                <td>Shah Electronics</td>
                                <td></td>
                                <td>Edit party account and enter valid GSTIN Number</td>
                                <td>108147.00</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit"
                                        wire:click="editRecord(1)">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Delete"
                                        wire:click="deleteRecord(2)">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="month-filter-model" tabindex="-1" aria-hidden="true" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">GST Return Data Integrity</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row mt-2">
                            <label for="category_short_name" class="col-auto" >GST Return Data Integrity</label>
                            <select wire:model="return_data_integrity" class="form-control form-control-sm form-select col-auto" name="return_data_integrity">
                                @foreach (getReportPeriod($report_period) as $monthId => $month)
                                    <option value="{{ $monthId }}">{{ $month }}</option>
                                @endforeach
                            </select>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button for="submit" wire:click.prevent="setReportPeriod()"  class="btn btn-sm btn-primary ">OK</button>
                </div>
            </div>
        </div>
    </div>

    {{--  edit record modal --}}
    <div class="modal fade" id="recordEditModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Account Details - Shah Electronics</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Main Details</legend>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Name</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Alias</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Group Name</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Registration Type</label>
                                        <select class="form-control form-control-sm form-select col-md-9" >
                                            @foreach ($registration_type_items as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">  <!--    -->
                            <fieldset>
                                <legend>Party Detail</legend>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">City</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Pincode</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Area</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Mobile</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">State</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Pan NO.</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Aadhar No.</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">GSTIN No.</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">  <!--  second row  -->
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Balance Method</legend>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Balance Method.</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Opening Balance</label>
                                        <input type="number" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <legend>Credit Limit</legend>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Credit Limit</label>
                                        <input type="number" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Credit Days</label>
                                        <input type="number" class="form-control form-control-sm col-md-9" >
                                    </div>
                                    @error('demo')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="saveRecord">Save changes</button>
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

	    window.addEventListener('hide_model', event => {
		    $('#month-filter-model').modal('hide');
	    });

	    document.addEventListener('livewire:load', function () {
	        $('.report_table').DataTable({
	            language: {
	                searchPlaceholder: 'Search...',
	                sSearch: '',
	            }
	        });
		    $(window).on('load', function() {
		        $('#month-filter-model').modal('show');
		    });
        });

        
        // show edit record modal
        window.addEventListener('openRecordEditModal', event => {
            $('#recordEditModal').modal('show');
        });

        // hide modal -> saved record
        window.addEventListener('hideRecordEditModal', event => {
            $('#recordEditModal').modal('hide');
        });

    </script>
</section>