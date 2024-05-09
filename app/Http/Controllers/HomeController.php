<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'user'){
            $posts = Post::with('images')->where('user_id', Auth::id())->paginate(30);
        }
        if(Auth::user()->role == 'Admin'){
            $posts = Post::with('images')->paginate(30);
        }

        return view('home', compact('posts'));
    }
}
