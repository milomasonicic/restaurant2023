<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DrinkSubCategory>
 */
class DrinkSubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'drink_sub_category' => fake()->randomElement(["juice","coffee_tea","alcohol", "carbonated_drink"]),
        ];
    }
}
