<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Balance Sheet</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Trial Balance</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Opening Balance</li>
                </ol>
            </div>

            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-1 text-end">
                            From
                        </div>
                        <div class="col-md-2">
                            <input type="date" id="from" name="from">
                        </div>
                        <div class="col-md-1 text-end">
                            To
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="to">
                        </div>
                    </div>
                </form>
                
                <table class="table table-bordered text-nowrap border-bottom datatable-common1">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Index No.</th>
                            <th class="bg-primary text-white">Account Name</th>
                            <th class="bg-primary text-white">City</th>
                            <th class="bg-primary text-white">Debit</th>
                            <th class="bg-primary text-white">Credit</th>
                            <th class="bg-primary text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accounts as $account)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->city ? $account->city->name : '' }}</td>
                                <td>{{ $account->balance_type == 'debit' ? $account->opening_balance : '' }}</td>
                                <td>{{ $account->balance_type == 'credit' ? $account->opening_balance : '' }}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-outline-info" wire:click="editBalance({{ $account->id }})">
                                        Edit Bal.
                                    </a>
                                    <a href="{{ route('erp.master.account.edit', ['account' => $account->id, 'edit_type' => 'opening_balance']) }}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $account->id }}">
                                        <span class="ttt" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-danger">{{ $account->where('balance_type', 'debit')->sum('opening_balance') }}</td>
                            <td class="text-danger">{{ $account->where('balance_type', 'credit')->sum('opening_balance') }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                    <div class="btn-list">
                        <a href="{{ route('erp.master.account.create', ['add_type' => 'opening_balance']) }}" class="btn btn-primary btn-sm me-1">
                            <i class="fas fa-plus me-1"></i>
                            Add
                        </a>
                        <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                            <i class="fa fa-print me-0"></i>
                            Print
                        </a>
                        <a href="#" class="btn btn-primary btn-sm d-sm-none me-1">
                            <i class="fa fa-print me-0"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Master
                        </a>
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Filter
                        </a>
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Format
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($accounts as $key => $account)
        <div class="modal fade" id="delete-modal-{{ $account->id }}">
            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body text-center p-4 pb-5">
                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                        <button class="btn btn-danger pd-x-25" wire:click="delete({{$account->id}})" data-bs-dismiss="modal" aria-label="Close">OK</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="edit-balance-model" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Balance</h4>
                    <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Opening Balance</lable>
                            </div>
                            <div class="col-md-6">
                                <input type="number" class="form-control" wire:model.defer="opening_balance">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <lable>Credit/Debit</lable>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" wire:model.defer="balance_type">
                                    <option value="credit">Credit</option>
                                    <option value="debit">Debit</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <label for="addressDetails" wire:click="updateBalance" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save</label>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('open_balance_edit_model', event => {
        $('#edit-balance-model').modal('show');
    });
    window.addEventListener('entry_table', event => {
        $(".datatable-common1").DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            paging: false,
            ordering: false,
            info: false,
            sScrollY : 350,
            searching:true,
            sScrollX : true,
            scrollX : true,
        });
        $('.datatable-common1').addClass('mt-2');
        $('.datatable-common1').css("width","100%");
        $('.dataTables_scrollHeadInner').css("width","100%");
    });

    $(document).ready(function() {
        $(".datatable-common1").DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
            },
            paging: false,
            ordering: false,
            info: false,
            sScrollY : 350,
            searching:true,
            sScrollX : true,
            scrollX : true,
        });
        $('.datatable-common1').addClass('mt-2');
        $('.datatable-common1').css("width","100%");
        $('.dataTables_scrollHeadInner').css("width","100%");
    });
</script>