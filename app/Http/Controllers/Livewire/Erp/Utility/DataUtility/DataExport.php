<?php

namespace App\Http\Controllers\Livewire\Erp\Utility\DataUtility;

use Livewire\Component;
use App\Models\Account;
use App\Models\AccountGroup;
use App\Models\City;
use App\Models\State;
use App\Models\Group;
use App\Models\Category;
use App\Models\ErpProduct;

class DataExport extends Component
{
    public $account_group_name;
    public $account_area_name;
    public $account_city_name;
    public $account_name;
    public $product_group_name;
    public $product_category_name;
    public $product_name;

    public $account_groups;
    public $account_areas;
    public $account_cities;
    public $accounts;
    public $product_groups;
    public $product_categories;
    public $products;

    public function mount()
    {
        $this->account_groups = AccountGroup::where('company_id', auth()->user()->company->id)->get();
        $this->account_areas = State::all();
        $this->account_cities = City::all();
        $this->accounts = Account::where('company_id', auth()->user()->company->id)->get();
        $this->product_groups = Group::where('company_id', auth()->user()->company->id)->get();
        $this->product_categories = Category::where('company_id', auth()->user()->company->id)->get();
        $this->products = ErpProduct::where('company_id', auth()->user()->company->id)->get();
    }

    public function render()
    {
        return view('livewire.erp.utility.data-utility.data-export')->extends('erp.app');
    }
}
