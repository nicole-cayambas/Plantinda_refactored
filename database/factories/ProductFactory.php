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
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'summary' => $this->faker->sentence(),
            'description' => $this->faker->sentence(20),
            'image' => $this->faker->imageUrl(),
            'unit_price_1' => $this->faker->randomFloat(2, 0, 100),
            'unit_price_2' => $this->faker->randomFloat(2, 101, 105),
            'unit_price_3' => $this->faker->randomFloat(2, 106, 110),
            'unit_price_4' => $this->faker->randomFloat(2, 111, 120),
            'range_1_min' => $this->faker->randomDigit(0, 100),
            'range_1_max' => $this->faker->randomDigit(101, 200),
            'range_2_min' => $this->faker->randomDigit(201, 300),
            'range_2_max' => $this->faker->randomDigit(301, 400),
            'range_3_min' => $this->faker->randomDigit(401, 500),
            'range_3_max' => $this->faker->randomDigit(501, 600),
            'range_4_min' => $this->faker->randomDigit(601, 700),
            'range_4_max' => $this->faker->randomDigit(701, 800),
            'rating' => $this->faker->randomDigit(1, 5),
        ];
    }
}
