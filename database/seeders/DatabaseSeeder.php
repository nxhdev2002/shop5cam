<?php

namespace Database\Seeders;

use App\Models\Product;
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
        //     \App\Models\WebConfig::factory(1)->create();
        //     \App\Models\User::factory(20)->create();
        //     \App\Models\Category::factory(5)->create();
        //     \App\Models\Product::factory(30)->create();
        //     \App\Models\Ads::factory(3)->create();
        //     \App\Models\Cart::factory(11)->create();
        //     \App\Models\Gateway::factory(1)->create();
        //     \App\Models\GatewayCurrency::factory(1)->create();

        //     $products = Product::all();
        //     foreach ($products as $value) {
        //         \App\Models\ProductDetail::factory($value->amount)->create([
        //             'product_id' => $value->id
        //         ]);
        //     }
        \App\Models\GiftCode::factory(10)->create();
    }
}
