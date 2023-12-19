<!-- Account Ledger -->
<!-- <div class="card-body"> -->
    <!-- <div class="table-responsive"> -->
        <table class="table table-bordered text-nowrap border-bottom report_table">
            <thead>
                <tr>
                    <th class="bg-primary text-white">Index No.</th>
                    <th class="bg-primary text-white">Account Name</th>
                    <th class="bg-primary text-white">City</th>
                    <th class="bg-primary text-white">Group Name</th>
                    <th class="bg-primary text-white">Opening Balance</th>
                    <th class="bg-primary text-white">Closing Balance</th>
                    <th class="bg-primary text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $account->name }}</td>
                        <td>{{ $account->city ? $account->city->name : '' }}</td>
                        <td>{{ $account->account_group ? $account->account_group->name : '' }}</td>
                        <td>{{ $account->opening_balance }}</td>
                        <td class="{{ ($account->ledger_account_balance->last() ? $account->ledger_account_balance->last()->closing_balance < 0 : false)  ? 'text-danger' : ''}}">{{ count($account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $account->ledger_account_balance->last()->closing_balance)) : '' }}</td>
                        <td>
                            <a href="{{ route('erp.report.account-book.ledger.allShow', ['id' => $account->id, 'type' => 'account_ladger']) }}" class="btn btn-sm btn-outline-success">Show</a>
                            @if($account->is_default)
                                <a href="{{ route('erp.master.account.edit', $account->id) }}?edit_type=ledger" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#is-default-modal">
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </apan>
                                </a>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#is-default-modal">
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </span>
                                </button>
                            @else
                                <a href="{{ route('erp.master.account.edit', $account->id) }}?edit_type=ledger" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $account->id }}">
                                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </span>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <!-- </div> -->


    {{-- modals --}}
    @foreach ($accounts as $key => $account)
        <div class="modal fade" id="delete-modal-{{ $account->id }}">
            <div class="modal-dialog modal-dialog-centered text-center" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body text-center p-4 pb-5">
                        <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                        <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                        <h4 class="text-danger">Are you sure you want to delete?</h4>
                        <form action="{{route('erp.master.account.destroy', $account->id)}}" method="POST" class="btn">
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
                    <h4 class="text-danger">Account cannot be deleted, because it is created by External Module(Due to Default Account)</h4>
                    <button class="btn btn-danger pd-x-25" data-bs-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
