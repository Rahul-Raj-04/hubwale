<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User Field</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Field Id</th>
                                    <th class="bg-primary text-white">Name</th>
                                    <th class="bg-primary text-white">Type</th>
                                    <th class="bg-primary text-white">Length</th>
                                    <th class="bg-primary text-white">Seq</th>
                                    <th class="bg-primary text-white">Help</th>
                                    <th class="bg-primary text-white">Status</th>
                                    <th class="bg-primary text-white">Last Value</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>Test</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info" wire:click="editRecord({{ 1 }})" data-bs-toggle="modal" data-bs-target="#edit-macro">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </span>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-">
                                            <span class="ttt" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-0"  data-bs-toggle="modal"
                                    data-bs-target="#addUserField">
                                    <i class="fas fa-plus me-1"></i>
                                    Add
                                </a>
                                <a href="#" class="btn btn-primary btn-sm d-sm-none me-0" data-bs-toggle="modal"
                                    data-bs-target="#addUserField">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Macro -->
    <div class="modal fade" id="addUserField" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User Field</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addUserField">
                        <h4>Field Description</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Voucher Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Placement</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option value="Header">Header</option>
                                            <option value="Middle">Middle</option>
                                            <option value="Footer">Footer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Field ID</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Sequence</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Field Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Field Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option value="Character">Character</option>
                                            <option value="Numeric">Numeric</option>
                                            <option value="Memo">Memo</option>
                                            <option value="Date">Date</option>
                                            <option value="Document">Document</option>
                                            <option value="Image">Image</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Length</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Decimal</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Other Info.</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Master File</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option>None</option>
                                            <option>A/C Group Master</option>
                                            <option>Account Area Master</option>
                                            <option>Account City Master</option>
                                            <option>Account Master</option>
                                            <option>Product Category Master</option>
                                            <option>Product Group Master</option>
                                            <option>Product Master</option>
                                            <option>Purchase Invoice Type</option>
                                            <option>Sales Invoice Type</option>
                                            <option>SalesMan Master</option>
                                            <option>User Name</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Format</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <input type="checkbox" required>
                                    <label for="group_name">Macro</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <input type="checkbox" required>
                                    <label for="group_name">Proper</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <input type="checkbox" required>
                                    <label for="group_name">Exit With Enter</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" id="submitForm" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                    <label for="submitForm" class="btn btn-primary">Ok</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit UserField -->
    <div class="modal fade" id="userFieldEditModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User Field</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addUserField">
                        <h4>Field Description</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Voucher Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Placement</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option value="Header">Header</option>
                                            <option value="Middle">Middle</option>
                                            <option value="Footer">Footer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Field ID</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Sequence</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Field Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Field Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Type</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option value="Character">Character</option>
                                            <option value="Numeric">Numeric</option>
                                            <option value="Memo">Memo</option>
                                            <option value="Date">Date</option>
                                            <option value="Document">Document</option>
                                            <option value="Image">Image</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Length</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Decimal</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4>Other Info.</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Master File</label>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control form-control-sm">
                                            <option>None</option>
                                            <option>A/C Group Master</option>
                                            <option>Account Area Master</option>
                                            <option>Account City Master</option>
                                            <option>Account Master</option>
                                            <option>Product Category Master</option>
                                            <option>Product Group Master</option>
                                            <option>Product Master</option>
                                            <option>Purchase Invoice Type</option>
                                            <option>Sales Invoice Type</option>
                                            <option>SalesMan Master</option>
                                            <option>User Name</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-lable">Format</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row border">
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <input type="checkbox" required>
                                    <label for="group_name">Macro</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <input type="checkbox" required>
                                    <label for="group_name">Proper</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mt-2">
                                    <input type="checkbox" required>
                                    <label for="group_name">Exit With Enter</label>
                                </div>
                            </div>
                        </div>
                        <input type="submit" id="submitForm" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                    <label for="editsubmitForm" class="btn btn-primary">Ok</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-modal-">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger">Are you sure you want to delete?</h4>
                    <form wire:submit.prevent="deleteMacro" class="btn">
                        <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('openUserFieldEditModal', event => {
            $('#userFieldEditModal').modal('show');
        });
    </script>
</section>