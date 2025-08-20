<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReportController;
use App\Http\Controllers\AsistenciaController;
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', fn() => auth()->user());

    Route::get('/reports', [ReportController::class, 'index']);
    Route::post('/reports', [ReportController::class, 'store']);
    Route::patch('/reports', [ReportController::class, 'updateStatus']);

    Route::get('/asistencias', [AsistenciaController::class, 'index']);
    Route::post('/asistencias', [AsistenciaController::class, 'store']);
});