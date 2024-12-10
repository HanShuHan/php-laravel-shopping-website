<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->uuid(),
            'name' => fake()->words(rand(1, 5), true),
            'description' => fake()->text(200),
            'price' => fake()->randomFloat(2, 5, 100),
            'rating' => fake()->numberBetween(0, 5),
            'rating_count' => fake()->numberBetween(10, 600),
            'is_on_sale' => fake()->boolean(25),
            'is_new_release' => fake()->boolean(10),
            'is_todays_deal' => fake()->boolean(5),
            'is_best_seller' => fake()->boolean(10),
            'category_id' => ProductCategory::query()->inRandomOrder()->value('id')
        ];
    }
}
