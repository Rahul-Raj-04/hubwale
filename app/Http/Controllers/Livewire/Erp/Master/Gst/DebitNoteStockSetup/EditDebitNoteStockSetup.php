<?php

namespace App\Http\Controllers\Livewire\Erp\Master\Gst\DebitNoteStockSetup;

use Livewire\Component;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Models\DebitNoteWithStockSetup;

class EditDebitNoteStockSetup extends Component
{
        public $accounts;
    public $gstCommoditys;
    public $debitNoteStockSetup;

    //Form fields
    public $type;
    public $type_list;
    public $sales_purchase_ac;

    public function mount($id)
    {
        $this->debitNoteStockSetup = DebitNoteWithStockSetup::find($id);
        $this->type = $this->debitNoteStockSetup->type;
        $this->type_list = $this->debitNoteStockSetup->gst_commodity_id;
        $this->sales_purchase_ac = $this->debitNoteStockSetup->sales_purchase_ac_id;
           
        $this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->gstCommoditys = GstCommodity::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
    }

    public function submit()
    {
        $rules = [
            'type' => 'required|in:default,gst_commodity',
            'sales_purchase_ac' => 'required',
        ];

        if ($this->type == "gst_commodity") {
            $rules['type_list'] = 'required';
        }

        $this->validate($rules);
    
        $data = [
            'type' => $this->type,
            'gst_commodity_id' => null,
            'sales_purchase_ac_id' => $this->sales_purchase_ac,
        ];

        if ($this->type == "gst_commodity") {
            $data['gst_commodity_id'] = $this->type_list;
        }

        $this->debitNoteStockSetup->update($data);

        toast('Debit note with stock setup updated successfully!', 'success');

        return redirect()->route('erp.master.gst.debit-note-setup.index');
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submit">
                    
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Type <i class="text-danger">*</i></label>
                            <select wire:model='type' class="form-control form-control-sm form-select" required>
                                <option value="default"> Default</option>
                                <option value="gst_commodity"> Gst Commodity </option>
                            </select>
                            @error('type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Sale/Purc, A/c. <i class="text-danger">*</i></label>
                            <select wire:model.defer='sales_purchase_ac' class="form-control form-control-sm form-select" required>
                                <option value="">Select sales purchase  a/c</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sales_purchase_ac')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        @if($type == "gst_commodity")
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Type List <i class="text-danger">*</i></label>
                                <select wire:model.defer='type_list' class="form-control form-control-sm form-select" required>
                                    <option value="">Select type list</option>
                                    @foreach ($gstCommoditys as $gstCommodity)
                                        <option value="{{ $gstCommodity->id }}">
                                            {{ $gstCommodity->description }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_list')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                    </div>

                    <input type="submit" id="debitNoteStockSetupFormSubmit" class="d-none">
                </form>
            </div>
        blade;
    }
}
