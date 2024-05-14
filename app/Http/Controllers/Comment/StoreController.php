<?php

namespace App\Http\Controllers\Comment;

use App\Actions\StoreCommentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;


class StoreController extends Controller
{
    public function __invoke(StoreCommentRequest $request, StoreCommentAction $action, Post $post) : RedirectResponse
    {
        $data = $request->validated();
        $action->handle($data, $post);
        return redirect()->back();
    }
}
