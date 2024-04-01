<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');



//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// authentication routes - php artisan make:auth generates it
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('posts', PostController::class);
    Route::group(['prefix' => '/comments', 'as' => 'comments.'], function() {
        Route::post('/{post}', [CommentController::class, 'store'])->name('store');
    });
    Route::group(['prefix' => '/replies', 'as' => 'replies.'], function() {
        Route::post('/{comment}', [ReplyController::class, 'store'])->name('store');
    });
});
