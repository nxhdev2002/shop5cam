<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_id = Product::inRandomOrder()->first();
        return [
            'product_id' => $product_id->id,
            'detail' => $this->faker->word,
            'status' => 0
        ];
    }
}
