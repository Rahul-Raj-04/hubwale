<?php

namespace App\Http\Controllers\Livewire\Erp\Master\Product;

use Livewire\Component;
use App\Models\GstCommodity;
use Illuminate\Support\Facades\Validator;
use App\Models\Group;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Unit;
use App\Enum\Enum;
use App\Models\ErpProduct;
use App\Models\Account;
use App\Models\AccountGroup;
use Illuminate\Http\Request;

class AddProduct extends Component
{
    use LivewireAlert;

    public $name;
    public $alias;
    public $garment_product;
    public $gst_commodity_id;
    public $vat_commodity_id;
    public $commodity_for_less;
    public $commodity_for_greater;
    public $group_id;
    public $category_id;
    public $stock_required;
    public $pricelist;
    public $tcs;
    public $purchase_rate;
    public $sales_rate;
    public $tax_paid_rate;
    public $sales_unit_id;
    public $purchase_unit_id;
    public $gst_unit;
    public $quantity;
    public $amount;
    public $minimum_stock;
    public $reorder_level;
    public $auto_production;
    public $process_name;
    public $sales_conversion_factor;
    public $parchase_conversion_factor;
    public $stock_conversion_factor;
    public $closing_stock_account;
    public $trending_account;

    public $user;
    // Group
    public $group_name;
    public $group_short_name;

    // Category
    public $category_name;
    public $category_short_name;
    
    public $unit_name; 

    public $groups = [];
    public $categories = [];
    public $gst_commodities = [];
    public $units = [];
    public $gst_units = [];
    public $accounts = [];
    public $account_groups = [];

    public $return_type;
    public function mount(Request $request)
    {
        $this->return_type = $request->return_type ? $request->return_type : null;
        $this->user = auth()->user();
        $this->units = Unit::all();
        $this->groups = $this->user->company->groups;
        $this->categories = $this->user->company->categories;
        $this->gst_commodities = GstCommodity::where('company_id', $this->user->company->id)->get();
        $this->gst_units = Enum::GST_UNITS;
        $this->stock_required = 1;
        $this->pricelist = 1;
        $this->tcs = 0;
        $this->garment_product = 0;
        $this->tax_paid_rate = 'both';
        $this->auto_production = 0;
        $this->accounts = Account::where('company_id', $this->user->company_id)->whereHas('account_group', function($account) {
            $account->where('name', 'Stock-in-hand');
        })->get();
        $this->account_groups = AccountGroup::where('company_id', $this->user->company_id)->where('header', 'Trading Account')->get();
    }

