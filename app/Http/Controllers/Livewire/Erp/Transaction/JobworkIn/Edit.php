<?php

namespace App\Http\Controllers\Livewire\Erp\Transaction\JobworkIn;

use Livewire\Component;
use App\Models\Account;
use App\Models\Service;
use App\Models\JobworkIn;
use App\Models\JobworkType;
use Illuminate\Support\Facades\Validator;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Enum\Enum;

class Edit extends Component
{
    use LivewireAlert;

    public $accounts = [];
    public $jobwork_ac = [];

    // Jobwork Type
    public $type_name;
    public $jobwork_types = [];

    // Module type
    public $module;
    public $products;
    public $user;
    public $master;

    //Form fiels
    public $account_id;
    public $jobwork_ac_id;
    public $order_no;
    public $order_date;
    public $doc_no;
    public $doc_date;
    public $challan_no;
    public $challan_date;
    public $voucher_no;
    public $voucher_date;
    public $bill_no;
    public $bill_date;
    public $tax_bill_supply;  //(tax_invoice, bill_of_supply, other),
    public $invoice_type;
    public $batch_name;
    public $nature_proccessing;
    public $narration;
    public $product_name;
    public $type;
    public $r_i;
    public $qty;
    public $jobwork_rate;
    public $jobwork_amount;
    public $rate;
    public $amount;
    public $pend_qty;

    // Used for condtions and loop
    public $JOBWORK_IN_ORDER;
    public $JOBWORK_IN_ISSUE;
    public $JOBWORK_IN_RECEIPT;
    public $JOBWORK_IN_BILLING;
    public $JOBWORK_IN_PRODUCTION;
    public $JOBWORK_IN_ISSUE_OTHER;
    public $JOBWORK_IN_TAX_BILL_SUPPLY;
    public $JOBWORK_IN_PRODUCTION_TYPE;
    public $JOBWORK_IN_ISSUE_OTHER_TYPE;
    public $JOBWORK_IN_ORDER_TYPE;

    // For Master module 
    public $JOBWORK_IN_ORDER_OPENING;
    public $JOBWORK_IN_RECEIPT_OPENING;
    public $JOBWORK_IN_PRODUCTION_OPENING;

    public $antries = [];
	public $add_antries;
    public $jobworkInEntries;

