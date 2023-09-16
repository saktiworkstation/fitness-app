<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use App\Models\SubscriptionPackage;
use App\Models\UserSubscription;
use App\Models\WorkoutHistory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Sakti',
            'username' => 'sakti',
            'email' => 'sakti@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(11)->create();

        Service::factory(5)->create();

        Schedule::factory(5)->create();

        SubscriptionPackage::factory(12)->create();

        UserSubscription::factory(9)->create();

        WorkoutHistory::factory(100)->create();
    }
}
