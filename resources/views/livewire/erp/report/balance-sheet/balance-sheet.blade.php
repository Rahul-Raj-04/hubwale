<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Balance Sheet</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Balance Sheet</li>
                </ol>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-control form-control-sm" wire:model="trial_balance_type">
                                <option value="Namewise">Namewise</option>
                                <option value="GroupwiseDetail">Groupwise Detail</option>
                                <option value="Groupwise">Groupwise</option>
                            </select>
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
                @if($trial_balance_type == 'GroupwiseDetail')
                    <div class="row">
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white text-center"></th>
                                        <th class="bg-primary text-white text-center">Liability</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($credit_groups as $credit_group)
                                        <tr>
                                            <td></td>
                                            <td class="text-danger">{{$credit_group->name}}</td>
                                        </tr>
                                        @foreach($credit_group->accounts->where('balance_type', 'credit') as $credit_account)
                                            <tr>
                                                <td>{{ count($credit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $credit_account->ledger_account_balance->last()->closing_balance)) : ($credit_account->opening_balance ? $credit_account->opening_balance : '') }}</td>
                                                <td>{{$credit_account->name}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white text-center"></th>
                                        <th class="bg-primary text-white text-center">Asset</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($debit_groups as $debit_group)
                                        <tr>
                                            <td></td>
                                            <td class="text-danger">{{$debit_group->name}}</td>
                                        </tr>
                                        @foreach($debit_group->accounts->where('balance_type', 'debit') as $debit_account)
                                            <tr>
                                                <td>{{ count($debit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $debit_account->ledger_account_balance->last()->closing_balance)) : ($debit_account->opening_balance ? $debit_account->opening_balance : '') }}</td>
                                                <td>{{$debit_account->name}}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($trial_balance_type == 'Namewise')
                    <div class="row">
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white text-center"></th>
                                        <th class="bg-primary text-white text-center">Liability</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($credit_accounts as $credit_account)
                                        <tr>
                                            <td>{{ count($credit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $credit_account->ledger_account_balance->last()->closing_balance)) : ($credit_account->opening_balance ? $credit_account->opening_balance : '') }}</td>
                                            <td>{{ $credit_account->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white text-center"></th>
                                        <th class="bg-primary text-white text-center">Asset</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($debit_accounts as $debit_account)
                                        <tr>
                                            <td>{{ count($debit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $debit_account->ledger_account_balance->last()->closing_balance)) : ($debit_account->opening_balance ? $debit_account->opening_balance : '') }}</td>
                                            <td>{{ $debit_account->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($trial_balance_type == 'Groupwise')
                    <div class="row">
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white text-center"></th>
                                        <th class="bg-primary text-white text-center">Liability</th>
                                        <th class="bg-primary text-white text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($credit_groups as $credit_group)
                                        <tr>
                                            <td></td>
                                            <td class="text-danger">{{ $credit_group->name }}</td>
                                            <td><button class="btn btn-sm btn-outline-primary" wire:click="groupWiseShowCredit({{$credit_group->id}})">Show</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white text-center"></th>
                                        <th class="bg-primary text-white text-center">Asset</th>
                                        <th class="bg-primary text-white text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($debit_groups as $debit_groups)
                                        <tr>
                                            <td></td>
                                            <td class="text-danger">{{ $debit_groups->name }}</td>
                                            <td><button class="btn btn-sm btn-outline-primary" wire:click="groupWiseShowDebit({{$debit_groups->id}})">Show</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
                <div class="col-auto ms-auto d-print-none mt-5 pe-0">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Date
                        </a>
                        <a href="#" class="btn btn-primary btn-sm d-none d-sm-inline-block me-1">
                            <i class="fa fa-print me-0"></i>
                            Print
                        </a>
                        <a href="#" class="btn btn-primary btn-sm d-sm-none me-1">
                            <i class="fa fa-print me-0"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Ledger
                        </a>
                        
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Format
                        </a>
                        
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            P & L A/C
                        </a>
                        
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Trending A/C
                        </a>
                        
                        <a href="#" class="btn btn-primary btn-sm me-1">
                            Tranding + P&L
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="groupwise-credit-entry-show" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Schedule For Group</h4>
                    <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    
                    <div class="table-responsive">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                {{ $groupWise ? $groupWise->name : '' }}
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
                        <table class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white text-center">Particulars</th>
                                    <th class="bg-primary text-white text-center">Credit</th>
                                    <th class="bg-primary text-white text-center">Debit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupWiseAccounts  as $credit_account)
                                    <tr>
                                        <td>{{ $credit_account->name }}</td>
                                        <td>{{ count($credit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $credit_account->ledger_account_balance->last()->closing_balance)) : ($credit_account->opening_balance ? $credit_account->opening_balance : '') }}</td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <label for="addressDetails" wire:click="updateBalance" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save</label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="groupwise-debit-entry-show" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Schedule For Group</h4>
                    <a href="#" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                </div>
                <div class="modal-body">
                    
                    <div class="table-responsive">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                {{ $groupWise ? $groupWise->name : '' }}
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
                        <table class="table table-bordered text-nowrap border-bottom">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white text-center">Particulars</th>
                                    <th class="bg-primary text-white text-center">Credit</th>
                                    <th class="bg-primary text-white text-center">Debit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($groupWiseAccounts  as $debit_account)
                                    <tr>
                                        <td>{{ $debit_account->name }}</td>
                                        <td></td>
                                        <td>{{ count($debit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $debit_account->ledger_account_balance->last()->closing_balance)) : ($debit_account->opening_balance ? $debit_account->opening_balance : '') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <label for="addressDetails" wire:click="updateBalance" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save</label>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script>
    window.addEventListener('groupwise_credit_entry_show', event => {
        $('#groupwise-credit-entry-show').modal('show');
    });
    window.addEventListener('groupwise_debit_entry_show', event => {
        $('#groupwise-debit-entry-show').modal('show');
    });
</script>