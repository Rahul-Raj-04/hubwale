<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\DataUtility;

use Livewire\Component;

class FinancialYearDelete extends Component
{
    public function render()
    {
        return view('livewire.erp.utility.data-utility.financial-year-delete')->extends('erp.app');
    }
}
