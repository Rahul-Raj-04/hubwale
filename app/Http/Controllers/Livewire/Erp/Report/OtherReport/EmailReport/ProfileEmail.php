<?php

namespace App\Http\Controllers\Livewire\Erp\Report\OtherReport\EmailReport;

use Livewire\Component;

class ProfileEmail extends Component
{
    public function render()
    {
        return view('livewire.erp.report.other-report.email-report.profile-email')->extends('erp.app');
    }
}
