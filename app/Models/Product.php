<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function seller(){
        return $this->belongsTo(User::class,'seller_id','id');
    }
    function category(){ 
        return $this->belongsTo(Category::class,'category_id','id');
    }
    function transaction(){ 
        return $this->hasMany(Transaction::class,'product_id','id');
    }
    function ads(){ 
        return $this->hasMany(Ads::class,'product_id','id');
    }
}
