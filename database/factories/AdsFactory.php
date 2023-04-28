<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = \App\Models\User::where('rights', '>', '1')->inRandomOrder()->first();
        $product = \App\Models\Product::inRandomOrder()->first();
        $faker = $this->faker;
        return [
            'name' => $faker->sentence,
            'status' => $faker->numberBetween(0, 1),
            'price' => $faker->randomFloat(8, 1, 100),
            'user_id' => $user->id,
            'product_id' => $product->id,
        ];
    }
}
