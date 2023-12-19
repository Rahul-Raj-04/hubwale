<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReminderCategory;

class ReminderCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reminderCategories = [
        	'Anniversary',
        	'Appointment',
        	'Birthday',
        	'Business',
        	'Ceremony',
        	'Inquiry',
        	'Statutory',
        	'Other'
        ];

        foreach ($reminderCategories as $reminderCategory) {
        	ReminderCategory::create([ 'name' => $reminderCategory]);
        }
    }
}
