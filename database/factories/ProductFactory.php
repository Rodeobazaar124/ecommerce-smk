<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    /*$table->id();
            $table->string('name');
            $table->string('description')->default('');
            $table->bigInteger('stock')->default(0);
            $table->double('price')->default(0);
            $table->timestamps();
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->domainName(),
            'description' => $this->faker->sentence(),
            'stock' => $this->faker->numberBetween(1, 1000),
            'price' => $this->faker->numberBetween(500, 1000000),
        ];
    }
}
