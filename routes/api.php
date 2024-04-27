<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;


Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('employee',EmployeeController::class);
Route::apiResource('department',DepartmentController::class);

// Route::get('/departments', [DepartmentController::class, 'index']);
// Route::get('/departments/{id}/employees', [DepartmentController::class, 'getEmployees']);
// Route::post('employee', [EmployeeController::class, 'store']);
// Route::put('/employees/{id}', [EmployeeController::class, 'update']);
// Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);