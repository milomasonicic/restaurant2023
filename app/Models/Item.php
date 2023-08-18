<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\FoodSubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $guarded =[];


    public function FoodSubCategory()
    {
        return $this->belongsTo(FoodSubCategory::class);
    }

    /*public function cart()
    {
        return $this->hasOne(Cart::class);
    }*/

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
