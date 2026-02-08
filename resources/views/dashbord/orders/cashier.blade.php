<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>شاشة الكاشير</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('admin')}}/dist/css/cashier.css">
</head>
<body>

<header class="d-flex justify-content-between align-items-center bg-dark">
    <div>
        <h1>شاشة الكاشير</h1>
        <div id="current-time" style="font-size:0.9rem; font-weight:500;"></div>
    </div>
    <div class="text-center">
        <h5 class="  text-white p-2">
            اسم الكاشير: {{ auth()->user()->name }}
        </h5>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-info text-white border">
                <i class="bi bi-house-door-fill"></i> الصفحة الرئيسية
            </a>
        </div>
    </div>
</header>

@include('dashbord.partials.alerts')

<div class="container-fluid mt-3">
    <div class="row g-3">
        <!-- الأقسام -->
        <div class="col-lg-2 d-flex flex-column gap-2">
            <button class="btn btn-outline-primary category-btn active" data-category="">جميع الأقسام</button>
            @foreach($categories as $category)
                <button class="btn btn-outline-primary category-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <!-- المنتجات -->
        <div class="col-lg-6">
            <div class="row g-2" id="products-grid">
                @foreach($products as $product)
                <div class="col-6 col-md-4 product-card" data-category="{{ $product->category_id }}" data-id="{{ $product->id }}">
                    <h6>{{ $product->name }}</h6>
                    <p>{{ $product->price }} ج</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- الطلبات -->
     <div class="col-lg-4 h-75">
    <div id="order-panel" class="p-3 bg-white rounded shadow-sm d-flex flex-column h-100">

        <!-- عنوان الطلب الحالي -->
        <div class="mb-3">
            <h5 class="fw-bold">الطلب الحالي (<span id="item-count">0</span>)</h5>
        </div>

        <!-- اختيار الطاولة -->
        <div class="mb-3">
            <label class="form-label fw-semibold">اختر الطاولة (اختياري):</label>
            <select id="table-select" class="form-select">
                <option value="">بدون طاولة</option>
                @foreach($tables as $table)
                    <option value="{{ $table->id }}">{{ $table->number }} ({{ $table->min_guests }}-{{ $table->max_guests }} أشخاص)</option>
                @endforeach
            </select>
        </div>

        <!-- جدول الطلبات -->
        <div class="flex-fill mb-3" style="overflow-y:auto; max-height:250px;">
            <table class="table table-sm table-striped text-center align-middle" id="order-table">
                <thead class="table-dark">
                    <tr>
                        <th>المنتج</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- المبالغ -->
        <div class="mb-3">
           <!-- الإجمالي -->
    <div class="card text-white mb-2 bg-primary">
        <div class="card-body d-flex justify-content-between align-items-center py-3 px-3">
            <div>
                <small class="text-white-50 h6">الإجمالي</small>
                <h5 id="order-total" class="mb-0 fw-bold">0 ج</h5>
            </div>
            <i class="bi bi-cash-stack fs-2 opacity-75"></i>
        </div>
    </div>

<div class="row g-2 mb-2">

    <!-- المدفوع -->
    <div class="col-6">
        <div class="card shadow-sm border-0 bg-success bg-gradient text-white">
            <div class="card-body d-flex align-items-center gap-2 p-2">
                <span class="fs-5">
                    <i class="bi bi-wallet2"></i>
                </span>
                <div class="flex-fill">
                    <label class="form-label fw-semibold mb-1">المبلغ المدفوع</label>
                    <input type="number" min="0" step="0.01" id="paid-amount" class="form-control form-control-sm text-end fw-bold bg-white text-dark" value="0">
                </div>
            </div>
        </div>
    </div>

    <!-- المتبقي -->
    <div class="col-6">
        <div class="card shadow-sm border-0 bg-danger bg-gradient text-white">
            <div class="card-body d-flex align-items-center gap-2 p-2">
                <span class="fs-5">
                    <i class="bi bi-exclamation-triangle"></i>
                </span>
                <div class="flex-fill">
                    <label class="form-label fw-semibold mb-1">المتبقي</label>
                    <input type="number" id="remaining-amount" class="form-control form-control-sm text-end fw-bold bg-white text-dark" value="0" readonly>
                </div>
            </div>
        </div>
    </div>

