<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function Categories()
    {
        $category = Category::paginate(5);
        return view('admin.frontend.categories', compact('category'));
    }
    public function createCategories()
    {
        return view('admin.frontend.categories.create');
    }
    public function storeCategories(Request $request)
    {
        $category = Category::where('name', $request['name'])->first();
        if ($category) {
            return redirect()->back()->withErrors(['message' => 'Danh mục đã tồn tại trong hệ thống rồi.']);
        }
        $category = new Category;
        $category->name = $request->input('name');
        $category->status = 1;
        $category->save();
        return redirect()->back()->with('success', 'Tạo danh mục thành công.');
    }
    public function editCategories($id)
    {
        $category = Category::find($id);
        return view('admin.frontend.categories', ['category' => $category]);
    }

    public function updateCategories(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category)
            return response()->json([
                'success' => false,
                'message' => 'Danh mục không tồn tại'
            ]);
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->is_highlight = $request->input('highlight');
        $category->save();
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật danh mục thành công'
        ]);
    }
    public function destroyCategories($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Danh mục đã bị xóa');
    }
}
