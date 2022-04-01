<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
        return [
            'product_name' => $this->faker->name(),
            'product_code' => Str::uuid(),
            'buying_price' =>
            $this->faker->numberBetween(2000, 6000),
            'selling_price' => $this->faker->numberBetween(2000, 6000),
            'product_quantity' => Str::random(16),
        ];
    }
}
