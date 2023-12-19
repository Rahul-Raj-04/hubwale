<?php

namespace App\Http\Controllers\Livewire\Erp\Report\BalanceSheet\TrialBalance;

use Livewire\Component;
use App\Models\Account;

class OpeningBalance extends Component
{
    public $accounts = [];
    public $opening_balance;
    public $balance_type;

    public $updateBalanceAccount;
    public function mount()
    {
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();
    }

    public function editBalance($id)
    {
        $this->updateBalanceAccount = Account::find($id);
        if($this->updateBalanceAccount){
            $this->opening_balance = $this->updateBalanceAccount->opening_balance;
            $this->balance_type = $this->updateBalanceAccount->balance_type;
        }
        $this->dispatchBrowserEvent('open_balance_edit_model');
        $this->dispatchBrowserEvent('entry_table');

    }

    public function updateBalance()
    {
        $this->updateBalanceAccount->opening_balance = $this->opening_balance;
        $this->updateBalanceAccount->balance_type = $this->balance_type;
        $this->updateBalanceAccount->save();
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();
        $this->dispatchBrowserEvent('entry_table');
    }

    public function delete($id)
    {
        $account = Account::find($id);
        if($account){
            $account->delete();
        }
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();
        $this->dispatchBrowserEvent('entry_table');
    }

    public function render()
    {
        return view('livewire.erp.report.balance-sheet.trial-balance.opening-balance')->extends('erp.app');
    }
}
