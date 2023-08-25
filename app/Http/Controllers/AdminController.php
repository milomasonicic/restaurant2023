<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\FoodSubCategory;
use App\Models\DrinkSubCategory;

class AdminController extends Controller
{
    //
    public function index()
    {
        $food_sub_cetegories = FoodSubCategory::all();
        $drink_sub_cetegories = DrinkSubCategory::all();
        return view("admin.admin", ["food_sub_cetegories" => $food_sub_cetegories,
        "drink_sub_cetegories" => $drink_sub_cetegories]);
    }

    public function store(Request $request)
    {

       $request->validate([
        "name"=>"required|string|max:60",
        "description"=>"required|string|max:100",
        "category"=>"required",
        "price"=>"required|numeric|max:100",
       ]);

        $path = $request->file('photo')->store('public/images');
        
        $item=Item::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "category"=>$request->category,
            "food_sub_category_id"=>$request->food_sub_category_id,
            "drink_sub_category_id"=>$request->drink_sub_category_id,
            "price"=>$request->price,
            "image"=>$path
        ]);

        return back();
    }

    public function usersPage()
    {
        return view("admin.users", ["users"=>User::all()]);
    }

    public function delete($id)
    {
        //dd($request);
        //$id=$request->id;
        $user = User::find($id);
        $user->delete();
        return back();
    }

    public function update(Request $request)
    {
        $user = User::find($request->id); 
        //dd($user,$request->roles);        
        $user->roles=$request->roles;
        $user->save();
    }

    public function showOrdersPage()
    {
        return view("admin.orders", ["orders"=> Order::paginate(10)]);
    }

    public function items(Request $request)
    {
        //$food= $request->input("query");
        //category
        $food = $request->input('food');
        $drink = $request->input('drink');

        if($food) {
            $items = Item::where('category',  "{$food}")->get();
        } elseif($drink)  {
            $items = Item::where('category',  "{$drink}")->get();
        } else {
            $items = Item::all(); 
        }     
        
        return view("admin.items", ["items"=> $items]);
    }

    public function updateItem(Request $request)
    {
        //dd($request);
        $request->validate([
            "name" => "required|string|max:120",
            "description"=>"required|string|max:120",
            "price"=>"required|numeric"
        ]);
        $item = Item::find($request->id);    
        $item->update($request->all());

        return back();   
    }

    public function deleteItem($id)
    {
        //dd($request);
        //$id=$request->id;
        $item = Item::find($id);
        $item->delete();
        return back();
    }

    /*public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);

        return back();
    }*/
}
