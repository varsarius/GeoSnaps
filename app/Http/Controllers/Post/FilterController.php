<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class FilterController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->search;
        $posts = Post::where('name', 'like', "%$search%")->with('images')->paginate(30);
        return view('posts.index', compact('posts', 'search'));
    }
}
