<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;

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

Route::apiResource('books', BookController::class);
Route::apiResource('users', UserController::class);
Route::get('users/search/{searchKey}', [UserController::class, 'search']);
Route::get('users/search1/{searchKeyq}', [UserController::class, 'search1']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
