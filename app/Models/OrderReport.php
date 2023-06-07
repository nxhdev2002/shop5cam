<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReport extends Model
{
    use HasFactory;
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
