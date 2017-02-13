<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('created_at', 'DESC')->get();
        $data=['posts'=>$posts];
        return view('posts.index', $data);
    }

    public function show($id)
    {
        $post=Post::find($id);
        $data=['post'=>$post, 'comments'=>$post->comments];
        //$data = ['id' => $id];

        return view('posts.show', $data);
    }
}
