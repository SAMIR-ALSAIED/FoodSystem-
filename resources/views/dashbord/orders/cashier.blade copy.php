<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>شاشة الكاشير </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('admin')}}/dist/css/cashier.css">


</head>
<body>

<header class="d-flex justify-content-between align-items-center">
    <div>
        <h1>شاشة الكاشير</h1>
        <div id="current-time" style="font-size:0.9rem; font-weight:500;"></div>

    </div>
    <div class="text-center">
        <h5 class=" bg-primary  text-white p-2">
            اسم الكاشير: {{ auth()->user()->name }}
        </h5>
    <div>
        <a href="{{ route('dashboard') }}" class="btn btn-dark text-white border">
            <i class="bi bi-house-door-fill"></i> الصفحة الرئيسية
        </a>
    </div>
</header>

@include('dashbord.partials.alerts')

<div class="container-fluid mt-3">
    <div class="row g-3">
        <!--  للأقسام -->
        <div class="col-lg-2 d-flex flex-column gap-2">
            <button class="btn btn-outline-primary category-btn active" data-category="">جميع الأقسام</button>
            @foreach($categories as $category)
                <button class="btn btn-outline-primary category-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
            @endforeach
        </div>

        <!--  المنتجات -->
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

        <!--  الطلبات -->
        <div class="col-lg-4">
            <div id="order-panel">
                <div>
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
                    <div style="max-height:250px; overflow-y:auto;">
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
                    </div>
                </div>
                <div>
                    <h5 class="text-end mt-2">الإجمالي: <span id="order-total">0</span> ج</h5>
               <div class="d-flex gap-2 mt-2">
    <button class="btn btn-danger flex-fill btn-large" id="clear-order">
        <i class="bi bi-trash"></i> حذف الكل
    </button>
    <button class="btn btn-success flex-fill btn-large" id="submit-order">
        <i class="bi bi-send"></i>  إرسال طلب للمطبخ
    </button>
    <button class="btn btn-secondary flex-fill btn-large" id="print-invoice">
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
            card.style.display = (!category || card.dataset.category===category) ? 'flex':'none';
        });
    });
});

// حذف كل الطلب
document.getElementById('clear-order').addEventListener('click',()=>{
    if(confirm('هل تريد حذف كل العناصر؟')){ orderItems=[]; renderOrder(); }
});

// إرسال الطلب
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
            <h2> مطعم الذواقة</h2>

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
                    <td colspan="3" style="text-align:right;">الإجمالي الكلي</td>
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
</script>

</body>
</html>
