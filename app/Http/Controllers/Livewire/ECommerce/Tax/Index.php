<?php

namespace App\Http\Controllers\Livewire\ECommerce\Tax;

use Livewire\Component;
use App\Models\ECommerceTax;
use App\Models\ECommerceProduct;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $taxes = [];
    public $taxId;

    protected $listeners = [
        'deleteConfirmed'
    ];

    public function render()
    {
        return view('livewire.e-commerce.tax.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->taxes = ECommerceTax::where('company_id', auth()->user()->company_id)->get();
    }

    public function deleteRecord($taxId)
    {
        $this->taxId = $taxId;
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
        if (ECommerceProduct::where('tax_id', $this->taxId)->count() > 0) {
            toast('You can not delete this tax.','error');
            return redirect()->route('e-commerce.tax.index');
        }
        ECommerceTax::find($this->taxId)->delete();
        toast('Record Deleted Successfully.','success');
        return redirect()->route('e-commerce.tax.index');
    }
}
