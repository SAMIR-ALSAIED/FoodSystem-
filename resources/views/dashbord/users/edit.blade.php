@extends('dashbord.layouts.master')

@section('title')
    المستخدمين
@endsection

@section('admin_content')

  <div class="content-wrapper">

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تعديل مستخدم جديد </h1>
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

          <form action="{{route('users.update',$user->id)}}" method="POST" >

            @csrf
            @method('PUT')

          <div class="card-body">
            <div class="row">


              <div class="col-12">
                <div class="form-group">
                  <label>اسم المستخدم</label>

                  <input type="text" class=" form-control" name="name" value="{{$user->name}}">

                            @error('name')
    <small class="text-danger mt-3">{{ $message }}</small>
@enderror

                  </select>
                </div>

              </div>


              <div class="col-12">
                <div class="form-group">
                  <label>الايميل </label>

                  <input type="email" class=" form-control" name="email"  value="{{$user->email}}">

                            @error('email')
    <small class="text-danger mt-3">{{ $message }}</small>
@enderror

                </div>

              </div>


              <div class="col-12">
                <div class="form-group">
                  <label> الباسورد </label>

                  <input type="password" class=" form-control" name="password" >

                            @error('password')
    <small class="text-danger mt-3">{{ $message }}</small>
@enderror

                  </select>
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
