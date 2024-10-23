<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminStaffsController;
use App\Http\Controllers\AdminRolesController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});

Route::middleware('admin')->group(function(){
    Route::get('admin.index', function() {
        return view('admin/index');
    })->name('admin.index');
    // Room Controller
    Route::get('/admin/rooms/index', [AdminRoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/rooms/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/rooms/store', [AdminRoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/admin/rooms/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('/admin/rooms/{room}', [AdminRoomController::class, 'update'])->name('admin.room.update');
    Route::delete('/admin/rooms/{room}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
    // Bookings Controller
    Route::get('/admin/bookings/index', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/admin/bookings/create', [AdminBookingController::class, 'create'])->name('admin.bookings.create');
    Route::post('/admin/bookings', [AdminBookingController::class, 'store'])->name('admin.bookings.store');
    Route::get('/admin/bookings/{booking}/edit', [AdminBookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::put('/admin/bookings/{booking}', [AdminBookingController::class, 'update'])->name('admin.bookings.update');
    Route::delete('/admin/bookings/{booking}', [AdminBookingController::class, 'destroy'])->name('admin.bookings.destroy');
    // Staffs Controller
    Route::get('/admin/staffs_list/index', [AdminStaffsController::class, 'index'])->name('admin.staffs_list.index');
    Route::get('/admin/staffs_list/create', [AdminStaffsController::class, 'create'])->name('admin.staffs_list.create');
    Route::post('admin/staffs_list/store', [AdminStaffsController::class, 'store'])->name('admin.staffs_list.store');
    Route::get('/admin/staffs_list/{staff}/edit', [AdminStaffsController::class, 'edit'])->name('admin.staffs_list.edit');
    Route::put('/admin/staffs_list/{staff}', [AdminStaffsController::class, 'update'])->name('admin.staffs_list.update');
    Route::delete('/admin/staffs_list/destroy/{staff}', [AdminStaffsController::class, 'destroy'])->name('admin.staffs_list.destroy');
    
    // RolesController
    Route::get('/admin/roles/index', [AdminRolesController::class, 'index'])->name('admin.roles.index');

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
