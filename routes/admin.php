<?php

use App\Http\Controllers\Admin\CashierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KitchenController;
use App\Http\Controllers\Admin\ReservationController;

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::prefix('dashbord')->middleware(['auth', 'verified'])->group(function () {

// users
Route::resource('users', UserController::class)->middleware('permission:المستخدمين');

  Route::resource('roles', RoleController::class)->middleware('permission:الصلاحيات');


//   categories

Route::resource('categories', CategoryController::class)->middleware('permission:الاقسام');

//products
Route::resource('products', ProductController::class)->middleware('permission:المنتجات');


// tables
   Route::resource('tables', TableController::class)->middleware('permission:الطاولات');



    // reservations

   Route::resource('reservations', ReservationController::class)->middleware('permission:الحجوزات');


//    kitchen

     Route::get('orders/kitchen', [KitchenController::class,'kitchen'])->name('orders.kitchen')->middleware('permission:عرض طلبات المطبخ');

Route::post('orders/{order}/updateStatus', [KitchenController::class,'updateStatus'])
    ->name('orders.updateStatus');




// cashier

     Route::get('orders/cashier', [CashierController::class,'cashier'])->name('orders.cashier')->middleware('permission:الكاشير');
Route::post('orders/cashier/store', [CashierController::class,'storeCashier'])->name('orders.cashier.store')->middleware('permission:الكاشير');


    Route::resource('orders', OrderController::class);


     });
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
