<?php

namespace App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\TrialBalance;

use Livewire\Component;
use App\Models\Account;
use App\Models\AccountGroup;

class TrialBalance extends Component
{
    public $trial_balance_type;
    public $credit_accounts = [];
    public $debit_accounts = [];

    public $credit_groups = [];
    public $debit_groups = [];

    public function mount()
    {
        $this->trial_balance_type = 'Namewise';
        $this->credit_accounts = Account::where(['company_id' => auth()->user()->company->id, 'balance_type' => 'credit'])->get();
        $this->debit_accounts = Account::where(['company_id' => auth()->user()->company->id, 'balance_type' => 'debit'])->get();
        $this->credit_groups = AccountGroup::whereHas('accounts', function($acc){
            $acc->where('balance_type', 'credit');
        })->get();
        $this->debit_groups = AccountGroup::whereHas('accounts', function($acc){
            $acc->where('balance_type', 'debit');
        })->get();
    }

    public function render()
    {
        return view('livewire.erp.report.balance-sheet.trial-balance.trial-balance')->extends('erp.app');
    }
}
