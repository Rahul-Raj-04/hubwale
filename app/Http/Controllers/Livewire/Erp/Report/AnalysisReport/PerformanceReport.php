<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AnalysisReport;

use Livewire\Component;

class PerformanceReport extends Component
{
    public function render()
    {
        return view('livewire.erp.report.analysis-report.performance-report')->extends('erp.app');
    }
}
