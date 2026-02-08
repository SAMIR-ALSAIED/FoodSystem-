@extends('front.layout.app')

@section('title','المنيو')

@section('content')
<h3 class="mb-4">قائمة المنتجات 🍔</h3>

<!-- أقسام -->
<div class="mb-4">
    <a href="{{ route('front.menu') }}" class="btn btn-secondary btn-sm">الكل</a>
    @foreach($categories as $category)
        <a href="{{ route('front.menu.filter', $category->id) }}" class="btn btn-outline-primary btn-sm">
            {{ $category->name }}
        </a>
    @endforeach
</div>

<!-- منتجات -->
<div class="row">
    @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card product-card h-100">
                <img src="{{ $product->image ? asset('images/' . $product->image) : asset('images/default.jpg') }}"
                     class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title">{{ $product->name }}</h6>
                    <p class="card-text">{{ $product->price }} جنيه</p>
                    <form method="POST" action="">
                        @csrf
                        <button class="btn btn-success mt-auto w-100">إضافة للسلة</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center">
{{ $products->links('pagination::bootstrap-4') }}

</div>
@endsection
