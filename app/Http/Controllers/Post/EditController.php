<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;


class EditController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function __invoke(Post $post) : view
    {
        return view('posts.edit', compact('post'));
    }
}
