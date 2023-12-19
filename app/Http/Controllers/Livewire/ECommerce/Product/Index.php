<?php

namespace App\Http\Controllers\Livewire\ECommerce\Product;

use App\Models\ECommerceCategory;
use Livewire\Component;
use App\Models\ECommerceProduct;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class Index extends Component
{
    use LivewireAlert, WithFileUploads;

    public $products = [];
    public $productId;
    public $productIdForUploadImage;
    public $productBulkImages;
    public $productImages;
    public $productBulkImagesCategory;
    public $productImagesCategories;

    protected $listeners = [
        'deleteConfirmed'
    ];

    public function render()
    {
        return view('livewire.e-commerce.product.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->products = ECommerceProduct::MyProducts()->get();
        $this->productImagesCategories = ECommerceCategory::MyCategories()->get();
    }

    public function deleteProduct($productId)
    {
        $this->productId = $productId;
        $this->alert('error', 'Are you sure you want to delete?', [
            'position' => 'center',
            'timer' => '',
            'toast' => true,
            'showConfirmButton' => true,
            'onConfirmed' => 'deleteConfirmed',
            'showDenyButton' => false,
            'onDenied' => '',
            'showCancelButton' => true,
            'onDismissed' => '',
            'cancelButtonText' => 'No',
            'confirmButtonText' => 'Yes',
            'text' => ''
        ]);
    }

    public function deleteConfirmed()
    {
        ECommerceProduct::find($this->productId)->delete();
        toast('Product Deleted Successfully.','success');
        return redirect()->route('e-commerce.product.index');
    }

    public function openUploadFilesModal($productId)
    {
        $this->productIdForUploadImage = $productId;
        $this->dispatchBrowserEvent('openUploadFilesModal');
    }

    public function updatedProductBulkImages()
    {
        $this->alert('info', "Uploaded!", [
            'position' => 'top-right',
        ]);
    }

    public function uploadBulkImages()
    {
        if (is_null($this->productBulkImages)) {
            $this->alert('error', "Please select images, if selected then click on upload again.", [
                'position' => 'top-right',
            ]);
            return 0;
        }

        if (is_null($this->productBulkImagesCategory)) {
            $this->alert('error', "Please select category, if selected then click on upload again.", [
                'position' => 'top-right',
            ]);
            return 0;
        }

        $supportedMimes = [
            'image/png',
            'image/jpeg',
            'image/jpg',
        ];
        
        if ($this->productBulkImages) {
            foreach ($this->productBulkImages as $image) {
                if (in_array($image->getMimeType(), $supportedMimes)) {
                    $this->alert('info', "Uploading ".$image->getClientOriginalName(), [
                        'position' => 'top-right',
                    ]);

                    $imageName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $foundProduct = ECommerceProduct::MyProducts()
                        ->where('name', $imageName)
                        ->whereHas('category', function ($cat) {
                            $cat->where('id', $this->productBulkImagesCategory);
                        })
                        ->first();
                    if ($foundProduct) {
                        $foundProduct->addMedia($image)->toMediaCollection('images');
                    }
                }
            }
            toast('Image Uploaded successfully.','success');
        } else {
            toast('Image Not Uploaded, Please select images.','error');
        }
        return redirect()->route('e-commerce.product.index');
    }

    public function uploadFileModal()
    {
        if (is_null($this->productImages)) {
            $this->alert('error', "Please select images.", [
                'position' => 'top-right',
            ]);
            return 0;
        }

        $supportedMimes = [
            'image/png',
            'image/jpeg',
            'image/jpg',
        ];
        
        if ($this->productImages) {
            $product = ECommerceProduct::find($this->productIdForUploadImage);
            foreach ($this->productImages as $image) {
                if (in_array($image->getMimeType(), $supportedMimes)) {
                    $this->alert('info', "Uploading ".$image->getClientOriginalName(), [
                        'position' => 'top-right',
                    ]);
                    $product->addMedia($image)->toMediaCollection('images');
                }
            }
            toast('Image Uploaded successfully.','success');
        } else {
            toast('Image Not Uploaded, Please select images.','error');
        }
        return redirect()->route('e-commerce.product.index');
    }
}
