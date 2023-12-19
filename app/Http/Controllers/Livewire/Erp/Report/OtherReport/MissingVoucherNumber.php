<?php

namespace App\Http\Controllers\Livewire\Erp\Report\OtherReport;

use Livewire\Component;

class MissingVoucherNumber extends Component
{
    public function render()
    {
        return view('livewire.erp.report.other-report.missing-voucher-number')->extends('erp.app');
    }
}
