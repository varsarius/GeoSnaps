<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;




Route::get('/', function () {
    if (\Illuminate\Support\Facades\Session::has('locale')) {
        \Illuminate\Support\Facades\App::setLocale(\Session::get('locale'));
    }
    return view('main');
})->name('main');


Route::get('locale/{locale}', function ($locale){
    //$_SESSION["locale"]=$locale;

    \Illuminate\Support\Facades\Session::put('locale', $locale);
   // dd(\Illuminate\Support\Facades\App::currentLocale());
    return redirect()->back();
})->name('locale');


Route::get('/map/{id?}', [PostController::class, 'map'])->name('map');

Route::delete('/images/{image}', [PostController::class, 'destroy_image'])->name('images.destroy');

Route::resource('posts', PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
