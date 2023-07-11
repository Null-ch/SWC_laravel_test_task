<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();


Route::post('/register', [App\Http\Controllers\Api\RegisterController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\LoginController::class, 'login']);
Route::middleware('auth:api')->get('/getEvents', App\Http\Controllers\Api\IndexController::class);
Route::middleware('auth:api')->post('/storeEvent', App\Http\Controllers\Api\StoreController::class);
Route::middleware('auth:api')->post('/followEvent', App\Http\Controllers\Api\FollowController::class);
Route::middleware('auth:api')->post('/unfollowEvent', App\Http\Controllers\Api\UnfollowController::class);
Route::middleware('auth:api')->post('/deleteEvent', App\Http\Controllers\Api\DeleteController::class);
