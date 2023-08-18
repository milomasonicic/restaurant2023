<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
   /* public function store(Request $request){
        
        $data = $request->validate([
            "qty"=>"required",
            "item_id"=>"required",
        ]);

        $data["user_id"] = auth()->user()->id;
        $data["order_id"] = null;
        $cart = Cart::create($data);
        return back();
    }

    public function index()
    {
        $carts = Cart::where("user_id", auth()->user()->id)->get();
        //$items = Item::whereIn("id", $carts->pluck("item_id"))->get();
        return view("cart.cart", ["carts"=>$carts ]);
    }
    */
    public function delete($id)
    {
        $cart = Cart::find($id);
        $cart ->delete();
        return back();
    }

    public function qty(Request $request, $id)
    {
        //dd($request);
        $cart = Cart::find($id);
        $cart->qty = $request->qty;
        $cart->save();
        return back();
    }

}
