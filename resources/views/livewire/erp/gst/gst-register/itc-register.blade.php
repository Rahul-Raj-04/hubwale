<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GST</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">GST Register</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ITC Register</li>
                </ol>
            </div>

            <div class="card-body" wire:ignore>                    
                <form>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <select >
                                <option>ITC Register</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6 text-end col-form-label">
                                    GST Type
                                </div>
                                <div class="col">
                                    <select  name="gst_type" id="gst_type" class="form-control form-control-sm form-select">
                                        <option>State/UT Tax</option>
                                        <option value="">Cetral Tax</option>
                                        <option value="">integrated Tax</option>
                                        <option value="">All</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6 text-end col-form-label">
                                    From
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control form-control-sm" type="date" id="from" name="from">
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-6 text-end col-form-label">
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
                                <th class="bg-primary text-white">Sr No</th>
                                <th class="bg-primary text-white">Status</th>
                                <th class="bg-primary text-white">Date</th>
                                <th class="bg-primary text-white">Invoice Type</th>
                                <th class="bg-primary text-white">Section</th>
                                <th class="bg-primary text-white">Reference No.</th>
                                <th class="bg-primary text-white">CR/DB</th>
                                <th class="bg-primary text-white">Party Name</th>
                                <th class="bg-primary text-white">GSTIN No.</th>
                                <th class="bg-primary text-white">No ITC Effect</th>
                                <th class="bg-primary text-white">State/UT Tax</th>
                                <th class="bg-primary text-white">State/UT Tax Balance</th>
                                <th class="bg-primary text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Done</td>
                                <td>1/2/22</td>
                                <td>Cash</td>
                                <td>Bags</td>
                                <td>223343</td>
                                <td>67</td>
                                <td>Goods</td>
                                <td>a22222</td>
                                <td>3</td>
                                <td>555</td>
                                <td>677</td>
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

                <!-- action button -->
                <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                    <div class="btn-list">
                        <a class="btn btn-primary btn-sm d-none d-sm-inline-block me-1" data-bs-toggle="modal"
                            data-bs-target="#recordAddModal">
                            <i class="fas fa-plus me-1"></i>
                            Add
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
                    <h5 class="modal-title" id="exampleModalLabel">Transaction -> CN/DN Entry -> CN Entry with Stock -> 
                        Add Credit Note With Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Cash/Debit</label>
                                    <select class="form-control form-control-sm form-select col-md-9" wire:model.defer="cash_debit">
                                        @foreach ($cash_debit_items as $cash_debit)
                                            <option value="{{ $cash_debit }}">{{ $cash_debit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('cash_debit')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Invoice Type</label>
                                    <input type="text" class="form-control form-control-sm col-md-8" wire:model.defer="invoice_type">
                                </div>
                                @error('invoice_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Party A/C</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="part_a_c">
                                </div>
                                @error('part_a_c')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Effect</label>
                                    <select class="form-control form-control-sm form-select col-md-8" wire:model.defer="cash_debit">
                                        @foreach ($effect_items as $effect)
                                            <option value="{{ $effect }}">{{ $effect }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('effect')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Stack/Bill of Supply</label>
                                    <select class="form-control form-control-sm form-select col-md-8" wire:model.defer="cash_debit">
                                        @foreach ($tax_bill_of_supply_items as $tax_bill_of_supply)
                                            <option value="{{ $tax_bill_of_supply }}">{{ $tax_bill_of_supply }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tax_bill_of_supply')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Reason</label>
                                    <input type="text" class="form-control form-control-sm col-md-8" wire:model.defer="reason">
                                </div>
                                @error('reason')
                                <span class="text-danger small wow flash">{{ $reason }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Vou Date</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="vou_date">
                                    </div>
                                    @error('vou_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Voucher No</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="voucher_number">
                                </div>
                                @error('voucher_number')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Doc Date</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="doc_date">
                                </div>
                                @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Doc No.</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="doc_no">
                                </div>
                                @error('doc_no ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Original Bill No</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="original_bill_no">
                                </div>
                                @error('original_bill_no ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Original Bill Date</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="original_bill_date">
                                </div>
                                @error('original_bill_date ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Naration</label>
                                    <textarea rows="5" class="form-control form-control-sm col-md-9" wire:model.defer="naration">
                                    </textarea>
                                </div>
                                @error('naration ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
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


    {{--  edit record modal --}}
    <div class="modal fade" id="recordEditModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transaction -> CN/DN Entry -> CN Entry with Stock -> 
                        Add Credit Note With Stock</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Cash/Debit</label>
                                    <select class="form-control form-control-sm form-select col-md-9" wire:model.defer="cash_debit">
                                        @foreach ($cash_debit_items as $cash_debit)
                                            <option value="{{ $cash_debit }}">{{ $cash_debit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('cash_debit')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Invoice Type</label>
                                    <input type="text" class="form-control form-control-sm col-md-8" wire:model.defer="invoice_type">
                                </div>
                                @error('invoice_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Party A/C</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="part_a_c">
                                </div>
                                @error('part_a_c')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Effect</label>
                                    <select class="form-control form-control-sm form-select col-md-8" wire:model.defer="cash_debit">
                                        @foreach ($effect_items as $effect)
                                            <option value="{{ $effect }}">{{ $effect }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('effect')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Stack/Bill of Supply</label>
                                    <select class="form-control form-control-sm form-select col-md-8" wire:model.defer="cash_debit">
                                        @foreach ($tax_bill_of_supply_items as $tax_bill_of_supply)
                                            <option value="{{ $tax_bill_of_supply }}">{{ $tax_bill_of_supply }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tax_bill_of_supply')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-4">Reason</label>
                                    <input type="text" class="form-control form-control-sm col-md-8" wire:model.defer="reason">
                                </div>
                                @error('reason')
                                <span class="text-danger small wow flash">{{ $reason }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Vou Date</label>
                                        <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="vou_date">
                                    </div>
                                    @error('vou_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Voucher No</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="voucher_number">
                                </div>
                                @error('voucher_number')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Doc Date</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="doc_date">
                                </div>
                                @error('doc_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Doc No.</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="doc_no">
                                </div>
                                @error('doc_no ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Original Bill No</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="original_bill_no">
                                </div>
                                @error('original_bill_no ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Original Bill Date</label>
                                    <input type="text" class="form-control form-control-sm col-md-9" wire:model.defer="original_bill_date">
                                </div>
                                @error('original_bill_date ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Naration</label>
                                    <textarea rows="5" class="form-control form-control-sm col-md-9" wire:model.defer="naration">
                                    </textarea>
                                </div>
                                @error('naration ')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
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
        window.addEventListener('openRecordEditModal', event => {
            $('#recordEditModal').modal('show');
        });
    </script>

</div>
