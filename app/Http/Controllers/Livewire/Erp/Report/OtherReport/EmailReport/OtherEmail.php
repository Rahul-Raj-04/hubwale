<?php

namespace App\Http\Controllers\Livewire\Erp\Report\OtherReport\EmailReport;

use Livewire\Component;

class OtherEmail extends Component
{
    public function render()
    {
        return view('livewire.erp.report.other-report.email-report.other-email')->extends('erp.app');
    }
}
