<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\PurchaseEntry;

use Livewire\Component;
use App\Models\Account;
use App\Models\ErpProduct;
use App\Models\PurchaseEntry;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Enum\Enum;
use App\Models\ErpSetupInvoiceType;
use App\Models\SalePurchaseTax;

class Add extends Component
{
    use LivewireAlert;

    public $accounts = [];
    public $purc_ac = [];
    public $invoice_types = [];

    // Module type
    public $type;
    public $products;
    public $user;

    //Form fields
    public $party_ac_id;
    public $purc_ac_id;
    public $cash_debit;
    public $invoice_type_id;
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

    
    public $state_ut_tax;
    public $state_ut_tax_amount;

    public $central_tax;
    public $central_tax_amount;

    public $central_tax_total_amount;
    public $state_ut_tax_total_amount;

    public $gst_commodity;

    public $item_amount;
    public $bill_amount;

    public function mount($type)
    {
        $this->type  =  $type;
        $this->user = auth()->user();
        
        $this->vou_date             =   date('Y-m-d');
        $this->bill_date            =   date('Y-m-d');
        $this->doc_date             =   date('Y-m-d');
        $this->original_bill_date   =   date('Y-m-d');
        $this->cash_debit           =   'cash';

        $this->PURCHASE_ENTRY_TYPE  =   Enum::PURCHASE_ENTRY_TYPE;
        $this->PURCHASE_INVOICE     =   Enum::PURCHASE_INVOICE;
        $this->PURCHASE_RETURN      =   Enum::PURCHASE_RETURN;
        $this->TAX_BILL_SUPPLY      =   Enum::JOBWORK_IN_TAX_BILL_SUPPLY;

        $this->products = ErpProduct::Where('company_id', auth()->user()->company_id)->get();

        $this->accounts = Account::Where('company_id', auth()->user()->company_id)->get();
        $this->purc_ac = $this->accounts;
        $this->invoice_types = ErpSetupInvoiceType::where(['invoice_type' => 'purchase', 'company_id' => auth()->user()->company_id])->get();

        $this->add_antries  =   [
            'product_name'  =>  null,
            'qty'           =>  null,
            'rate'          =>  null,
            'amount'        =>  null,
            'gst_commodity' =>  null,
            'tax'           =>  false,
            'total_amount'  => null
        ];       
    }

    public function showTaxModel()
    {
        if($this->gst_commodity){
            $this->central_tax = $this->gst_commodity->gst_slab->central_tax;
            $this->state_ut_tax = $this->gst_commodity->gst_slab->state_ut_tax;
            $this->central_tax_amount = ($this->add_antries['amount'] ? $this->add_antries['amount'] : 0) * $this->central_tax / 100;
            $this->state_ut_tax_amount = ($this->add_antries['amount'] ? $this->add_antries['amount'] : 0) * $this->state_ut_tax / 100;
        }
        $this->add_antries['total_amount'] = $this->add_antries['amount'] + $this->central_tax_amount + $this->state_ut_tax_amount;
        $this->dispatchBrowserEvent('tax-model-show');
        $this->add_antries['tax'] = true;
    }

    public function amountPerQtyAndRate()
    {
        if ($this->add_antries['qty'] > 0 && $this->add_antries['rate'] > 0) {
            $this->add_antries['amount'] = (int)$this->add_antries['qty']*(int)$this->add_antries['rate'];
        }

        $this->dispatchBrowserEvent('entry-table');
    }    

    public function updatedAddAntriesProductName()
    {
        if($this->add_antries['product_name']){
            $product = ErpProduct::find($this->add_antries['product_name']);

            $this->gst_commodity = $product->gst_commodity;
            $this->add_antries['gst_commodity'] = $this->gst_commodity ? $this->gst_commodity->gst_slab->integrated_tax : null;
        }
        $this->dispatchBrowserEvent('entry-table');
    }

