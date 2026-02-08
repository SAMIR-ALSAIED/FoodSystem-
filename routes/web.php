<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('front.home');
Route::get('/category/{id}', [HomeController::class, 'filter'])->name('front.home.filter');
Route::get('/menu', [HomeController::class, 'menu'])->name('front.menu'); // الصفحة اللي QR يفتحها
Route::get('/menu/category/{id}', [HomeController::class, 'menuFilter'])->name('front.menu.filter');



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
