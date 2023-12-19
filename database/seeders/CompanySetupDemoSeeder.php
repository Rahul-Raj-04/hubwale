<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use App\Http\Traits\CompanySetupTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompanySetupDemoSeeder extends Seeder
{
    use CompanySetupTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = Company::create([
            "company_name" => 'Demo',
            "address" => 'Demo',
            "country" => 1,
            "state" => 1,
            "city" => 1,
            "pincode" => 320008,
            "phone_1" => '1222112212',
            "phone_2" => '1222112213',
            "mob_1" => '1222112214',
            "mob_2" => '1222112215',
            "fax" => '3242342',
            "email" => 'demo@gmail.com',
            "website" => 'https://www.google.com/',
            "business_type_id" => 1
        ]);

        $user = User::find(2);
        $user->company_id = $company->id;
        $user->save();

        // Add accounts and account groups and gst slab and gst commodity
        $this->companySetup($company->id);

        try {
            $url = 'https://source.unsplash.com/random/100x100';
            $company->addMediaFromUrl($url)->usingFileName(Str::random(30))->toMediaCollection('logo');
        } catch (\Throwable $th) {
            info($th->getMessage());
        }
    }
}
