<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     public function definition(): array
    {
        $category = fake()->randomElement(["food","drink"]);

        $food_sub = null;
        $drink_sub = null;

        if($category === "food")
        {
            $food_sub = fake()->numberBetween(1, 3);
        } elseif($category === "drink"){
            $drink_sub = fake()->numberBetween(1, 4);
        }

        return [
            //
            'name' => fake()->word(),
            'description' => "description",
            'category' => $category,
            'price' => fake()->numberBetween(2, 20),
            "food_sub_category_id"=> $food_sub,
            "drink_sub_category_id"=> $drink_sub,
            'image' => "public/images/rm7Y0siSvO5ORCMcFVHq0eavnIHeXT6TEH613Of5.jpg",
        ];
    }
}
