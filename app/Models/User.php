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
        'name',
        'email',
        'password',
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
    function products()
    {
        return $this->hasMany(Product::class, 'seller_id', 'id');
    }
    function transaction()
    {
        return $this->hasMany(Transaction::class, 'customer_id', 'id');
    }
    function ads()
    {
        return $this->hasMany(Ads::class, 'user_id', 'id');
    }
    function cart()
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }
    function deposit()
    {
        return $this->hasMany(Deposit::class, 'user_id', 'id');
    }
}
