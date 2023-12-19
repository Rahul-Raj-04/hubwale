<?php

namespace App\Http\Controllers\Livewire\ECommerce\Status;

use Livewire\Component;
use App\Models\ECommerceStatus;

class Edit extends Component
{
    public $status_name;
    public $status_type;
    public $statusId;
    public $status;

    public function render()
    {
        return view('livewire.e-commerce.status.edit')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->status = ECommerceStatus::find($this->statusId);
        $this->status_name = $this->status->name;
        $this->status_type = $this->status->type;
    }

    public function updateStatus()
    {
        $this->validate([
            'status_name' => ['required'],
            'status_type' => ['required', 'in:payment_status,order_status']
        ]);

        $this->status->name = $this->status_name;
        $this->status->type = $this->status_type;
        $this->status->save();
        toast('Status updated successfully.','success');
        return redirect()->route('e-commerce.status.index');
    }
}
