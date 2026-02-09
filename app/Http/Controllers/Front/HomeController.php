<?php

namespace App\Http\Controllers\Front;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public function index()
    {
$products = Product::inRandomOrder()->take(6)->get();

        $appUrl = 'http://192.168.1.10:8000/menu';

        return view('front.home', compact('products','appUrl'));
    }


    public function menu($categoryId = null)
{
    $categories = Category::all();

    $products = Product::query();

    if ($categoryId) {
        $products->where('category_id', $categoryId);
    }

    $products = $products->paginate(8);

    return view('front.menu', compact('categories', 'products', 'categoryId'));
}




    }
