<?php

use App\Http\Controllers\Admin\CategoriesController;
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

    Route::post('/search', \App\Http\Controllers\Post\SearchController::class)->name('post.search');


    Route::group(['prefix' => '{post}/comments'], function (){
        Route::post('/', \App\Http\Controllers\Post\Comment\StoreController::class)->name('post.comment.store');
    });


});

Route::get('/categories/{category}', \App\Http\Controllers\Post\Category\IndexController::class)->name('category.posts');

Route::group(['prefix' => 'users'], function () {
    Route::get('/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
    Route::get('/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
    Route::patch('/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');


});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', \App\Http\Controllers\Admin\LoginController::class);
    Route::get('/login', \App\Http\Controllers\Admin\LoginController::class)->name('login_form');
    Route::post('/login', \App\Http\Controllers\Admin\AuthController::class)->name('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
    Route::get('/dashboard', \App\Http\Controllers\Admin\IndexController::class)->name('admin.dashboard');

    Route::get('/show', [\App\Http\Controllers\Admin\AdminController::class, 'admins'])->name('admin.show');
    Route::get('/logout', [\App\Http\Controllers\Admin\AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/create', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('admin.create');
    Route::post('/', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('admin.store');
    Route::delete('/{admin}', [\App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('admin.delete');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoriesController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [CategoriesController::class, 'create'])->name('admin.category.create');
        Route::post('/', [CategoriesController::class, 'store'])->name('admin.category.store');
        Route::get('/{category}/edit', [CategoriesController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category}', [CategoriesController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category}', [CategoriesController::class, 'delete'])->name('admin.category.delete');
    });
});
