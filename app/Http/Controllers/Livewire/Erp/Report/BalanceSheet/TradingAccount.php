<?php

namespace App\Http\Controllers\Livewire\Erp\Report\BalanceSheet;

use Livewire\Component;

class TradingAccount extends Component
{
    public function render()
    {
        return view('livewire.erp.report.balance-sheet.trading-account')->extends('erp.app');
    }
}
