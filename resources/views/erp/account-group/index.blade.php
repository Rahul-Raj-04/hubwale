@extends('erp.app')
@section('customCss')
<style>
    #account-gr-datatable_wrapper div:nth-child(2) div {
        overflow-x: auto;
        padding: 0;
    }

    #account-gr-datatable_wrapper div:nth-child(2) {
        margin: 0;
    }
</style>
@endsection
@section('content')
    <div class="row row-sm m-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header p-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Master</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account Groups</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                    <div class="col-auto ms-auto d-print-none pe-0">
                        <div class="btn-list">
                            <a href="{{ route('erp.master.account-group.create') }}" class="btn btn-sm btn-primary d-none d-sm-inline-block">
                                <i class="fas fa-plus me-1"></i>
                                Add Account Group
                            </a>
                            <a href="{{ route('erp.master.account-group.create') }}" class="btn btn-sm btn-primary d-sm-none">
                                <i class="fas fa-plus"></i>
                            </a>
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-file-export"></i> Export
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('erp.master.account-group.export', 'excel') }}">Excel</a></li>
                                <li><a href="{{ route('erp.master.account-group.export', 'pdf') }}">PDF</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body p-3">
                    <!-- <div class="table-responsive"> -->
                        <table class="table table-bordered text-nowrap border-bottom datatable-common">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Group Name</th>
                                    <th class="bg-primary text-white">Super Group</th>
                                    <th class="bg-primary text-white">Sequence</th>
                                    <th class="bg-primary text-white">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center text-danger">
                                    <td colspan='4'><h4><b>{{\App\Enum\Enum::TRADING}}</b></h4></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                </tr>
                                @foreach ($account_groups as $key => $group)
                                    @if($group->category == \App\Enum\Enum::TRADING)
                                        <tr>
                                            <td>{{ $group->name }}</td>
                                            <td>{{ $group->parent_group ? $group->parent_group->name : '-' }}</td>
                                            <td>{{ $group->sequence }}</td>
                                            <td>
                                                <a href="{{route('erp.master.account-group.edit', $group->id)}}" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                @if($group->is_default)
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#is-default-modal">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $group->id }}">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr class="text-center text-danger">
                                    <td colspan='4'><h4><b>{{\App\Enum\Enum::PROFITLOSS}}</b></h4></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                </tr>
                                @foreach ($account_groups as $key => $group)
                                    @if($group->category == \App\Enum\Enum::PROFITLOSS)
                                        <tr>
                                            <td>{{ $group->name }}</td>
                                            <td>{{ $group->parent_group ? $group->parent_group->name : '-' }}</td>
                                            <td>{{ $group->sequence }}</td>
                                            <td>
                                                <a href="{{route('erp.master.account-group.edit', $group->id)}}" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                @if($group->is_default)
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#is-default-modal">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $group->id }}">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr class="text-center text-danger">
                                    <td colspan='4'><h4><b>{{\App\Enum\Enum::BALANCESHEET}}</b></h4></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                </tr>
                                @foreach ($account_groups as $key => $group)
                                    @if($group->category == \App\Enum\Enum::BALANCESHEET)
                                        <tr>
                                            <td>{{ $group->name }}</td>
                                            <td>{{ $group->parent_group ? $group->parent_group->name : '-' }}</td>
                                            <td>{{ $group->sequence }}</td>
                                            <td>
                                                <a href="{{route('erp.master.account-group.edit', $group->id)}}" class="btn btn-sm btn-outline-info">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                </a>
                                                @if($group->is_default)
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#is-default-modal">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @else
                                                    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $group->id }}">
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </span>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    <!-- </div> -->

                    {{-- modals --}}
                    @foreach ($account_groups as $key => $val)
                        <div class="modal fade" id="delete-modal-{{ $val->id }}">
                            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                <div class="modal-content tx-size-sm">
                                    <div class="modal-body text-center p-4 pb-5">
                                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                        <h4 class="text-danger">Are you sure you want to delete this item?</h4>
                                        <form action="{{route('erp.master.account-group.destroy', $val->id)}}" method="POST" class="btn">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="Delete" class="btn btn-danger pd-x-25">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- Default account group is not be update or delete --}}
                    <div class="modal fade" id="is-default-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-body text-center p-4 pb-5">
                                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                                    <h4 class="text-danger">Predefine Group cannot be deleted</h4>
                                    <button class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Ok</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('customJs')
<script>
    //______Basic Data Table
    $('#account-gr-datatable').DataTable({
        language: {
            searchPlaceholder: 'Search...',
            scrollX: "100%",
            sSearch: '',
        },
        "ordering": false,
        "bSort" : false,
        pageLength : 12,
        lengthMenu: [[12, 20, 50, -1], [12, 20, 50, 'All']]
    });
</script>
@endsection