@extends('dashbord.layouts.master')


@section('title') الرئيسية @endsection

@section('admin_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-primary  text-shadow">لوحة الاحصائيات</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
              <li class="breadcrumb-item active">لوحة التحكم </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
  <div class="container-fluid">

    <div class="row">
      <!-- Sales Today -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
          <div class="inner">
            <h3> {{$products_count}}</h3>
            <p>المنتجات </p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="{{route('products.index')}}" class="small-box-footer text-white">
            عرض <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Total Orders -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
          <div class="inner">
            <h3>{{$category_count}}</h3>
            <p> الاقسام</p>
          </div>
          <div class="icon">
            <i class="fas fa-layer-group"></i>

          </div>
          <a href="{{route('categories.index')}}" class="small-box-footer text-white">
            عرض <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Products Count -->

  <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
          <div class="inner">
            <h3>{{ $orders_count }}</h3>
            <p> الطالبات</p>
          </div>
          <div class="icon">
            <i class="fas fa-layer-group"></i>

          </div>
          <a href="{{ route('orders.index') }}" class="small-box-footer text-white">
            عرض <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- Users -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-primary text-white">
          <div class="inner">
            <h3>{{$users_count}}</h3>
            <p>المستخدمين </p>
          </div>
          <div class="icon">
<i class="fas fa-user-friends"></i>
          </div>
          <a href="{{route('users.index')}}" class="small-box-footer text-white">
            عرض <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

  </div>
</section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



@endsection