</div>




            </div>

            <!-- الأزرار -->
            <div class="d-flex gap-2 mt-2">
                <button class="btn btn-danger flex-fill btn-sm" id="clear-order">
                    <i class="bi bi-trash"></i> حذف الكل
                </button>
                <button class="btn btn-success flex-fill btn-sm" id="submit-order">
                    <i class="bi bi-send"></i> إرسال الطلب
                </button>
                <button class="btn btn-secondary flex-fill btn-sm" id="print-invoice">
                    <i class="bi bi-printer"></i> طباعة الفاتورة
                </button>
            </div>
        </div>

    </div>
</div>

    </div>
</div>

<div id="invoice"></div>

<script>
// الوقت الحالي
function updateTime(){
    const now = new Date();
    const options = {weekday:'short', year:'numeric', month:'short', day:'numeric', hour:'2-digit', minute:'2-digit', second:'2-digit'};
    document.getElementById('current-time').innerText = now.toLocaleDateString('ar-EG', options);
}
setInterval(updateTime, 1000);
updateTime();

let orderItems = [];
const paidInput = document.getElementById('paid-amount');
const remainingInput = document.getElementById('remaining-amount');

function updateRemaining() {
    const total = parseFloat(document.getElementById('order-total').innerText) || 0;
    const paid = parseFloat(paidInput.value) || 0;
    const remaining = total - paid;
    remainingInput.value = remaining.toFixed(2);
}

// عرض الطلب
function renderOrder(){
    const tbody = document.querySelector('#order-table tbody');
    tbody.innerHTML = '';
    let total = 0;
    orderItems.forEach((item,index)=>{
        total += item.price*item.quantity;
        tbody.innerHTML += `
            <tr>
                <td>${item.name}</td>
                <td><input type="number" min="1" value="${item.quantity}" class="form-control form-control-sm qty-input" data-index="${index}"></td>
                <td>${(item.price*item.quantity).toFixed(2)}</td>
                <td><button class="btn btn-danger btn-sm remove-item" data-index="${index}"><i class="bi bi-trash"></i></button></td>
            </tr>
        `;
    });
    document.getElementById('order-total').innerText = total.toFixed(2);
    document.getElementById('item-count').innerText = orderItems.length;

    updateRemaining();

    document.querySelectorAll('.remove-item').forEach(btn=>{
        btn.addEventListener('click',()=>{
            orderItems.splice(btn.dataset.index,1);
            renderOrder();
        });
    });

    document.querySelectorAll('.qty-input').forEach(input=>{
        input.addEventListener('input',()=>{
            let value = parseInt(input.value);
            if(value < 1 || isNaN(value)) value = 1;
            orderItems[input.dataset.index].quantity = value;
            renderOrder();
        });
    });
}

// اختيار منتج
document.querySelectorAll('.product-card').forEach(card=>{
    card.addEventListener('click',()=>{
        const name = card.querySelector('h6').innerText;
        const price = parseFloat(card.querySelector('p').innerText.replace(/[^0-9.]/g,''));
        const exist = orderItems.find(i=>i.name===name);
        if(exist) exist.quantity++;
        else orderItems.push({name,price,quantity:1,id:card.dataset.id});
        renderOrder();
    });
});

// فلتر الأقسام
document.querySelectorAll('.category-btn').forEach(btn=>{
    btn.addEventListener('click',()=>{
        document.querySelectorAll('.category-btn').forEach(b=>b.classList.remove('active'));
        btn.classList.add('active');
        const category=btn.dataset.category;
        document.querySelectorAll('.product-card').forEach(card=>{
            card.style.display = (!category || card.dataset.category===category) ? 'flex':'none';
        });
    });
});

