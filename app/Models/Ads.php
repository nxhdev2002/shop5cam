<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    function products(){ 
        return $this->belongsTo(Product::class,'product_id','id');
    }
    function users(){ 
        return $this->belongsTo(User::class,'user_id','id');
    }
}
