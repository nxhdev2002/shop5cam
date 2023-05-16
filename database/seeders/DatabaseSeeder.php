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
        \App\Models\User::factory(20)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Product::factory(30)->create();
        \App\Models\Transaction::factory(3)->create();
        \App\Models\Ads::factory(3)->create();
        \App\Models\feedback::factory(2)->create();
        \App\Models\Cart::factory(11)->create();
        \App\Models\Gateway::factory(1)->create();
        \App\Models\Deposit::factory(5)->create();
        \App\Models\GatewayCurrency::factory(1)->create();
    }
}