// حذف كل الطلب
document.getElementById('clear-order').addEventListener('click',()=>{
    if(confirm('هل تريد حذف كل العناصر؟')){
        orderItems=[];
        renderOrder();
        paidInput.value = 0;
        updateRemaining();
    }
});

// إرسال الطلب للمطبخ
document.getElementById('submit-order').addEventListener('click',()=>{
    if(orderItems.length===0){ alert('أضف منتجات للطلب!'); return; }

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const tableId = document.getElementById('table-select').value || null;

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = "{{ route('orders.cashier.store') }}";
    form.innerHTML = `<input type="hidden" name="_token" value="${token}">`;
    if(tableId) form.innerHTML += `<input type="hidden" name="table_id" value="${tableId}">`;
    form.innerHTML += `<input type="hidden" name="paid_amount" value="${paidInput.value}">`;
    form.innerHTML += `<input type="hidden" name="remaining_amount" value="${remainingInput.value}">`;

    orderItems.forEach((item,index)=>{
        form.innerHTML += `<input type="hidden" name="items[${index}][product_id]" value="${item.id}">`;
        form.innerHTML += `<input type="hidden" name="items[${index}][quantity]" value="${item.quantity}">`;
        form.innerHTML += `<input type="hidden" name="items[${index}][price]" value="${item.price}">`;
    });

    document.body.appendChild(form);
    form.submit();
});

// طباعة الفاتورة
document.getElementById('print-invoice').addEventListener('click', () => {
    if(orderItems.length === 0){ alert('أضف منتجات للطلب!'); return; }

    const tableName = document.getElementById('table-select').selectedOptions[0]?.text || 'بدون طاولة';
    const invoiceDate = new Date().toLocaleString('ar-EG', {dateStyle:'short', timeStyle:'short'});

    let itemsHtml = '';
    let total = 0;
    orderItems.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        itemsHtml += `
            <tr>
                <td style="padding:5px;text-align:right;">${item.name}</td>
                <td style="padding:5px;text-align:center;">${item.quantity}</td>
                <td style="padding:5px;text-align:center;">${item.price.toFixed(2)}</td>
                <td style="padding:5px;text-align:right;">${itemTotal.toFixed(2)}</td>
            </tr>
        `;
    });

    const invoiceHtml = `
    <html dir="rtl">
    <head>
        <title>فاتورة الطلب</title>
        <style>
            body { font-family: 'Cairo', sans-serif; margin:20px; }
            .header { text-align:center; border-bottom:2px solid #0d6efd; padding-bottom:10px; margin-bottom:15px; }
            table { width:100%; border-collapse: collapse; margin-top:10px; }
            th, td { border-bottom:1px dashed #0d6efd; padding:8px; }
            th { border-bottom:2px solid #0d6efd; }
            tfoot td { font-weight:bold; font-size:16px; border-top:2px solid #0d6efd; }
            p { margin:3px 0; }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>مطعم </h2>
            <p>فاتورة الطلب</p>
            <p>${invoiceDate}</p>
        </div>

        <p><strong>الكاشير:</strong> {{ auth()->user()->name }}</p>

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
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align:right;">الإجمالي </td>
                    <td style="text-align:right;">${total.toFixed(2)} ج</td>
                </tr>

            </tfoot>
        </table>

        <p style="text-align:center; margin-top:20px; color:#555;">شكراً لزيارتكم، ونتمنى لكم يومًا سعيدًا!</p>
    </body>
    </html>
    `;

    const printWindow = window.open('', '', 'height=700,width=500');
    printWindow.document.write(invoiceHtml);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
});

paidInput.addEventListener('input', updateRemaining);
</script>

           {{-- <tr>
               <td colspan="3" style="text-align:right;">المبلغ المدفوع</td>
                  <td style="text-align:right;">${paidInput.value} ج</td>
               </tr>
               <tr>
                  <td colspan="3" style="text-align:right;">المتبقي</td>
                  <td style="text-align:right;">${remainingInput.value} ج</td>
                 </tr> --}}
</body>
</html>
