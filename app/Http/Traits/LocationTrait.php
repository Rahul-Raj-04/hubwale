<?php

namespace App\Http\Traits;

use App\Models\Country;
use App\Models\State;
use App\Models\City;

/**
 * To fetch location
 */
trait LocationTrait
{
    public function fetchAllCountries()
    {
        return Country::all();
    }

    public function fetchStatesByCountryId($countryId)
    {
        return State::where('country_id', $countryId)->get();
    }

    public function fetchCitiesByStateId($stateId)
    {
        return City::where('state_id', $stateId)->get();
    }
}
