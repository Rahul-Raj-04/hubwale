<?php

namespace App\Http\Controllers\Livewire\ECommerce\Product;

use App\Imports\ECommerceProductImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class Import extends Component
{
    use WithFileUploads;

    public $file;
    public $fileErrors = [];

    public function render()
    {
        return view('livewire.e-commerce.product.import')->extends('livewire.e-commerce.app');
    }

    public function importProducts()
    {
        $this->validate(['file' => ['required']], ['file.required' => 'Please select excel file.']);
        try {
            Excel::import(new ECommerceProductImport, $this->file);
            toast('Products Imported successfully.','success');
            return redirect()->route('e-commerce.product.index');
        } catch (ValidationException $e) {
            $failures = $e->failures();
            foreach ($failures as $key => $failure) {
                $this->fileErrors[$key]['row'] =  $failure->row();
                $this->fileErrors[$key]['attribute'] =  $failure->attribute();
                $this->fileErrors[$key]['errors'] =  $failure->errors();
            }
        }
    }
}
