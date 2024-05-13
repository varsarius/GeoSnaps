<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class StoreController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function __invoke(StorePostRequest $request) : RedirectResponse
    {
        if (empty($_POST)) {
            return redirect()->back()->withErrors(['file_error' => 'Размер загружаемых файлов превышает допустимый лимит.']);
        }


        $data = $request->all();
        $data['user_id'] = Auth::id();
        $post = Post::create($data);


        $files = $request->file('images'); // получить все загруженные файлы


        foreach ($files as $file){
            $fileName = $file->getClientOriginalName();
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $image = new Image;
            $image->image_url = 'images/'.uniqid('', true).'.'.$fileActualExt;
            $image->post_id = $post->id;
            move_uploaded_file($file->getPathName(), $image->image_url);
            $image->save();
        }


        return redirect()->route('home');//->with('success', 'Post created successfully.');
    }
}
