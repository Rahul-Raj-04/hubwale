<?php

namespace App\Http\Controllers\Livewire\ECommerce\Status;

use Livewire\Component;
use App\Models\ECommerceStatus;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    use LivewireAlert;

    public $paymentStatuses = [];
    public $orderStatuses = [];
    public $statusId;

    protected $listeners = [
        'deleteConfirmed'
    ];

    public function render()
    {
        return view('livewire.e-commerce.status.index')->extends('livewire.e-commerce.app');
    }

    public function mount()
    {
        $this->paymentStatuses = ECommerceStatus::where(['company_id' => auth()->user()->company_id, 'type' => 'payment_status'])->get();
        $this->orderStatuses = ECommerceStatus::where(['company_id' => auth()->user()->company_id, 'type' => 'order_status'])->get();
    }

    public function deleteCategory($statusId)
    {
        $this->statusId = $statusId;
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
        ECommerceStatus::find($this->statusId)->delete();
        toast('Status Deleted Successfully.','success');
        return redirect()->route('e-commerce.status.index');
    }
}
