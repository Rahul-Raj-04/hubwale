<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\PurchaseSetup;

use App\Models\Account;
use App\Models\ErpSetupExpenseDetail;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ExpenseDetails extends Component
{
    use LivewireAlert;

    public $expense_detail_type = 'purchase';
    public $company_id;
    public $account_id;
    public $name;
    public $type = 'Central Tax';
    public $serial_number = 0;
    public $calculation = 'itemwise';
    public $readonly = true;
    public $ac_type = 'fixed';
    public $ac_effect = 'yes';
    public $add_deduct = 'add';
    public $type_2 = 'cumulative';
    public $type_2_percentage = 0.00;
    public $status;
    public $comment = null;


    public $expense_detail_type_items = ['sales', 'purchase'];
    public $type_items = ['expense', 'Central Tax', 'State/UT Tax', 'Integrated Tax'];
    public $calculation_items = ['fixed', 'itemwise', 'fixed-itemwise'];
    public $ac_type_items = ['fixed', 'variable', 'sales_ac'];
    public $ac_effect_items = ['yes', 'no', 'separate'];
    public $add_deduct_items = ['add', 'deduct'];
    public $type_2_items = ['cumulative', 'fixed', 'percentage', 'surcharge', 'qty'];
    public $accounts;

    // records
    public $records;

    //Edit record properties
    public $record;
    public $edit_account_id;
    public $edit_name;
    public $edit_type;
    public $edit_serial_number;
    public $edit_calculation;
    public $edit_readonly;
    public $edit_ac_type;
    public $edit_ac_effect;
    public $edit_add_deduct;
    public $edit_type_2;
    public $edit_type_2_percentage;

    //Delete record properties
    public $deleteRecordId;
    protected $listeners = [
        'deleteConfirmed'
    ];

    // edit comment
    public $edit_comment_record_id;
    public $edit_comment;

    public function render()
    {
        return view('livewire.erp.setting.purchase-setup.expense-details')->extends('erp.app');
    }

    public function mount()
    {
        $this->company_id = auth()->user()->company_id;
        $this->accounts = Account::where('company_id', $this->company_id)->get();
        $this->records = ErpSetupExpenseDetail::where(['company_id' => $this->company_id, 'expense_detail_type' => 'purchase'])->get();
    }

    public function saveRecord()
    {
        $this->validate([
            'name' => ['required', 'max:255'],
            'company_id' => ['required'],
            'account_id' => ['required', 'exists:accounts,id'],
            'type' => ['required'],
            'serial_number' => ['required', 'min:1'],
            'calculation' => ['required'],
            'readonly' => ['required'],
            'ac_type' => ['required'],
            'ac_effect' => ['required'],
            'add_deduct' => ['required'],
            'type_2' => ['required'],
            'type_2_percentage' => ['required'],
        ]);

        ErpSetupExpenseDetail::create([
            'expense_detail_type' => $this->expense_detail_type,
            'company_id' => $this->company_id,
            'account_id' => $this->account_id,
            'name' => $this->name,
            'type' => $this->type,
            'serial_number' => $this->serial_number,
            'calculation' => $this->calculation,
            'readonly' => ($this->readonly == 'true') ? true : false,
            'ac_type' => $this->ac_type,
            'ac_effect' => $this->ac_effect,
            'add_deduct' => $this->add_deduct,
            'type_2' => $this->type_2,
            'type_2_percentage' => $this->type_2_percentage
        ]);
        $this->alert('success', 'Expense Details Created Successfully', [
            'position' => 'center',
            'toast' => true
        ]);

        return redirect()->route('erp.setting.purchase-setup.expense-details');
    }

    public function editRecord($id)
    {
        $this->record = ErpSetupExpenseDetail::find($id);
        $this->edit_account_id = $this->record->account_id;
        $this->edit_name = $this->record->name;
        $this->edit_type = $this->record->type;
        $this->edit_serial_number = $this->record->serial_number;
        $this->edit_calculation = $this->record->calculation;
        $this->edit_readonly = $this->record->readonly;
        $this->edit_ac_type = $this->record->ac_type;
        $this->edit_ac_effect = $this->record->ac_effect;
        $this->edit_add_deduct = $this->record->add_deduct;
        $this->edit_type_2 = $this->record->type_2;
        $this->edit_type_2_percentage = $this->record->type_2_percentage;
        $this->dispatchBrowserEvent('openRecordEditModal');
    }

    public function updateRecord()
    {
        $this->validate([
            'edit_name' => ['required', 'max:255'],
            'edit_account_id' => ['required', 'exists:accounts,id'],
            'edit_type' => ['required'],
            'edit_serial_number' => ['required', 'int', 'min:1'],
            'edit_calculation' => ['required'],
            'edit_readonly' => ['required'],
            'edit_ac_type' => ['required'],
            'edit_ac_effect' => ['required'],
            'edit_add_deduct' => ['required'],
            'edit_type_2' => ['required'],
            'edit_type_2_percentage' => ['required'],
        ]);

        $this->record->account_id = $this->edit_account_id;
        $this->record->name = $this->edit_name;
        $this->record->type = $this->edit_type;
        $this->record->serial_number = $this->edit_serial_number;
        $this->record->calculation = $this->edit_calculation;
        $this->record->readonly = ($this->edit_readonly == 'true') ? true : false;
        $this->record->ac_type = $this->edit_ac_type;
        $this->record->ac_effect = $this->edit_ac_effect;
        $this->record->add_deduct = $this->edit_add_deduct;
        $this->record->type_2 = $this->edit_type_2;
        $this->record->type_2_percentage = $this->edit_type_2_percentage;
        $this->record->save();

        $this->alert('success', 'Expense Updated Successfully', [
            'position' => 'top-right',
            'toast' => true
        ]);

        return redirect()->route('erp.setting.purchase-setup.expense-details');
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
        ErpSetupExpenseDetail::find($this->deleteRecordId)->delete();
        $this->alert('success', 'Expense Deleted Successfully', [
            'position' => 'top-right',
            'toast' => true
        ]);
        return redirect()->route('erp.setting.purchase-setup.expense-details');
    }

    public function editComment($id)
    {
        $this->edit_comment = ErpSetupExpenseDetail::find($id)->comment;
        $this->edit_comment_record_id = $id;
        $this->dispatchBrowserEvent('openEditCommentModal');
    }

    public function saveComment()
    {
        $this->validate([
            'edit_comment' => ['required', 'max:255']
        ]);
        ErpSetupExpenseDetail::find($this->edit_comment_record_id)->update(['comment' => $this->edit_comment]);
        $this->alert('success', 'Comment Updated Successfully', [
            'position' => 'top-right',
            'toast' => true
        ]);
        return redirect()->route('erp.setting.purchase-setup.expense-details');
    }
}
