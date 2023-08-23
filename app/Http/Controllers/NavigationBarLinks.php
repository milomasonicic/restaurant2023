<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\FoodSubCategory;
use App\Models\DrinkSubCategory;

class NavigationBarLinks extends Controller
{
    //
    public function index()
    {
        return view("linksinnavigation.all", ["foods"=>FoodSubCategory::all(), "drinks"=>DrinkSubCategory::all() ]);
    }

    public function drinks(Request $request)
    {
        {
            $drinkType = $request->input('drinkType');
            //dd($drinkType);
            /*$coffie = $request->input('coffie');
            $carbonate_drink = $request->input('carbonate_drink');
            $alcohol = $request->input('alcohol');*/
         
            if($drinkType == "juice") {
                return view("linksinnavigation.drinks",["juices"=>Item::where("drink_sub_category_id","1")->get(),
                "alcohols"=>[],
                "coffie_tea"=>[],
                "carbonates"=>[],
            ]);
            } elseif($drinkType == "coffie")  {
                return view("linksinnavigation.drinks",["coffie_tea"=>Item::where("drink_sub_category_id","4")->get(),
                "alcohols"=>[],
                "juices"=>[],
                "carbonates"=>[],
            ]);
            } elseif($drinkType == "carbonate_drink") {
                return view("linksinnavigation.drinks",["carbonates"=>Item::where("drink_sub_category_id","2")->get(),
                "alcohols"=>[],
                "juices"=>[],
                "coffie_tea"=>[],
            ]);
            }elseif($drinkType == "alcohol"){
                return view("linksinnavigation.drinks", ["alcohols"=>Item::where("drink_sub_category_id","3")->get(),
                "carbonates"=>[],
                "juices"=>[],
                "coffie_tea"=>[],
            ]);
            }elseif($drinkType == "all" || $drinkType == null ){
                return view("linksinnavigation.drinks", [
                    "juices"=>Item::where("drink_sub_category_id","1")->get(),
                    "alcohols"=>Item::where("drink_sub_category_id","3")->get(),
                    "coffie_tea"=>Item::where("drink_sub_category_id","4")->get(),
                    "carbonates"=>Item::where("drink_sub_category_id","2")->get(),
                ]);

            }         
          
        }
        
    }

    public function pizza()
    {
        return view("food.food_sub", ["foods"=>Item::where("food_sub_category_id", "1")->get(),
        "heading"=>FoodSubCategory::find(1)->food_sub_category
        ]);
    }

    public function hamburger()
    {
        return view("food.food_sub", ["foods"=>Item::where("food_sub_category_id", "2")->get(),
        "heading"=>FoodSubCategory::find(2)->food_sub_category
        ]);
    }

    public function salad()
    {
        return view("food.food_sub", ["foods"=>Item::where("food_sub_category_id", "3")->get(),
        "heading"=>FoodSubCategory::find(3)->food_sub_category
        ]);
    }
}
