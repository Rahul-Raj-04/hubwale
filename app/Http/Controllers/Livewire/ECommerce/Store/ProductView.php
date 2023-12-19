<?php

namespace App\Http\Controllers\Livewire\ECommerce\Store;

use Livewire\Component;
use App\Models\ECommerceCart;
use App\Models\ECommerceProduct;
use App\Models\ECommerceVisitedProduct;
use Illuminate\Validation\ValidationException;
use App\Models\ECommercePermission;

class ProductView extends Component
{
    public $product;
    public $companyId;
    public $companyName;
    public $currentVariation;
    public $packagingType;
    public $quantity = 1;
    public $storeUrl;
    public $imageUrl;

    public function render()
    {
        return view('livewire.e-commerce.store.product-view')->extends('livewire.e-commerce.store.app');
    }

    public function mount($companyId, $companyName, $productId)
    {
        $storePermission = ECommercePermission::where(function ($query){
            $query->where(['user_id' => auth()->user()->id])->orWhere(['mobile' => auth()->user()->mobile]);
        })->where('company_id', $companyId)->first();

        if (!$storePermission) {
            abort(403, "You don't have permission to access this store");
        }
        $this->imageUrl = asset('img/new/imageNotFound.svg');
        $this->companyId = $companyId;
        $this->companyName = $companyName;
        $this->product = ECommerceProduct::find($productId);

        $isProductVisited = ECommerceVisitedProduct::where(['product_id' => $productId, 'user_id' => auth()->user()->id])->first();
        if (!$isProductVisited) {
            ECommerceVisitedProduct::create([
                'user_id' => auth()->user()->id,
                'product_id' => $productId,
                'company_id' => $companyId
            ]);
        }

        $this->currentVariation = $this->product->variations->first();
        if ($this->currentVariation->packaging_type == 'box') {
            $this->packagingType = 'box';
        } elseif ($this->currentVariation->packaging_type == 'piece') {
            $this->packagingType = 'piece';
        } else {
            $this->packagingType = 'box';
        }
        $this->storeUrl = route('e-commerce.store.index', [$companyId, $companyName]);
    }

    public function changeVariation($id)
    {
        $this->currentVariation = $this->product->variations->find($id);
        if ($this->currentVariation->packaging_type == 'box') {
            $this->packagingType = 'box';
        } elseif ($this->currentVariation->packaging_type == 'piece') {
            $this->packagingType = 'piece';
        } else {
            $this->packagingType = 'box';
        }
    }

    public function changePackageType($type)
    {
        $this->packagingType = $type;
    }

    public function addToCart()
    {
        $this->validate([
            'quantity' => ['required', 'numeric', 'min:1', 'max:10000']
        ]);

        $cartStatus = ECommerceCart::latest()->first();
        if ($cartStatus && $cartStatus->product->company_id !== $this->companyId) {
            throw ValidationException::withMessages([
                'quantity' => ['Different store product is added in cart, Please clear cart first,'],
            ]);
        }

        ECommerceCart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $this->product->id,
            'product_variation_id' => $this->currentVariation->id,
            'packaging_type' => $this->packagingType,
            'quantity' => $this->quantity
        ]);
        session()->flash('message', 'Product added to cart.');
    }
}
