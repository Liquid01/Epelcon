<?php

use Illuminate\Database\Seeder;
use App\Package;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
           'name' => 'Tester',
           'amount' => '8000.00',
           'referral_bonus' => '2800.00',
           'description' => 'The first and starter package in the business',
           'matching_bonus' => 5.50,
           'pv' => 20,
        ]);

        Package::create([
           'name' => 'Supreme',
           'amount' => '21000.00',
           'referral_bonus' => '8400.00',
           'description' => 'The second package in the business',
           'matching_bonus' => 8.00,
           'pv' => 60,
        ]);

        Package::create([
           'name' => 'Emerald',
           'amount' => '63000.00',
           'referral_bonus' => '2500.00',
           'description' => 'The third package in the business',
           'matching_bonus' => 12.00,
           'pv' => 180,
        ]);

        Package::create([
           'name' => 'Achiever',
           'amount' => '189000.00',
           'referral_bonus' => '75600.00',
           'description' => 'The fourth package in the business',
           'matching_bonus' => 15.00,
           'pv' => 540,
        ]);

        Package::create([
           'name' => 'Eagle',
           'amount' => '378000.00',
           'referral_bonus' => '151000.00',
           'description' => 'The second package in the business',
           'matching_bonus' => 18.00,
           'pv' => 1080,
        ]);

        Package::create([
           'name' => 'Double Eagle',
           'amount' => '756000.00',
           'referral_bonus' => '151000.00',
           'description' => 'The second package in the business',
           'matching_bonus' => 18.00,
           'pv' => 1080,
        ]);

        Package::create([
           'name' => 'Double Eagle',
           'amount' => '756000.00',
           'referral_bonus' => '151000.00',
           'description' => 'The second package in the business',
           'matching_bonus' => 18.00,
           'pv' => 1080,
        ]);
    }
}
