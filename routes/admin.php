<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', [DashboardController::class,'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::prefix('dashbord')->middleware(['auth', 'verified'])->group(function () {

  Route::resource('users', UserController::class);

  Route::resource('roles', RoleController::class);




     });
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
