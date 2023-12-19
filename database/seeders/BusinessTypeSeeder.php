<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessType;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businessTypes = [

            [ 
                "name" => "Electric" 
            ],
            [ 
                "name" => "Electronic" 
            ],
            [ 
                "name" => "Ceramics" 
            ],
            [ 
                "name" => "Autoparts" 
            ],
            [ 
                "name" => "Footwear" 
            ],
            [ 
                "name" => "Plywood & Laminates" 
            ],
            [ 
                "name" => "Stationary" 
            ],
            [ 
                "name" => "Sanitary Hardware" 
            ],
            [ 
                "name" => "FMCG" 
            ],
            [ 
                "name" => "Other" 
            ],
            [ 
                "name" => "Accessory" 
            ],
            [ 
                "name" => "Agro Business" 
            ],
            [ 
                "name" => "Garments" 
            ],
            [ 
                "name" => "Hardware & Sanitary" 
            ],
            [ 
                "name" => "Mobile Business" 
            ],
            [ 
                "name" => "Glass Business" 
            ],
            [ 
                "name" => "Toys Traders" 
            ],
            [ 
                "name" => "Tyre Company" 
            ],
            [ 
                "name" => "Plastic" 
            ],
            [ 
                "name" => "Ginning" 
            ],
            [ 
                "name" => "Chemicals" 
            ],
            [ 
                "name" => "Casting" 
            ],
            [ 
                "name" => "Mandi" 
            ],
            [ 
                "name" => "Paint" 
            ],
            [ 
                "name" => "Steel" 
            ],
            [ 
                "name" => "Computer Hardware /IT" 
            ],
            [ 
                "name" => "Trust/NGO" 
            ],
            [ 
                "name" => "Super Market / Kirana Store" 
            ],
            [ 
                "name" => "Food Product" 
            ],
            [ 
                "name" => "Embroidery" 
            ],
            [ 
                "name" => "Construction" 
            ],
            [ 
                "name" => "Petro" 
            ],
            [ 
                "name" => "Bio coal" 
            ],
            [ 
                "name" => "Optical/Eyeware" 
            ],
            [ 
                "name" => "Rubber & Polymers" 
            ],
            [ 
                "name" => "Textiles" 
            ],
            [ 
                "name" => "Gold & Jewelry" 
            ],
            [ 
                "name" => "Packaging" 
            ],
            [ 
                "name" => "Import-Export" 
            ],
            [ 
                "name" => "Transport – Logistic" 
            ],
            [ 
                "name" => "Furniture" 
            ],
            [ 
                "name" => "Printing (offset)" 
            ],
            [ 
                "name" => "Accountant" 
            ],
            [ 
                "name" => "Watch Shop Or Showroom" 
            ],
            [ 
                "name" => "Pharma/Medical" 
            ],
            [ 
                "name" => "CA" 
            ],
            [ 
                "name" => "Hotel/Restaurants" 
            ],
            [ 
                "name" => "Cold Storage" 
            ],
            [ 
                "name" => "Kitchenware" 
            ],
            [ 
                "name" => "Construction Products" 
            ],
        ];

        foreach ($businessTypes as $businessType) {

            BusinessType::create([
                'name' => $businessType['name'],
            ]);
        }
    }
}
