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
Route::get('/blog/author/{id}', [\App\Http\Controllers\Blog\BlogController::class, 'allByAuthor'])->name('blog.by-author');
Route::get('/blog/date/{date}', [\App\Http\Controllers\Blog\BlogController::class, 'allByDate'])->name('blog.by-date');


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


Route::group(['prefix'=> 'admin', 'middleware' => 'admin'], function(){

    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');
    Route::post('/banner/add/{id}', [\App\Http\Controllers\Admin\MainBannerController::class, 'addArticle'])->name('banner.add');
    Route::delete('/banner/remove/{id}', [\App\Http\Controllers\Admin\MainBannerController::class, 'removeArticle'])->name('banner.remove');

    Route::get('/search', [\App\Http\Controllers\Admin\SearchController::class, 'searchArticle'])->name('admin.search');

    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/tags', \App\Http\Controllers\Admin\TagController::class);
    Route::resource('/articles', \App\Http\Controllers\Admin\ArticleController::class);

});
