<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});

Route::middleware('auth')->group(function(){
    Route::get('admin.index', function() {
        return view('admin.index');
    });
    // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('staffs.application', function(){
    return view('staffs.application');
})->name('staffs.application');
