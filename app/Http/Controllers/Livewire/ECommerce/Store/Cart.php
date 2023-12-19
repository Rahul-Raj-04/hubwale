<?php

namespace App\Http\Controllers\Livewire\ECommerce\Store;

use App\Models\ECommerceCart;
use Livewire\Component;

class Cart extends Component
{
    public $products;

    public function render()
    {
        return view('livewire.e-commerce.store.cart')->extends('livewire.e-commerce.store.app');
    }

    public function mount()
    {
        $this->products = ECommerceCart::where('user_id', auth()->user()->id)->get();
    }

    public function removeProductFromCart($cartId)
    {
        $cart = ECommerceCart::find($cartId);
        $cart->delete();
        $this->products = ECommerceCart::where('user_id', auth()->user()->id)->get();
    }
}
