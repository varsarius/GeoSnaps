<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;


class MapController extends Controller
{
    public function __invoke($id = -1) : view
    {
        $posts = Post::all();
        return view('map', compact('posts', 'id'));
    }
}
