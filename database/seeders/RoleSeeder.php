<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);
        $resellerRole = Role::create(['name' => 'reseller']);

        // Permission::create(['name' => 'can-access-erp']);
        // Permission::create(['name' => 'can-access-inventory']);
        // Permission::create(['name' => 'can-access-crm']);
        // Permission::create(['name' => 'can-access-pdf-maker']);
        // Permission::create(['name' => 'can-access-festival-image']);
        // Permission::create(['name' => 'can-access-stock-management']);
    }
}
