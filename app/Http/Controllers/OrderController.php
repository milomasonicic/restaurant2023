<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function store(Request $request)
    {
        /*$data["total"]=$request->total;
        $data["user_id"]=auth()->user()->id;

        Order::create($data);
        return back();*/
        $onGoingOrder = Order::where('user_id', auth()->user()->id)
                       ->where('status', 'pending')
                       ->first();

        if(!$onGoingOrder) {
             $onGoingOrder = Order::create([
                'total' => 0,
                'user_id' => auth()->user()->id,]);
        }

        $alredyExistingCart = Cart::where('item_id', $request->item_id)->where('order_id', $onGoingOrder->id)->first();
        
        if($alredyExistingCart) {
            $alredyExistingCart->qty += $request->qty;
            $alredyExistingCart->save();
        } else {
            $cart = Cart::create([
                'item_id' => $request->item_id,
                'qty' => (int) $request->qty,
                'order_id' => $onGoingOrder->id,
                'user_id' => auth()->user()->id
            ]);
        }

        $total = 0;
        foreach ($onGoingOrder->carts as $cart) {
                $price = $cart->qty * $cart->item->price;
                $total += $price;
        }

        $onGoingOrder->total = $total;
        
        $onGoingOrder->save();

        return back();;
    }

    public function show()
    {
        $order = Order::where('user_id', auth()->user()->id)->where('status', 'pending')->first();

        if($order) {
            return view('order.ordersCarts', ['order' => $order, 'carts' => $order->carts]);
        } else {
            return view('order.ordersCarts', ['order' => null, 'carts' => []]);
        }
    }

    public function finish(Request $request)
    {
        //dd($request);
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->save();
        return back();
    }
}









