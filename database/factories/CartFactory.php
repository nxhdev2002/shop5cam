<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = \App\Models\User::inRandomOrder()->first();
        $product = \App\Models\Product::all();
        return [
            'user_id' => $user->id,
            'product_id' => $this->faker->unique()->numberBetween(1, count($product)),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
