<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\DrinkSubCategory;

class DrinkController extends Controller
{
    //
    public function show($id)
    {
        $heading = DrinkSubCategory::find($id)->drink_sub_category;
        $drinks = Item::where("drink_sub_category_id", $id)->get();
        return view("drinks.drink_sub", ["drinks"=>$drinks, "heading"=>$heading]);
    }
}
