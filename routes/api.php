<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProjectController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/refreshToken', [AuthController::class, 'refreshToken']);

Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'getMe']);
    Route::put('users/{user}/permissions', [UserController::class, 'updatePremissions']);
    Route::resource('users', UserController::class);
    Route::get('modules/role/{id}', [ModuleController::class, 'getByRole']);
    Route::resource('modules', ModuleController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('projects', ProjectController::class);
    Route::get('/logout', [AuthController::class, 'logout']);
});

