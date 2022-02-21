<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'store_id',
        'store_name',
        'product_id',
        'product_name',
        'payment_id',
        'phone_number',
        'buyer_name',
        'quantity',
        'unit_price',
        'shipping_price',
        'total_price',
        'address',
        'status',
        'is_paid',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }
}
