<?php

namespace App\Http\Controllers\Comment;

use App\Actions\StoreCommentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;


class DestroyController extends Controller
{
    public function __invoke(Comment $comment) : RedirectResponse
    {
        $comment->delete();
        return redirect()->back();
    }
}
