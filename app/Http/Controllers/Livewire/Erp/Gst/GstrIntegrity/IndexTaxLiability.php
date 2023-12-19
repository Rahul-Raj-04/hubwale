<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\GstrIntegrity;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class IndexTaxLiability extends Component
{

    use LivewireAlert;

	public $report_period = 'monthly';
	public $return_data_integrity = 4;

	public $registration_type_items = ['Regualar', 'consumer', 'Unregistered', 'Composition'];


	
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
        $this->dispatchBrowserEvent('hideRecordEditModal');
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
            'return_data_integrity' => 'required',
        ]);

        $this->isReportModal = false;
		$this->dispatchBrowserEvent('hide_model');

    }



	public function mount()
	{
		// 
	}

	public function monthFilter()
	{
		$this->dispatchBrowserEvent('hide_model');
		$this->dispatchBrowserEvent('report_table');
	}
	
	public function export()
	{
		$this->dispatchBrowserEvent('report_table');
	}

    public function render()
    {
        return view('livewire.erp.gst.gstr-integrity.index-tax-liability')->extends('erp.app');
    }
}
