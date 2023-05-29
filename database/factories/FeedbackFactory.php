<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product = \App\Models\Product::inRandomOrder()->first();
        return [
            'content' => $this->faker->sentence,
            'status' => $this->faker->numberBetween(0, 1),
            'product_id' => $product->id,
            'rate' => $this->faker->numberBetween(1, 5)
        ];
    }
}
