<?php


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Event\FollowController;
use App\Http\Controllers\Admin\Event\UnfollowController;


Route::get('/', App\Http\Controllers\Admin\Event\IndexController::class)->middleware('auth')->name('admin.event.index');



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        Route::get('/', App\Http\Controllers\Admin\Event\IndexController::class)->name('admin.event.index');
});

Route::group(['prefix' => 'admin/event', 'middleware' => ['auth']], function () {
    Route::get('/', App\Http\Controllers\Admin\Event\IndexController::class)->name('admin.event.index');
    Route::get('/create', App\Http\Controllers\Admin\Event\CreateController::class)->name('admin.event.create');
    Route::post('/', App\Http\Controllers\Admin\Event\StoreController::class)->name('admin.event.store');
    Route::get('/{event}', App\Http\Controllers\Admin\Event\ShowController::class)->name('admin.event.show');
    Route::get('/{event}/edit', App\Http\Controllers\Admin\Event\EditController::class)->name('admin.event.edit');
    Route::patch('/{event}', App\Http\Controllers\Admin\Event\UpdateController::class)->name('admin.event.update');
    Route::delete('/{event}', App\Http\Controllers\Admin\Event\DeleteController::class)->name('admin.event.delete');

    Route::post('/{event}/follow', FollowController::class)->name('follow');
    Route::delete('/{event}/unfollow', UnfollowController::class)->name('unfollow');
});

Route::group(['prefix' => 'admin/user', 'middleware' => ['auth']], function () {
    Route::get('/{user}', App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
    Route::get('/{user}/edit', App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
    Route::patch('/{user}', App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
