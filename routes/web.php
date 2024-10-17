<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminRoomController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});

Route::middleware('admin')->group(function(){
    Route::get('admin.index', function() {
        return view('admin.index');
    });
    Route::get('/admin/rooms/index', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
    Route::get('/admin/rooms/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('/admin/rooms/{room}', [AdminRoomController::class, 'update'])->name('admin.room.update');
    Route::post('/admin/rooms/store', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
    Route::delete('/admin/rooms/{room}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
    // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
// Route::middleware('guest')->group(function (){

// });

Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::Post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('staffs.application', function(){
    return view('staffs.application');
})->name('staffs.application');
