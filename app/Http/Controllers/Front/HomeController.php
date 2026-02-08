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
    $products = Product::take(6)->get();

    // مثال على رابط التطبيق أو صفحة التحميل
    $appUrl = url('/download-app');

    return view('front.home', compact('products', 'appUrl'));
}

    // لو عايز فلترة حسب القسم
    public function filter($categoryId)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $categoryId)->paginate(8);

        return view('front.home', compact('categories', 'products'));
    }


    //     public function menu()
    // {
    //     $categories = Category::all();
    //     $products = Product::paginate(8);

    //     return view('front.menu', compact('categories', 'products'));
    // }




// public function menu(Request $request)
// {
//     // تحقق من الـ token
//     $validToken = '123456'; // نفس القيمة اللي في QR Code

//     if ($request->token !== $validToken) {
//         abort(403, 'غير مسموح بالدخول لهذه الصفحة');
//     }

//     $categories = Category::all();
//     $products = Product::paginate(8);

//     return view('front.menu', compact('categories', 'products'));
// }


public function menu()
{
    $categories = Category::all();
    $products = Product::paginate(8);

    return view('front.menu', compact('categories', 'products'));
}


public function menuFilter($id)
{
    $categories = Category::all();
    $products = Product::where('category_id', $id)->paginate(8);

    return view('front.menu', compact('categories', 'products'));
}



    }
