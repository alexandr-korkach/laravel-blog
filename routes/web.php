<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Blog\HomeController::class, 'index'])->name('home');
Route::get('/blog', [\App\Http\Controllers\Blog\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [\App\Http\Controllers\Blog\BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/tag/{slug}', [\App\Http\Controllers\Blog\BlogController::class, 'allByTag'])->name('blog.by-tag');
Route::get('/blog/category/{slug}', [\App\Http\Controllers\Blog\BlogController::class, 'allByCategory'])->name('blog.by-category');


Route::get('/blog/comments/create', [\App\Http\Controllers\Blog\CommentsController::class, 'create'])->name('blog.comments.create')->middleware('auth');
Route::delete('/blog/comments/{comment}', [\App\Http\Controllers\Blog\CommentsController::class, 'destroy'])->name('blog.comments.destroy')->middleware('auth');



Route::get('/search', [\App\Http\Controllers\Blog\SearchController::class, 'searchArticle'])->name('blog.search');



Route::get('/logout', [\App\Http\Controllers\Blog\UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/profile/{id}', [\App\Http\Controllers\Blog\ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::post('/profile/{id}/set-avatar', [\App\Http\Controllers\Blog\ProfileController::class, 'setAvatar'])->name('profile.avatar')->middleware('auth');

Route::group(['middleware'=> 'guest'], function (){
    Route::get('/login', [\App\Http\Controllers\Blog\UserController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [\App\Http\Controllers\Blog\UserController::class, 'login'])->name('login');

    Route::get('/register', [\App\Http\Controllers\Blog\UserController::class, 'registerPage'])->name('register.page');
    Route::post('/register', [\App\Http\Controllers\Blog\UserController::class, 'store'])->name('register');

});
