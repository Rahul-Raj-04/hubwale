<?php

namespace App\Http\Controllers\Livewire\Erp\Gst\SalesSetup;

use Livewire\Component;
use App\Models\Account;
use App\Models\GstCommodity;
use App\Models\GstSalesSetup;

class EditSalesSetup extends Component
{
    public $accounts;
    public $gstCommoditys;
    public $gstSalesSetup;
    public $module;

    //Form fields
    public $type;
    public $type_list;
    public $sales_purchase_ac;

    public function mount($id, $type)
    {
        $this->module = $type; 
        $this->gstSalesSetup = GstSalesSetup::find($id);
        
        $this->type = $this->gstSalesSetup->type;
        $this->type_list = $this->gstSalesSetup->gst_commodity_id;
        $this->sales_purchase_ac = $this->gstSalesSetup->sales_purchase_ac_id;
           

        $this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->gstCommoditys = GstCommodity::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
    }

    public function saveSalesSetup()
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

        $this->gstSalesSetup->update($data);

        $type = $this->module == 'sale_setup' ? 'Sales' : 'Purchase';

        toast("$type setup updated successfully!", 'success');
        return redirect()->route('erp.master.gst.sales-setup.index', ['type' => $this->module]);
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="saveSalesSetup">
                    
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

                    <input type="submit" id="salesSetupFormSubmit" class="d-none">
                </form>
            </div>
        blade;
    }
}
