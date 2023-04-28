<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $seller_id = User::query()->inRandomOrder()->first()->id;
        $category_id = Category::query()->inRandomOrder()->first()->id;
        $guarantee = Carbon::now()->addDays(random_int(1, 365));
        $faker = $this->faker;
        return [
            'name' => $faker->word(),
            'description' => $faker->sentence(),
            'seller_id' => $seller_id,
            'category_id' => $category_id,
            'guarantee' => $guarantee,
            'picture_url' => $faker->imageUrl(),
            'price' => $faker->randomFloat(2, 1, 1000),
            'status' => $faker->numberBetween(0, 1),
            'amount' => $faker->numberBetween(1, 1000)
        ];
    }
}
