<?php

namespace App\Http\Controllers\Livewire\ECommerce\Store;

use Livewire\Component;
use App\Models\ECommerceCart;
use App\Models\ECommerceOrder;
use App\Models\ECommerceOrderItem;

class Checkout extends Component
{
    public $products;
    public $name;
    public $street_address;
    public $city;
    public $state;
    public $country = "INDIA";
    public $pincode;
    public $remarks;
    public $payment_method = 'cash';
    public $payment_status_id = null;
    public $order_status_id = null;

    public function render()
    {
        return view('livewire.e-commerce.store.checkout')->extends('livewire.e-commerce.store.app');
    }

    public function mount()
    {
        $user = auth()->user();
        $this->products = ECommerceCart::where('user_id', auth()->user()->id)->get();
        if ($user->company) {
            $this->name = $user->name;
            $this->street_address = $user->company->address;
            $this->city = $user->company->city;
            $this->state = $user->company->state;
            $this->country = $user->company->country;
            $this->pincode = $user->company->pincode;
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'name' => ['required'],
            'street_address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'pincode' => ['required'],
        ]);

        $cart = ECommerceCart::where('user_id', auth()->user()->id)->get();
        $order = ECommerceOrder::create([
            'company_id' => $cart->first()->product->company_id,
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'pincode' => $this->pincode,
            'remarks' => $this->remarks,
            'payment_method' => $this->payment_method,
            'payment_status_id' => $this->payment_status_id,
            'order_status_id' => $this->order_status_id
        ]);
        foreach ($cart as $product) {
            ECommerceOrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->product->id,
                'variation_id' => $product->product_variation->id,
                'packaging_type' => $product->packaging_type,
                'quantity' => $product->quantity,
                'price' => $product->product_variation->packaging_type == 'box' ? $product->product_variation->box_price : $product->product_variation->piece_price,
                'discount' => 0,
                'tax' => $product->product->tax ? $product->product->tax->tax : 0,
                'payment_status_id' => $this->payment_status_id,
                'order_status_id' => $this->order_status_id
            ]);
            $product->delete();
        }
        toast('Order Placed successfully.','success');
        return redirect()->route('e-commerce.store.order');
    }
}
