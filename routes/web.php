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

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', IndexController::class)->name('main.index');
});
Route::group(['namespace' => 'App\Http\Controllers\Post', 'prefix' => 'posts'], function () {
    Route::get('/', IndexController::class)->name('post.index');
    Route::get('/{post}', ShowController::class)->name('post.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comments'], function () {
        Route::post('/', StoreController::class)->name('post.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{post}/likes'], function () {
        Route::post('/', StoreController::class)->name('post.like.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories'], function () {
    Route::get('/', IndexController::class)->name('category.index');

    Route::group(['namespace' => 'Post', 'prefix' => '{category}/posts'], function () {
        Route::get('/', IndexController::class)->name('category.post.index');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function () {
    Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
        Route::get('/', IndexController::class)->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', IndexController::class)->name('personal.liked.index');
        Route::delete('/{post}', DeleteController::class)->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Commend', 'prefix' => 'commend'], function () {
        Route::get('/', IndexController::class)->name('personal.comment.index');
        Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
        Route::get('/{comment}/edit', EditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');

    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', IndexController::class)->name('admin.main.index');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', IndexController::class)->name('admin.post.index');
        Route::get('/create', СreateController::class)->name('admin.post.create');
        Route::post('/', StoreController::class)->name('admin.post.store');
        Route::get('/{post}', ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', DestroyController::class)->name('admin.post.destroy');
    });


    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', IndexController::class)->name('admin.category.index');
        Route::get('/create', СreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DestroyController::class)->name('admin.category.destroy');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', IndexController::class)->name('admin.tag.index');
        Route::get('/create', СreateController::class)->name('admin.tag.create');
        Route::post('/', StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DestroyController::class)->name('admin.tag.destroy');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', IndexController::class)->name('admin.user.index');
        Route::get('/create', СreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/{user}', ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', DestroyController::class)->name('admin.user.destroy');
    });
});

Auth::routes(['verify' => true]);

