<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->post['title'];
        $post->content = $request->post['content'];
        $post->published = $request->post['published'];
        $post->user = $request->post['user'];
        $post->save();
        return $post;

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $post;
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->post['title'];
        $post->content = $request->post['content'];
        $post->published = $request->post['published'];
        $post->user = $request->post['user'];
        $post->save();
        return $post;
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return "Post successfully deleted";
    }
}
