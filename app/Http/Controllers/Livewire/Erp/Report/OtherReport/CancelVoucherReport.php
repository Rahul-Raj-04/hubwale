<?php

namespace App\Http\Controllers\Livewire\Erp\Report\OtherReport;

use Livewire\Component;

class CancelVoucherReport extends Component
{
    public function render()
    {
        return view('livewire.erp.report.other-report.cancel-voucher-report')->extends('erp.app');
    }
}
