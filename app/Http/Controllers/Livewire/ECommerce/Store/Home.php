<?php

namespace App\Http\Controllers\Livewire\ECommerce\Store;

use Livewire\Component;
use App\Models\ECommercePermission;
use App\Models\ECommerceVisitedProduct;

class Home extends Component
{
    public $stores;
    public $visitedProducts = [];

    public function render()
    {
        return view('livewire.e-commerce.store.home')->extends('livewire.e-commerce.store.app');
    }

    function mount() {
        $this->stores = ECommercePermission::where('user_id', auth()->user()->id)->orWhere('mobile', auth()->user()->mobile)->get();
        $this->visitedProducts = ECommerceVisitedProduct::where('user_id', auth()->user()->id)->get();
    }
}
