<?php

namespace App\Http\Controllers\Livewire\Erp\Report\OtherReport;

use Livewire\Component;

class TemplateList extends Component
{
    public function render()
    {
        return view('livewire.erp.report.other-report.template-list')->extends('erp.app');
    }
}
