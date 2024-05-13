<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;


class ShowController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function __invoke(Post $post) : view
    {
        return view('posts.show', compact('post'));
    }
}
