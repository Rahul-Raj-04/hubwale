<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstrReturn;

use App\Models\SaleEntry;
use Livewire\Component;

class Gstr1 extends Component
{
    public $report_period = "monthly";
    public $isReportModal  = true;
    public $return_period = 4;
    public $from_date = "";
    public $to_date = "";

    public $gstr1_type = 'Summary For B2B';
    public $saleEntries = [];

    public $showB2csEntry = false;
    public $b2csSaleEntry;

    public $showCnrEntry = false;
    public $cnrSaleEntries = [];

    public $showCnurEntry = false;
    public $cnurSaleEntries = [];

    public function mount()
    {
        $this->saleEntries = SaleEntry::where('company_id', auth()->user()->company->id)->whereHas('party_ac', function($acc){
            $acc->where('registration_type', 'regular')->where('gstin_no', '!=', null );
        })->get();
    }

    public function updatedGstr1Type()
    {
        if($this->gstr1_type == 'Summary For B2B')
        {
            $this->saleEntries = SaleEntry::where('company_id', auth()->user()->company->id)->whereHas('party_ac', function($acc){
                $acc->where('registration_type', 'regular')->where('gstin_no', '!=', null );
            })->get();

        } elseif ($this->gstr1_type == 'Business to consumer summary')
        {
            $this->saleEntries = SaleEntry::where('company_id', auth()->user()->company->id)->whereHas('party_ac', function($acc){
                $acc->where('registration_type', 'consumer');
            })->get()->unique('group_id');
        }
        elseif ($this->gstr1_type == 'Credit note to registered')
        {
            $this->saleEntries = SaleEntry::where('company_id', auth()->user()->company->id)->whereHas('party_ac', function($acc){
                $acc->where('gstin_no', '!=', null );
            })->get()->unique('group_id');
        }
        elseif ($this->gstr1_type == 'Credit note to UN-registered')
        {
            $this->saleEntries = SaleEntry::where('company_id', auth()->user()->company->id)->whereHas('party_ac', function($acc){
                $acc->where('gstin_no', null )->where('registration_type', 'unregistered');
            })->get()->unique('group_id');
        }
        $this->dispatchBrowserEvent('data-table');
        $this->showB2csEntry = false;
        $this->showCnrEntry = false;
        $this->showCnurEntry = false;
    }

    public function showB2csEntry($id)
    {
        $this->b2csSaleEntry = SaleEntry::find($id);
        if($this->b2csSaleEntry) {
            $this->showB2csEntry = true;
        }
        $this->showCnrEntry = false;
        $this->showCnurEntry = false;
        $this->dispatchBrowserEvent('data-table');
    }

    public function showCnrEntry($id)
    {
        $this->cnrSaleEntries = SaleEntry::where('group_id', $id)->get();
        if($this->cnrSaleEntries)
        {
            $this->showCnrEntry = true;
        }
        $this->showB2csEntry = false;
        $this->showCnurEntry = false;
        $this->dispatchBrowserEvent('data-table');
    }

    public function showCnurEntry($id)
    {
        $this->cnurSaleEntries = SaleEntry::where('group_id', $id)->get();
        if($this->cnurSaleEntries)
        {
            $this->showCnurEntry = true;
        }
        $this->showB2csEntry = false;
        $this->showCnrEntry = false;
        $this->dispatchBrowserEvent('data-table');
    }

    /**
     * set report period
     *
     * @return void
     * @author Ibrahim Mustapha
     */
    public function setReportPeriod()
    {
        $this->validate([
            'return_period' => 'required',
        ]);

        $this->isReportModal = false;
        $this->dispatchBrowserEvent('data-table');
    }



    /**
     * render method
     *
     * @return \Illuminate\Http\Response
     * @author Ibrahim Mustapha
     */ 
    public function render()
    {
        return view('livewire.erp.gst.gstr-return.gstr1')->extends('erp.app');
    }
}
