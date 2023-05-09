<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $data['category'] = Category::find($data['product']->category_id);
        $data['seller'] = User::find($data['product']->seller_id);
        if (!$data['product']) {
            return redirect()->back()->withErrors(['message' => 'Sản phẩm không được bày bán trên hệ thống.']);
        }
        return view('product.info', $data);
    }

    public function create(Request $request)
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->guarantee = $request->input('guarantee');
        $product->picture_url = $request->input('picture_url');
        // if($request->hasFile('picture_url')) {
        //     $file = Input::file('picture_url');
        //     //getting timestamp
        //     $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        //     $name = $timestamp. '-' .$file->getClientOriginalName();

        //     $product->image = $name;

        //     $file->move(public_path().'/picture_url/', $name);
        // }
        $product->amount = $request->input('amount');
        $product->save();
        return redirect()->route('products.index')->with('success', 'Sản phẩm được thêm thành công');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->guarantee = $request->input('guarantee');
        $product->picture_url = $request->input('picture_url');
        $product->update();
        return redirect()->route('products.index')->with('success', 'Sản phẩm được cập nhật thành công');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã bị xóa');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->get();
        return view('products.index', ['products' => $products]);
    }

    public function filter(Request $request)
    {
        $filter = $request->input('filter');
        $products = Product::where('attribute', $filter)->get();
        return view('products.index', ['products' => $products]);
    }
}
