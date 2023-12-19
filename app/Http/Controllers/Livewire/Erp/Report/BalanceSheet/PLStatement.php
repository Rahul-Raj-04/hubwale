<?php

namespace App\Http\Controllers\Livewire\Erp\Report\BalanceSheet;

use Livewire\Component;

class PLStatement extends Component
{
    public function render()
    {
        return view('livewire.erp.report.balance-sheet.p-l-statement')->extends('erp.app');
    }
}
