@extends('dashbord.layouts.master')

@section('title', 'الطاولات')

@section('admin_content')
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>الطاولات</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                        <li class="breadcrumb-item active">الطاولات</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- زر إضافة طاولة -->
            <div class="d-flex justify-content-between mb-3">
                <a href="{{route('tables.create')}}" class="btn btn-dark">
                    <i class="fas fa-plus"></i> إضافة طاولة
                </a>
            </div>

            <!-- عرض الطاولات -->
            @include('dashbord.partials.alerts')
            <div class="row">
                @foreach($tables as $table)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card shadow-sm border-0">
                        <!-- Header مع حالة الطاولة -->
                        <div class="card-header
                            {{ $table->status == 'متاحة' ? 'bg-success text-dark' : ($table->status == 'مشغولة' ? 'bg-danger text-white' : 'bg-warning text-dark') }}">
                            <h5 class="mb-0">رقم الطاولة: {{ $table->number }}</h5>
                        </div>

                        <!-- محتوى الكارد -->
                        <div class="card-body">
                            <p class="card-text mb-2">
                                الأشخاص: {{ $table->min_guests }} - {{ $table->max_guests }}
                            </p>
                            <p class="card-text mb-3">
                                الحالة: <span class="fw-bold">{{ $table->status }}</span>
                            </p>

                            <!-- الأزرار -->
                            <div class="d-flex  gap-2">
                                <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit  "></i>
                                </a>

                                <form action="{{ route('tables.destroy', $table->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف الطاولة؟')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash "></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
               <div class="mt-4 float-start">
     {{ $tables->links('pagination::bootstrap-4') }}
</div>

        </div>
    </section>
</div>
@endsection
