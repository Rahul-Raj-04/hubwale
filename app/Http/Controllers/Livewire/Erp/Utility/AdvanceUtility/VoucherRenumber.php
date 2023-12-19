<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\AdvanceUtility;

use Livewire\Component;

class VoucherRenumber extends Component
{
    public $voutypes = [];

    public function mount()
    {
        $this->voutypes = [
            'Bank Payment',
            'Bank Receipt',
            'Cash Payment',
            'Cash Receipt',
            'Consultant-Bank Receipt',
            'Consultant-Cash Receipt',
            'Credit Note',
            'Debit Note',
            'Direct Invoice',
            'GST Bank Payment',
            'GST Cash Payment',
            'GST Expense',
            'GST Journal',
            'Journal',
            'Provisional Invoice',
            'RCM Bank Payment',
            'RCM Cash Payment',
            'Utilization Entry'
        ];
    }

    public function render()
    {
        return view('livewire.erp.utility.advance-utility.voucher-renumber')->extends('erp.app');
    }
}
