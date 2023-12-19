<?php

namespace App\Http\Controllers\Livewire\Erp\Report\OtherReport;

use Livewire\Component;

class SmsReport extends Component
{
    public function render()
    {
        return view('livewire.erp.report.other-report.sms-report')->extends('erp.app');
    }
}
