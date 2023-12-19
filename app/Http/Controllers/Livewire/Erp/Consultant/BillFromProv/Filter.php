<?php

namespace App\Http\Controllers\Livewire\Erp\Consultant\BillFromProv;

use Livewire\Component;

class Filter extends Component
{
	public $group_name;
	public $area_name;
	public $city_name;
	public $account_name;

	public $group_names = [];
	public $area_names = [];
	public $city_names = []; 
	public $account_names = []; 

	public function mount()
	{
		$this->group_name = "all";
		$this->area_name = "all";
		$this->city_name = "all";
		$this->account_name = "all";
	}

	public function updatedGroupName()
	{
		if($this->group_name == 'selected') {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'group_name']);
		}
	}

	public function updatedAreaName()
	{
		if($this->area_name == 'selected') {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'area_name']);
		}
	}

	public function updatedCityName()
	{
		if($this->city_name == 'selected') {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'city_name']);
		}
	}

	public function updatedAccountName()
	{
		if($this->account_name == 'selected') {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'account_name']);
		}
	}

	public function filter()
	{
		if($this->group_name == 'selected' && count($this->group_names) == 0) {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'group_name']);
		}elseif($this->area_name == 'selected' && count($this->area_names) == 0) {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'area_name']);
		}elseif($this->city_name == 'selected' && count($this->city_names) == 0) {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'city_name']);
		}elseif($this->account_name == 'selected' && count($this->account_names) == 0) {
			$this->dispatchBrowserEvent('show_model', ['model_name' => 'account_name']);
		}else {
			$this->dispatchBrowserEvent('show_list');
		}
	}

    public function render()
    {
        return view('livewire.erp.consultant.bill-from-prov.filter')->extends('erp.app');
    }
}
