<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiteController extends Controller
{
    public function index()
    {

        // $users = DB::table('products')->get();
        // // list 10 san pham dau tien
        // $products_10first = DB::table('products')->take(10)->get();
        // // list pro theo số lg bán
        // $products_quantity = Product::select('name', DB::raw('SUM(quantity) as total'))
        // ->join('transactions', 'products.id', '=', 'transactions.product_id')
        // ->groupBy('products.id')
        // ->orderBy('total', 'desc')
        // ->take(10)
        // ->get();
        // $product1 = Product::where('amount', '>', '700')->get();
        // // list pro re nhat
        // $products_cheap = Product::orderBy('price', 'asc')
        // ->take(10)
        // ->get();
        // // list pro dat nhat
        // $products_expensive = Product::orderBy('price', 'desc')
        // ->take(10)
        // ->get();
        // // list pro theo ngày up
        // $products_datecreated = Product::select('products.*')
        // // ->join('order_items', 'products.id', '=', 'order_items.product_id')
        // ->orderBy('products.created_at', 'desc')
        // ->groupBy('products.id')
        // ->take(10)
        // ->get();
        $title = "Trang chủ";
        return view('index', compact(
            'title'
        ));
        //list pro theo tên danh mục  
    }
}
