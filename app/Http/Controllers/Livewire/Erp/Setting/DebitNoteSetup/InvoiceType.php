<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\DebitNoteSetup;

use App\Enum\Enum;
use App\Models\ErpSetupInvoiceType;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class InvoiceType extends Component
{
    use LivewireAlert;

    //add form input properties
    public $invoice_type = 'debit-note';
    public $invoice_type_id;
    public $name;
    public $type = 'GST';
    public $gst_type = 'Item wise';
    public $export_type = 'UT-1';
    public $is_capital_goods = false;
    public $is_party_allowed = false;
    public $is_place_of_supply = false;

    //add form dropdown values
    public $type_items = Enum::MASTER_GST_INVOICE_TYPE;
    public $gst_type_items = ['Item wise', 'Voucher wise'];
    public $export_type_items = ['UT-1', 'Bond', 'CT-1', 'CT-2', 'CT-3', 'Exp-0%'];

    //All records
    public $records;

    //Delete record properties
    public $deleteRecordId;
    protected $listeners = [
        'deleteConfirmed'
    ];

    //Edit record properties
    public $record;
    public $edit_invoice_type;
    public $edit_invoice_type_id;
    public $edit_name;
    public $edit_type;
    public $edit_gst_type;
    public $edit_export_type;
    public $edit_is_capital_goods;
    public $edit_is_party_allowed;
    public $edit_is_place_of_supply;

    // edit comment
    public $edit_comment_record_id;
    public $edit_comment;


    public function render()
    {
        return view('livewire.erp.setting.debit-note-setup.invoice-type')->extends('erp.app');
    }

    public function mount()
    {
        $this->fetchRecords();
    }
    
    public function fetchRecords()
    {
        $this->records = ErpSetupInvoiceType::where(['company_id' => auth()->user()->company_id, 'invoice_type' => $this->invoice_type])->get();
    }

    public function saveInvoiceType()
    {
        $this->validate([
            'invoice_type' => ['required'],
            'name' => ['required', 'max:255'],
            'type' => ['required'],
            'gst_type' => ['required'],
            'export_type' => ['required'],
            'is_capital_goods' => ['required'],
            'is_party_allowed' => ['required'],
            'is_place_of_supply' => ['required']
        ]);
        
        ErpSetupInvoiceType::create([
            'company_id' => auth()->user()->company_id,
            'invoice_type' => $this->invoice_type,
            'name' => $this->name,
            'type' => $this->type,
            'gst_type' => $this->gst_type,
            'export_type' => $this->export_type,
            'is_capital_goods' => ($this->edit_is_capital_goods == true) ? true : false,
            'is_party_allowed' => ($this->edit_is_party_allowed == true) ? true : false,
            'is_place_of_supply' => ($this->edit_is_place_of_supply == true) ? true : false
        ]);

        $this->alert('success', 'Invoice Type Created Successfully', [
            'position' => 'center',
            'toast' => true
        ]);

        return redirect()->route('erp.setting.debit-note-setup.invoice-type');
    }

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

    public function deleteConfirmed()
    {
        ErpSetupInvoiceType::find($this->deleteRecordId)->delete();
        $this->alert('success', 'Invoice Type Deleted Successfully', [
            'position' => 'top-right',
            'toast' => true
        ]);
        return redirect()->route('erp.setting.debit-note-setup.invoice-type');
    }
    

    public function editRecord($id)
    {
        $this->record = ErpSetupInvoiceType::find($id);
        $this->edit_invoice_type = $this->record->invoice_type;
        $this->edit_invoice_type_id = $this->record->invoice_type_id;
        $this->edit_name = $this->record->name;
        $this->edit_type = $this->record->type;
        $this->edit_gst_type = $this->record->gst_type;
        $this->edit_export_type = $this->record->export_type;
        $this->edit_is_capital_goods = $this->record->is_capital_goods;
        $this->edit_is_party_allowed = $this->record->is_party_allowed;
        $this->edit_is_place_of_supply = $this->record->is_place_of_supply;
        $this->dispatchBrowserEvent('openRecordEditModal');
    }

    public function updateRecord()
    {
        $this->validate([
            'edit_invoice_type' => ['required'],
            'edit_name' => ['required', 'max:255'],
            'edit_type' => ['required'],
            'edit_gst_type' => ['required'],
            'edit_export_type' => ['required'],
            'edit_is_capital_goods' => ['required'],
            'edit_is_party_allowed' => ['required'],
            'edit_is_place_of_supply' => ['required']
        ]);

        $this->record->invoice_type = $this->edit_invoice_type;
        $this->record->invoice_type_id = $this->edit_invoice_type_id;
        $this->record->name = $this->edit_name;
        $this->record->type = $this->edit_type;
        $this->record->gst_type = $this->edit_gst_type;
        $this->record->export_type = $this->edit_export_type;
        $this->record->is_capital_goods = ($this->edit_is_capital_goods == true) ? true : false;
        $this->record->is_party_allowed = ($this->edit_is_party_allowed == true) ? true : false;
        $this->record->is_place_of_supply = ($this->edit_is_place_of_supply == true) ? true : false;
        $this->record->save();

        $this->alert('success', 'Invoice Type Updated Successfully', [
            'position' => 'top-right',
            'toast' => true
        ]);

        return redirect()->route('erp.setting.debit-note-setup.invoice-type');
    }

    public function editComment($id)
    {
        $this->edit_comment = ErpSetupInvoiceType::find($id)->comment;
        $this->edit_comment_record_id = $id;
        $this->dispatchBrowserEvent('openEditCommentModal');
    }

    public function saveComment()
    {
        $this->validate([
            'edit_comment' => ['required', 'max:255']
        ]);
        ErpSetupInvoiceType::find($this->edit_comment_record_id)->update(['comment' => $this->edit_comment]);
        $this->alert('success', 'Comment Updated Successfully', [
            'position' => 'top-right',
            'toast' => true
        ]);
        return redirect()->route('erp.setting.debit-note-setup.invoice-type');
    }
}
