<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
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
        $order_id = $cart->order_id;
        
        $cart ->delete();
        $carts= Cart::where("order_id", $order_id)->get();
        $total = 0;
        foreach($carts as $cart){
            $total += $cart->item->price * $cart->qty; 
        }

        $order = Order::find($order_id);
        $order->total = $total;
        $order->save();
        return back();
    }

    

}
