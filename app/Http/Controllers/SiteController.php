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
            ->orderBy('price', 'DESC')->take(3)->get();
        $products = Product::take(8)->get();
        $categories = Category::all();
        return view('index', compact(
            'title',
            'categories',
            'products',
            'high_products'
        ));
        //list pro theo tên danh mục  
    }
}
