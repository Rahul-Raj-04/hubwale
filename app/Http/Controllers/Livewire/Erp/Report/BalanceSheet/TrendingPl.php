<?php

namespace App\Http\Controllers\Livewire\Erp\Report\BalanceSheet;

use Livewire\Component;

class TrendingPl extends Component
{
    public function render()
    {
        return view('livewire.erp.report.balance-sheet.trending-pl')->extends('erp.app');
    }
}
