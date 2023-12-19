<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\PurchaseEntry;

use Livewire\Component;
use App\Models\Account;
use App\Models\ErpProduct;
use App\Models\PurchaseEntry;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Enum\Enum;

class Edit extends Component
{
    use LivewireAlert;

    public $accounts = [];
    public $purc_ac = [];

    // Module type
    public $type;
    public $products;
    public $user;
    public $purchase_entry;

    //Form fiels
    public $party_ac_id;
    public $purc_ac_id;
    public $cash_debit;
    public $invoice_type;
    public $vou_date;
    public $vou_no;
    public $tax_bill_of_supply;
    public $bill_no;
    public $narration;
    public $bill_date;
    public $doc_date;
    public $original_bill_no;
    public $original_bill_date;
    
    // Used for condtions and loop
    public $PURCHASE_ENTRY_TYPE;
    public $PURCHASE_INVOICE;
    public $PURCHASE_RETURN;
    public $TAX_BILL_SUPPLY;

    public $antries = [];
	public $add_antries;
    public $purchaseEntries;

    public $return_type;
    public $url_return_id;

    public function mount($id, $type, $return_type, $return_id)
    {
        $this->return_type = $return_type;
        $this->url_return_id = $return_id;
        $this->type  =  $type;
        $this->user  =  auth()->user();
        $this->purchase_entry   = PurchaseEntry::find($id);
        $this->purchaseEntries  = PurchaseEntry::where('group_id', $this->purchase_entry->group_id)->get();
        
        foreach ($this->purchaseEntries->toArray() as $key => $arr) {
            $keys = array_keys($arr);
            $keys[array_search('erp_product_id', $keys)] = 'product_name';
            $this->antries[$key] = array_combine($keys, $arr);	
        }

        $this->party_ac_id           =  $this->purchase_entry->party_ac_id;
        $this->cash_debit            =  $this->purchase_entry->cash_debit;
        // 'invoice_type'          =>  $this->invoice_type,
        $this->vou_date              =  $this->purchase_entry->vou_date;
        // 'purc_ac_id'            =>  $this->purc_ac_id,
        // 'vou_no'                =>  $this->vou_no,
        $this->tax_bill_of_supply    =  $this->purchase_entry->tax_bill_of_supply;
        $this->bill_no               =  $this->purchase_entry->bill_no;
        $this->narration             =  $this->purchase_entry->narration ?? null;

        if ($this->type == Enum::PURCHASE_INVOICE) {
            $this->bill_date       =   $this->purchase_entry->bill_date;
        } 
        
        if ($this->type == Enum::PURCHASE_RETURN) {
            $this->doc_date               =   $this->purchase_entry->doc_date;
            $this->original_bill_no       =   $this->purchase_entry->original_bill_no;
            $this->original_bill_date     =   $this->purchase_entry->original_bill_date;
        }

        $this->PURCHASE_ENTRY_TYPE  =   Enum::PURCHASE_ENTRY_TYPE;
        $this->PURCHASE_INVOICE     =   Enum::PURCHASE_INVOICE;
        $this->PURCHASE_RETURN      =   Enum::PURCHASE_RETURN;
        $this->TAX_BILL_SUPPLY      =   Enum::JOBWORK_IN_TAX_BILL_SUPPLY;

        $this->products = ErpProduct::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();

        $this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->purc_ac = $this->accounts;

        $this->add_antries  =   [
            'product_name'  =>  null,
            'qty'           =>  null,
            'rate'          =>  null,
            'amount'        =>  null,
        ];       
    }

    public function amountPerQtyAndRate()
    {
        if ($this->add_antries['qty'] > 0 && $this->add_antries['rate'] > 0) {
            $this->add_antries['amount'] = (int)$this->add_antries['qty']*(int)$this->add_antries['rate'];
        }

        $this->dispatchBrowserEvent('entry-table');
    }    

