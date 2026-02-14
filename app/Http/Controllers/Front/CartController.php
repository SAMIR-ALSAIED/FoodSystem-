<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\CustomerCart;
use App\Models\CustomerCartOr;
use App\Models\CustomerOrder;
use App\Models\CustomerOrderItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
  

    // عرض محتويات السلة
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('front.cart', compact('cart'));
    }

    // إضافة منتج للسلة
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])){
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
                'image' => $product->image,
            ];
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'تم إضافة المنتج للسلة!');
    }

    // تحديث الكميات
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if($request->has('quantities')){
            foreach($request->quantities as $id => $qty){
                if(isset($cart[$id])){
                    $cart[$id]['quantity'] = max(1, (int)$qty);
                }
            }
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'تم تحديث السلة بنجاح!');
    }

    // إزالة منتج
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            unset($cart[$id]);
            session(['cart' => $cart]);
            return redirect()->back()->with('success', 'تم إزالة المنتج من السلة!');
        }

        return redirect()->back()->with('error', 'هذا المنتج غير موجود في السلة!');
    }

    // مسح السلة بالكامل
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'تم مسح السلة بالكامل!');
    }

    // Checkout وحفظ الطلب

public function checkout(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'address' => 'required|string|max:500',
    ]);

    $cart = session()->get('cart', []);

    if(!$cart) {
        return redirect()->back()->with('error', 'السلة فارغة!');
    }

    // إجمالي الطلب
    $total = 0;
    foreach($cart as $item){
        $total += $item['price'] * $item['quantity'];
    }

    // حفظ بيانات الطلب
    $order = CustomerCart::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address,
        'total' => $total,
        'status' => 'pending',
    ]);

    // حفظ كل منتج في جدول Items
    foreach($cart as $productId => $item){
        CustomerCartOr::create([
            'order_id' => $order->id,
            'product_name' => $item['name'],
            'quantity' => $item['quantity'],
            'price' => $item['price'],
            'total' => $item['price'] * $item['quantity'],
        ]);
    }

    // مسح السلة بعد حفظ الطلب
    session()->forget('cart');

    return redirect()->route('front.cart.index')->with('success', 'تم تسجيل الطلب بنجاح!');
}


}
