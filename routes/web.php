<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;




Route::get('/', function () {
    return view('welcome');
});
Route::get('/map', [PostController::class, 'map'])->name('map');

Route::delete('/images/{image}', [PostController::class, 'destroy_image'])->name('images.destroy');

Route::resource('posts', PostController::class);
