<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WebConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'upgrade_fee' => 50000,
        ];
    }
}
