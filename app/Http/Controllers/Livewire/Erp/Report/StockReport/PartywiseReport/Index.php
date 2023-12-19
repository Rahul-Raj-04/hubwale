<?php

namespace App\Http\Controllers\Livewire\Erp\Report\StockReport\PartywiseReport;

use Livewire\Component;
use App\Models\Account;

class Index extends Component
{
    public $accounts;
    public function mount()
    {
        $this->accounts = Account::where('company_id', auth()->user()->company_id)->get();
    }
    
    public function render()
    {
        return view('livewire.erp.report.stock-report.partywise-report.index')->extends('erp.app');
    }
}
