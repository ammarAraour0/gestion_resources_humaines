<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\LeaveRequestController;

Route::resource('leave-requests', LeaveRequestController::class);

Route::resource('diplomas', DiplomaController::class);

Route::resource('attendances', AttendanceController::class);

Route::resource('leaves', LeaveController::class);

Route::resource('employees', EmployeeController::class);

Route::get('/test', [TestController::class, 'index']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
