<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodController;
use App\Http\Controllers\CityController; // Importimi i saktë i CityController
use App\Http\Controllers\RoleController;


// Rutat për autentikim
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');

// Rutat për qytetet (Vetëm për përdoruesit e loguar)
Route::middleware('auth:api')->group(function () {
    Route::get('/blood-groups', [BloodController::class, 'index']);
    Route::get('/blood-groups/{id}', [BloodController::class, 'show']);
    
});

Route::middleware(['auth:api', 'role:Admin'])->group(function () {
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/roles/{id}', [RoleController::class, 'show']);
    
});

Route::middleware(['auth:api', 'role:Admin,QTGJ'])->group(function () {
    Route::get('/cities', [CityController::class, 'index']); // Merr të gjitha qytetet
    Route::get('/cities/{id}', [CityController::class, 'show']); // Merr një qytet specifik
});

Route::middleware(['auth:api', 'role:Campaign Admin,QTGJ'])->group(function () {
    Route::get('/cities', [CityController::class, 'index']); // Merr të gjitha qytetet
    Route::get('/cities/{id}', [CityController::class, 'show']); // Merr një qytet specifik
});



