<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word() . ' ' . $this->faker->randomElement(['Pro', 'Max', 'Plus', '']),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 5, 1000),
            'category_id' => Category::factory(),
        ];
    }
}
