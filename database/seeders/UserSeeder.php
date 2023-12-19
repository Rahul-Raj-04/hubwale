<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $user = User::create([
            'name' => 'Admin',
            'mobile' => '1234567890',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
          ]);

          $user->assignRole('admin');
          $user->save();

          $user1 = User::create([
            'name' => 'michel',
            'mobile' => '1234567891',
            'email' => 'michel@gmail.com',
            'password' => bcrypt('password'), // password
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
          ]);

          $user1->assignRole('user');
          $user1->save();
    }
}
