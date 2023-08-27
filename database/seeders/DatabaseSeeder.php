<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Item;
use App\Models\User;
use App\Models\FoodSubCategory;
use Illuminate\Database\Seeder;
use App\Models\DrinkSubCategory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //user
        
        User::create([
            "name"=>"RealAdmin",
            "email"=>"admin@gmail.com",
            "password"=>123456789,
            "roles"=>"admin",

        ]);
        
        
        //FOOD
        FoodSubCategory::create([
         
            "food_sub_category"=>"pizza",
            "url"=>"/backgroundImages/pizza1.jpg"
        ]);

        FoodSubCategory::create([
            
            "food_sub_category"=>"hamburger",
            "url"=>"/backgroundImages/hambureger2.jpg"
        ]);

        FoodSubCategory::create([
        
            "food_sub_category"=>"salad",
            "url"=>"/backgroundImages/salad3.jpg"
        ]);

        //DrinkSubCat
        DrinkSubCategory::create([
            "drink_sub_category"=>"juice",
            "url"=>"/backgroundImages/juice.jpg"
        ]);

        DrinkSubCategory::create([
            "drink_sub_category"=>"coffee_tea",
            "url"=>"/backgroundImages/tea.jpg"
        ]);
        DrinkSubCategory::create([
            "drink_sub_category"=>"carbonated_drink",
            "url"=>"/backgroundImages/cd.jpg"
        ]);
        DrinkSubCategory::create([
            "drink_sub_category"=>"alcohol",
            "url"=>"/backgroundImages/alcohol.jpg"
        ]);

        Item::factory(15)->create();
    
        
       
    }
}
