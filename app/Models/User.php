<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'user_type',
        'username',
        'icon',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wish::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function address(){
        return $this->hasOne(Address::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function payments(){
        return $this->hasManyThrough(Order::class, Payment::class);
    }

    public function message(){
        return $this->hasMany(Message::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }
}
