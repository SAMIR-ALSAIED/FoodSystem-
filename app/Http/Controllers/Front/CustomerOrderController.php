<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CustomerOrder;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function form()
    {
        $cart = session()->get('cart', []);
        if(empty($cart)){
            return redirect()->back()->with('error', 'السلة فارغة!');
        }
        return view('front.checkout.form', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
        ]);

        $cart = session()->get('cart', []);
        if(empty($cart)){
            return redirect()->back()->with('error', 'السلة فارغة!');
        }

        // إنشاء الطلب
        $order = CustomerOrder::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'status' => 'pending',
            'total' => collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']),
        ]);

        // حفظ المنتجات
        foreach($cart as $productId => $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('front.home')->with('success', 'تم تسجيل طلبك بنجاح!');
    }
}
