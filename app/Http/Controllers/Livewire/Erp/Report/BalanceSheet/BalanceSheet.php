<?php

namespace App\Http\Controllers\Livewire\Erp\Report\BalanceSheet;

use Livewire\Component;
use App\Models\Account;
use App\Models\AccountGroup;

class BalanceSheet extends Component
{
    public $trial_balance_type;
    public $credit_accounts = [];
    public $debit_accounts = [];

    public $credit_groups = [];
    public $debit_groups = [];

    public $groupWise;
    public $groupWiseAccounts = [];

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

    public function groupWiseShowDebit($id)
    {
        $this->groupWise = AccountGroup::find($id);
        $this->groupWiseAccounts = $this->groupWise->accounts->where('balance_type', 'debit');
        $this->dispatchBrowserEvent('groupwise_debit_entry_show');
    }

    public function groupWiseShowCredit($id)
    {
        $this->groupWise = AccountGroup::find($id);
        $this->groupWiseAccounts = $this->groupWise->accounts->where('balance_type', 'credit');
        $this->dispatchBrowserEvent('groupwise_credit_entry_show');
    }

    public function render()
    {
        return view('livewire.erp.report.balance-sheet.balance-sheet')->extends('erp.app');
    }
}
