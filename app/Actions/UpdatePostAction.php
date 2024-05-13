<?php

namespace App\Actions;

use App\Models\Image;

class UpdatePostAction
{
    public function handle($files, $post, $data, $latitude, $longitude){
        if (isset($files)) {
            Image::upload_for_post($files, $post->id);
        }

        $data['latitude'] = $latitude != '' ? $latitude : $post->latitude;
        $data['longitude'] = $longitude != '' ? $longitude : $post->longitude;


        $post->update($data);
    }
}
