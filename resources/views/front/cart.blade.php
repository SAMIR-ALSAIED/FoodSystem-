@extends('front.layout.app')

@section('title','سلة الطلبات')

@section('front_content')
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary fw-bold py-5">سلة الطلبات</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    @if(empty($cart))
        <div class="alert alert-info text-center">السلة فارغة</div>
    @else
     <form action="{{ route('front.cart.clear') }}" method="POST" class="text-end mb-2">
            @csrf
            <button type="submit" class="btn btn-warning fw-bold">مسح السلة بالكامل</button>
        </form>
        <form action="{{ route('front.cart.update') }}" method="POST">
            @csrf
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>الصورة</th>
                        <th>المنتج</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>الإجمالي</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalPrice = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $subtotal = $item['price'] * $item['quantity']; $totalPrice += $subtotal; @endphp
                        <tr>
                            <td>
                                <img src="{{ asset('images/'.$item['image']) }}" 
                                     alt="{{ $item['name'] }}" 
                                     style="width:80px; height:80px; object-fit:cover; border-radius:5px;">
                            </td>
                            <td class="fw-semibold">{{ $item['name'] }}</td>
                            <td>
                                <input type="number" name="quantities[{{ $id }}]" 
                                       value="{{ $item['quantity'] }}" min="1" 
                                       class="form-control text-center" style="width:80px; margin:auto;">
                            </td>
                            <td class="text-success fw-bold">{{ $item['price'] }} ج</td>
                            <td class="text-primary fw-bold">{{ $subtotal }} ج</td>
                            <td>
                                <a href="{{ route('front.cart.remove', $id) }}" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('هل تريد حذف المنتج؟')">
                                   حذف
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-secondary">
                        <th colspan="4" class="text-end">الإجمالي الكلي</th>
                        <th colspan="2" class="text-primary fw-bold">{{ $totalPrice }} ج</th>
                    </tr>
                </tfoot>
            </table>
            <button type="submit" class="btn btn-dark mb-4">تحديث الكمية</button>
        </form>

        <!-- Checkout Form -->
        <div class="card p-4 mb-4 shadow-sm">
            <h4 class="mb-3 text-center text-success fw-bold">بيانات العميل</h4>
            <form action="{{ route('front.cart.checkout') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" placeholder="رقم التليفون" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                </div>
                <div class="mb-3">
                    <textarea name="address" class="form-control" placeholder="العنوان" required></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100 fw-bold">إتمام الطلب</button>
            </form>
        </div>

        <!-- Clear Cart -->
       

    @endif
</div>
@endsection
