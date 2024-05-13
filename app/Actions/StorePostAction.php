<?php

namespace App\Actions;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StorePostAction
{
    public function handle($data, $files){
        $data['user_id'] = Auth::id();
        $post = Post::create($data);
        Image::upload_for_post($files, $post->id);
    }
}
