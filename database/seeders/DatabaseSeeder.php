<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Item;
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

        
        FoodSubCategory::factory(3)->create();
        DrinkSubCategory::factory(4)->create();
        //Item::factory(30)->create();
       
    }
}
