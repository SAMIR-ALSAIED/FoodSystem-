@extends('dashbord.layouts.master')

@section('title', 'تفاصيل الطلب')

@section('admin_content')
<div class="content-wrapper p-3">

    <!-- عنوان الصفحة والعودة -->
    <section class="content-header mb-3 d-flex justify-content-between align-items-center">
        <h1>تفاصيل الطلب #{{ $order->id }}</h1>
        <a href="{{ route('orders.index') }}" class="btn btn-dark">
            <i class="fas fa-arrow-left"></i> العودة للطلبات
        </a>
    </section>

    <section class="content">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h3 class="card-title">معلومات الطلب</h3>
            </div>
            <div class="card-body">

                @php
                    $statuses = [
                        'pending'   => ['label' => 'قيد الانتظار', 'color' => 'warning'],
                        'preparing' => ['label' => 'جار التحضير', 'color' => 'info'],
                        'ready'     => ['label' => 'جاهز', 'color' => 'success'],
                        'completed' => ['label' => 'مكتمل', 'color' => 'secondary'],
                        'canceled'  => ['label' => 'ملغى', 'color' => 'danger'],
                    ];
                @endphp

                <!-- معلومات أساسية -->
                <div class="row mb-4 text-center text-md-start">
                    <div class="col-md-3 mb-2">
                        <p class="mb-0"><strong>الطاولة:</strong> {{ $order->table->number ?? 'بدون طاولة' }}</p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <p class="mb-0"><strong>المستخدم:</strong> {{ $order->user->name ?? '-' }}</p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <p class="mb-0">
                            <strong>الحالة:</strong>
                            <span class="badge rounded-pill px-3 py-2
                                text-dark {{ $statuses[$order->status]['color']=='warning' ? 'bg-warning' : '' }}
                                {{ $statuses[$order->status]['color']=='info' ? 'bg-info text-white' : '' }}
                                {{ $statuses[$order->status]['color']=='success' ? 'bg-success text-white' : '' }}
                                {{ $statuses[$order->status]['color']=='secondary' ? 'bg-secondary text-white' : '' }}
                                {{ $statuses[$order->status]['color']=='danger' ? 'bg-danger text-white' : '' }}">
                                {{ $statuses[$order->status]['label'] ?? ucfirst($order->status) }}
                            </span>
                        </p>
                    </div>
                    <div class="col-md-3 mb-2">
                        <p class="mb-0"><strong>الإجمالي:</strong> {{ number_format($order->total, 2) }} ج.م</p>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>المنتج</th>
                                <th>الكمية</th>
                                <th>السعر</th>
                                <th>الإجمالي</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->product->name ?? 'منتج محذوف' }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ number_format($item->price, 2) }}</td>
                                    <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- الإجمالي الكلي -->
                <div class="mt-3 text-end">
                    <h5 class="fw-bold">الإجمالي الكلي: {{ number_format($order->total, 2) }} ج.م</h5>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
