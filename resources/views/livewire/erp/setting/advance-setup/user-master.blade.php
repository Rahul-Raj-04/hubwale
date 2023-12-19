<section>
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">File Cone</th>
                                    <th class="bg-primary text-white">Field Name</th>
                                    <th class="bg-primary text-white">Comment</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
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
                                <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1"  data-bs-toggle="modal"
                                    data-bs-target="#addUserMaster">
                                    <i class="fas fa-plus me-1"></i>
                                    Add
                                </a>
                                <a href="#" class="btn btn-primary btn-sm d-sm-none me-1" data-bs-toggle="modal"
                                    data-bs-target="#addUserMaster">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    <i class="fa fa-print me-0"></i>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Macro -->
    <div class="modal fade" id="addUserMaster" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">User Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add</li>
                    </ol>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addRecord">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-lable">File Code</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-lable">File Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-lable">Comment</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm">
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
    <div class="modal fade" id="userMasterEditModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Advance Setup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Auto Number</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateRecord">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-lable">File Code</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-lable">File Name</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-lable">Comment</label>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control form-control-sm">
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
                    <form wire:submit.prevent="deleteRecord" class="btn">
                        <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('userMasterEditModal', event => {
            $('#userMasterEditModal').modal('show');
        });
    </script>
</section>