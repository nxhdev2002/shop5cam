<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    public function products(){ 
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function customer(){
        return $this->belongsTo(User::class,'customer_id','id');
    }
    function feedback(){ 
        return $this->hasMany(feedback::class,'transaction_id','id');
    }
}
