<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>شاشة الكاشير</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
body { background: #f8f9fa; min-height: 100vh; font-family: 'Cairo', sans-serif; }
h1 { margin-bottom: 20px; font-weight: 700; color: #0d6efd; }
.product-card { cursor: pointer; transition: transform 0.2s, box-shadow 0.2s; border-radius: 10px; border: 1px solid #ddd; }
.product-card:hover { transform: scale(1.05); box-shadow: 0 6px 20px rgba(0,0,0,0.2); }
.category-btn.active { background-color:#0d6efd; color:#fff; border-color:#0d6efd; }
#order-table tbody { max-height: 250px; overflow-y: auto; display: block; }
#order-table thead, #order-table tbody tr { display: table; width: 100%; table-layout: fixed; }
#order-table input { width: 60px; margin: auto; }
#invoice { display:none; }
</style>
</head>
<body>

<div class="container-fluid p-3">
    <h1 class="text-center">شاشة الكاشير</h1>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">رجوع</a>

    <!-- فلتر الأقسام -->
    <div class="mb-4 d-flex gap-2 justify-content-start my-3 flex-wrap">
        <button class="btn btn-outline-primary category-btn active" data-category="">جميع الأقسام</button>
        @foreach($categories as $category)
            <button class="btn btn-outline-primary category-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
        @endforeach
    </div>

    <div class="row g-3">
        <!-- المنتجات -->
        <div class="col-lg-8">
            <div class="row g-2" id="products-grid">
                @foreach($products as $product)
                <div class="col-6 col-md-4 col-lg-3 product-card" data-category="{{ $product->category_id }}" data-id="{{ $product->id }}">
                    <div class="card text-center h-100">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h6>{{ $product->name }}</h6>
                            <p class="text-primary fw-bold">{{ $product->price }} ج</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- الطلب الحالي -->
        <div class="col-lg-4">
            <div class="card p-3 shadow-sm border-0">
                <h5>الطلب الحالي (<span id="item-count">0</span>)</h5>

                <div class="mb-3">
                    <label>اختر الطاولة (اختياري):</label>
                    <select id="table-select" class="form-select">
                        <option value="">بدون طاولة</option>
                        @foreach($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->number }} ({{ $table->min_guests }}-{{ $table->max_guests }} أشخاص)</option>
                        @endforeach
                    </select>
                </div>

                <table class="table table-sm text-center" id="order-table">
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

                <h5 class="text-end">الإجمالي: <span id="order-total">0</span> ج</h5>

                <div class="d-flex gap-2 mt-2">
                    <button class="btn btn-danger flex-fill" id="clear-order">حذف الكل</button>
                    <button class="btn btn-success flex-fill" id="submit-order">إرسال الطلب</button>
                    <button class="btn btn-secondary flex-fill" id="print-invoice">طباعة الفاتورة</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- نافذة الفاتورة -->
<div id="invoice"></div>

<script>
let orderItems = [];

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

    document.querySelectorAll('.remove-item').forEach(btn=>{
        btn.addEventListener('click',()=>{ orderItems.splice(btn.dataset.index,1); renderOrder(); });
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
            card.style.display = (!category || card.dataset.category===category) ? 'block':'none';
        });
    });
});

// حذف كل الطلب
document.getElementById('clear-order').addEventListener('click',()=>{
    if(confirm('هل تريد حذف كل العناصر؟')){ orderItems=[]; renderOrder(); }
});

// طباعة الفاتورة
document.getElementById('print-invoice').addEventListener('click', () => {
    if(orderItems.length === 0){ alert('أضف منتجات للطلب!'); return; }

    const invoiceTable = document.getElementById('table-select').selectedOptions[0]?.text || 'بدون طاولة';
    const invoiceDate = new Date().toLocaleString('ar-EG', {dateStyle:'short', timeStyle:'short'});

    let itemsHtml = '';
    let total = 0;
    orderItems.forEach(item => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        itemsHtml += `
        <tr>
            <td style="text-align:right; padding:5px;">${item.name}</td>
            <td style="text-align:center; padding:5px;">${item.quantity}</td>
            <td style="text-align:center; padding:5px;">${item.price.toFixed(2)}</td>
            <td style="text-align:right; padding:5px;">${itemTotal.toFixed(2)}</td>
        </tr>`;
    });

    const invoiceHtml = `
    <html dir="rtl">
    <head><title>فاتورة الطلب</title>
    <style>
        body { font-family: 'Cairo', sans-serif; padding:10px; background:#fff; }
        .invoice-header { text-align:center; margin-bottom:15px; border-bottom:2px solid #0d6efd; padding-bottom:10px; }
        table { width:100%; border-collapse: collapse; font-size:14px; margin-top:10px; }
        table th, table td { border-bottom:1px dashed #0d6efd; padding:5px; }
        table th { border-bottom:2px solid #0d6efd; }
        h4 { text-align:right; font-size:16px; font-weight:700; margin-top:10px; }
    </style>
    </head>
    <body>
        <div class="invoice-header">
            <h3>مطعم</h3>
            <p>فاتورة الطلب</p>
            <p>${invoiceDate}</p>
        </div>
        <p>الكاشير: {{ auth()->user()->name }}</p>
        <p>الطاولة: ${invoiceTable}</p>
        <table>
            <thead>
                <tr>
                    <th style="text-align:right;">المنتج</th>
                    <th style="text-align:center;">الكمية</th>
                    <th style="text-align:center;">السعر</th>
                    <th style="text-align:right;">الإجمالي</th>
                </tr>
            </thead>
            <tbody>${itemsHtml}</tbody>
        </table>
        <h4>الإجمالي: ${total.toFixed(2)} ج</h4>
        <p class="footer" style="text-align:center; color:#555;">شكراً لزيارتكم، ونتمنى لكم يومًا سعيدًا!</p>
    </body>
    </html>
    `;

    const w = window.open('', '', 'height=700,width=400');
    w.document.write(invoiceHtml);
    w.document.close();
    w.print();
});

// إرسال الطلب إلى السيرفر
document.getElementById('submit-order').addEventListener('click',()=>{
    const tableId=document.getElementById('table-select').value || null;
    if(orderItems.length===0){ alert('أضف منتجات للطلب!'); return; }
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const form=document.createElement('form');
    form.method='POST';
    form.action="{{ route('orders.cashier.store') }}";
    form.innerHTML=`<input type="hidden" name="_token" value="${token}">`;
    if(tableId) form.innerHTML+=`<input type="hidden" name="table_id" value="${tableId}">`;
    orderItems.forEach((item,index)=>{
        form.innerHTML+=`<input type="hidden" name="items[${index}][product_id]" value="${item.id}">`;
        form.innerHTML+=`<input type="hidden" name="items[${index}][quantity]" value="${item.quantity}">`;
        form.innerHTML+=`<input type="hidden" name="items[${index}][price]" value="${item.price}">`;
    });
    document.body.appendChild(form);
    form.submit();
});
</script>
</body>
</html>
