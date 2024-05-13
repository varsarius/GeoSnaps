<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;


class CreateController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function __invoke() : view
    {
        $posts = Post::with('images')->get();
        return view('posts.create', compact('posts'));
    }
}
