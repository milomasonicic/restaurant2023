<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\FoodSubCategory;

class FoodController extends Controller
{
    //

    public function show($id)
    {
        $heading = FoodSubCategory::find($id)->food_sub_category;
        $foods = Item::where("food_sub_category_id", $id)->get();
        return view("food.food_sub", ["foods"=>$foods, "heading"=>$heading]);
    }

  
}
