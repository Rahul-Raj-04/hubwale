<?php

namespace App\Http\Controllers\Livewire\ECommerce\Product;

use App\Models\ECommerceBrand;
use App\Models\ECommerceCategory;
use App\Models\ECommerceProduct;
use App\Models\ECommerceProductVariation;
use App\Models\ECommerceSize;
use App\Models\ECommerceTax;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $productName;
    public $productCategory;
    public $productSubCategory;
    public $productBrand;
    public $productSupplierBrand;
    public $productDescription;
    public $productImages = [];
    public $productTax;
    public $productVariations = [];

    public $productCategories;
    public $productSubCategories;
    public $productBrands;
    public $productSupplierBrands;
    public $productTaxes;

    public $productVariationSizes = [];

    public $productVariationName; //size name
    public $productVariationPackagingType = "both";
    public $productVariationBoxPrice;
    public $productVariationPiecePerBox;
    public $productVariationPiecePrice;

    public function render()
    {
        return view('livewire.e-commerce.product.create')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->productCategories = ECommerceCategory::MyCategories()->get();
        $this->productSubCategories = ECommerceCategory::MySubCategories()->get();
        $this->productBrands = ECommerceBrand::where('company_id', auth()->user()->company_id)->where('type', 'own')->get();
        $this->productSupplierBrands = ECommerceBrand::where('company_id', auth()->user()->company_id)->where('type', 'supplier')->get();
        $this->productTaxes = ECommerceTax::where('company_id', auth()->user()->company_id)->get();
        $this->productVariationSizes = ECommerceSize::where('company_id', auth()->user()->company_id)->get();
    }

    public function saveProduct()
    {
        $this->validate([
            'productBrand' => ['required'],
            'productSupplierBrand' => ['required'],
            'productName' => ['required'],
            'productCategory' => ['required'],
            'productSubCategory' => ['required'],
            'productVariations' => ['required', 'array', 'min:1'],
        ],[
            'productVariations.required' => 'Please create atleast one product variation.'
        ]);

        $product = ECommerceProduct::create([
            'company_id' => auth()->user()->company_id,
            'category_id' => $this->productCategory,
            'sub_category_id' => $this->productSubCategory,
            'brand_id' => $this->productBrand,
            'supplier_brand_id' => $this->productSupplierBrand,
            'tax_id' => $this->productTax ?? null,
            'name' => $this->productName,
            'description' => $this->productDescription,
            'status' => true
        ]);

        foreach ($this->productVariations as $item) {
            ECommerceProductVariation::create([
                'product_id' => $product->id,
                'size_id' => $item['name'],
                'packaging_type' => $item['packaging_type'],
                'piece_per_box' => $item['piece_per_box'],
                'box_price' => $item['box_price'],
                'piece_price' => $item['piece_price'],
            ]);
        }

        foreach ($this->productImages as $image) {
            $product->addMedia($image)->toMediaCollection('images');
        }

        toast('Product created successfully.','success');
        return redirect()->route('e-commerce.product.index');
    }

    public function addVariation()
    {
        $this->validate([
            'productVariationName' => ['required'],
            'productVariationPackagingType' => ['required'],
            'productVariationBoxPrice' => ['required_if:productVariationPackagingType,box,both'],
            'productVariationPiecePerBox' => ['required_if:productVariationPackagingType,box,both'],
            'productVariationPiecePrice' => ['required_if:productVariationPackagingType,piece,both']
        ]);

        $this->productVariations[] = [
            'name' => $this->productVariationName,
            'actual_name' => ECommerceSize::find($this->productVariationName)->name,
            'packaging_type' => $this->productVariationPackagingType,
            'piece_per_box' => $this->productVariationPiecePerBox ?? 0,
            'box_price' => $this->productVariationBoxPrice ?? 0,
            'piece_price' => $this->productVariationPiecePrice ?? 0
        ];
        $this->reset('productVariationName', 'productVariationBoxPrice', 'productVariationPiecePerBox', 'productVariationPiecePrice');
    }

    public function deleteVariation($key)
    {
        unset($this->productVariations[$key]);
    }

}
