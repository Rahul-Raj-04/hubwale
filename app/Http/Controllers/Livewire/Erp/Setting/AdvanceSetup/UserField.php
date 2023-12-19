<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\AdvanceSetup;

use Livewire\Component;

class UserField extends Component
{
    public function render()
    {
        return view('livewire.erp.setting.advance-setup.user-field')->extends('erp.app');
    }

    public function editRecord($id)
    {
        $this->dispatchBrowserEvent('openUserFieldEditModal');
        
    }

    public function mount()
    {
        
    }
}
