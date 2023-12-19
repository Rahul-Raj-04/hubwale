<?php

namespace App\Http\Controllers\Livewire\ECommerce\Store;

use App\Models\ECommerceBrand;
use Livewire\Component;
use App\Models\ECommerceProduct;
use App\Models\ECommerceCategory;
use App\Models\ECommercePermission;

class Index extends Component
{
    public $companyId;
    public $companyName;
    public $products = [];
    public $categories = [];
    public $storeUrl;
    public $category;
    public $stores;

    protected $queryString = ['category'];

    public $imageUrl;

    public function render()
    {
        return view('livewire.e-commerce.store.index')->extends('livewire.e-commerce.store.app');
    }

    public function mount($companyId, $companyName)
    {
        $storePermission = ECommercePermission::where(function ($query){
            $query->where(['user_id' => auth()->user()->id])->orWhere(['mobile' => auth()->user()->mobile]);
        })->where('company_id', $companyId)->first();

        if (!$storePermission) {
            abort(403, "You don't have permission to access this store");
        }
        session('company_info', ["companyId" => $companyId, "companyName" => $companyName]);
        $this->imageUrl = asset('img/new/imageNotFound.svg');
        $this->companyId = $companyId;
        $this->companyName = $companyName;
        if ($this->category) {
            $this->categories = ECommerceCategory::where(['company_id' => $companyId, 'type' => 'main', 'id' => $this->category])->get();
        } else {
            $this->categories = ECommerceCategory::where(['company_id' => $companyId, 'type' => 'main'])->get();
        }
        $this->storeUrl = route('e-commerce.store.index', ['companyId' => $companyId, 'companyName' => $companyName]);
        $this->stores = ECommercePermission::where('user_id', auth()->user()->id)->orWhere('mobile', auth()->user()->mobile)->get();
    }

}
