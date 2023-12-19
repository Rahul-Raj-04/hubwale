<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            [
                'code' => 'IN',
                'name' => 'India',
                'phonecode' => '91'
            ],
            [
                'code' => 'US',
                'name' => 'USA',
                'phonecode' => '1'
            ]
        ];

        $states = [
            [
                'code' => 'GJ',
                'name' => 'Gujarat',
                'country_id' => 1
            ],
            [
                'code' => 'RJ',
                'name' => 'Rajasthan',
                'country_id' => 1
            ],
            [
                'code' => 'FL',
                'name' => 'Florida',
                'country_id' => 2
            ],
            [
                'code' => 'CL',
                'name' => 'California',
                'country_id' => 2
            ]
        ];

        $cities = [
            [
                'name' => 'Ahmedabad',
                'state_id' => 1
            ],
            [
                'name' => 'Morbi',
                'state_id' => 1
            ],
            [
                'name' => 'Jaipur',
                'state_id' => 2
            ],
            [
                'name' => 'Udaipur',
                'state_id' => 2
            ],
            [
                'name' => 'Florida city',
                'state_id' => 3
            ],
            [
                'name' => 'Seetle',
                'state_id' => 4
            ]
        ];

        foreach ($countries as $country) {
            Country::create([
                'code' => $country['code'],
                'name' => $country['name'],
                'phonecode' => $country['phonecode'],
            ]);
        }

        foreach ($states as $state) {
            State::create([
                'code' => $state['code'],
                'name' => $state['name'],
                'country_id' => $state['country_id']
            ]);
        }

        foreach ($cities as $city) {
            City::create([
                'name' => $city['name'],
                'state_id' => $city['state_id']
            ]);
        }
    }
}
