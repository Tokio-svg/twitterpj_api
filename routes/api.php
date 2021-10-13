<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::apiResource('/v1/post', PostController::class)->only(['index', 'store', 'show', 'destroy']);