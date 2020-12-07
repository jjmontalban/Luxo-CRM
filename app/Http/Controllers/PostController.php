<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('userdata', 'categorydata')->orderBy('id', 'desc')->get();
        return response()->json([
            "posts_data" => $posts
        ], 200);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'min:2'],
            'description' => ['required', 'min:2'],
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->categorey;
        $post->description = $request->description;
        $post->user_id = auth::user()->id;
        $imgs = "";
        if ($request->exists('img')) {
            $imgNamePrefix = time();
//            $image = $request->img;
//            $fileName = $imgNamePrefix . "." . $image->getClientOriginalExtension();
            $fileName = $imgNamePrefix . ".png";
            $uploadPath = public_path('photo/' . $fileName);
            if (file_exists($uploadPath)) {
                unlink($uploadPath);
            }
            if (!file_exists($uploadPath)) {
                Image::make($request->img)->save($uploadPath);
            }
            $imgs = $fileName;
        }
        $post->photo = $imgs;
        $post->save();

    }

    public function delete($id)
    {
        $row = Post::find($id);
        $imgPath = public_path('photo/' . $row->photo);
        if (file_exists($imgPath)) {
            @unlink($imgPath);
        }
        $row->delete();

    }

    public function edit($id)
    {
        $row = Post::find($id);
        return response()->json([
            "post" => $row
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'min:2'],
            'description' => ['required', 'min:2'],
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->user_id = auth::user()->id;
        $imgs = "";
        if ($request->photo) {
//            $fileName = $imgNamePrefix . "." . $image->getClientOriginalExtension();
            $fileName = time().".png";
            $uploadPath = public_path('photo/'.$fileName);
            if ($post->photo ){
                if (file_exists(public_path('photo/'.$post->photo))) {
                    unlink(public_path('photo/'.$post->photo));
                }
            }
            if (file_exists($uploadPath)) {
                unlink($uploadPath);
            }
            if (!file_exists($uploadPath)) {
                Image::make($request->photo)->save($uploadPath);
            }
            $imgs = $fileName;
        }else{
            if ($post->photo ){
                $imgs =  $post->photo ;
            }else{
                $imgs = null ;
            }

        }
        $post->photo = $imgs;
        $post->save();

    }

}
