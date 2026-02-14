@extends('dashbord.layouts.master')

@section('title', 'كل الطلبات')

@section('admin_content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>كل الطلبات</h1>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <table class="table table-bordered table-striped text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>اسم العميل</th>
                            <th>الهاتف</th>
                            <th>البريد الإلكتروني</th>
                            <th>عنوان العميل</th>
                            <th>إجمالي الطلب</th>
                            <th>الحالة</th>
                            <th>تفاصيل الطلب</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ number_format($order->total, 2) }} ج</td>
                            <td>
                                @php
                                    $statuses = [
                                        'pending' => ['label' => 'قيد الانتظار', 'color' => 'warning'],
                                        'completed' => ['label' => 'مكتمل', 'color' => 'success'],
                                    ];
                                @endphp
                                <span class="badge bg-{{ $statuses[$order->status]['color'] ?? 'secondary' }}">
                                    {{ $statuses[$order->status]['label'] ?? ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                    عرض
                                </button>

                                <!-- مودال تفاصيل الطلب -->
                                <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1" aria-labelledby="orderModalLabel{{ $order->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="orderModalLabel{{ $order->id }}">تفاصيل الطلب رقم {{ $order->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>اسم العميل:</strong> {{ $order->name }}</p>
                                                <p><strong>الهاتف:</strong> {{ $order->phone }}</p>
                                                <p><strong>البريد الإلكتروني:</strong> {{ $order->email }}</p>
                                                <p><strong>العنوان:</strong> {{ $order->address }}</p>
                                                <p><strong>الحالة:</strong> {{ $statuses[$order->status]['label'] ?? ucfirst($order->status) }}</p>

                                                <table class="table table-bordered mt-3">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th>اسم المنتج</th>
                                                            <th>الكمية</th>
                                                            <th>السعر</th>
                                                            <th>الإجمالي</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($order->items as $item)
                                                        <tr>
                                                            <td>{{ $item->product_name }}</td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td>{{ number_format($item->price, 2) }}</td>
                                                            <td>{{ number_format($item->total, 2) }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- نهاية المودال -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>
@endsection
