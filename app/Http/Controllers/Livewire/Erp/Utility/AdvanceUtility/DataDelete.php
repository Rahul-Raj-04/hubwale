<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility;

use Livewire\Component;

class DataDelete extends Component
{
    public function yes()
    {
        $this->dispatchBrowserEvent('select-data-modal');
    }
    public function render()
    {
        return view('livewire.erp.utility.advance-utility.data-delete')->extends('erp.app');
    }
}
