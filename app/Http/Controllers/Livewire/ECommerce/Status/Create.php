<?php

namespace App\Http\Controllers\Livewire\ECommerce\Status;

use Livewire\Component;
use App\Models\ECommerceStatus;

class Create extends Component
{
    public $status_name;
    public $status_type;

    public function render()
    {
        return view('livewire.e-commerce.status.create')->extends('livewire.e-commerce.app');
    }

    public function saveCategory()
    {
        $this->validate([
            'status_name' => ['required'],
            'status_type' => ['required', 'in:payment_status,order_status']
        ]);
        ECommerceStatus::create([
            'company_id' => auth()->user()->company_id,
            'name' => $this->status_name,
            'type' => $this->status_type,
        ]);
        toast('Status created successfully.','success');
        return redirect()->route('e-commerce.status.index');
    }
}