    public function addGroup()
    {
        $validator = Validator::make($this->all(), [
            'group_name' => ['required', 'unique:groups,name']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->alert('error', $error, [
                    'position' => 'top-right',
                    'toast' => true,
                ]);
            }
        } else {
            $group = Group::create([
                'name' => $this->group_name,
                'short_name' => $this->group_short_name,
                'company_id' => $this->user->company->id
            ]);
            $this->groups->push($group);
            $this->reset(['group_name', 'group_short_name']);
            $this->dispatchBrowserEvent('hide-add-group-modal');
            $this->alert('success', 'The group added successfully.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        }
    }

    public function addCategory()
    {
        $validator = Validator::make($this->all(), [
            'category_name' => ['required', 'unique:categories,name']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->alert('error', $error, [
                    'position' => 'top-right',
                    'toast' => true,
                ]);
            }
        } else {
            $category = Category::create([
                'name' => $this->category_name,
                'short_name' => $this->category_short_name,
                'company_id' => $this->user->company->id
            ]);
            $this->categories->push($category);
            $this->reset(['category_name', 'category_short_name']);
            $this->dispatchBrowserEvent('hide-add-category-modal');
            $this->alert('success', 'Category added successfully.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        }
    }
    public function addUnit()
    {
        $validator = Validator::make($this->all(), [
            'unit_name' => ['required', 'unique:units,name']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->alert('error', $error, [
                    'position' => 'top-right',
                    'toast' => true,
                ]);
            }
        } else {
            $unit = Unit::create([
                'name' => $this->unit_name,
                'company_id' => $this->user->company->id
            ]);
            $this->units->push($unit);
            $this->reset(['unit_name']);
            $this->dispatchBrowserEvent('hide-add-unit-modal');
            $this->alert('success', 'The unit added successfully.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        }
    }

    public function saveProduct(){
        $this->validate([
            'name' => 'required',
            'alias' => 'required',
            'gst_commodity_id' => 'required',
        ]);

        ErpProduct::create([
            'name' => $this->name,
            'alias' => $this->alias,
            'garment_product' => $this->garment_product,
            'gst_commodity_id' => $this->gst_commodity_id,
            'vat_commodity_id' => $this->vat_commodity_id,
            'commodity_for_less' => $this->commodity_for_less,
            'commodity_for_greater' => $this->commodity_for_greater,
            'group_id' => $this->group_id,
            'category_id' => $this->category_id,
            'stock_required' => $this->stock_required,
            'pricelist' => $this->pricelist,
            'tcs' => $this->tcs,
            'purchase_rate' => $this->purchase_rate,
            'sales_rate' => $this->sales_rate,
            'tax_paid_rate' => $this->tax_paid_rate,
            'sales_unit_id' => $this->sales_unit_id,
            'purchase_unit_id' => $this->purchase_unit_id,
            'gst_unit' => $this->gst_unit,
            'quantity' => $this->quantity,
            'amount' => $this->amount,
            'minimum_stock' => $this->minimum_stock,
            'reorder_level' => $this->reorder_level,
            'auto_production' => $this->auto_production,
            'process_name' => $this->process_name,
            'sales_conversion_factor' => $this->sales_conversion_factor,
            'parchase_conversion_factor' => $this->parchase_conversion_factor,
            'stock_conversion_factor' => $this->stock_conversion_factor,
            'closing_stock_account' => $this->closing_stock_account,
            'trending_account' => $this->trending_account,
            'company_id' => $this->user->company->id,
        ]);
        
        toast('Product created successfully!', 'success');
        if($this->return_type == 'product_ledger'){
            return redirect()->route('erp.report.stock-report.product-ledger.index');
        }
        return redirect()->route('erp.master.product.index');
    }

    public function render()
    {
        return <<<'blade'
        <div>
            <form wire:submit.prevent="saveProduct">
                <div class="row">
                    <div class="col-md-6">
                        <div class="border">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Name</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter name" wire:model.defer="name">
                                    @error('name')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Alias</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter alias" wire:model.defer="alias">
                                    @error('alias')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Garment Product </label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model='garment_product' class="form-control form-control-sm-sm form-select">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('garment_product')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">GST Commodity </label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='gst_commodity_id' class="form-control form-control-sm-sm form-select" {{$garment_product == 1 ? 'disabled' : ''}}>
                                        <option value="">Select gst commodity</option>
                                        @foreach ($gst_commodities as $gst_commodity)
                                            <option value="{{ $gst_commodity->id }}">
                                                {{ $gst_commodity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('gst_commodity_id')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label">VAT Commodity </label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='vat_commodity_id' class="form-control form-control-sm-sm form-select" disabled>
                                        <option value="">Select vat commodity</option>
                                        @foreach ($gst_commodities as $gst_commodity)
                                            <option value="{{ $gst_commodity->id }}">
                                                {{ $gst_commodity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('vat_commodity_id')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Commodity For < 952.39 </label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='commodity_for_less' class="form-control form-control-sm-sm form-select">
                                        <option value="">Select commodity</option>
                                        @foreach ($gst_commodities as $gst_commodity)
                                            <option value="{{ $gst_commodity->id }}">
                                                {{ $gst_commodity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('commodity_for_less')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Commodity For > 952.39 </label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='commodity_for_greater' class="form-control form-control-sm-sm form-select" {{$garment_product == 0 ? 'disabled' : ''}}>
                                        <option value="">Select commodity</option>
                                        @foreach ($gst_commodities as $gst_commodity)
                                            <option value="{{ $gst_commodity->id }}">
                                                {{ $gst_commodity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('commodity_for_greater')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mt-2">
                                    <label for="group_id">Group</label>
                                </div>
                                <div class="form-group col-md-8 mt-2">
                                    <div class="row">
                                        <select class="form-control form-control-sm-sm form-select col" id="group_id" wire:model.defer="group_id">
                                            <option value="" selected>Select Group</option>
                                            @if($groups)
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button type="button" class="btn btn-primary btn-sm col mx-2" data-bs-toggle="modal"
                                            data-bs-target="#modal-group">Add new group</button>
                                    </div>
                                    @error('group_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mt-2">
                                    <label for="category_id">Category</label>
                                </div>
                                <div class="form-group col-md-8 mt-2">
                                    <div class="row">
                                        <select class="form-control form-control-sm-sm form-select form-control form-control-sme-sm col" id="category_id" wire:model.defer="category_id">
                                            <option value="" selected>Select Category</option>
                                            @if($categories)
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <button type="button" class="btn btn-primary btn-sm col mx-2" data-bs-toggle="modal"
                                            data-bs-target="#modal-category">Add new category</button>
                                    </div>
                                    @error('category_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border m-1">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Purchase Rate</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter Rate" wire:model.defer="purchase_rate">
                                    @error('purchase_rate')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Sales Rate</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter Rate" wire:model.defer="sales_rate">
                                    @error('sales_rate')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Tax Paid Rate</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='tax_paid_rate' class="form-control form-control-sm-sm form-select">
                                        <option value="both">Both</option>
                                        <option value="none">None</option>
                                        <option value="purchase">Purchase</option>
                                        <option value="sales">Sales</option>
                                    </select>
                                    @error('tax_paid_rate')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border m-1">
                            <div class="row ps-2">
                                <div class="form-group col-md-4 mt-2">
                                    <label for="sales_unit_id" class="form-label">Sales</label>
                                </div>
                                <div class="form-group col-md-8 mt-2">
                                    <div class="row">
                                        <select class="form-control form-control-sm-sm form-select col" id="sales_unit_id" wire:model.defer="sales_unit_id">
                                            <option value="" selected>Select sales unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-primary btn-sm col mx-2" data-bs-toggle="modal"
                                                data-bs-target="#modal-unit">Add</button>
                                    </div>
                                    @error('sales_unit_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 mt-2">
                                    <label for="purchase_unit_id" class="form-label">Purchase</label>
                                </div>
                                <div class="form-group col-md-8 mt-2">
                                    <div class="row">
                                        <select class="form-control form-control-sm-sm form-select form-control form-control-sme-sm col" id="purchase_unit_id" wire:model.defer="purchase_unit_id">
                                            <option value="" selected>Select purchase unit</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-primary btn-sm col mx-2" data-bs-toggle="modal"
                                            data-bs-target="#modal-unit">Add</button>
                                    </div>
                                    @error('purchase_unit_id')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> GST Unit(UQC)</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='gst_unit' class="form-control form-control-sm-sm form-select">
                                        <option value="purchase">Select gst unit</option>
                                        @foreach($gst_units as $unit)
                                            <option value="{{$unit}}">{{$unit}}</option>
                                        @endforeach
                                    </select>
                                    @error('gst_unit')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="border m-1">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Quantity</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter quantity" wire:model.defer="quantity" {{$stock_required == 0 ? 'disabled' : ''}}>
                                    @error('quantity')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Amount</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <input type="nember" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter amount" wire:model.defer="amount" {{$stock_required == 0 ? 'disabled' : ''}}>
                                    @error('amount')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="border m-1">
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> Stock Required </label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model='stock_required' class="form-control form-control-sm-sm form-select">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('stock_required')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> PriceList</label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='pricelist' class="form-control form-control-sm-sm form-select">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('pricelist')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <label class="form-label"> TCS </label>
                                </div>
                                <div class="col-md-8 mb-4">
                                    <select wire:model.defer='tcs' class="form-control form-control-sm-sm form-select">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('tcs')
                                        <span class="text-danger small wow flash">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto ms-auto d-print-none d-flex pe-0 mt-3">
                    <div class="btn-list">
                        <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#other_detail">Other Details</button>
                        <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modal-trending-account">Multiple Tranding Account</button>
                    </div>
                </div>
                <input type="submit" id="productFormSubmit" class="d-none">
            </form>
            
            <section>
                {{-- add group modal --}}
                <div class="modal fade" id="modal-group" tabindex="-1" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new group</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="addGroup">
                                    <div class="form-group mt-2">
                                        <label for="group_name">Group name</label>
                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" id="group_name" wire:model.defer.defer="group_name">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="group_short_name">Group short name</label>
                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" id="group_short_name" wire:model.defer.defer="group_short_name">
                                    </div>
                                    <input type="submit" id="addGroupButton" class="d-none">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                                <label for="addGroupButton" class="btn btn-primary">Save Group</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- add category modal --}}
                <div class="modal fade" id="modal-category" tabindex="-1" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="addCategory">
                                    <div class="form-group mt-2">
                                        <label for="category_name">Category name</label>
                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" id="category_name" wire:model.defer.defer="category_name">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="category_short_name">Category short name</label>
                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" id="category_short_name" wire:model.defer.defer="category_short_name">
                                    </div>
                                    <input type="submit" id="addCategoryButton" class="d-none">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                                <label for="addCategoryButton" class="btn btn-primary">Save Category</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- add unit modal --}}
                <div class="modal fade" id="modal-unit" tabindex="-1" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new unit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form wire:submit.prevent="addUnit">
                                    <div class="form-group mt-2">
                                        <label for="unit_name">Name</label>
                                        <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" id="unit_name" wire:model.defer="unit_name">
                                    </div>
                                    <input type="submit" id="addUnitButton" class="d-none">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                                <label for="addUnitButton" class="btn btn-primary">Save Category</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- add other detail modal --}}
                <div class="modal fade" id="other_detail" tabindex="-1" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Other Details</h5>
                                <a href="#" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></a>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label"> Minimum Stock</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter minimum stock" wire:model.defer="minimum_stock">
                                                @error('minimum_stock')
                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label"> Reorder Level</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter reorder level" wire:model.defer="reorder_level">
                                                @error('reorder_level')
                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label"> Auto Production </label>
                                            </div>
                                            <div class="col-md-8">
                                                <select wire:model.defer="auto_production" class="form-control form-control-sm form-control form-control-sm-sm" id="auto_production" disabled>
                                                    <option value="0">No</option>
                                                    <option value="1">YES</option>
                                                </select>
                                                @error('auto_production')
                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="form-label"> Process Name </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control form-control-sm form-control form-control-sm-sm" placeholder="Enter process name" wire:model.defer="process_name" disabled>
                                                @error('process_name')
                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label"> Sales conversion factor</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" wire:model.defer="sales_conversion_factor">
                                                @error('sales_conversion_factor')
                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label"> Parchase conversion factor</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" wire:model.defer="parchase_conversion_factor">
                                                @error('parchase_conversion_factor')
                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label"> Stock conversion factor</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" class="form-control form-control-sm form-control form-control-sm-sm" wire:model.defer="stock_conversion_factor">
                                                @error('stock_conversion_factor')
                                                    <span class="text-danger small wow flash">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <label class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save</label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- add trending account modal --}}
                <div class="modal fade" id="modal-trending-account" tabindex="-1" aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group mt-2">
                                        <label for="category_name">Trending Account</label>
                                        <select wire:model.defer='trending_account' class="form-control form-control-sm-sm form-select">
                                            <option value="">Select group</option>
                                            @foreach ($account_groups as $account_group)
                                                <option value="{{ $account_group->id }}">
                                                    {{ $account_group->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="category_short_name">Closing Stock Account</label>
                                        <select wire:model.defer='closing_stock_account' class="form-control form-control-sm-sm form-select">
                                            <option value="">Select group</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">
                                                    {{ $account->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                                <label class="btn btn-primary" data-bs-dismiss="modal">Save Category</label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                window.addEventListener('hide-add-group-modal', event => {
                    $('.modalCloseButton').click();
                });

                window.addEventListener('hide-add-category-modal', event => {
                    $('.modalCloseButton').click();
                });

                window.addEventListener('hide-add-unit-modal', event => {
                    $('.modalCloseButton').click();
                });
            </script>
        </div>
        blade;
    }
}