    public function mount($id, $type, $module)
    {
        $this->master = $module;    
        $this->module = $type;       
        $this->jobworkIn = JobworkIn::find($id);

        $this->account_id = $this->jobworkIn->account_id;
        $this->jobwork_ac_id = $this->jobworkIn->jobwork_ac_id;
        $this->order_no = $this->jobworkIn->order_no;
        $this->order_date = date('Y-m-d', strtotime($this->jobworkIn->order_date));
        $this->doc_no = $this->jobworkIn->doc_no;
        $this->doc_date = date('Y-m-d', strtotime($this->jobworkIn->doc_date));
        $this->challan_no = $this->jobworkIn->challan_no;
        $this->challan_date = date('Y-m-d', strtotime($this->jobworkIn->challan_date));
        $this->voucher_no = $this->jobworkIn->voucher_no;
        $this->voucher_date = date('Y-m-d', strtotime($this->jobworkIn->voucher_date));
        $this->bill_no = $this->jobworkIn->bill_no;
        $this->bill_date = date('Y-m-d', strtotime($this->jobworkIn->bill_date));
        $this->tax_bill_supply = $this->jobworkIn->tax_bill_supply;  //(tax_invoice, bill_of_supply, other),
        $this->invoice_type = $this->jobworkIn->invoice_type;
        $this->batch_name = $this->jobworkIn->batch_name;
        $this->nature_proccessing = $this->jobworkIn->nature_proccessing;
        $this->narration = $this->jobworkIn->narration;

        $this->JOBWORK_IN_ORDER = Enum::JOBWORK_IN_ORDER;
        $this->JOBWORK_IN_ISSUE = Enum::JOBWORK_IN_ISSUE;
        $this->JOBWORK_IN_RECEIPT = Enum::JOBWORK_IN_RECEIPT;
        $this->JOBWORK_IN_BILLING = Enum::JOBWORK_IN_BILLING;
        $this->JOBWORK_IN_PRODUCTION = Enum::JOBWORK_IN_PRODUCTION;
        $this->JOBWORK_IN_ISSUE_OTHER = Enum::JOBWORK_IN_ISSUE_OTHER;
        $this->JOBWORK_IN_TAX_BILL_SUPPLY = Enum::JOBWORK_IN_TAX_BILL_SUPPLY;
        $this->JOBWORK_IN_PRODUCTION_TYPE = Enum::JOBWORK_IN_PRODUCTION_TYPE;
        $this->JOBWORK_IN_ISSUE_OTHER_TYPE = Enum::JOBWORK_IN_ISSUE_OTHER_TYPE;
        $this->JOBWORK_IN_ORDER_TYPE = Enum::JOBWORK_IN_ORDER_TYPE;
        $this->JOBWORK_IN_ORDER_OPENING         =   Enum::JOBWORK_IN_ORDER_OPENING;
        $this->JOBWORK_IN_RECEIPT_OPENING       =   Enum::JOBWORK_IN_RECEIPT_OPENING;
        $this->JOBWORK_IN_PRODUCTION_OPENING    =   Enum::JOBWORK_IN_PRODUCTION_OPENING;
        
        $this->jobworkInEntries = JobworkIn::where('group_id', $this->jobworkIn->group_id)->get();
        $this->antries = $this->jobworkInEntries->toArray();

        $this->products = Service::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();

        $this->accounts = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->jobwork_ac = Account::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();
        $this->jobwork_types = JobworkType::Where('company_id', auth()->user()->company ? auth()->user()->company->id : null)->get();

        $this->r_i = 'r';
        $this->user = auth()->user();
    
        $this->add_antries['product_name']  = null;                  
        $this->add_antries['qty']  = null;                  
        
        if ($this->module == $this->JOBWORK_IN_ORDER_OPENING || $this->module == $this->JOBWORK_IN_RECEIPT_OPENING || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING) {
            $this->add_antries['pend_qty']  = null;
        }

        if ($this->module == $this->JOBWORK_IN_ORDER || $this->module == $this->JOBWORK_IN_ORDER_OPENING) {
            $this->add_antries['type']  = null;    
        }                        

        if ($this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING) {
            $this->add_antries['type']  = null;
            $this->add_antries['r_i']  = 'r';
        }

        if ($this->module == $this->JOBWORK_IN_ISSUE_OTHER) {
            $this->add_antries['type']  = null;
        }

        if ($this->module == $this->JOBWORK_IN_BILLING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER) {
            $this->add_antries['rate']  = null;
            $this->add_antries['amount']  = null;
        }

        if ($this->module == $this->JOBWORK_IN_ORDER || $this->module == $this->JOBWORK_IN_RECEIPT || $this->module == $this->JOBWORK_IN_RECEIPT_OPENING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER || $this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING || $this->module == $this->JOBWORK_IN_ORDER_OPENING) {
            $this->add_antries['jobwork_rate']  = null;
            $this->add_antries['jobwork_amount']  = null;
        }
    }

    public function amountPerQtyAndRate()
    {
        if ($this->module == $this->JOBWORK_IN_BILLING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER) {
            if ($this->add_antries['qty'] > 0 && $this->add_antries['rate'] > 0) {
                $this->add_antries['amount'] = (int)$this->add_antries['qty']*(int)$this->add_antries['rate'];
            }
        }

        if ($this->module == $this->JOBWORK_IN_ORDER || $this->module == $this->JOBWORK_IN_RECEIPT || $this->module == $this->JOBWORK_IN_RECEIPT_OPENING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER || $this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING || $this->module == $this->JOBWORK_IN_ORDER_OPENING) {
            if ($this->add_antries['qty'] > 0 && $this->add_antries['jobwork_rate'] > 0) {
                $this->add_antries['jobwork_amount'] = (int)$this->add_antries['qty']*(int)$this->add_antries['jobwork_rate'];
            }
        }

        $this->dispatchBrowserEvent('entry-table');
    }    

