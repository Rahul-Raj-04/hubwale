<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup;

use Livewire\Component;

class AutoNumber extends Component
{
    public function mount()
    {
        # code...
    }

    public function render()
    {
        return view('livewire.erp.setting.advance-setup.auto-number')->extends('erp.app');
    }
    
    public function editRecord($id)
    {
        $this->dispatchBrowserEvent('openAutoNumberEditModal');
    }

    public function editAutoNumber()
    {
        # code...
    }
    
    public function addAutoNumber()
    {
        # code...
    }

    public function deleteRecord()
    {
        # code...
    }
}
