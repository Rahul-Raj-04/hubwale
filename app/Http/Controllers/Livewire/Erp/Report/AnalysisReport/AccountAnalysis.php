<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AnalysisReport;

use Livewire\Component;

class AccountAnalysis extends Component
{
    public function render()
    {
        return view('livewire.erp.report.analysis-report.account-analysis')->extends('erp.app');
    }
}
