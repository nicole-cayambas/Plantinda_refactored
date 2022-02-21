<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'summary',
        'unit_price_1',
        'unit_price_2',
        'unit_price_3',
        'unit_price_4',
        'range_1_min',
        'range_2_min',
        'range_3_min',
        'range_4_min',
        'range_1_max',
        'range_2_max',
        'range_3_max',
        'range_4_max',
    ];
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
