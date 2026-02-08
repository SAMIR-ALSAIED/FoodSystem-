
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">  سيستم مطاعم   </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin')}}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">  {{ Auth::user()->name }}</a>

        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>


              <p>
             الرئيسية
              </p>
            </a>
          </li>


                @can('الاقسام')


                   <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">

              <i class="nav-icon fas fa-table"></i>
              <p> الاقسام </p>


            </a>
          </li>
    @endcan


                                @can('المنتجات')



                          <li class="nav-item">
            <a href="{{route('products.index')}}" class="nav-link">

              <i class="nav-icon fas fa-table"></i>
              <p> المنتجات </p>


            </a>
          </li>

       @endcan



                                @can('الطاولات')



                            <li class="nav-item">
            <a href="{{route('tables.index')}}" class="nav-link">

              <i class="nav-icon fas fa-table"></i>
              <p> الطاولات </p>


            </a>
          </li>
        @endcan



                    @can('الحجوزات')



                   <li class="nav-item">
            <a href="{{route('reservations.index')}}" class="nav-link">

              <i class="nav-icon fas fa-table"></i>
              <p> الحجوازت  </p>


            </a>
          </li>


     @endcan















  @can('الطلبات')


    <li class="nav-item">
      <a href="{{ route('orders.index') }}" class="nav-link">

              <i class="nav-icon fas fa-table"></i>
        <p>الطلبات </p>
      </a>
    </li>


    @endcan



    @can('المطبخ')


    <li class="nav-item">
      <a href="{{ route('orders.kitchen') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>شاشة المطبخ</p>
      </a>
    </li>

       @endcan




    @can('الكاشير')

    <li class="nav-item">
      <a href="{{ route('orders.cashier') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p> الكاشير</p>
      </a>
    </li>

 @endcan


          @can('التقارير')



           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                التقارير
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">




            </ul>
          </li>
       @endcan












          @can('الاعدادات')


                  <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                الاعدادات
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


                @can('المستخدمين')


              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>بيانات المستخدمين</p>
                </a>
              </li>

                    @endcan

                    @can('الصلاحيات')



                <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>بيانات الصلاحيات</p>
                </a>
              </li>


                @endcan

                        @can('الاقسام')



                    <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> اعدادت السيستم</p>
                </a>
              </li>
 @endcan







            </ul>
          </li>
       @endcan














<li class="nav-item mt-3">
    <form method="POST" action="{{route('logout')}}">
        @csrf
        <button type="submit" class="btn btn-dark btn-block  text-white text-left ">
            <i class="fas fa-sign-out-alt me-2  " ></i> تسجيل الخروج
        </button>
    </form>
</li>





        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
