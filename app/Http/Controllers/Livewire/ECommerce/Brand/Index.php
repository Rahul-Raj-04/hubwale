<?php

namespace App\Http\Controllers\Livewire\ECommerce\Brand;

use Livewire\Component;
use App\Models\ECommerceBrand;
use App\Models\ECommerceProduct;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $brands = [];
    public $brandId;

    protected $listeners = [
        'deleteConfirmed'
    ];

    public function render()
    {
        return view('livewire.e-commerce.brand.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->brands = ECommerceBrand::where('company_id', auth()->user()->company_id)->get();
    }

    public function deleteCategory($brandId)
    {
        $this->brandId = $brandId;
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
        if (ECommerceProduct::where('brand_id', $this->brandId)->count() > 0) {
            toast('You can not delete this brand.','error');
            return redirect()->route('e-commerce.brand.index');
        }
        ECommerceBrand::find($this->brandId)->delete();
        toast('Brand Deleted Successfully.','success');
        return redirect()->route('e-commerce.brand.index');
    }
}
