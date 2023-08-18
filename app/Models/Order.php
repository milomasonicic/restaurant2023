<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function items()
    {
        return $this->belongsToMany(Pizza::class, 'carts');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
