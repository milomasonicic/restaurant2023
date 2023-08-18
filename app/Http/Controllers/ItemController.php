<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //

    public function singleItem($id)
    {
    
        $item = Item::find($id);
        return view("single_item", ["item"=>$item]);
    }



    /*public function food()
    {
        $items= Item::all();
        $pizzas = Item::where("food_sub_category","pizza")->paginate(3);
        $hamburgers = Item::where("food_sub_category","hamburger")->paginate(3);
        $salads = Item::where("food_sub_category","salad")->paginate(3);

        return view("food.food", [ "pizzas"=>$pizzas, "salads"=>$salads, 
        "hamburgers"=>$hamburgers,
        "items"=>$items ]);
    }

    public function drink()
    {
    
        $coffee_teas = Item::where("drink_sub_category","coffee_tea")->paginate(2);
        $juices = Item::where("drink_sub_category","juice")->paginate(2);
        $alcohols = Item::where("drink_sub_category","alcohol")->paginate(2);
        $carbonated_drinks = Item::where("drink_sub_category","carbonated_drink")->paginate(2);
        

        return view("drinks.drink", ["coffee_teas"=>$coffee_teas, 
        "juices"=>$juices, 
        "alcohols"=>$alcohols, 
        "carbonated_drinks"=>$carbonated_drinks,]);
    }

   

    public function allItems()
    {
        $items=Item::paginate(5);
        return view("admin.allitem", ["items"=>$items]);
    }



    public function admindelete($id)
    {
        $item=Item::find($id);
        $item->delete();

        return back();
    }*/
}
