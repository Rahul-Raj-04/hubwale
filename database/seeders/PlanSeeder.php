<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$plans = [
    		[
		        'name' => 'Free Trial',
				'description' => 'Get One Month Free Trial',
				'monthly_price' => 0,
				'yearly_price' => 0,
				'country_id' => 1,
				'festival_image' => 1,
				'fi_watermark' => 1,
				'fi_ad' => 1,
				'fi_download_limit_monthly' => 50,
				'fi_download_limit_yearly' => 650,
				'erp' => 1,
				'pdf_maker' => 1,
				'stock_management' => 1,
				'e_commerce' => 1
			],
			[
		        'name' => 'Small Business',
				'description' => 'Plan for small businesses',
				'monthly_price' => 99,
				'yearly_price' => 999,
				'country_id' => 1,
				'festival_image' => 1,
				'fi_watermark' => 0,
				'fi_ad' => 0,
				'fi_download_limit_monthly' => 60,
				'fi_download_limit_yearly' => 750,
				'erp' => 1,
				'pdf_maker' => 0,
				'stock_management' => 0,
				'e_commerce' => 1
			],
			[
		        'name' => 'Medium Business',
				'description' => 'Plan for medium businesses',
				'monthly_price' => 149,
				'yearly_price' => 1299,
				'country_id' => 1,
				'festival_image' => 1,
				'fi_watermark' => 0,
				'fi_ad' => 0,
				'fi_download_limit_monthly' => 70,
				'fi_download_limit_yearly' => 900,
				'erp' => 1,
				'pdf_maker' => 1,
				'stock_management' => 1,
				'e_commerce' => 1
			],
			[
		        'name' => 'Large Business',
				'description' => 'Plan for large businesses',
				'monthly_price' => 189,
				'yearly_price' => 1899,
				'country_id' => 1,
				'festival_image' => 1,
				'fi_watermark' => 0,
				'fi_ad' => 0,
				'fi_download_limit_monthly' => 100,
				'fi_download_limit_yearly' => 1300,
				'erp' => 1,
				'pdf_maker' => 1,
				'stock_management' => 1,
				'e_commerce' => 1
			]
		];
		foreach ($plans as $plan) {
			Plan::create($plan);			
		}
    }
}
