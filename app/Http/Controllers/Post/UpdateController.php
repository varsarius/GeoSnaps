<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;


class UpdateController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function __invoke(UpdatePostRequest $request, Post $post) : RedirectResponse
    {
        $files = $request->file('images'); // получить все загруженные файлы
        if (isset($files)) {

            //dd($files);

            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));

                $image = new Image;
                $image->image_url = 'images/' . uniqid('', true) . '.' . $fileActualExt;
                $image->post_id = $post->id;
                move_uploaded_file($file->getPathName(), $image->image_url);
                $image->save();
            }
        }

        $data = $request->except('latitude', 'longitude');

        if ($request->latitude != '') {
            $data['latitude'] = $request->latitude;
        } else {
            $data['latitude'] = $post->latitude;
        }

        if ($request->longitude != '') {
            $data['longitude'] = $request->longitude;
        } else {
            $data['longitude'] = $post->longitude;
        }

        $post->update($data);

        return redirect()->back();//->with('success', 'Post updated successfully.');
    }
}
