<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', [DashboardController::class,'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::prefix('dashbord')->middleware(['auth', 'verified'])->group(function () {

// users
  Route::resource('users', UserController::class);

  Route::resource('roles', RoleController::class);


//   categories

Route::resource('categories', CategoryController::class);

//
Route::resource('products', ProductController::class);




     });
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
