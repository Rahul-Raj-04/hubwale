<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AnalysisReport;

use Livewire\Component;

class FundFlow extends Component
{
    public function render()
    {
        return view('livewire.erp.report.analysis-report.fund-flow')->extends('erp.app');
    }
}
