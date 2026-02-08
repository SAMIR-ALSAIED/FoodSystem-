@extends('dashbord.layouts.master')

@section('title') الرئيسية @endsection

@section('admin_content')

@can('لوحة المسوول')



<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 align-items-center">
          <div class="col-sm-6">
            <h1 class="m-0 text-primary text-shadow" style="text-shadow: 1px 1px 3px #aaa;">لوحة الاحصائيات</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
              <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Cards الإحصائيات -->
    <div class="row">
    <!-- كارد المنتجات -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
            <div class="inner">
                <h3>{{ $products_count }}</h3>
                <p>المنتجات</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            {{-- <a href="{{ route('products.index') }}" class="small-box-footer text-white">
                عرض <i class="fas fa-arrow-circle-right"></i>
            </a> --}}
        </div>
    </div>

    <!-- كارد الأقسام -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
            <div class="inner">
                <h3>{{ $category_count }}</h3>
                <p>الأقسام</p>
            </div>
            <div class="icon">
                <i class="fas fa-layer-group"></i>
            </div>
            {{-- <a href="{{ route('categories.index') }}" class="small-box-footer text-white">
                عرض <i class="fas fa-arrow-circle-right"></i>
            </a> --}}
        </div>
    </div>

    <!-- كارد الطلبات -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
            <div class="inner">
                <h3>{{ $orders_count }}</h3>
                <p>الطلبات</p>
            </div>
            <div class="icon">
                <i class="fas fa-receipt"></i>
            </div>
            {{-- <a href="{{ route('orders.index') }}" class="small-box-footer text-white">
                عرض <i class="fas fa-arrow-circle-right"></i>
            </a> --}}
        </div>
    </div>

    <!-- كارد المستخدمين -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
            <div class="inner">
                <h3>{{ $users_count }}</h3>
                <p>المستخدمين</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-friends"></i>
            </div>
            {{-- <a href="{{ route('users.index') }}" class="small-box-footer text-white">
                عرض <i class="fas fa-arrow-circle-right"></i>
            </a> --}}
        </div>
    </div>
</div>


            <!-- الإيرادات والحجوزات -->
            <div class="row">
                <!-- إيراد اليوم -->
                <div class="col-lg-6 col-md-12 mb-3">
                    <div class="card shadow-sm rounded-lg border-primary">
                        <div class="card-header bg-primary text-white rounded-top">
                            <h3 class="card-title">إيراد اليوم</h3>
                        </div>
                        <div class="card-body text-center">
                            <h2 class="text-success font-weight-bold" style="font-size:2.2rem;">{{ number_format($today_income, 2) }} جنية</h2>
                            <i class="fas fa-coins fa-2x text-dark mt-2"></i>
                        </div>
                    </div>
                </div>

            <!-- آخر الحجوزات -->
<div class="col-lg-6 col-md-12 mb-3">
    <div class="card shadow-sm rounded-lg border-info">
        <div class="card-header bg-info text-white rounded-top">
            <h3 class="card-title">آخر الحجوزات</h3>
        </div>
        <div class="card-body table-responsive p-0" style="max-height: 300px;">
            <table class="table table-hover text-nowrap table-bordered mb-0">
                <thead class="thead-dark bg-secondary text-white">
                    <tr>
                        <th>العميل</th>
                        <th>الطاولة</th>
                        <th>التاريخ والوقت</th>
                        <th> حالة الحجز</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latest_reservations as $res)
                    <tr>
                        <td>{{ $res->customer_name }}</td>
                        <td>{{ $res->table->number ?? '-' }}</td>

<td>{{ \Carbon\Carbon::now('Africa/Cairo')->format('Y-m-d h:i A') }}</td>
<td>
    <span class="badge {{ $res->statusBadge['badge'] }} text-white  px-3 py-2 rounded-3">
        {{ $res->statusBadge['text'] }}
    </span>
</td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




            <!-- Chart -->
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="card shadow-sm rounded-lg border-success">
                        <div class="card-header bg-success text-white rounded-top">
                            <h3 class="card-title">مبيعات الشهر الحالي</h3>

                        </div>
                        <div class="card-body">
                            <canvas id="salesChart" style="height: 350px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endcan
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('salesChart').getContext('2d');
const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chart_labels),
        datasets: [{
            label: 'إجمالي المبيعات',
            data: @json($chart_data),
            backgroundColor: 'rgba(0, 123, 255, 0.2)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 2,
            tension: 0.4,
            fill: true,
            pointBackgroundColor: 'rgba(0, 123, 255, 1)',
            pointRadius: 5,
            pointHoverRadius:7
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true, position: 'top' }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});
</script>

@endsection
