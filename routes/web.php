<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('/post', [App\Http\Controllers\PostController::class, 'store']);

Route::get('/comment/create', [App\Http\Controllers\CommentController::class, 'create']);
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store']);

Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show']);


Route::get('/follow/{id}', [App\Http\Controllers\UserController::class, 'follow']);
Route::get('/unfollow/{id}', [App\Http\Controllers\UserController::class, 'unfollow']);


Route::get('/like/{id}', [App\Http\Controllers\PostController::class, 'like']);
Route::get('/dislike/{id}', [App\Http\Controllers\PostController::class, 'dislike']);

Route::get('/image3', [ImageController::class,'index3']);
Route::post('submit-imagem-post', [ImageController::class, 'store3']);