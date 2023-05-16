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
        $products = Product::take(8)->get();
        $categories = Category::all();
        return view('index', compact(
            'title',
            'categories',
            'products'
        ));
        //list pro theo tên danh mục  
    }
}
