<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility;

use Livewire\Component;
use App\Models\Account;

class AccountMerge extends Component
{
    public $accounts = [];

    public function mount()
    {
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();
    }

    public function render()
    {
        return view('livewire.erp.utility.advance-utility.account-merge')->extends('erp.app');
    }
}
