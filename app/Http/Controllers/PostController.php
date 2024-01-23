<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::get('posts:all', Post::all());
        return view('post.index', compact('posts'));
    }
    public function show($id)
    {
        $post = Cache::get('posts:' . $id);
        return view('post.show', compact('post'));
    }
    public function create()
    {
        return view('post.create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        Cache::put('posts:' . $post->id, $post);
        Cache::put('posts:all', Post::all());
        return redirect()->route('post.index');
    }
    public function edit($id)
    {
        $post = Cache::get('posts:' . $id);
        return view('post.edit', compact('post'));
    }
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::find($id);
        $post->update($data);
        Cache::put('posts:' . $post->id, $post);
        Cache::put('posts:all', Post::all());
        return redirect()->route('post.index');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Cache::delete('posts:' . $id);
        Cache::put('posts:all', Post::all());
        return redirect()->route('post.index');
    }
}
