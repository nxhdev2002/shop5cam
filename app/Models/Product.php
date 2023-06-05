<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    function seller()
    {
        return $this->belongsTo(User::class, 'seller_id', 'id');
    }
    function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    function orders()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
    function ads()
    {
        return $this->hasOne(Ads::class, 'product_id', 'id');
    }
    function statistic()
    {
        return $this->hasMany(ProductStatistic::class);
    }
    function total_views($id)
    {
        return ProductStatistic::where('product_id', $id)->sum('view_count');
    }
}
