<?php

namespace App\Actions;

use App\Models\Image;
use Illuminate\Support\Facades\DB;

class UpdatePostAction
{
    public function handle($files, $post, $data, $latitude, $longitude){
        try {
            if (isset($files)) {
                Image::upload_for_post($files, $post->id);
            }

            //$data['latitude'] = $latitude != '' ? $latitude : $post->latitude;
            //$data['longitude'] = $longitude != '' ? $longitude : $post->longitude;
            $data['latitude'] = $latitude !== '' && $latitude !== null ? $latitude : $post->latitude;
            $data['longitude'] = $longitude !== '' && $longitude !== null ? $longitude : $post->longitude;




            $post->update($data);
        } catch (\Exception $exception){
            DB::rollBack();
        }
    }
}
