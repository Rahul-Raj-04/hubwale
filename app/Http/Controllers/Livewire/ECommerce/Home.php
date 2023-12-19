<?php

namespace App\Http\Controllers\Livewire\ECommerce;

use App\Models\ECommerceCategory;
use App\Models\ECommerceOrder;
use App\Models\ECommerceOrderItem;
use App\Models\ECommerceProduct;
use App\Models\ECommerceVisitedProduct;
use Livewire\Component;

class Home extends Component
{
    public $products;
    public $orders;
    public $categories;
    public $totlaSales;
    public $storeUrl;
    public $visitedProducts = [];

    public function render()
    {
        return view('livewire.e-commerce.home')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->visitedProducts = ECommerceVisitedProduct::where('user_id', auth()->user()->id)->get();
        $this->products = ECommerceProduct::where('company_id', auth()->user()->company_id)->count();
        $this->orders = ECommerceOrder::where('company_id', auth()->user()->company_id)->count();
        $this->categories = ECommerceCategory::where('company_id', auth()->user()->company_id)->count();
        $this->totlaSales = ECommerceOrderItem::whereHas('product', function ($product){
            $product->where('company_id', auth()->user()->company_id);
        })->get()->sum(function ($item){
            return $item->total_amount;
        });
        $this->storeUrl = route('e-commerce.store.index', [auth()->user()->company_id, auth()->user()->company->company_name]);
    }
}
