<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'first_name', 
        'last_name', 
        'phone_number', 
        'address', 
        'barangay', 
        'city', 
        'zip', 
        'province'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
