<?php

namespace App\Http\Controllers\Livewire\ECommerce\Product;

use App\Models\ECommerceBrand;
use App\Models\ECommerceProduct;
use App\Models\ECommerceCategory;
use App\Models\ECommerceProductVariation;
use App\Models\ECommerceTax;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ECommerceSize;

class Edit extends Component
{
    use WithFileUploads;

    public $productId;
    public $product;

    public $productName;
    public $productCategory;
    public $productSubCategory;
    public $productBrand;
    public $productSupplierBrand;
    public $productDescription;
    public $productImages;
    public $productTax;
    
    public $productVariations = [];
    public $productVariationSizes = [];

    public $productCategories;
    public $productSubCategories;
    public $productBrands;
    public $productSupplierBrands;
    public $productTaxes;

    public $productVariationName;
    public $productVariationPackagingType = "both";
    public $productVariationBoxPrice;
    public $productVariationPiecePerBox;
    public $productVariationPiecePrice;
    
    public $deleteMediaArray = [];
    public $deleteproductVariationsArray = [];

    public function render()
    {
        return view('livewire.e-commerce.product.edit')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->productCategories = ECommerceCategory::myCategories()->get();
        $this->productSubCategories = ECommerceCategory::MySubCategories()->get();
        $this->productBrands = ECommerceBrand::where('company_id', auth()->user()->company_id)->where('type', 'own')->get();
        $this->productSupplierBrands = ECommerceBrand::where('company_id', auth()->user()->company_id)->where('type', 'supplier')->get();
        $this->productTaxes = ECommerceTax::where('company_id', auth()->user()->company_id)->get();
        $this->product = ECommerceProduct::find($this->productId);
        foreach ($this->product->variations as $item) {
            $this->productVariations[$item->id] = [
                'is_old' => true,
                'id' => $item->id,
                'name' => $item->name,
                'actual_name' => ECommerceSize::find($item->size_id) ? ECommerceSize::find($item->size_id)->name : '',
                'packaging_type' => $item->packaging_type,
                'box_price' => $item->box_price,
                'piece_per_box' => $item->piece_per_box,
                'piece_price' => $item->piece_price,
            ];
        }

        $this->productName = $this->product->name;
        $this->productDescription = $this->product->description;
        $this->productCategory = $this->product->category_id;
        $this->productSubCategory = $this->product->sub_category_id;
        $this->productBrand = $this->product->brand_id;
        $this->productSupplierBrand = $this->product->supplier_brand_id;
        $this->productDescription = $this->product->description;
        $this->productTax = $this->product->tax_id;
        $this->productVariationSizes = ECommerceSize::where('company_id', auth()->user()->company_id)->get();
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
            'is_old' => false,
            'name' => $this->productVariationName,
            'actual_name' => ECommerceSize::find($this->productVariationName)->name,
            'packaging_type' => $this->productVariationPackagingType,
            'piece_per_box' => $this->productVariationPiecePerBox,
            'box_price' => $this->productVariationBoxPrice,
            'piece_price' => $this->productVariationPiecePrice,
        ];
        $this->reset('productVariationName', 'productVariationBoxPrice', 'productVariationPiecePrice', 'productVariationPiecePerBox');
    }

    public function deleteVariation($key)
    {
        $this->deleteproductVariationsArray[$key] = $this->productVariations[$key];
        unset($this->productVariations[$key]);
    }

    public function deleteMedia($id)
    {
        $this->deleteMediaArray[] = $id;
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

        $this->product->update([
            'brand_id' => $this->productBrand,
            'supplier_brand_id' => $this->productSupplierBrand,
            'category_id' => $this->productCategory,
            'sub_category_id' => $this->productSubCategory,
            'tax_id' => $this->productTax,
            'name' => $this->productName,
            'description' => $this->productDescription,
            'status' => true
        ]);

        foreach ($this->deleteMediaArray as $mediaId) {
            $this->product->getMedia('images')->find($mediaId)->delete();
        }
        
        if ($this->productImages) {
            foreach ($this->productImages as $image) {
                $this->product->addMedia($image)->toMediaCollection('images');
            }
        }

        foreach ($this->deleteproductVariationsArray as $item) {
            ECommerceProductVariation::find($item['id'])->delete();
        }

        foreach ($this->productVariations as $productVariation) {
            if (!$productVariation['is_old']) {
                ECommerceProductVariation::create([
                    'product_id' => $this->product->id,
                    'size_id' => $productVariation['name'],
                    'packaging_type' => $productVariation['packaging_type'],
                    'piece_per_box' => $productVariation['piece_per_box'],
                    'box_price' => $productVariation['box_price'],
                    'piece_price' => $productVariation['piece_price'],
                ]);
            }
        }

        toast('Product update successfully.','success');
        return redirect()->route('e-commerce.product.index');
    }
}
