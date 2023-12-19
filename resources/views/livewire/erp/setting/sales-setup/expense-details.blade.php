<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Sales Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Expense Details</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sales Expense Name</li>
                    </ol>
                </div>
            </div>

            <div class="card-body p-2" wire:ignore>
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom datatable-common">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Sr No</th>
                                <th class="bg-primary text-white">Expense Name</th>
                                <th class="bg-primary text-white">Account Name</th>
                                <th class="bg-primary text-white">Calculation</th>
                                <th class="bg-primary text-white">Enable-Disable</th>
                                <th class="bg-primary text-white">Round Off</th>
                                <th class="bg-primary text-white">Type</th>
                                <th class="bg-primary text-white">Equation</th>
                                <th class="bg-primary text-white">Invoice Type</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->id }}</td>
                                <td>{{ $record->name}}</td>
                                <td>{{ $record->account->name}}</td>
                                <td>{{ $record->calculation}}</td>
                                <td>{{ $record->status }}</td>
                                <td>{{ $record->round_off}}</td>
                                <td>{{ $record->type_2}}</td>
                                <td></td>
                                <td>{{ $record->invoice_type}}</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Setup -> Sales Setup -> Expense Details ->
                        Sales Expense Name</h5>
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
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Type</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="type">
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
                                <label class="col-md-3">A/c Effect</label>
                                <select name="type" class="form-control form-control-sm col-md-9"
                                    wire:model.defer="ac_effect">
                                    @foreach ($ac_effect_items as $ac_effect_item)
                                    <option value="{{ $ac_effect_item }}">{{ $ac_effect_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('ac_effect')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Serial No.</label>
                                <input type="text" class="form-control form-control-sm col-md-9"
                                    wire:model.defer="serial_number">
                            </div>
                            @error('serial_number')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Add/Deduct</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="add_deduct">
                                    @foreach ($add_deduct_items as $add_deduct_item)
                                    <option value="{{ $add_deduct_item }}">{{ $add_deduct_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('add_deduct')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Calculation</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="calculation">
                                    @foreach ($calculation_items as $calculation_item)
                                    <option value="{{ $calculation_item }}">{{ $calculation_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('calculation')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Type</label>
                                <div class="col-md-9 row">
                                    <select class="form-control form-control-sm col-md-4" wire:model.defer="type_2">
                                        @foreach ($type_2_items as $type_2_item)
                                        <option value="{{ $type_2_item }}">{{ $type_2_item }}</option>
                                        @endforeach
                                    </select>
                                    <span class="col-md-4"> @ %</span>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model.defer="type_2_percentage">
                                    </div>
                                </div>
                            </div>
                            @error('type_2')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Read Only</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="readonly">
                                    <option value=true>Yes</option>
                                    <option value=false>No</option>
                                </select>
                            </div>
                            @error('readonly')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">A/c. Type</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="ac_type">
                                    @foreach ($ac_type_items as $ac_type_item)
                                    <option value="{{ $ac_type_item }}">{{ $ac_type_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('ac_type')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">A/c Name</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="account_id">
                                    @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('account_id')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
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

    {{-- edit record modal --}}
    @if ($record)
    <div class="modal fade" id="recordEditModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Setup -> Sales Setup -> Expense Details -> Expense Details Entry</h5>
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
                                <label class="col-md-3">A/c Effect</label>
                                <select name="type" class="form-control form-control-sm col-md-9"
                                    wire:model.defer="edit_ac_effect">
                                    @foreach ($ac_effect_items as $ac_effect_item)
                                    <option value="{{ $ac_effect_item }}">{{ $ac_effect_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('edit_ac_effect')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Serial No.</label>
                                <input type="text" class="form-control form-control-sm col-md-9"
                                    wire:model.defer="edit_serial_number">
                            </div>
                            @error('edit_serial_number')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Add/Deduct</label>
                                <select class="form-control form-control-sm col-md-9"
                                    wire:model.defer="edit_add_deduct">
                                    @foreach ($add_deduct_items as $add_deduct_item)
                                    <option value="{{ $add_deduct_item }}">{{ $add_deduct_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('edit_add_deduct')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Calculation</label>
                                <select class="form-control form-control-sm col-md-9"
                                    wire:model.defer="edit_calculation">
                                    @foreach ($calculation_items as $calculation_item)
                                    <option value="{{ $calculation_item }}">{{ $calculation_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('edit_calculation')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Type</label>
                                <div class="col-md-9 row">
                                    <select class="form-control form-control-sm col-md-4"
                                        wire:model.defer="edit_type_2">
                                        @foreach ($type_2_items as $type_2_item)
                                        <option value="{{ $type_2_item }}">{{ $type_2_item }}</option>
                                        @endforeach
                                    </select>
                                    <span class="col-md-4"> @ %</span>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control form-control-sm"
                                            wire:model.defer="edit_type_2_percentage">
                                    </div>
                                </div>
                            </div>
                            @error('edit_type_2')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">Read Only</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="edit_readonly">
                                    <option value=true>Yes</option>
                                    <option value=false>No</option>
                                </select>
                            </div>
                            @error('edit_readonly')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">A/c. Type</label>
                                <select class="form-control form-control-sm col-md-9" wire:model.defer="edit_ac_type">
                                    @foreach ($ac_type_items as $ac_type_item)
                                    <option value="{{ $ac_type_item }}">{{ $ac_type_item }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('edit_ac_type')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label class="col-md-3">A/c Name</label>
                                <select class="form-control form-control-sm col-md-9"
                                    wire:model.defer="edit_account_id">
                                    @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('edit_account_id')
                            <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
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