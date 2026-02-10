<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\ReservationController;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('front.home');

Route::get('/category/{id}', [HomeController::class, 'filter'])
    ->name('front.home.filter');

// Menu (QR Page)
Route::get('/menu', [HomeController::class, 'menu'])
    ->name('front.menu');


Route::get('/menu/category/{categoryId}', [HomeController::class, 'menu'])
    ->name('front.menu.filter');




    Route::get('/reservation', [ReservationController::class, 'create'])
    ->name('front.reservation.create');

// حفظ الحجز
Route::post('/reservation', [ReservationController::class, 'store'])
    ->name('front.reservation.store');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
