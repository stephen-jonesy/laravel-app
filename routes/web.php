<?php

use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\logoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('home');
})->name('home'); 

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts'); 


Route::post('/logout', [logoutController::class, 'store'])->name('logout'); 

Route::get('/login', [loginController::class, 'index'])->name('login'); 
Route::post('/login', [loginController::class, 'store']); 

Route::get('/register', [RegisterController::class, 'index'])->name('register'); 
Route::post('/register', [RegisterController::class, 'store']); 

Route::get('/posts', [PostController::class, 'index'])->name('posts'); 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); 
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}/', [PostController::class, 'destroy'])->name('posts.destroy');


Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes'); 
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes'); 


