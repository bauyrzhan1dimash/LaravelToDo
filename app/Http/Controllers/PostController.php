<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postByCategory(Category $category){
        return view('posts.index',['posts'=>$category->posts,'categories' =>Category::all()]);
    }

    public function index(){
        $allPosts = Post::all();
        return view('posts.index',['posts' => $allPosts,'categories' => Category::all()]);
    }

    public function create(){
        return view('posts.create',['categories' =>Category::all()]);
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        if($post->save())
        {
            return new PostResource($post);
        }
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post' => $post,'categories' =>Category::all()]);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return new PostResource($post);
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->delete())
        {
            return new PostResource($post);
        }
    }
}