    public function submit()
    {
        $rules = [
            'party_ac_id'           =>  'required',
            'cash_debit'            =>  'required',
            // 'invoice_type'          =>  'required',
            'vou_date'              =>  'required',
            // 'purc_ac_id'            =>  'required',
            // 'vou_no'                =>  'required',
            'tax_bill_of_supply'    =>  'required',
            'bill_no'               =>  'required',
            // 'narration'             =>  'required',
        ];

        if ($this->type == $this->PURCHASE_INVOICE) {
            $rules['bill_date']        =   'required';
        } 
        
        if ($this->type == $this->PURCHASE_RETURN) {    
            $rules['doc_date']              =   'required';
            $rules['original_bill_no']      =   'required';
            $rules['original_bill_date']    =   'required';
        }

        $this->validate($rules);

        if (count($this->antries) == 0) {
            $this->alert('error', 'No Item Or Account Entry Present', [
                'position' => 'top-right',
                'toast' => true,
            ]);
            return $this->dispatchBrowserEvent('entry-table');
        }

        foreach ($this->purchaseEntries as $index => $val) {
            $val->delete();
        }

        foreach ($this->antries as $key => $antry) {

            $data = [
                'erp_product_id'          =>  $antry['product_name'],
                'qty'                   =>  $antry['qty'],
                'rate'                  =>  $antry['rate'],
                'amount'                =>  $antry['amount'],
                'company_id'            =>  $this->user->company ? $this->user->company->id : null,
                'type'                  =>  $this->type,
                'party_ac_id'           =>  $this->party_ac_id,
                'cash_debit'            =>  $this->cash_debit,
                // 'invoice_type'          =>  $this->invoice_type,
                'vou_date'              =>  $this->vou_date,
                // 'purc_ac_id'            =>  $this->purc_ac_id,
                // 'vou_no'                =>  $this->vou_no,
                'tax_bill_of_supply'    =>  $this->tax_bill_of_supply,
                'bill_no'               =>  $this->bill_no,
                'narration'             =>  $this->narration ?? null,
            ];

            if ($this->type == Enum::PURCHASE_INVOICE) {
                $data['bill_date']       =   $this->bill_date;
            } 
            
            if ($this->type == Enum::PURCHASE_RETURN) {
                $data['doc_date']               =   $this->doc_date;
                $data['original_bill_no']       =   $this->original_bill_no;
                $data['original_bill_date']     =   $this->original_bill_date;
            } 

            $data['group_id']   =  $this->purchase_entry->group_id;
            
            // Create JobworkIn Transaction
            PurchaseEntry::create($data);
        }
        
        $moduleName = ucfirst(str_replace('_', ' ', $this->type));

        toast($moduleName." updated successfully!", 'success');
        $this->dispatchBrowserEvent('entry-table');
        if($this->return_type && $this->return_type == 'product_ledger'){
            return redirect()->route('erp.report.stock-report.product-ledger.show', $this->url_return_id);
        }
        if($this->return_type && $this->return_type == 'partywise_report'){
            return redirect()->route('erp.report.stock-report.partywise-report.show', $this->url_return_id);
        }
        return redirect()->route('erp.account-transaction.purchase-entry.index', ['type' => $this->type]);
    }

