<?php

namespace Database\Factories;

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
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'price' => fake()->numberBetween(10000, 1000000),
            'stock' => fake()->numberBetween(1, 1000),
            'image' => 'product/' .fake()->randomElement(['FAN_1.jpg', 'FD_1.png', 'SSD_2.png'])
        ];
    }
}
