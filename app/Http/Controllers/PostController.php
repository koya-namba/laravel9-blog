<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // dd($post->get());
        // 問2：view('posts/index')は何を表しているか
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        // dd($post);
        return view('posts/show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts/create');
    }
    
    public function store(PostRequest $request, Post $post)
    {
        // 問7： $inputには何と何のデータが入っているのか
        $input = $request['post'];
        // dd($input);
        
        // 問8：fill()を実行する前にはどこに何を記述すべきか
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
