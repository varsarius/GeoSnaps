<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;


class DestroyController extends Controller
{
    public function __invoke(Post $post) : RedirectResponse
    {
        $post->delete();
        return redirect()->back();//->with('success', 'Post deleted successfully');
    }
}
