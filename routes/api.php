<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\PgController;

// PG Routes
Route::post('/pgs', [PgController::class, 'store']);
Route::get('/pgs', [PgController::class, 'index']);
Route::get('/pgs/{id}', [PgController::class, 'show']);
Route::put('/pgs/{id}', [PgController::class, 'update']);

// Onboarding/User Routes
Route::post('/users', [OnboardingController::class, 'store']);
Route::get('/users/{id}', [OnboardingController::class, 'show']);
Route::put('/users/{id}', [OnboardingController::class, 'update']);

// Post Routes
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);
Route::put('/posts/{id}', [PostController::class, 'update']);

// Chat Routes
Route::post('/chats', [ChatController::class, 'store']);
Route::get('/chats', [ChatController::class, 'index']);
Route::get('/chats/{id}', [ChatController::class, 'show']);
Route::put('/chats/{id}', [ChatController::class, 'update']);
