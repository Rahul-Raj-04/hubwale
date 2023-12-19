<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup;

use Livewire\Component;

class UserMaster extends Component
{
    public function render()
    {
        return view('livewire.erp.setting.advance-setup.user-master')->extends('erp.app');
    }

    public function mount()
    {
        # code...
    }

    public function editRecord($id)
    {
        $this->dispatchBrowserEvent('userMasterEditModal');
        
    }

    public function deleteRecord()
    {
        # code...
    }

    public function updateRecord()
    {
        # code...
    }

    public function addRecord()
    {
        # code...
    }
}