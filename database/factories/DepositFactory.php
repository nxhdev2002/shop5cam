<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepositFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        return [
            'user_id' => $this->faker->numberBetween(1, count($users)),
            'gateway_id' => '1',
            'amount' => $this->faker->numberBetween(1, 100),
            'fee' => '1',
            'status' => $this->faker->numberBetween(0, 2),
            'note' => $this->faker->word()
        ];
    }
}