    public function submit()
    {
        $rules = [
            'party_ac_id'           =>  'required',
            'cash_debit'            =>  'required',
            'invoice_type_id'       =>  'required',
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

        do {
            $group_id = rand(1111111111, 9999999999);
            $purchaseEntry = PurchaseEntry::where('group_id', $group_id)->get();    
        } while (count($purchaseEntry) > 0);

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
                'invoice_type_id'       =>  $this->invoice_type_id,
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

            $data['group_id']   =  $group_id;
            
            // Create JobworkIn Transaction
            $purchaseEntry = PurchaseEntry::create($data);
            SalePurchaseTax::create([
                'sale_account_id' => null,
                'discount' => null,
                'freight' => null,
                'central_tax' => $antry['central_tax_amount'],
                'state_ut_tax' => $antry['state_ut_tax_amount'],
                'round_off' => null,
                'sale_entry_id' => null,
                'purchase_entry_id' => $purchaseEntry->id,
                'erp_product_id' => $antry['product_name'],
                'entry_type' => 'purchase_entry',
            ]);
        }
        
        $moduleName = ucfirst(str_replace('_', ' ', $this->type));

        toast($moduleName." created successfully!", 'success');
        $this->dispatchBrowserEvent('entry-table');
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
        } else if (!$this->add_antries['tax']) {
            $this->alert('error', 'Please enter tax', [
                'position' => 'center',
                'toast' => true,
            ]);
        } else {

            $data['product_name']   =   $this->add_antries['product_name'];                 
            $data['qty']            =   $this->add_antries['qty'];
            $data['rate']           =   $this->add_antries['rate'];
            $data['amount']         =   $this->add_antries['amount'];
            $data['gst_commodity']  =   $this->add_antries['gst_commodity'];
            $data['central_tax']    =   $this->central_tax;
            $data['state_ut_tax']   =   $this->state_ut_tax;
            $data['central_tax_amount']   =   $this->central_tax_amount;
            $data['state_ut_tax_amount']   =   $this->state_ut_tax_amount;

            $this->central_tax_total_amount = $this->central_tax_total_amount + $this->central_tax_amount;
            $this->state_ut_tax_total_amount = $this->state_ut_tax_total_amount + $this->state_ut_tax_amount; 
            $this->item_amount = $this->item_amount + $this->add_antries['amount'];
            $this->bill_amount = $this->bill_amount + $this->add_antries['amount'] + $this->central_tax_amount + $this->state_ut_tax_amount;

            $this->antries[] = $data; 
            
            foreach ($this->add_antries as $key => $value) {
                $this->add_antries[$key] = null;
            }
        }

