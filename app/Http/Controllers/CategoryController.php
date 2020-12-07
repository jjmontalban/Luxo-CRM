<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json([
            "categories" => $categories
        ], 200);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'category_name' => ['required', 'min:2'],
        ]);
        $category = new Category();
        $category->title = $request->category_name;
        $category->save();
        return ['success' => "ok"];
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return response()->json([
            "category" => $category
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'min:2'],
        ]);
        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();
        return response()->json([
            "category" => $category
        ], 200);
    }

    public function delete($id)
    {

        $category = Category::find($id);
        $category->delete();
    }

    public function deleteSelected($ids)
    {
        $categories=explode(',',$ids);
        foreach ($categories as $cat){
            $category = Category::find($cat);
            $category->delete();
        }
    }
}
