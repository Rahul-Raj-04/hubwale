<?php

namespace App\Http\Controllers\Livewire\ECommerce\Store\Order;

use Livewire\Component;
use App\Models\ECommerceOrder;

class View extends Component
{
    public $order;

    public function render()
    {
        return view('livewire.e-commerce.store.order.view')->extends('livewire.e-commerce.store.app');
    }

    public function mount($orderId)
    {
        $this->order = ECommerceOrder::find($orderId);
        if ($this->order->user_id != auth()->user()->id) {
            abort(403, 'Unauthorized');
        }
    }
}
