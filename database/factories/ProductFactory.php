<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $categories = ['Telefon', 'Laptop', 'Kulaklık', 'Monitör', 'Tablet'];

        return [
            'name' => fake()->company() . ' ' . fake()->word(),
            'category' => fake()->randomElement($categories),
            'price' => fake()->numberBetween(5000, 50000),
            'stock' => fake()->numberBetween(1, 100),
            'description' => fake()->paragraph(3),
            'image' => null, // şimdilik boş
            'views' => fake()->numberBetween(0, 500),
            'sales_count' => fake()->numberBetween(0, 100),
        ];
    }
}