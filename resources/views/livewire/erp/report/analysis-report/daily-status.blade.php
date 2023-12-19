<div class="row row-sm m-1">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header p-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Report</a></li>
                    <li class="breadcrumb-item"><a href="#">Analysis Report</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daily Status</li>
                </ol>
            </div>
            <div class="card-body p-2">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary btn-sm" wire:click="openSetup">Setup</a>
                            <!-- <a href="#" class="btn btn-primary">Large Font</a> -->
                        </div>
                        <form>
                            <div class="col-md-1">
                                <label>From</label>
                            </div>
                            <div class="col-md-2">
                                <input type="date" class="form-control form-control-sm">
                            </div>
                            
                            <div class="col-md-1">
                                <label>To</label>
                            </div>
                            <div class="col-md-2">
                                <input type="date" class="form-control form-control-sm">
                            </div>
                        </form>
                    </div>

                <div class="table-responsive mt-3">
                    @if($openSetup)
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Format</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-danger" colspan="2">(Static) Acount Ledger</td>
                                </tr>
                                <tr>
                                    <td>(Static) Test Format</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-">
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    
                        <div class="col-auto ms-auto d-print-none pe-0">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1" data-bs-toggle="modal" data-bs-target="#format-type-modal">
                                    <i class="fas fa-plus me-1"></i>
                                    Add
                                </a>
                                <a href="#" class="btn btn-primary btn-sm d-sm-none me-1" data-bs-toggle="modal" data-bs-target="#format-type-modal">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Ad.Option
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Save & Exit
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Select
                                </a>
                            </div>
                        </div>
                    @endif
                </div>                
            </div>
        </div>
    </div>
    <div class="modal fade" id="format-type-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Format List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="addFormat">
                        <div class="form-group mt-2">
                            <label for="group_name">Format List</label>
                            <select class="form-control form-control-sm" required>
                                <option>(Static) Test Type 1</option>
                                <option>(Static) Test Type 2</option>
                                <option>(Static) Test Type 3</option>
                                <option>(Static) Test Type 4</option>
                            </select>
                        </div>
                        <input type="submit" id="addButton" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                    <label for="addButton" class="btn btn-primary">Ok</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="add-format-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Report Format Setup:Account Ledger</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">+</button>
                </div>
                <div class="modal-body">
                    @if($addModalOpenContent == 0)
                        <form wire:submit.prevent="addFormat">
                            <div class="row mb-3">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm">
                                        <option value="">(Static) Step 1</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Description</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Report Header</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Zooming</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Vertical Line</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm">
                                        <option value="None">None</option>
                                        <option value="Hair Line">Hair Line</option>
                                        <option value="Blank Line">Blank Line</option>
                                        <option value="Dotted Line">Dotted Line</option>
                                        <option value="Dashed">Dashed</option>
                                        <option value="Solid">Solid</option>
                                        <option value="Dash-Dot">Dash-Dot</option>
                                        <option value="Dash-Dot-Dot">Dash-Dot-Dot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Filter</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Line Between Entry</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm">
                                        <option value="None">None</option>
                                        <option value="Hair Line">Hair Line</option>
                                        <option value="Blank Line">Blank Line</option>
                                        <option value="Dotted Line">Dotted Line</option>
                                        <option value="Dashed">Dashed</option>
                                        <option value="Solid">Solid</option>
                                        <option value="Dash-Dot">Dash-Dot</option>
                                        <option value="Dash-Dot-Dot">Dash-Dot-Dot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Grand Total</label>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control form-control-sm">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <input type="submit" id="addButton" class="d-none"> -->
                        </form>
                    @elseif($addModalOpenContent == 1)
                        <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Seq</th>
                                    <th class="bg-primary text-white">Group Name</th>
                                    <th class="bg-primary text-white">Header</th>
                                    <th class="bg-primary text-white">Width</th>
                                    <th class="bg-primary text-white">Dec</th>
                                    <th class="bg-primary text-white">Supress Group</th>
                                    <th class="bg-primary text-white">Display</th>
                                    <th class="bg-primary text-white">Footer Line</th>
                                    <th class="bg-primary text-white">Page Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-auto ms-auto d-print-none pe-0">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Selection
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Filter
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Extra Group
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Group Header
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Group Footer
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Change Line
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Page Detail
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Display
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Supress Group
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Incr.Seq
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Decr.Seq
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Swap Seq.Up
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Swap Seq.Down
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Insert Seq.
                                </a>
                            </div>
                        </div>
                    @elseif($addModalOpenContent == 2)
                        <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Seq</th>
                                    <th class="bg-primary text-white">Group Name</th>
                                    <th class="bg-primary text-white">Width</th>
                                    <th class="bg-primary text-white">Dec</th>
                                    <th class="bg-primary text-white">Non Zero</th>
                                    <th class="bg-primary text-white">Order</th>
                                    <th class="bg-primary text-white">Alignment</th>
                                    <th class="bg-primary text-white">Font Size</th>
                                    <th class="bg-primary text-white">Style</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-auto ms-auto d-print-none pe-0">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Selection
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Filter
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Order
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Non Zero
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Alignment
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Font Size
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Style
                                </a>
                            </div>
                        </div>
                    @elseif($addModalOpenContent == 3)
                    <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Seq</th>
                                    <th class="bg-primary text-white">Line</th>
                                    <th class="bg-primary text-white">Description</th>
                                    <th class="bg-primary text-white">Header</th>
                                    <th class="bg-primary text-white">Width</th>
                                    <th class="bg-primary text-white">Dec</th>
                                    <th class="bg-primary text-white">Total</th>
                                    <th class="bg-primary text-white">Non Zero</th>
                                    <th class="bg-primary text-white">Stretch</th>
                                    <th class="bg-primary text-white">Column Group</th>
                                    <th class="bg-primary text-white">Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-auto ms-auto d-print-none pe-0">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Selection
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Filter
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Extra Detail
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Total
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Non Zero
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Ad.Option
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Stretch
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Level
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Column Group
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Incr.Seq
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Decr.Seq
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Swap Seq.Up
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Swap Seq.Down
                                </a>
                                <a href="#" class="btn btn-primary btn-sm me-1">
                                    Insert Seq.
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary btn-sm me-1">
                        Ad.Option
                    </a>
                    <a href="#" class="btn btn-primary btn-sm me-1" wire:click="back">
                        Back
                    </a>
                    <a href="#" class="btn btn-primary btn-sm me-1" wire:click="next">
                        Next
                    </a>
                    <!-- <label for="addButton" class="btn btn-sm btn-primary">Next</label> -->
                    <a href="#" class="btn btn-primary btn-sm me-1">
                        Finish
                    </a>                    
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
                    <form class="btn">
                        <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('format-list-modal-close', event => {
            $('#format-type-modal').modal('hide')
            $('#add-format-modal').modal('show')
        });
        
        window.addEventListener('datatable', event => { 
            $(".datatable-common1").DataTable({
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                },
                paging: false,
                ordering: false,
                info: false,
                sScrollY : 200,
                searching:true,
                sScrollX : true,
                scrollX : true,
            });
            $('.datatable-common1').addClass('mt-2');
            $('.datatable-common1').css("width","100%");
            $('.dataTables_scrollHeadInner').css("width","100%");
        });
    </script>
</div>