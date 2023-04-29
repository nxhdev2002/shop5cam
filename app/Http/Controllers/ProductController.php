<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = array();
        $data['products'] = DB::table('products')->paginate(12);
        return view('product.index', $data);
    }

    public function show($id)
    {
        $data = array();
        $data['product'] = Product::find($id);
        if (!$data['product']) {
            return redirect()->back()->withErrors(['message' => 'Sản phẩm không được bày bán trên hệ thống.']);
        }
        return view('product.info', $data);
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }

    public function search()
    {
    }

    public function filter()
    {
    }
}
