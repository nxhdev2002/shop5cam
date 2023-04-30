<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        // $users = DB::table('Product')->get();
        //list 10 san pham dau tien
        $products1 = DB::table('Product')->take(10)->get();
        // list pro theo số lg bán
        $products = Product::select('name', DB::raw('SUM(quantity) as total'))
        ->join('transactions', 'product.id', '=', 'transactions.product_id')
        ->groupBy('product.id')
        ->orderBy('total', 'desc')
        ->take(10)
        ->get();
        // $product1 = Product::where('amount', '>', '700')->get();
        // list pro re nhat 
        $products2 = Product::orderBy('price', 'asc')
        ->take(10)
        ->get();
        //list pro dat nhat
        $products3 = Product::orderBy('price', 'desc')
        ->take(10)
        ->get();
        return view('index');
    }
}
