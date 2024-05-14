<?php

namespace App\Actions;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreCommentAction
{
    public function handle($data, $post){
        try {
            DB::beginTransaction();
            $data['user_id'] = Auth::id();
            $data['post_id'] = $post->id;
            Comment::create($data);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
        }

    }
}
