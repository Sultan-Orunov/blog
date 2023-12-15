<?php

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

Route::get('/', \App\Http\Controllers\Post\IndexController::class)->name('post.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contact', \App\Http\Controllers\Contact\ShowController::class)->name('contact');
Route::get('/about', \App\Http\Controllers\About\ShowController::class)->name('about');



Route::group(['prefix' => 'posts'], function () {
    Route::get('/', \App\Http\Controllers\Post\IndexController::class)->name('post.index');
    Route::get('/create', \App\Http\Controllers\Post\CreateController::class)->name('post.create');
    Route::post('/', \App\Http\Controllers\Post\StoreController::class)->name('post.store');
    Route::get('/{post}', \App\Http\Controllers\Post\ShowController::class)->name('post.show');
    Route::get('/{post}/edit', \App\Http\Controllers\Post\EditController::class)->name('post.edit');
    Route::patch('/{post}', \App\Http\Controllers\Post\UpdateController::class)->name('post.update');
    Route::delete('{post}', \App\Http\Controllers\Post\DeleteController::class)->name('post.delete');


    Route::group(['prefix' => '{post}/comments'], function (){
        Route::post('/', \App\Http\Controllers\Post\Comment\StoreController::class)->name('post.comment.store');
    });


});

Route::get('/categories/{category}', \App\Http\Controllers\Post\Category\IndexController::class)->name('category.posts');

Route::group(['prefix' => 'users'], function () {
    Route::get('/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::patch('/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});
