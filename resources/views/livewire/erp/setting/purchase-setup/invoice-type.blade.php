<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Invoice Type</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice Type for Purchase</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2" wire:ignore>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Invoice Type ID</th>
                                <th class="bg-primary text-white">Description</th>
                                <th class="bg-primary text-white">Type</th>
                                <th class="bg-primary text-white">GST Type</th>
                                <th class="bg-primary text-white">Cap Goods</th>
                                <th class="bg-primary text-white">Enable-Disable</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->invoice_type_id }}</td>
                                <td>{{ $record->type}}</td>
                                <td>{{ $record->type}}</td>
                                <td>{{ $record->gst_type}}</td>
                                <td>{{ $record->is_capital_goods ? 'Yes' : 'No' }}</td>
                                <td>{{ $record->status ? 'Enable' : 'Disable' }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Edit"
                                        wire:click="editRecord({{ $record->id }})">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Delete"
                                        wire:click="deleteRecord({{ $record->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-title="Comment"
                                        wire:click="editComment({{ $record->id }})">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                    <div class="btn-list">
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block me-1" data-bs-toggle="modal"
                            data-bs-target="#recordAddModal">
                            <i class="fas fa-plus me-1"></i>
                            Add
                        </a>

                        <a class="btn btn-primary btn-sm d-sm-none me-1" data-bs-toggle="modal"
                            data-bs-target="#recordAddModal">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add record modal --}}
    <div class="modal fade" id="recordAddModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Setup -> Purchase Setup -> Invoice Type -> Invoice Type
                        Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Name</label>
                                    <input type="text" class="form-control form-control-sm col-md-9"
                                        wire:model.defer="name">
                                </div>
                                @error('name')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-3">Type</label>
                                    <select name="type" class="form-control form-control-sm col-md-9"
                                        wire:model.defer="type">
                                        @foreach ($type_items as $type_item)
                                        <option value="{{ $type_item }}">{{ $type_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-8">Capital Goods</label>
                                    <select class="form-control form-control-sm col-md-4"
                                        wire:model.defer="is_capital_goods">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                                @error('is_capital_goods')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-3">GST Type</label>
                                    <select class="form-control form-control-sm col-md-9" wire:model.defer="gst_type">
                                        @foreach ($gst_type_items as $gst_type_item)
                                        <option value="{{ $gst_type_item }}">{{ $gst_type_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('gst_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-8">Is Interstate party allowed?</label>
                                    <select class="form-control form-control-sm col-md-4"
                                        wire:model.defer="is_party_allowed">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                                @error('is_party_allowed')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-3">Export Type</label>
                                    <select class="form-control form-control-sm col-md-9"
                                        wire:model.defer="export_type">
                                        @foreach ($export_type_items as $export_type_item)
                                        <option value="{{ $export_type_item }}">{{ $export_type_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('export_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-8">Change in place of supply?</label>
                                    <select class="form-control form-control-sm col-md-4"
                                        wire:model.defer="is_place_of_supply">
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                                @error('is_place_of_supply')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="saveInvoiceType">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    {{-- edit record modal --}}
    @if ($record)
    <div class="modal fade" id="recordEditModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Setup -> Purchase Setup -> Invoice Type -> Invoice Type
                        Entry</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Name</label>
                                    <input type="text" class="form-control form-control-sm col-md-9"
                                        wire:model.defer="edit_name">
                                </div>
                                @error('edit_name')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-3">Type</label>
                                    <select class="form-control form-control-sm col-md-9" wire:model.defer="edit_type">
                                        @foreach ($type_items as $type_item)
                                        <option value="{{ $type_item }}">{{ $type_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('edit_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-8">Capital Goods</label>
                                    <select class="form-control form-control-sm col-md-4"
                                        wire:model.defer="edit_is_capital_goods">
                                        <option disabled selected value="{{ $edit_is_capital_goods }}">{{
                                            $edit_is_capital_goods ? 'Yes' : 'No' }} Selected
                                        </option>
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                                @error('edit_is_capital_goods')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-3">GST Type</label>
                                    <select class="form-control form-control-sm col-md-9"
                                        wire:model.defer="edit_gst_type">
                                        @foreach ($gst_type_items as $gst_type_item)
                                        <option value="{{ $gst_type_item }}">{{ $gst_type_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('edit_gst_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-8">Is Interstate party allowed?</label>
                                    <select class="form-control form-control-sm col-md-4"
                                        wire:model.defer="edit_is_party_allowed">
                                        <option disabled selected value="{{ $edit_is_party_allowed }}">{{
                                            $edit_is_party_allowed ? 'Yes' : 'No' }} Selected</option>
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                                @error('edit_is_party_allowed')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-3">Export Type</label>
                                    <select class="form-control form-control-sm col-md-9"
                                        wire:model.defer="edit_export_type">
                                        @foreach ($export_type_items as $export_type_item)
                                        <option value="{{ $export_type_item }}">{{ $export_type_item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('edit_export_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <label class="col-md-8">Change in place of supply?</label>
                                    <select class="form-control form-control-sm col-md-4"
                                        wire:model.defer="edit_is_place_of_supply">
                                        <option disabled selected value="{{ $edit_is_place_of_supply }}">{{
                                            $edit_is_place_of_supply ? 'Yes' : 'No' }} Selected
                                        </option>
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                                @error('edit_is_place_of_supply')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="updateRecord">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- edit comment modal --}}
    <div class="modal fade" id="editCommentModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="row">
                                    <label class="form-label">Comment</label>
                                    <textarea cols="30" rows="10" class="form-control form-control-sm"
                                        wire:model.defer="edit_comment"></textarea>
                                </div>
                                @error('edit_comment')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="saveComment">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('openRecordEditModal', event => {
            $('#recordEditModal').modal('show');
        });

        window.addEventListener('openEditCommentModal', event => {
            $('#editCommentModal').modal('show');
        })
    </script>
</div>