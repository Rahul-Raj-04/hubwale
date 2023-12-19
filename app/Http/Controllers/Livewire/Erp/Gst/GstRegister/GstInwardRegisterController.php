<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstRegister;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class GstInwardRegisterController extends Component
{

    use LivewireAlert;

    public $cash_debit = 'Cash';
    public $part_a_c = '';
    public $stock_effect = 'Yes';
    public $effect = 'Increase Sales';
    public $tax_bill_of_supply = 'Tax Invoice';
    public $reason = '';
    public $vou_date = '';
    public $voucher_number = '';
    public $doc_date = '';
    public $doc_no = '';
    public $original_bill_no = '';
    public $original_bill_date = '';
    public $naration;

    public $cash_debit_items = ['Cash', 'Debit'];
    public $stock_effect_items = ['Yes', 'No'];
    public $effect_items = ['Increase Sales', 'Increase Purchase', 'Decrease Sales', 'Decrease Purchase'];
    public $tax_bill_of_supply_items = ['Tax Invoice', 'Bill of Supply', 'Other'];





    /**
     * delete record
     * 
     * @author Ibrahim Mustapha
     */
    public function deleteRecord($id)
    {

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



    /**
     * edit record
     * 
     * @author Ibrahim Mustapha
     */
    public function editRecord($id)
    {
        $this->dispatchBrowserEvent('openRecordEditModal');
    }



    /**
     * save record
     * 
     * @author Ibrahim Mustapha
     */
    public function saveRecord()
    {
    }


    
    /**
     * render method
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return view('livewire.erp.gst.gst-register.gst-inward-register')->extends('erp.app');
    }


}
