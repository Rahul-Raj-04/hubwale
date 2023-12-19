<?php

namespace App\Http\Controllers\Livewire\ECommerce\Category;

use App\Models\ECommerceCategory;
use Livewire\Component;


class Create extends Component
{
    public $category_name;
    public $category_type = 'main';

    public function render()
    {
        return view('livewire.e-commerce.category.create')->extends('livewire.e-commerce.app');
    }

    public function saveCategory()
    {
        $this->validate([
            'category_name' => ['required'],
            'category_type' => ['required']
        ]);
        ECommerceCategory::create([
            'company_id' => auth()->user()->company_id,
            'name' => $this->category_name,
            'type' => $this->category_type
        ]);
        toast('Category created successfully.','success');
        return redirect()->route('e-commerce.category.index');
    }
}
