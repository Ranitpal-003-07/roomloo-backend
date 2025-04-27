<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\PgController;

Route::post('/pgs', [PgController::class, 'store']);
Route::post('/users', [OnboardingController::class, 'store']);
Route::post('/posts', [PostController::class, 'store']);
Route::post('/chats', [ChatController::class, 'store']);
