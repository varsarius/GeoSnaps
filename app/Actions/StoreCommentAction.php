<?php

namespace App\Actions;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class StoreCommentAction
{
    public function handle($data, $post){
        $data['user_id'] = Auth::id();
        $data['post_id'] = $post->id;
        Comment::create($data);
    }
}
