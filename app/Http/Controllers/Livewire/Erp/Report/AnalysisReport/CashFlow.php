<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AnalysisReport;

use Livewire\Component;

class CashFlow extends Component
{
    public function render()
    {
        return view('livewire.erp.report.analysis-report.cash-flow')->extends('erp.app');
    }
}
