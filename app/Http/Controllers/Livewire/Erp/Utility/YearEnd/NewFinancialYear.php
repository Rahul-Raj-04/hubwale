<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\YearEnd;

use Livewire\Component;

class NewFinancialYear extends Component
{
    public function render()
    {
        return view('livewire.erp.utility.year-end.new-financial-year')->extends('erp.app');
    }
}
