<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GatewayCurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'gateway_id' => '1',
            'percent_fee' => $this->faker->numberBetween(0, 2),
            'fixed_fee' => $this->faker->numberBetween(0, 2),
            'min_amount' => $this->faker->numberBetween(0, 100),
            'max_amount' => $this->faker->numberBetween(200, 500),
        ];
    }
}
