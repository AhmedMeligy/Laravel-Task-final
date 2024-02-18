<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create(){
        $users = User::all();   
        return view('posts.create', ['users'=>$users]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = null;
    }
    $post = new Post([
        'title' => $validatedData['title'],
        'body' => $validatedData['body'],
        'slug' => Str::slug($validatedData['title']),
        'user_id' => auth()->user()->id,
        'image' => $imagePath
    ]);
    $post->save();
    return redirect()->route('posts.index');
    }
    
    public function edit(Post $post)
    {
        \Log::info("Edit Post ID: $post->id");
    
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
    $post->update([
        'title' => $request->input('title'),
        'body' => $request->input('body')
    ]);
    return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
};
