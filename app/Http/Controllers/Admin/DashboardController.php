<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

public function index(){


   $products_count=Product::count();
        $category_count=Category::count();
        $users_count=User::count();
    return view('dashbord.dashboard',compact('products_count','category_count','users_count'));

}


}
