<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        # code...
    }

    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->withErrors(['message', 'Chuyên mục không tồn tại']);
        }
        $title = "Chuyên mục " . $category->name;
        $products = Product::where('category_id', $category->id)->orderBy('rank_point', 'DESC')->paginate(10);
        return view('category.info', compact(
            'title',
            'products',
            'category'
        ));
    }
}
