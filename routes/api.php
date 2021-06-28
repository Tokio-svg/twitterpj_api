<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::apiResource('/v1/user', UserController::class);
Route::apiResource('/v1/post', PostController::class)->only(['index', 'store', 'show', 'destroy']);
Route::apiResource('/v1/comment', CommentController::class)->only(['store']);
Route::apiResource('/v1/good', GoodController::class)->only(['store', 'destroy']);
