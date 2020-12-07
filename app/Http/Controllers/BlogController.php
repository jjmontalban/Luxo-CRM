<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
//        return view('home');
        return view('frontend.frontendMaster');
    }
    public function getPost($id)
    {
        if ($id == "b") {
            $posts = Post::with('userdata', 'categorydata')->orderBy('id', 'desc')->get();
        } else {
            $posts = Post::with('userdata', 'categorydata')->where('category_id', $id)->orderBy('id', 'desc')->get();
        }
        return response()->json([
            "querydata" => $posts
        ], 200);
    }

    public function searchData()
    {
        $search=\Request::get('s');
        $posts = Post::with('userdata', 'categorydata')
            ->where('title', 'LIKE',"%$search%")
            ->orWhere('description', 'LIKE',"%$search%")
            ->orderBy('id', 'desc')
            ->get();
        return response()->json([
            "querydata" => $posts
        ], 200);
    }

    public function latestPosts()
    {
        $posts = Post::with('userdata', 'categorydata')->orderBy('id', 'desc')->get();
        return response()->json([
            "querydata" => $posts
        ], 200);
    }

    public function getSinglePost($id)
    {
        $post = Post::with('userdata', 'categorydata')->where('id', $id)->first();
        return response()->json([
            "querydata" => $post
        ], 200);
    }

    public function categoryFrontend()
    {
        $categories = Category::all();
        return response()->json([
            "querydata" => $categories
        ], 200);
    }
}
