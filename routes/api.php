<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PayrollDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth:api')
    ->name('logout');


Route::middleware('auth:api')->get('/profile', function (Request $request) {
    return response()->json($request->user());
})->name('user');

Route::middleware('auth:api')->get('/payroll',[PayrollDataController::class, 'index'])->name('payroll.index');
Route::middleware('auth:api')->get('/payroll/{payroll_number}',[PayrollDataController::class, 'show'])->name('payroll.show');
