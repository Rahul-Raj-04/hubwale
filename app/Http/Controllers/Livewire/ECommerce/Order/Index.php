<?php

namespace App\Http\Controllers\Livewire\ECommerce\Order;

use App\Models\ECommerceOrder;
use Livewire\Component;

class Index extends Component
{
    public $orders = [];

    public function render()
    {
        return view('livewire.e-commerce.order.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->orders = ECommerceOrder::where('company_id', auth()->user()->company_id)->get();
    }
}
