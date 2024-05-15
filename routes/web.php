<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChangeLocaleController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\DestroyImageController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\FilterController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\MapController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Middleware\SetLocale;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::middleware([SetLocale::class])->group(function () {
    Route::get('locale/{locale}', ChangeLocaleController::class)->name('locale');


    Route::get('/', function () {
        return view('main');
    })->name('main');

    //Route::resource
    Route::get('/posts', IndexController::class)->name('posts.index');
    Route::get('/posts/create', CreateController::class)->name('posts.create');
    Route::post('/posts', StoreController::class)->name('posts.store');


    Route::get('/posts/{post}', ShowController::class)->name('posts.show');
    Route::post('/posts/{post}/comments', App\Http\Controllers\Comment\StoreController::class)->name('posts.comments.store');
    Route::DELETE('/posts/images/{comment}', App\Http\Controllers\Comment\DestroyController::class)->name('posts.comments.destroy');


    Route::get('/posts/{post}/edit', EditController::class)->name('posts.edit');
    Route::PUT('/posts/{post}', UpdateController::class)->name('posts.update');
    Route::DELETE('/posts/{post}', DestroyController::class)->name('posts.destroy');

    Route::get('/map/{id?}', MapController::class)->name('map');
    Route::delete('/images/{image}', DestroyImageController::class)->name('images.destroy');


    Route::get('/postss/filterr/', FilterController::class)->name('post.filter');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Auth:route()
//    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
//    Route::post('login', [LoginController::class, 'login']);
//    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
//    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//    Route::post('register', [RegisterController::class, 'register']);
});



require __DIR__.'/auth.php';
