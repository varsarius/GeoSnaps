<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;




Route::get('/', function () {
    return view('main');
})->name('main');


Route::get('locale/{locale}', function ($locale){
    $_SESSION["locale"]=$locale;

    \Illuminate\Support\Facades\App::setLocale($locale);
    return redirect()->back();
})->name('locale');


Route::get('/map/{id?}', [PostController::class, 'map'])->name('map');

Route::delete('/images/{image}', [PostController::class, 'destroy_image'])->name('images.destroy');

Route::resource('posts', PostController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
