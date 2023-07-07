<?php


use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Event\FollowController;
use App\Http\Controllers\Admin\Event\UnfollowController;
use App\Http\Controllers\Admin\User\EditController as UserEditController;
use App\Http\Controllers\Admin\User\ShowController as UserShowController;
use App\Http\Controllers\Admin\Event\EditController as EventEditController;

use App\Http\Controllers\Admin\Event\ShowController as EventShowController;
use App\Http\Controllers\Admin\User\IndexController as UserIndexController;
use App\Http\Controllers\Admin\User\StoreController as UserStoreController;
use App\Http\Controllers\Admin\Event\IndexController as EventIndexController;
use App\Http\Controllers\Admin\Event\StoreController as EventStoreController;
use App\Http\Controllers\Admin\User\CreateController as UserCreateController;
use App\Http\Controllers\Admin\User\DeleteController as UserDeleteController;
use App\Http\Controllers\Admin\User\UpdateController as UserUpdateController;
use App\Http\Controllers\Admin\Event\CreateController as EventCreateController;
use App\Http\Controllers\Admin\Event\DeleteController as EventDeleteController;
use App\Http\Controllers\Admin\Event\UpdateController as EventUpdateController;


Route::get('/', EventIndexController::class)->middleware('auth')->name('admin.event.index');



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
        Route::get('/', EventIndexController::class)->name('admin.event.index');
});

Route::group(['prefix' => 'admin/event', 'middleware' => ['auth']], function () {
    Route::get('/', EventIndexController::class)->name('admin.event.index');
    Route::get('/create', EventCreateController::class)->name('admin.event.create');
    Route::post('/', EventStoreController::class)->name('admin.event.store');
    Route::get('/{event}', EventShowController::class)->name('admin.event.show');
    Route::get('/{event}/edit', EventEditController::class)->name('admin.event.edit');
    Route::patch('/{event}', EventUpdateController::class)->name('admin.event.update');
    Route::delete('/{event}', EventDeleteController::class)->name('admin.event.delete');

    Route::post('/{event}/follow', FollowController::class)->name('follow');
    Route::delete('/{event}/unfollow', UnfollowController::class)->name('unfollow');
});

Route::group(['prefix' => 'admin/user', 'middleware' => ['auth']], function () {
    Route::get('/', UserIndexController::class)->name('admin.users.index');
    Route::get('/create', UserCreateController::class)->name('admin.user.create');
    Route::post('/', UserStoreController::class)->name('admin.user.store');
    Route::get('/{user}', UserShowController::class)->name('admin.user.show');
    Route::get('/{user}/edit', UserEditController::class)->name('admin.user.edit');
    Route::patch('/{user}', UserUpdateController::class)->name('admin.user.update');
    Route::delete('/{user}', UserDeleteController::class)->name('admin.user.delete');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
