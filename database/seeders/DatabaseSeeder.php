<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role Seeder
        $this->call(RoleSeeder::class);

        // Address Seeder
        $this->call(AddressSeeder::class);

        //address Category seeder
        $this->call(AddressCategorySeeder::class);

        // User Seeder
        $this->call(UserSeeder::class);

        // Business type Seeder
        $this->call(BusinessTypeSeeder::class);

        // Gst Hsn code seeder
        $this->call(HsnCodeSeeder::class);

        // Business type Seeder
        $this->call(BusinessTypeSeeder::class);

        // Plan Seeder
        $this->call(PlanSeeder::class);

        //demo company Seeder
        $this->call(CompanySetupDemoSeeder::class);

        //Reminder category seeder
        $this->call(ReminderCategorySeeder::class);
    }
}
