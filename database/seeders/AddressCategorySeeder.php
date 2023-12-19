<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AddressCategory;

class AddressCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addressCategories = [
            [
                'name' => 'Test 1',
            ],
            [
                'name' => 'Test 2',
            ],
            [
                'name' => 'Test 3',
            ],
            [
                'name' => 'Test 4',
            ]
        ];
        foreach ($addressCategories as $addressCategory) {
            AddressCategory::create($addressCategory);
        }
    }
}
