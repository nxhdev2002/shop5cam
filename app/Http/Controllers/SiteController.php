<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $title = "Trang chủ";
        $high_products = DB::table('products')
            ->where('amount', '>', 0)
            ->where('status', '1')
            ->orderBy('views', 'DESC')
            ->take(3)
            ->get();

        $ads_products = Product::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->orderBy('views', 'DESC')
            ->orderBy('rank_point', 'DESC')
            ->where('amount', '>', 0)
            ->where('status', '1')
            ->take(5)
            ->get();

        $products = Product::withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->where('status', '1')
            ->where('amount', '>', 0)
            ->take(8)
            ->get();

        $categories = Category::all();
        return view('index', compact(
            'title',
            'categories',
            'products',
            'ads_products',
            'high_products'
        ));
        //list pro theo tên danh mục  
    }
}
