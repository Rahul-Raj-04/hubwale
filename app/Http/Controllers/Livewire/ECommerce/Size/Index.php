<?php

namespace App\Http\Controllers\Livewire\ECommerce\Size;

use Livewire\Component;
use App\Models\ECommerceSize;
use App\Models\ECommerceProductVariation;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $sizes = [];
    public $sizeId;

    protected $listeners = [
        'deleteConfirmed'
    ];

    public function render()
    {
        return view('livewire.e-commerce.size.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->sizes = ECommerceSize::where('company_id', auth()->user()->company_id)->get();
    }

    public function deleteRecord($sizeId)
    {
        $this->sizeId = $sizeId;
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
        if (ECommerceProductVariation::where('size_id', $this->sizeId)->count() > 0) {
            toast('You can not delete this size.','error');
            return redirect()->route('e-commerce.size.index');
        }
        ECommerceSize::find($this->sizeId)->delete();
        toast('Size Deleted Successfully.','success');
        return redirect()->route('e-commerce.size.index');
    }
}
