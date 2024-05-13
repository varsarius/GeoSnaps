<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;


class EditController extends Controller
{
    public function __invoke(Post $post) : view
    {
        return view('posts.edit', compact('post'));
    }
}
