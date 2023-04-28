<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $data = array();
        $data['products'] = DB::table('products')->paginate(3);
        return view('product.index', $data);
    }

    public function show()
    {
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