        $this->dispatchBrowserEvent('entry-table');
	}

    public function deleteEntry($key)
	{
        $this->central_tax_total_amount = $this->central_tax_total_amount - $this->antries[$key]['central_tax_amount'];
        $this->state_ut_tax_total_amount = $this->state_ut_tax_total_amount - $this->antries[$key]['state_ut_tax_amount'];
        $this->item_amount = $this->item_amount - $this->antries[$key]['amount'];
        $sub_amount = $this->antries[$key]['amount'] + $this->antries[$key]['state_ut_tax_amount'] + $this->antries[$key]['central_tax_amount'];
        $this->bill_amount = $this->bill_amount - $sub_amount;
		unset($this->antries[$key]);
        $this->dispatchBrowserEvent('entry-table');
	}

    public function updatedCentralTax()
    {
        $this->central_tax_amount = ($this->add_antries['amount'] ? $this->add_antries['amount'] : 0) * $this->central_tax / 100;
        $this->state_ut_tax_amount = ($this->add_antries['amount'] ? $this->add_antries['amount'] : 0) * $this->state_ut_tax / 100;
        $this->add_antries['total_amount'] = $this->add_antries['amount'] + $this->central_tax_amount + $this->state_ut_tax_amount;
    }

    public function updatedStateUtTax()
    {
        $this->central_tax_amount = ($this->add_antries['amount'] ? $this->add_antries['amount'] : 0) * $this->central_tax / 100;
        $this->state_ut_tax_amount = ($this->add_antries['amount'] ? $this->add_antries['amount'] : 0) * $this->state_ut_tax / 100;
        $this->add_antries['total_amount'] = $this->add_antries['amount'] + $this->central_tax_amount + $this->state_ut_tax_amount;
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
                            <select wire:model.defer='invoice_type_id' class="form-control form-control-sm form-select @error('invoice_type_id') is-invalid @enderror">
                            <option value="">Select Invoice Type</option>
                                @foreach ($invoice_types as $invoice_type)
                                    <option value="{{ $invoice_type->id }}">
                                    {{ $invoice_type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('invoice_type_id')
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
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Bill No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('bill_no') is-invalid @enderror" 
                                    wire:model.defer="bill_no" placeholder="Bill No" required>
                                @error('bill_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
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

                        <table class="table table-bordered text-nowrap border-bottom entry-table">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Product Name</th>
                                    <th class="bg-primary text-white">GST %</th>
                                    <th class="bg-primary text-white">Qty</th>                                                        
                                    <th class="bg-primary text-white">Rate</th>
                                    <th class="bg-primary text-white">Amount</th>                                
                                    <th class="bg-primary text-white">Action</th>                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select wire:model='add_antries.product_name' class="form-control form-control-sm form-select">
                                            <option value="">Product Name</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">
                                                {{ $product->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" wire:model.defer="add_antries.gst_commodity" disabled>
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
                                        <input type="button" class="btn btn-sm btn-primary" value="Add" wire:click=addEntry>
                                        <input type="button" class="btn btn-sm btn-primary" value="Tax" wire:click=showTaxModel>
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
                                            {{$entry['gst_commodity']}}
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label"> Narration </label>
                                    <input type="text" class="form-control form-control-sm @error('narration') is-invalid @enderror" 
                                        wire:model.defer="narration" placeholder="Enter Narration">
                                    @error('narration')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        <lable class="form-lable">Item Amount</lable>
                                    </div>
                                    <div class="col-md-3">
                                        {{ $item_amount }}
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        <lable class="form-lable">Discount</lable>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        (-)
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" disabled>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        <lable class="form-lable">Freight</lable>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" value="paking & forwarding" disabled>
                                    </div>
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" disabled>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        <lable class="form-lable">Central Tax</lable>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" wire:model="central_tax_total_amount">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        <lable class="form-lable">State/UT Tax</lable>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" wire:model="state_ut_tax_total_amount">
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        <lable class="form-lable">Round Off</lable>
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <input class="form-control form-control-sm" wire:model="round_off" disabled>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-md-3">
                                        <lable class="form-lable">Bill Amount</lable>
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        {{ $bill_amount }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" id="formSubmit" class="d-none">
                </form>
                
                <div class="modal fade" id="modal-group" tabindex="-1" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="">
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <lable class="form-lable">Item Amount</lable>
                                        </div>
                                        <div class="col-md-6">
                                            <lable class="form-lable">{{ $add_antries['amount'] ? $add_antries['amount'] : '' }}</lable>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <lable class="form-lable">Sales A/C.</lable>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" value="Sales A/C. (GST)" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <lable class="form-lable">Discount</lable>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" value="Sales A/C. (GST)" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            (-)
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <lable class="form-lable">Freight</lable>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" value="paking & forwarding" disabled>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <lable class="form-lable">Central Tax</lable>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" value="Central Tax A/C.(O/P)" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" wire:model="central_tax">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" wire:model="central_tax_amount">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <lable class="form-lable">State/UT Tax</lable>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" value="State/UT Tax A/C.(O/P)" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" wire:model="state_ut_tax">
                                        </div>
                                        <div class="col-md-3">
                                            <input class="form-control form-control-sm" wire:model="state_ut_tax_amount">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6">
                                            <lable class="form-lable">Total Amount</lable>
                                        </div>
                                        <div class="col-md-6">
                                            <lable class="form-lable">{{$add_antries['total_amount']}}</lable>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                                <label for="addGroupButton" data-bs-dismiss="modal" class="btn btn-primary">Ok</label>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    window.addEventListener('tax-model-show', event => {
                        $('#modal-group').modal('show');
                    });
                </script>
            </div>
        blade;
    }
}
