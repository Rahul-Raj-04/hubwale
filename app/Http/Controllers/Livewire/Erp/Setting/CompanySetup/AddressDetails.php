<?php

namespace App\Http\Controllers\Livewire\Erp\Setting\CompanySetup;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Http\Traits\LocationTrait;
use App\Models\User;
use App\Models\Company;

class AddressDetails extends Component
{
    use LivewireAlert;
    use LocationTrait;

    public $countries = [];
    public $states = [];
    public $cities = [];

    //Address details
    public $address;
    public $country;
    public $state;
    public $city;
    public $pincode;
    public $phone_1;
    public $phone_2;
    public $mob_1;
    public $mob_2;
    public $fax;
    public $email;
    public $website;

    public function mount()
    {   
        $company = Company::find(auth()->user()->company->id);

        $this->country = $company->country;
        $this->address = $company->address;
        $this->country = $company->country;
        $this->state = $company->state;
        $this->city = $company->city;
        $this->pincode = $company->pincode;
        $this->phone_1 = $company->phone_1;
        $this->phone_2 = $company->phone_2;
        $this->mob_1 = $company->mob_1;
        $this->mob_2 = $company->mob_2;
        $this->fax = $company->fax;
        $this->email = $company->email;
        $this->website = $company->website;

        $this->countries = $this->fetchAllCountries();
        $this->states = $this->fetchStatesByCountryId($this->country);
        $this->cities = $this->fetchCitiesByStateId($this->state);
    }

    public function render()
    {
        return view('livewire.erp.setting.company-setup.address-details')->extends('erp.app');
    }


    public function submit()
    {
        $this->validate([
            'address' => ['required'],
            'country' => ['required', 'exists:countries,id'],
            'state' => ['required', 'exists:states,id'],
            'city' => ['required', 'exists:cities,id'],
            'pincode' => ['required', 'numeric', 'digits:6'],
            'email' => ['nullable','email']
        ]);

        $company = Company::find(auth()->user()->company->id)->update([
            "address" => $this->address,
            "country" => $this->country,
            "state" => $this->state,
            "city" => $this->city,
            "pincode" => $this->pincode,
            "phone_1" => $this->phone_1,
            "phone_2" => $this->phone_2,
            "mob_1" => $this->mob_1,
            "mob_2" => $this->mob_2,
            "fax" => $this->fax,
            "email" => $this->email,
            "website" => $this->website,
        ]);
        

        toast('Address details changed successfully!', 'success');

        return redirect()->route('erp.setting.home');
    }

    public function updatedState()
    {
        $this->cities = $this->fetchCitiesByStateId($this->state);
        $this->city = 0;
    }

    public function updatedCountry()
    {
        $this->cities = $this->fetchCitiesByStateId(null);
        $this->states = $this->fetchStatesByCountryId($this->country);
        $this->state = 0;
    }
}
