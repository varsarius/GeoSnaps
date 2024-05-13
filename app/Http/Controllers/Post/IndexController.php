<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke() : view
    {
        $posts = Post::with('images')->paginate(30);
        return view('posts.index', compact('posts'));
    }
}
