<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{

public function index(){


   $products_count=Product::count();
        $category_count=Category::count();
        $users_count=User::count();
        $orders_count=Order::count();
    return view('dashbord.dashboard',compact('products_count','category_count','users_count','orders_count'));

}


}
