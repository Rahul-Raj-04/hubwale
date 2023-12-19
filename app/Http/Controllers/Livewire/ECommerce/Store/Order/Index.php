<?php

namespace App\Http\Controllers\Livewire\ECommerce\Store\Order;

use Livewire\Component;
use App\Models\ECommerceOrder;

class Index extends Component
{
    public $orders = [];

    public function render()
    {
        return view('livewire.e-commerce.store.order.index')->extends('livewire.e-commerce.store.app');
    }

    public function mount()
    {
        $this->orders = ECommerceOrder::where('user_id', auth()->user()->id)->get();
    }
}
