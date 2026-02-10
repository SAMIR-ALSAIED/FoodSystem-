@extends('dashbord.layouts.master')

@section('title', 'الطلبات')

@section('admin_content')
<div class="content-wrapper">

    <section class="content-header">
        <h1>الطلبات</h1>

        {{-- @can('اضافة طلبات')

        <a href="{{ route('orders.create') }}" class="btn btn-dark mt-2">
            إضافة طلب جديد
        </a>

        @endcan --}}
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">

                <table id="example1" class="table table-bordered text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#</th>
                            <th>الطاولة</th>
                            <th>المستخدم</th>
                            <th>الإجمالي</th>
                            <th>التاريخ </th>
                            <th>الحالة</th>
                            <th>عرض </th>
                            <th>حذف الطلب</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->table->number ?? 'بدون طاولة ' }}</td>
                            <td>{{ $order->user->name ?? '-' }}</td>
                            <td>{{ $order->total  }} ج</td>
<td>
    {{ $order->created_at->setTimezone('Africa/Cairo')->format('d/m/Y g:i A') }}
</td>


                                        <td>

                                            @php
        $statuses = [
            'pending'   => ['label' => 'قيد الانتظار', 'color' => 'warning'],
            'preparing' => ['label' => 'جار التحضير', 'color' => 'info'],
            'ready'     => ['label' => 'جاهز', 'color' => 'success'],
            'completed' => ['label' => 'مكتمل', 'color' => 'secondary'],
            'canceled'  => ['label' => 'ملغى', 'color' => 'danger'], // لو حبيت تضيف حالة
        ];
    @endphp

    <span class="badge bg-{{ $statuses[$order->status]['color'] ?? 'secondary' }}">
        {{ $statuses[$order->status]['label'] ?? ucfirst($order->status) }}
    </span>

                            </td>

                            @can('عرض الطلبات')


                             <td><a class="btn btn-info" href="{{ route('orders.show',$order->id ) }}">عرض </a></td>
                            <td>


                            @endcan


                            @can('حذف طلبات')



    <!-- زر الحذف -->
    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('هل تريد حذف هذا الطلب؟')">
            حذف
        </button>
    </form>
       @endcan
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
