<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomerCart;


use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{


public function index()
{
    $orders = CustomerCart::with('items')->orderBy('created_at','desc')->get();

    return view('dashbord.customer_orders.index', compact('orders'));
}



}
