<?php

namespace App\Http\Controllers\Livewire\Erp\Report\AnalysisReport;

use Livewire\Component;

class SalesPurchaseReport extends Component
{
    public function render()
    {
        return view('livewire.erp.report.analysis-report.sales-purchase-report')->extends('erp.app');
    }
}