    public function addEntry()
	{
        $rules = [];
        $message = [];
        $data = [];    
        
        $rules['add_antries.product_name']              = 'required';
        $rules['add_antries.qty']                       = 'required';
        $rules['add_antries.rate']                      = 'required';
        $rules['add_antries.amount']                    = 'required';
        $message['add_antries.product_name.required']   = 'Product is required';
        $message['add_antries.qty.required']            = 'Qty is required';
        $message['add_antries.rate.required']           = 'Rate is required';
        $message['add_antries.amount.required']         = 'Amount is required';

		$validator = Validator::make($this->all(), $rules, $message);

        if ($validator->fails()) {
        	$this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true,
            ]);
        } else {

            $data['product_name']   =   $this->add_antries['product_name'];                 
            $data['qty']            =   $this->add_antries['qty'];
            $data['rate']           =   $this->add_antries['rate'];
            $data['amount']         =   $this->add_antries['amount'];

            $this->antries[] = $data; 
            
            foreach ($this->add_antries as $key => $value) {
                $this->add_antries[$key] = null;
            }
        }

        $this->dispatchBrowserEvent('entry-table');
	}

    public function deleteEntry($key)
	{
		unset($this->antries[$key]);
        $this->dispatchBrowserEvent('entry-table');
	}

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="submit">
                    
                    <div class="row">

                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Cash/Debit <i class="text-danger">*</i></label>
                            <select wire:model.defer='cash_debit' class="form-control form-control-sm form-select @error('cash_debit') is-invalid @enderror" required>
                                <option value="cash">Cash</option>
                                <option value="Debit">Debit</option>
                            </select>
                            @error('cash_debit')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Invoice Type <i class="text-danger">*</i></label>
                            <select wire:model.defer='invoice_type' class="form-control form-control-sm form-select @error('invoice_type') is-invalid @enderror" disabled>
                                <option value="">Invoice Type</option>
                            </select>
                            @error('invoice_type')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Vou Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control form-control-sm @error('vou_date') is-invalid @enderror" 
                                wire:model.defer="vou_date" required>
                            @error('vou_date')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Party A/c. <i class="text-danger">*</i></label>
                            <select wire:model.defer='party_ac_id' class="form-control form-control-sm form-select @error('party_ac_id') is-invalid @enderror" required>
                                <option value="">Select Party A/c</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                    {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('party_ac_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>                        
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Purc A/c. <i class="text-danger">*</i></label>
                            <select wire:model.defer='purc_ac_id' class="form-control form-control-sm form-select @error('purc_ac_id') is-invalid @enderror" disabled>
                                <option value="">Select Purc A/c</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                    {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('purc_ac_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>                        
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Voucher No <i class="text-danger">*</i></label>
                            <input type="text" class="form-control form-control-sm @error('vou_no') is-invalid @enderror" 
                                wire:model.defer="vou_no" placeholder="Voucher No" disabled>
                            @error('vou_no')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Tax/Bill of Supply <i class="text-danger">*</i></label>
                            <select wire:model.defer='tax_bill_of_supply' class="form-control form-control-sm form-select @error('tax_bill_of_supply') is-invalid @enderror" required>
                                <option value="">Select Tax/Bill of Supply</option>
                                @foreach ($TAX_BILL_SUPPLY as $key => $val)
                                    <option value="{{ $key }}">
                                    {{ $val }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tax_bill_of_supply')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($type == $PURCHASE_INVOICE)
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Bill No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('bill_no') is-invalid @enderror" 
                                    wire:model.defer="bill_no" placeholder="Bill No" required>
                                @error('bill_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        @if ($type == $PURCHASE_RETURN)
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Doc Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('doc_date') is-invalid @enderror" 
                                    wire:model.defer="doc_date" required>
                                @error('doc_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Original Bill No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('original_bill_no') is-invalid @enderror" 
                                    wire:model.defer="original_bill_no" placeholder="Original Bill No" required>
                                @error('original_bill_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Original Bill Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('original_bill_date') is-invalid @enderror" 
                                    wire:model.defer="original_bill_date" required>
                                @error('original_bill_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Narration </label>
                            <input type="text" class="form-control form-control-sm @error('narration') is-invalid @enderror" 
                                wire:model.defer="narration" placeholder="Enter Narration">
                            @error('narration')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <table class="table table-bordered text-nowrap border-bottom entry-table">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Product Name</th>
                                    <th class="bg-primary text-white">Qty</th>                                                        
                                    <th class="bg-primary text-white">Rate</th>
                                    <th class="bg-primary text-white">Amount</th>                                
                                    <th class="bg-primary text-white">Action</th>                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select wire:model.defer='add_antries.product_name' class="form-control form-control-sm form-select">
                                            <option value="">Product Name</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" 
                                            wire:model.defer="add_antries.qty" placeholder="Qty" wire:change="amountPerQtyAndRate">
                                    </td>                                    
                                    <td>    
                                        <input type="number" class="form-control form-control-sm" 
                                            wire:model.defer="add_antries.rate" placeholder="Rate" wire:change="amountPerQtyAndRate">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control form-control-sm" 
                                            wire:model.defer="add_antries.amount" placeholder="Amount">                        
                                    </td>                            
                                    <td>
                                        <input type="button" class="btn btn-primary" value="Add" wire:click=addEntry>
                                    </td>
                                </tr>
                                @if ($antries)
                                @foreach ($antries as $keys => $entry)
                                    <tr>
                                        <td>
                                            @foreach ($products as $product)
                                                {{ $product->id == $entry['product_name'] ? $product->name : '' }}
                                            @endforeach
                                        </td>
                                        <td>
                                            {{$entry['qty']}}
                                        </td>                                        
                                        <td>
                                            {{$entry['rate']}}
                                        </td>
                                        <td>
                                            {{$entry['amount']}}
                                        </td>                                                                                
                                        <td>                                            
                                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-danger" wire:click=deleteEntry({{$keys}})>
                                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <input type="submit" id="formSubmit" class="d-none">
                </form>
            </div>
        blade;
    }
}
