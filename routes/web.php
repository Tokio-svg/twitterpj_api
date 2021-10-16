<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// トップページ
Route::get('/', [AdminController::class, 'index']);

// コメント投稿画面
Route::get('/post', [AdminController::class, 'post']);
Route::post('/post', [AdminController::class, 'create']);