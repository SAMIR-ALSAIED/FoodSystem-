@extends('dashbord.layouts.master')

@section('title', 'تفاصيل الطلب')

@section('admin_content')
<div class="content-wrapper p-3">

    <!-- عنوان الصفحة والعودة -->
    <section class="content-header mb-3 d-flex justify-content-between align-items-center">
        <h1>تفاصيل الطلب #{{ $order->id }}</h1>
        <div>
            <a href="{{ route('orders.index') }}" class="btn btn-dark">
                <i class="fas fa-arrow-left"></i> العودة للطلبات
            </a>
            <button class="btn btn-success" id="print-order-invoice">
                <i class="bi bi-printer"></i> طباعة الفاتورة
            </button>
        </div>
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

                <!-- جدول المنتجات -->
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

<!-- طباعة الفاتورة -->
<script>
const order = @json($order);
const cashierName = "{{ auth()->user()->name }}";

document.getElementById('print-order-invoice').addEventListener('click', () => {
    let itemsHtml = '';
    let total = 0;

    order.items.forEach(item => {
        const itemTotal = parseFloat(item.price) * parseInt(item.quantity);
        total += itemTotal;
        itemsHtml += `
            <tr>
                <td style="padding:5px;text-align:right;">${item.product ? item.product.name : 'منتج محذوف'}</td>
                <td style="padding:5px;text-align:center;">${item.quantity}</td>
                <td style="padding:5px;text-align:center;">${parseFloat(item.price).toFixed(2)}</td>
                <td style="padding:5px;text-align:right;">${itemTotal.toFixed(2)}</td>
            </tr>
        `;
    });

    // تحويل التاريخ لنسق عربي جميل
    const orderDate = new Date(order.created_at);
    const formattedDate = orderDate.toLocaleString('ar-EG', { dateStyle:'short', timeStyle:'short' });

    const invoiceHtml = `
<html dir="rtl">
<head>
    <title>فاتورة الطلب</title>
    <style>
        body { font-family: 'Cairo', sans-serif; margin:20px; color:#333; background:#fff; }
        .header { text-align:center; padding-bottom:10px; margin-bottom:15px; }
        .header h1 { margin:0; font-size:24px; color:#000; }
        .header p { margin:3px 0; font-size:14px; }
        table { width:100%; border-collapse: collapse; margin-top:10px; }
        th, td { border-bottom:1px solid #ccc; padding:8px; font-size:14px; }
        th { background:#f8f9fa; font-weight:600; }
        td { text-align:center; }
        .totals { width:100%; margin-top:10px; }
        .totals td { font-weight:bold; padding:6px 10px; font-size:15px; text-align:right; }
        .thankyou { text-align:center; margin-top:20px; color:#555; font-size:14px; }
        @media print { body { margin:0; font-size:12px; } table, th, td { border: 1px solid #ccc; } }
    </style>
</head>
<body>
    <div class="header">
        <h1>مطعمنا</h1>
        <p>فاتورة رقم: ${order.id}</p>
        <p>التاريخ: ${formattedDate}</p>
        <p><strong>الطاولة:</strong> ${order.table ? order.table.number : 'بدون طاولة'}</p>
        <p><strong>اسم الكاشير:</strong> ${cashierName}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>المنتج</th>
                <th>الكمية</th>
                <th>السعر</th>
                <th>الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            ${itemsHtml}
        </tbody>
    </table>

    <table class="totals">
        <tr>
            <td>الإجمالي:</td>
            <td>${total.toFixed(2)} ج.م</td>
        </tr>
    </table>

    <p class="thankyou">شكراً لزيارتكم، ونتمنى لكم يومًا سعيدًا!</p>
</body>
</html>
`;

    const printWindow = window.open('', '', 'height=700,width=500');
    printWindow.document.write(invoiceHtml);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
});
</script>
@endsection
