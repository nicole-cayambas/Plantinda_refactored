<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'description',
        'image',
        'banner_image',
        'main_products',
        'main_markets',
        'user_id',
        'permit',
        'fb',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }
}
