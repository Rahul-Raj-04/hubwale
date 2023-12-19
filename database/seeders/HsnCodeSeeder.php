<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HsnSac;

class HsnCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $HSN_codes = [
            [
                'number' => '0101',
                'description' => "Live horses, asses, mules and hinnies."
            ],
            [
                'number' => '01012100',
                'description' => "Pure-bred breeding animals"
            ],
            [
                'number' => '0102',
                'description' => "Live bovine animals."
            ],
            [
                'number' => '0103',
                'description' => "Live swine."
            ],
            [
                'number' => '0104',
                'description' => "Live sheep and goats."
            ],
            [
                'number' => '0105',
                'description' => "Live poultry, that is to say, fowls of the species Gallus domesticus, ducks, geese, turkeys and guinea fowls."
            ],
            [
                'number' => '0106',
                'description' => "Other live animals."
            ],
            [
                'number' => '0203',
                'description' => "Meat of swine, fresh, chilled or frozen."
            ],
            [
                'number' => '382472',
                'description' => "containing Bromochlorodifluoromethane, bromotrifluoromethane or dibromotetrafluoroethanes"
            ],
            [
                'number' => '38249932',
                'description' => "Ferrite powder"
            ],
        ];

        foreach ($HSN_codes as $key => $HSN_code) {
            HsnSac::create([
                'number' => $HSN_code['number'],
                'description' => $HSN_code['description'],
            ]);          
        }
    }
}
