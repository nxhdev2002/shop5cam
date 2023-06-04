<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStatisticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 3),
            'view_count' => $this->faker->numberBetween(1, 1000),
            'share_count' => $this->faker->numberBetween(1, 1000),
            'comment_count' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
