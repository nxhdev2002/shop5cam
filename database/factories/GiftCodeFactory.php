<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GiftCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'amount' => $this->faker->numberBetween(10, 200),
            'end_date' => $this->faker->dateTimeBetween('now', '+10 days'),
            'balance' => $this->faker->numberBetween(100000, 200000)
        ];
    }
}