    public function addType()
    {
        $validator = Validator::make($this->all(), [
            'type_name' => ['required', 'unique:jobwork_types,name']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->alert('error', $error, [
                    'position' => 'top-right',
                    'toast' => true,
                ]);
            }
        } else {
            $type = JobworkType::create([
                'name' => $this->type_name,
                'company_id' => $this->user->company->id
            ]);
            $this->jobwork_types->push($type);
            $this->reset(['type_name']);
            $this->dispatchBrowserEvent('hide-add-type-modal');
            $this->alert('success', 'Jobwork Type added successfully.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        }
    }

    public function submit()
    {
        $rules = [
            'account_id'            =>  'required',
            'narration'             =>  'required',
        ];

        if ($this->module == Enum::JOBWORK_IN_ORDER || $this->module == Enum::JOBWORK_IN_ORDER_OPENING) {
            $rules['order_date']        =   'required';
            $rules['order_no']          =   'required';
            $rules['doc_no']            =   'required';
            $rules['doc_date']          =   'required';
        } elseif ($this->module == Enum::JOBWORK_IN_ISSUE) {
            
            $rules['challan_no']         =   'required';
            $rules['challan_date']       =   'required';
        } elseif ($this->module == Enum::JOBWORK_IN_RECEIPT || $this->module == Enum::JOBWORK_IN_RECEIPT_OPENING) {
        
            $rules['voucher_no']        =   'required';
            $rules['voucher_date']      =   'required';
            $rules['challan_no']        =   'required';
            $rules['challan_date']      =   'required';
            $rules['nature_proccessing']    =   'required';
        } elseif ($this->module == Enum::JOBWORK_IN_BILLING) {
            
            $rules['jobwork_ac_id']     =   'required';
            $rules['tax_bill_supply']   =   'required';
            $rules['bill_no']           =   'required';
            $rules['bill_date']         =   'required';
        } elseif ($this->module == Enum::JOBWORK_IN_PRODUCTION || $this->module == Enum::JOBWORK_IN_PRODUCTION_OPENING) {
        
            $rules['voucher_no']        =   'required';
            $rules['voucher_date']      =   'required';
        } elseif ($this->module == Enum::JOBWORK_IN_ISSUE_OTHER) {
            
            $rules['challan_no']        =   'required';
            $rules['challan_date']      =   'required';
        } 

        $this->validate($rules);

        if (count($this->antries) == 0) {
            $this->alert('error', 'No account entry entered', [
                'position' => 'top-right',
                'toast' => true,
            ]);
            return $this->dispatchBrowserEvent('entry-table');
        }

        foreach ($this->jobworkInEntries as $index => $val) {
            $val->delete();
        }

        foreach ($this->antries as $key => $antry) {

            $data = [
                'account_id'            =>  $this->account_id,
                'narration'             =>  $this->narration,
                'product_name'          =>  $antry['product_name'],
                'qty'                   =>  $antry['qty'],
                'company_id'            => $this->user->company ? $this->user->company->id : null,
                'module'                => $this->module,
            ];

            if ($this->module == Enum::JOBWORK_IN_ORDER || $this->module == Enum::JOBWORK_IN_ORDER_OPENING) {
                $data['order_date']        =   $this->order_date;
                $data['order_no']          =   $this->order_no;
                $data['doc_no']            =   $this->doc_no;
                $data['doc_date']          =   $this->doc_date;
                $data['type']              =   $antry['type'];
                $data['jobwork_rate']      =   $antry['jobwork_rate'];
                $data['jobwork_amount']    =   $antry['jobwork_amount'];
            } elseif ($this->module == Enum::JOBWORK_IN_ISSUE) {
                
                $data['challan_no']         =   $this->challan_no;
                $data['challan_date']       =   $this->challan_date;
                $data['jobwork_rate']       =   $antry['jobwork_rate'];
                $data['jobwork_amount']     =   $antry['jobwork_amount'];
                $data['rate']               =   $antry['rate'];
                $data['amount']             =   $antry['amount'];
            } elseif ($this->module == Enum::JOBWORK_IN_RECEIPT || $this->module == Enum::JOBWORK_IN_RECEIPT_OPENING) {
                $data['voucher_no']        =   $this->voucher_no;
                $data['voucher_date']      =   $this->voucher_date;
                $data['challan_no']        =   $this->challan_no;
                $data['challan_date']      =   $this->challan_date;
                $data['jobwork_rate']      =   $antry['jobwork_rate'];
                $data['jobwork_amount']    =   $antry['jobwork_amount'];
                $data['nature_proccessing']    =   $this->nature_proccessing;
            } elseif ($this->module == Enum::JOBWORK_IN_BILLING) {
                
                $data['jobwork_ac_id']     =   $this->jobwork_ac_id;
                $data['tax_bill_supply']   =   $this->tax_bill_supply;
                $data['bill_no']           =   $this->bill_no;
                $data['bill_date']         =   $this->bill_date;
                $data['rate']              =   $antry['rate'];
                $data['amount']            =   $antry['amount'];
            } elseif ($this->module == Enum::JOBWORK_IN_PRODUCTION || $this->module == Enum::JOBWORK_IN_PRODUCTION_OPENING) {
                $data['voucher_no']         =   $this->voucher_no;
                $data['voucher_date']       =   $this->voucher_date;
                $data["type"]               =   $antry['type'];
                $data["r_i"]                =   $antry['r_i'];
                $data['jobwork_rate']       =   $antry['jobwork_rate'];
                $data['jobwork_amount']     =   $antry['jobwork_amount'];
            } elseif ($this->module == Enum::JOBWORK_IN_ISSUE_OTHER) {
                
                $data['challan_no']         =   $this->challan_no;
                $data['challan_date']       =   $this->challan_date;
                $data['type']               =   $antry['type'];
                $data['rate']               =   $antry['rate'];
                $data['amount']             =   $antry['amount'];  
                $data['jobwork_rate']       =   $antry['jobwork_rate'];
                $data['jobwork_amount']     =   $antry['jobwork_amount'];
            } 

            if ($this->module == Enum::JOBWORK_IN_ORDER_OPENING || $this->module == Enum::JOBWORK_IN_RECEIPT_OPENING || $this->module == Enum::JOBWORK_IN_PRODUCTION_OPENING) {
                
                $data['pend_qty']            =   $antry['pend_qty'];
            }

            $data['group_id']  =  $this->jobworkIn->group_id;

            // Create JobworkIn Transaction
            JobworkIn::create($data);
        }
        
        $moduleName = ucfirst(str_replace('_', ' ', $this->module));

        toast($moduleName." created successfully!", 'success');
        $this->dispatchBrowserEvent('entry-table');
        return redirect()->route('erp.account-transaction.jobwork-in.index', ['type' => $this->module, 'module' => $this->master]);
    }

    public function addEntry()
	{
        $rules = [];
        $message = [];
        $data = [];    
        
        $rules['add_antries.product_name']      = 'required';
        $message['add_antries.product_name.required']  = 'Product is required';
        $rules['add_antries.qty']      = 'required';
        $message['add_antries.qty.required']  = 'Qty is required';
        
        if ($this->module == $this->JOBWORK_IN_ORDER_OPENING || $this->module == $this->JOBWORK_IN_RECEIPT_OPENING || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING) {
            $rules['add_antries.pend_qty']          = 'required';
            $message['add_antries.pend_qty.required']    = 'Qty is required';
        }

        if ($this->module == $this->JOBWORK_IN_ORDER || $this->module == $this->JOBWORK_IN_ORDER_OPENING) {
            $rules['add_antries.type']              = 'required';
            $message['add_antries.type.required']   = 'Type is required';    
        }                        

        if ($this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING) {
            $rules['add_antries.type']              = 'required';
            $message['add_antries.type.required']   = 'Type is required';
            $rules['add_antries.r_i']               = 'required';
            $message['add_antries.r_i.required']    = 'R/I is required';
        }

        if ($this->module == $this->JOBWORK_IN_ISSUE_OTHER) {
            $rules['add_antries.type']              = 'required';
            $message['add_antries.type.required']   = 'Type is required';
        }

        if ($this->module == $this->JOBWORK_IN_BILLING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER) {
            $rules['add_antries.rate']                  = 'required';
            $message['add_antries.rate.required']       = 'Rate is required';
            $rules['add_antries.amount']                = 'required';
            $message['add_antries.amount.required']     = 'Amount is required';
        }

        if ($this->module == $this->JOBWORK_IN_ORDER || $this->module == $this->JOBWORK_IN_RECEIPT || $this->module == $this->JOBWORK_IN_RECEIPT_OPENING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER || $this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING || $this->module == $this->JOBWORK_IN_ORDER_OPENING) {
            $rules['add_antries.jobwork_rate']              = 'required';
            $message['add_antries.jobwork_rate.required']   = 'Jobwork Rate is required';
            $rules['add_antries.jobwork_amount']            = 'required';
            $message['add_antries.jobwork_amount.required'] = 'Jobwork Amount is required';
        }

		$validator = Validator::make($this->all(), $rules, $message);

        if ($validator->fails()) {
        	$this->alert('error', $validator->errors()->first(), [
                'position' => 'center',
                'toast' => true,
            ]);
        } else {

            $data['product_name']  = $this->add_antries['product_name'];                 
            $data['qty']  = $this->add_antries['qty'];
            
            if ($this->module == $this->JOBWORK_IN_ORDER_OPENING || $this->module == $this->JOBWORK_IN_RECEIPT_OPENING || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING) {
                $data['pend_qty']  = $this->add_antries['pend_qty'];
            }

            if ($this->module == $this->JOBWORK_IN_ORDER || $this->module == $this->JOBWORK_IN_ORDER_OPENING) { 
                $data['type']  = $this->add_antries['type'];
            }                        

            if ($this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING) {
                $data['type']  = $this->add_antries['type'];
                $data['r_i']  = $this->add_antries['r_i'];
            }

            if ($this->module == $this->JOBWORK_IN_ISSUE_OTHER) {
                $data['type']  = $this->add_antries['type'];
            }

            if ($this->module == $this->JOBWORK_IN_BILLING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER) {
                $data['rate']  = $this->add_antries['rate'];
                $data['amount']  = $this->add_antries['amount'];
            }

            if ($this->module == $this->JOBWORK_IN_ORDER || $this->module == $this->JOBWORK_IN_RECEIPT || $this->module == $this->JOBWORK_IN_RECEIPT_OPENING || $this->module == $this->JOBWORK_IN_ISSUE || $this->module == $this->JOBWORK_IN_ISSUE_OTHER || $this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING || $this->module == $this->JOBWORK_IN_ORDER_OPENING) {
                $data['jobwork_rate']  = $this->add_antries['jobwork_rate'];
                $data['jobwork_amount']  = $this->add_antries['jobwork_amount'];
            }

            $this->antries[] = $data; 
            
            foreach ($this->add_antries as $key => $value) {
                if ($this->module == $this->JOBWORK_IN_PRODUCTION || $this->module == $this->JOBWORK_IN_PRODUCTION_OPENING) {
                    if ($key == 'r_i') {
                        $this->add_antries['r_i'] = 'r';
                        continue;
                    }
                }
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
                            <label class="form-label"> Party A/c. <i class="text-danger">*</i></label>
                            <select wire:model.defer='account_id' class="form-control form-control-sm form-select @error('account_id') is-invalid @enderror" required>
                                <option value="">Select bank account</option>
                                @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                    {{ $account->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('account_id')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($module == $JOBWORK_IN_ORDER || $module == $JOBWORK_IN_ORDER_OPENING)
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Order No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('order_no') is-invalid @enderror" 
                                    wire:model.defer="order_no" placeholder="Enter order no" required>
                                @error('order_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Order Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('order_date') is-invalid @enderror" 
                                    wire:model.defer="order_date" required>
                                @error('order_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Doc. No. <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('doc_no') is-invalid @enderror" 
                                    wire:model.defer="doc_no" placeholder="Enter Doc No" required>
                                @error('doc_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Doc Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('doc_date') is-invalid @enderror" 
                                    wire:model.defer="doc_date" required>
                                @error('doc_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        @if ($module == $JOBWORK_IN_BILLING)

                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Bill No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('bill_no') is-invalid @enderror" 
                                    wire:model.defer="bill_no" placeholder="Enter Bill No" required>
                                @error('bill_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Bill Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('bill_date') is-invalid @enderror" 
                                    wire:model.defer="bill_date" required>
                                @error('bill_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Jobwork A/c <i class="text-danger">*</i></label>
                                <select wire:model.defer='jobwork_ac_id' class="form-control form-control-sm form-select @error('jobwork_ac_id') is-invalid @enderror" required>
                                    <option value="">Select Jobwork A/c</option>
                                    @foreach ($accounts as $account)
                                        <option value="{{ $account->id }}">
                                        {{ $account->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jobwork_ac_id')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Tax/Bill of Supply <i class="text-danger">*</i></label>
                                <select wire:model.defer='tax_bill_supply' class="form-control form-control-sm form-select @error('tax_bill_supply') is-invalid @enderror" required>
                                    <option value="">Select Tax/Bill of Supply</option>
                                    @foreach ($JOBWORK_IN_TAX_BILL_SUPPLY as $key => $val)
                                        <option value="{{ $key }}">
                                        {{ $val }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tax_bill_supply')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>

                        @endif

                        @if ($module == $JOBWORK_IN_RECEIPT || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_PRODUCTION || $module == $JOBWORK_IN_PRODUCTION_OPENING)

                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Voucher No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('voucher_no') is-invalid @enderror" 
                                    wire:model.defer="voucher_no" placeholder="Enter Voucher No" required>
                                @error('voucher_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Voucher Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('voucher_date') is-invalid @enderror" 
                                    wire:model.defer="voucher_date" required>
                                @error('voucher_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        @endif

                        @if ($module == $JOBWORK_IN_RECEIPT || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_ISSUE || $module == $JOBWORK_IN_ISSUE_OTHER)

                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Challan No <i class="text-danger">*</i></label>
                                <input type="text" class="form-control form-control-sm @error('challan_no') is-invalid @enderror" 
                                    wire:model.defer="challan_no" placeholder="Enter Challan No" required>
                                @error('challan_no')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Challan Date <i class="text-danger">*</i></label>
                                <input type="date" class="form-control form-control-sm @error('challan_date') is-invalid @enderror" 
                                    wire:model.defer="challan_date" required>
                                @error('challan_date')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        @if ($module == $JOBWORK_IN_RECEIPT || $module == $JOBWORK_IN_RECEIPT_OPENING)

                            <div class="col-md-6 mb-4">
                                <label class="form-label"> Nature of Proccessing <i class="text-danger">*</i></label>
                                <div class="row">
                                    <select wire:model.defer='nature_proccessing' class="form-control form-control-sm col form-select @error('nature_proccessing') is-invalid @enderror" required>
                                        <option value="">Select Nature</option>
                                        @foreach ($jobwork_types as $key => $val)
                                            <option value="{{ $val->id }}">
                                            {{ $val->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-primary col mx-2" data-bs-toggle="modal"
                                            data-bs-target="#modal-demo">Add New Type</button>
                                </div>
                                @error('nature_proccessing')
                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif

                        <div class="col-md-6 mb-4">
                            <label class="form-label"> Narration <i class="text-danger">*</i></label>
                            <input type="text" class="form-control form-control-sm @error('narration') is-invalid @enderror" 
                                wire:model.defer="narration" placeholder="Enter Narration" required>
                            @error('narration')
                                <span class="text-danger small wow flash">{{ $message }}</span>
                            @enderror
                        </div>

                        <table class="table table-bordered text-nowrap border-bottom entry-table">
                            <thead>
                                <tr>
                                    <th class="bg-primary text-white">Product Name</th>
                                    <th class="bg-primary text-white">Qty</th>                        
                                    @if ($module == $JOBWORK_IN_ORDER_OPENING || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_PRODUCTION_OPENING)
                                        <th class="bg-primary text-white">Pend. Qty</th>
                                    @endif
                                    @if ($module == $JOBWORK_IN_ORDER || $module == $JOBWORK_IN_ORDER_OPENING)
                                        <th class="bg-primary text-white">Type</th>
                                    @endif                        
                                    @if ($module == $JOBWORK_IN_PRODUCTION || $module == $JOBWORK_IN_PRODUCTION_OPENING)
                                        <th class="bg-primary text-white">Type</th>
                                        <th class="bg-primary text-white">R/I</th>
                                    @endif
                                    @if ($module == $JOBWORK_IN_ISSUE_OTHER)
                                        <th class="bg-primary text-white">Type</th>
                                    @endif
                                    @if ($module == $JOBWORK_IN_BILLING || $module == $JOBWORK_IN_ISSUE || $module == $JOBWORK_IN_ISSUE_OTHER)
                                        <th class="bg-primary text-white">Rate</th>
                                        <th class="bg-primary text-white">Amount</th>
                                    @endif
                                    @if ($module == $JOBWORK_IN_ORDER || $module == $JOBWORK_IN_RECEIPT || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_ISSUE || $module == $JOBWORK_IN_ISSUE_OTHER || $module == $JOBWORK_IN_PRODUCTION || $module == $JOBWORK_IN_PRODUCTION_OPENING || $module == $JOBWORK_IN_ORDER_OPENING)
                                        <th class="bg-primary text-white">Jobwork Rate</th>
                                        <th class="bg-primary text-white">Jobwork Amount</th>
                                    @endif
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
                                    @if ($module == $JOBWORK_IN_ORDER_OPENING || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_PRODUCTION_OPENING)
                                        <td>
                                            <input type="number" class="form-control form-control-sm" 
                                                wire:model.defer="add_antries.pend_qty" placeholder="Pend. Qty">
                                        </td>
                                    @endif

                                    @if ($module == $JOBWORK_IN_ORDER || $module == $JOBWORK_IN_ORDER_OPENING)
                                        <td>    
                                            <select wire:model.defer='add_antries.type' class="form-control form-control-sm form-select">
                                                <option value="">Type</option>
                                                @foreach ($JOBWORK_IN_ORDER_TYPE as $key => $val)
                                                    <option value="{{ $key }}">
                                                    {{ $val }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endif                        

                                    @if ($module == $JOBWORK_IN_PRODUCTION || $module == $JOBWORK_IN_PRODUCTION_OPENING)
                                        <td>
                                            <select wire:model.defer='add_antries.type' class="form-control form-control-sm form-select">
                                                <option value="">Type</option>
                                                @foreach ($JOBWORK_IN_PRODUCTION_TYPE as $key => $val)
                                                    <option value="{{ $key }}">
                                                    {{ $val }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <select wire:model.defer='add_antries.r_i' class="form-control form-control-sm form-select">
                                                <option value="r">R</option>
                                                <option value="i">I</option>
                                            </select>
                                        </td>
                                    @endif

                                    @if ($module == $JOBWORK_IN_ISSUE_OTHER)
                                        <td>
                                            <select wire:model.defer='add_antries.type' class="form-control form-control-sm form-select">
                                                <option value="">Type</option>
                                                @foreach ($JOBWORK_IN_ISSUE_OTHER_TYPE as $key => $val)
                                                    <option value="{{ $key }}">
                                                    {{ $val }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    @endif

                                    @if ($module == $JOBWORK_IN_BILLING || $module == $JOBWORK_IN_ISSUE || $module == $JOBWORK_IN_ISSUE_OTHER)
                                        <td>    
                                            <input type="number" class="form-control form-control-sm" 
                                                wire:model.defer="add_antries.rate" placeholder="Rate" wire:change="amountPerQtyAndRate">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" 
                                                wire:model.defer="add_antries.amount" placeholder="Amount">                        
                                        </td>
                                    @endif

                                    @if ($module == $JOBWORK_IN_ORDER || $module == $JOBWORK_IN_RECEIPT || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_ISSUE || $module == $JOBWORK_IN_ISSUE_OTHER || $module == $JOBWORK_IN_PRODUCTION || $module == $JOBWORK_IN_PRODUCTION_OPENING || $module == $JOBWORK_IN_ORDER_OPENING)
                                        <td>    
                                            <input type="number" class="form-control form-control-sm" 
                                                wire:model.defer="add_antries.jobwork_rate" placeholder="Jobwork Rate" wire:change="amountPerQtyAndRate">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm" 
                                                wire:model.defer="add_antries.jobwork_amount" placeholder="Jobwork Amount">                        
                                        </td>
                                    @endif
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
                                        @if ($module == $JOBWORK_IN_ORDER_OPENING || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_PRODUCTION_OPENING)
                                            <td>
                                                {{$entry['pend_qty']}}
                                            </td>
                                        @endif

                                        @if ($module == $JOBWORK_IN_ORDER || $module == $JOBWORK_IN_ORDER_OPENING)
                                            <td>
                                                @foreach ($JOBWORK_IN_ORDER_TYPE as $key => $val)
                                                    {{$entry['type'] == $key ? $val : ''}}
                                                @endforeach
                                            </td>
                                        @endif                        

                                        @if ($module == $JOBWORK_IN_PRODUCTION || $module == $JOBWORK_IN_PRODUCTION_OPENING)
                                            <td>
                                                @foreach ($JOBWORK_IN_PRODUCTION_TYPE as $key => $val)                                
                                                    {{$entry['type'] == $key ? $val : ''}}
                                                @endforeach
                                            </td>
                                            <td>
                                                {{$entry['r_i'] == 'r' ? 'R' : ''}}
                                                {{$entry['r_i'] == 'i' ? 'I' : ''}}
                                            </td>
                                        @endif

                                        @if ($module == $JOBWORK_IN_ISSUE_OTHER)
                                            <td>                    
                                                @foreach ($JOBWORK_IN_ISSUE_OTHER_TYPE as $key => $val)                            
                                                    {{$entry['type'] == $key ? $val : ''}}
                                                @endforeach
                                            </td>
                                        @endif

                                        @if ($module == $JOBWORK_IN_BILLING || $module == $JOBWORK_IN_ISSUE || $module == $JOBWORK_IN_ISSUE_OTHER)
                                            <td>
                                                {{$entry['rate']}}
                                            </td>
                                            <td>
                                                {{$entry['amount']}}
                                            </td>
                                        @endif

                                        @if ($module == $JOBWORK_IN_ORDER || $module == $JOBWORK_IN_RECEIPT || $module == $JOBWORK_IN_RECEIPT_OPENING || $module == $JOBWORK_IN_ISSUE || $module == $JOBWORK_IN_ISSUE_OTHER || $module == $JOBWORK_IN_PRODUCTION || $module == $JOBWORK_IN_PRODUCTION_OPENING || $module == $JOBWORK_IN_ORDER_OPENING)
                                            <td>
                                                {{$entry['jobwork_rate']}}
                                            </td>
                                            <td>
                                                {{$entry['jobwork_amount']}}
                                            </td>
                                        @endif
                                        
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

                <section>
                    {{-- add New Jobwork Type --}}
                    <div class="modal fade" id="modal-demo" tabindex="-1" aria-hidden="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add new type</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="addType">
                                        <div class="form-type mt-2">
                                            <label for="type_name">Type name</label>
                                            <input type="text" class="form-control form-control-sm" id="type_name" wire:model.defer.defer="type_name" required>
                                        </div>
                                        <input type="submit" id="addTypeButton" class="d-none">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                                    <label for="addTypeButton" class="btn btn-primary">Save Type</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    window.addEventListener('hide-add-type-modal', event => {
                        $('.modalCloseButton').click();
                    });
                </script>

            </div>
        blade;
    }
}
