<?php

namespace App\Http\Controllers\Livewire\Erp\Setting;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class VoucherNumber extends Component
{

    use LivewireAlert;


    /**
     * delete Record
     * 
     * @return null
     * @author Ibrahim Mustapha
     */
    public function deleteRecord($id)
    {
        $this->deleteRecordId = $id;

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
     * edit Record
     * 
     * @return null
     * @author Ibrahim Mustapha
     */
    public function editRecord()
    {
        $this->dispatchBrowserEvent('openRecordEditModal');
    }


    public function render()
    {
        return view('livewire.erp.setting.voucher-number');
    }
}
