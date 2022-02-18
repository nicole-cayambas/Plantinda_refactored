<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function wishlist(){
        return $this->hasManyThrough(User::class, Wish::class);
    }

    public function cart(){
        return $this->hasManyThrough(User::class, Cart::class);
    }

    public function order(){
        return $this->hasManyThrough(User::class, Order::class);
    }
}
