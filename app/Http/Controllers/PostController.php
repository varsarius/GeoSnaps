<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : view
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : view
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request) : RedirectResponse
    {
        Post::create($request->all());
        return redirect()->route('posts.index');//->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) : view
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) : view
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post) : RedirectResponse
    {
        $post->update($request->all());
        return redirect()->route('posts.index');//->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) : RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index');//->with('success', 'Post deleted successfully');
    }
}
