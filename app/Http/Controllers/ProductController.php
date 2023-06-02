<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\feedback;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public $ads_rate = 0.4;
    public $view_rate = 0.4;
    public $comment_rate = 0.3;
    public $share_rate = 0.2;
    public $date_rate = 0.1;
    public function index()
    {
        $data = array();
        $data['title'] = "Danh sách sản phẩm";
        $data['products'] = DB::table('products')
            ->orderBy('views', 'DESC')
            ->paginate(12);
        $data['categories'] = Category::all();
        return view('product.index', $data);
    }

    public function show($id)
    {
        $data = array();
        $data['product'] = Product::find($id);
        if (!$data['product']) {
            return redirect()->back()->withErrors(['message' => 'Sản phẩm không được bày bán trên hệ thống.']);
        }

        $feedbacks = feedback::where('product_id', $data['product']->id)->where('rate', 5)->get();
        if (!$feedbacks) {
            $feedbacks = [];
        }
        $data['product']->views += 1;
        $data['product']->rank_point +=
            ($this->view_rate * $data['product']->views) +
            ($this->comment_rate * count($feedbacks)) +
            ($this->share_rate * 1) +
            ($this->date_rate *
                (Carbon::now()->diffInRealMinutes(
                    Carbon::parse($data['product']->created_at)
                ))
            );

        $data['product']->save();

        $data['category'] = Category::find($data['product']->category_id);
        $data['seller'] = User::find($data['product']->seller_id);
        $data['title'] = $data['product']->name;
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
        $category = $request->input('category');
        $sort_by = $request->input('sort_by');
        $price1 = $request->input('price1');
        $price2 = $request->input('price2');

        // Tạo query builder cho bảng 'products'
        $query = Product::query();

        // Áp dụng các điều kiện lọc nếu có
        if ($category) {
            $query->where('category_id', $category);
        }

        if ($sort_by) {
            switch ($sort_by) {
                case 1:
                    // lọc spham bán chạy nhất
                    $query->withCount('orders')
                        ->orderBy('orders_count', 'desc')
                        ->get();
                    break;
                case 2:
                    //lọc spham từ mới đến cũ
                    $query->orderBy('updated_at', 'desc');
                    break;
                case 3:
                    //lọc spham từ cũ đến mới
                    $query->orderBy('updated_at', 'asc');
                    break;
                case 4:
                    //lọc spham giá thấp đến cao
                    $query->orderBy('price', 'asc');
                    break;
                case 5:
                    //lọc spham giá cao đến thấp
                    $query->orderBy('price', 'desc');
                    break;
                case 6:
                    //lọc spham từ A đến Z
                    $query->orderBy('name', 'asc');
                    break;
                case 7:
                    //lọc spham từ Z đến A
                    $query->orderBy('name', 'desc');
                    break;
            }
        }
        if ($price1) {
            $query->where('price', '>=', $price1);
        }

        if ($price2) {
            $query->where('price', '<=', $price2);
        }
        $title = "Danh sách sản phẩm";
        $categories = Category::all();
        $products = $query->paginate(12);

        return view('product.index', compact(
            'products',
            'categories',
            'title'
        ));
    }
}
