<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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

            'name' => $this->faker->word,
            'sku' => strtoupper(Str::random(8)) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'image' => $this->faker->imageUrl,
            'description'=> $this->faker->paragraph,

        ];
    }
}
