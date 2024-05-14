<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StorePostAction
{
    public function handle($data, $files){
        try {
            DB::beginTransaction();
            $data['user_id'] = Auth::id();
            $post = Post::create($data);
            Image::upload_for_post($files, $post->id);
            DB::commit();
        } catch (\Exception $exception){
            DB::rollBack();
        }
    }
}
