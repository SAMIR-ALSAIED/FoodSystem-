@extends('dashbord.layouts.master')

@section('title')
    الصلاحيات
@endsection

@section('admin_content')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>اضافة صلاحية جديد </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
              <li class="breadcrumb-item active">لوحة التحكم</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">



        <div class="card card-default">

          <form action="{{route('roles.store')}}" method="POST" >

            @csrf

          <div class="card-body">
            <div class="row">


              <div class="col-12">
                <div class="form-group">
                  <label>اسم الصلاحية</label>

                  <input type="text" class=" form-control" name="name" value="{{$role->name}}">

                            @error('name')
    <small class="text-danger mt-3">{{ $message }}</small>
@enderror

                </div>

              </div>

<div class="col-12 ">
    <label>الصلاحيات</label>
    <div class="">


    <div class="form-group ">
 @foreach($permissions as $per)
                <div class="form-check card p-3 shadow-sm ">
                    <input class="form-check-input me-2 "
       type="checkbox"
       name="permissions[]"
       value="{{ $per->name }}"
       id="perm{{ $per->name}}"
       {{ $role->permissions->contains($per->id) ? 'checked' : '' }}>

                    <label class="form-check-label" for="perm{{ $per->name }}">
                        {{ $per->name }}
                    </label>
                </div>
            @endforeach
    </div>
</div>












                <button type="submit" class=" btn btn-primary">حفظ  </button>

              </div>

            </div>

          </div>

          </form>

        </div>


        </div>



      </div>
@endsection
