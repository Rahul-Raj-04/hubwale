<?php

namespace App\Http\Controllers\Livewire\ECommerce\Category;

use App\Models\ECommerceCategory;
use App\Models\ECommerceProduct;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public $categories = [];
    public $categoryId;

    protected $listeners = [
        'deleteConfirmed'
    ];

    public function render()
    {
        return view('livewire.e-commerce.category.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->categories = ECommerceCategory::MyAllCategories()->get();
    }

    public function deleteCategory($categoryId)
    {
        $this->categoryId = $categoryId;
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
        if (ECommerceProduct::where('category_id', $this->categoryId)->orWhere('sub_category_id', $this->categoryId)->count() > 0) {
            toast('You can not delete this category.','error');
            return redirect()->route('e-commerce.category.index');
        }
        ECommerceCategory::find($this->categoryId)->delete();
        toast('Category Deleted Successfully.','success');
        return redirect()->route('e-commerce.category.index');
    }
}
