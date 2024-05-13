<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




/*
Route::get('locale/{locale}', function ($locale){
    //$_SESSION["locale"]=$locale;

    \Illuminate\Support\Facades\Session::put('locale', $locale);
   // dd(\Illuminate\Support\Facades\App::currentLocale());
    return redirect()->back();
})->name('locale');
*/

Route::middleware([SetLocale::class])->group(function () {
    Route::get('locale/{locale}', ChangeLocaleController::class)->name('locale');


    Route::get('/', function () {
        return view('main');
    })->name('main');

//Route::group(['namespace' => 'Post'], function () {
    //Route::resource('posts', PostController::class);
    Route::get('/posts', IndexController::class)->name('posts.index');
    Route::get('/posts/create', CreateController::class)->name('posts.create');
    Route::post('/posts', StoreController::class)->name('posts.store');
    Route::get('/posts/{post}', ShowController::class)->name('posts.show');
    Route::get('/posts/{post}/edit', EditController::class)->name('posts.edit');
    Route::PUT('/posts/{post}', UpdateController::class)->name('posts.update');
    Route::DELETE('/posts/{post}', DestroyController::class)->name('posts.destroy');

    Route::get('/map/{id?}', MapController::class)->name('map');
    Route::delete('/images/{image}', DestroyImageController::class)->name('images.destroy');
    Route::post('/postss/filterr/', FilterController::class)->name('post.filter');
//});



    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Auth::routes();
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

});
