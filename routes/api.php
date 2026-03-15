<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ThreadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:60,1');

Route::get('/thread', [ThreadController::class, 'index']);
Route::get('/thread/{thread}', [ThreadController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/threads', [ThreadController::class, 'store'])->name('threads.create');
    Route::put('thread/update', [ThreadController::class, 'update'])->name('threads.update');
});
