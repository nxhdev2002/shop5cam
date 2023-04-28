<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = \App\Models\Product::inRandomOrder()->first();
        $seller = \App\Models\User::where('rights', '>', '1')->inRandomOrder()->first();
        $customer = \App\Models\User::inRandomOrder()->first();
        $faker = $this->faker;
        return [
            'paydate' => $faker->dateTime(),
            'quantity' => $faker->numberBetween(1, 10),
            'status' => $faker->numberBetween(0, 2),
            'price' => $faker->randomFloat(8, 1, 100),
            'product_id' => $product->id,
            'seller_id' => $seller->id,
            'customer_id' => $customer->id,
        ];
    }
}
