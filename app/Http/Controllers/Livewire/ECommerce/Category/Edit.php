<?php

namespace App\Http\Controllers\Livewire\ECommerce\Category;

use App\Models\ECommerceCategory;
use Livewire\Component;

class Edit extends Component
{
    public $category_name;
    public $category_type;
    public $categoryId;
    public $category;

    public function render()
    {
        return view('livewire.e-commerce.category.edit')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->category = ECommerceCategory::find($this->categoryId);
        $this->category_name = $this->category->name;
        $this->category_type = $this->category->type;
    }

    public function updateCategory()
    {
        $this->validate([
            'category_name' => ['required']
        ]);

        $this->category->name = $this->category_name;
        $this->category->save();
        toast('Category updated successfully.','success');
        return redirect()->route('e-commerce.category.index');
    }
}
