<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
  
    /*public function order()
    {
        return $this->belongsTo(Order::class);
    }*/
}
