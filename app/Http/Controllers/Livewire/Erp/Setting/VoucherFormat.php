<?php

namespace App\Http\Controllers\Livewire\Erp\Setting;

use Livewire\Component;

class VoucherFormat extends Component
{


    public $report_type = 'Sales Bill';
    public $type;
    public $format_type;
    public $print_mode;
    public $label_type;


    /**
     *  edit record
     * 
     * @return null
     * @author Ibrahim Mustapha
     */
    public function editRecord($id)
    {
        $this->dispatchBrowserEvent('edit_record');
    }



    /**
     *  render method
     * 
     * @author Ibrahim Mustapha
     */
    public function render()
    {
        return view('livewire.erp.setting.voucher-format');
    }
}
