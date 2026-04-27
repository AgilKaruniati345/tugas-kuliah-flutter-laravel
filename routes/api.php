<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

// test API
Route::get('/test', function () {
    return response()->json([
        'message' => 'API OK'
    ]);
});

// ambil semua task
Route::get('/tasks', [TaskController::class, 'index']);

// ambil 1 task berdasarkan id
Route::get('/tasks/{id}', [TaskController::class, 'show']);