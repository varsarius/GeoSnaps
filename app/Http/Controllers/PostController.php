<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
//use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : view
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        $posts = Post::with('images')->paginate(30);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : view
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        $posts = Post::with('images')->get();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request) : RedirectResponse
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
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


        return redirect()->route('posts.index');//->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post) : view
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post) : view
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post) : RedirectResponse
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) : RedirectResponse
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        $post->delete();
        return redirect()->route('posts.index');//->with('success', 'Post deleted successfully');
    }

    public function destroy_image(Image $image) : RedirectResponse
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        $image->delete();
        return redirect()->back();//->with('success', 'Post deleted successfully');
    }

    public function map($id = -1) : view
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        $posts = Post::all();
        return view('map', compact('posts', 'id'));
    }

    public function filter(Request $request)
    {
        if (\Illuminate\Support\Facades\Session::has('locale')) {
            \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
        }
        $search = $request->search;

        $posts = Post::where('name', 'like', "%$search%")->with('images')->paginate(30);
        return view('posts.index', compact('posts', 'search'));
    }
}
