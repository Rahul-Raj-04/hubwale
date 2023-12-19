<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Report</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Balance Sheet</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Trial Balance</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Trial Balance</li>
                </ol>
            </div>
            <div class="card-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select class="form-control form-control-sm" wire:model="trial_balance_type">
                                <option value="Namewise">Namewise</option>
                                <option value="GroupwiseDetail">Groupwise Detail</option>
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
                                        <th class="bg-primary text-white text-center">Credit</th>
                                        <th class="bg-primary text-white text-center">Credit</th>
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
                                        <th class="bg-primary text-white text-center">Debit</th>
                                        <th class="bg-primary text-white text-center">Debit</th>
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
                                        <th class="bg-primary text-white text-center">Credit</th>
                                        <th class="bg-primary text-white text-center">Credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($credit_accounts as $credit_account)
                                        <tr>
                                            <td>{{ count($credit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $credit_account->ledger_account_balance->last()->closing_balance)) : ($credit_account->opening_balance ? $credit_account->opening_balance : '') }}</td>
                                            <td class="text-danger">{{ $credit_account->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 table-responsive">
                            <table class="table table-bordered text-nowrap border-bottom datatable-common">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-white text-center">Debit</th>
                                        <th class="bg-primary text-white text-center">Debit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($debit_accounts as $debit_account)
                                        <tr>
                                            <td>{{ count($debit_account->ledger_account_balance) > 0 ? ucfirst(str_replace( '-', '', $debit_account->ledger_account_balance->last()->closing_balance)) : ($debit_account->opening_balance ? $debit_account->opening_balance : '') }}</td>
                                            <td class="text-danger">{{ $debit_account->name }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
