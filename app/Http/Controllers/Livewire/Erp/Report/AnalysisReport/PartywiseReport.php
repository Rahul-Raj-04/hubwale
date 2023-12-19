<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AnalysisReport;

use Livewire\Component;

class PartywiseReport extends Component
{
    public function render()
    {
        return view('livewire.erp.report.analysis-report.partywise-report')->extends('erp.app');
    }
}
