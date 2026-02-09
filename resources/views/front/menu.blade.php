@extends('front.layout.app')

@section('title','المنيو')

@section('front_content')

<style>
    /* ======= Menu Page Pro Style ======= */

/* Page Header */
.page-header {
    background: linear-gradient(120deg, #f39c12, #e74c3c);
    color: #fff;
    border-radius: 0 0 40px 40px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    padding: 80px 0;
    text-align: center;
}

.page-header h1 {
    font-weight: 900;
    font-size: 3rem;
    letter-spacing: 1px;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
}

.page-header p {
    font-size: 1.3rem;
    color: #fff;
    margin-top: 15px;
}

/* Category Buttons */
.menu-section .btn-outline-primary {
    border-width: 2px;
    border-radius: 50px;
    padding: 0.6rem 1.5rem;
    margin: 5px;
    font-weight: 600;
    transition: all 0.3s;
    color: #333;

        border: 2px solid transparent;
    background: #e74c3c;

    color: #fff;

}

.menu-section .btn-outline-primary.active,
.menu-section .btn-outline-primary:hover {
    background: #e74c3c !important;
    color: #fff;

    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    transform: translateY(-3px);
}

/* Product Card */
.menu-section .card {
    border-radius: 25px;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
    border: none;
}

.menu-section .card:hover {

    box-shadow: 0 25px 35px rgba(0,0,0,0.15);
}

/* Card Image */
.menu-section .card-img-top {
    height: 200px;
    object-fit: cover;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    transition: transform 0.5s ease;
}

.menu-section .card:hover .card-img-top {
    transform: scale(1.1);
}

/* Card Body */
.menu-section .card-body {
    padding: 1.3rem;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

/* Card Title */
.menu-section .card-title {
    font-weight: 700;
    font-size: 1.2rem;
    color: #333;
    text-align: center;
    margin-bottom: 10px;
}

/* Price */
.menu-section .card-body span {
    font-size: 1.2rem;
    font-weight: 700;
    color: #e74c3c;
    text-align: center;
    display: block;
    margin-bottom: 10px;
}

/* Add to Cart Button */
.menu-section .btn-success {
    border-radius: 50px;
    font-weight: 600;
    padding: 0.5rem 1rem;
    background: #e67e22;
    border: none;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.menu-section .btn-success i {
    margin-right: 8px;
}

.menu-section .btn-success:hover {
    background: #d35400;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* Empty Message */
.menu-section p.text-muted {
    font-size: 1.3rem;
    margin-top: 3rem;
}

/* Pagination Style for Menu */
.menu-section .pagination {
    display: flex;
    justify-content: center;
    margin-top: 40px;
    gap: 5px;
}

.menu-section .pagination li a,
.menu-section .pagination li span {
    background: #e67e22; /* لون برتقالي */
    color: #fff !important; /* نص أبيض */
    border-radius: 50px !important;
    padding: 0.6rem 1.2rem;
    border: none;
    transition: all 0.3s ease;
    font-weight: 600;
}

.menu-section .pagination li a:hover {
    background: #d35400; /* برتقالي أغمق عند Hover */
    color: #fff !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

/* للصفحة النشطة */
.menu-section .pagination .active span {
    background: #ff7f50; /* برتقالي فاتح للصفحة الحالية */
    color: #fff !important;
    font-weight: 700;
    box-shadow: 0 5px 15px rgba(0,0,0,0.25);
}

</style>

<!-- Page Header -->
<section class="page-header bg-dark py-5 mt-5">
    <div class="container text-center">
        <h1 class="text-white display-5 fw-bold">قائمة الطعام</h1>
        <p class="text-white lead">اختر من بين أشهى الأطباق لدينا</p>
    </div>
</section>

<!-- Menu Section -->
<section class="menu-section py-5">
    <div class="container">

        <!-- Category Filter -->
        <div class="row mb-5">
            <div class="col-12 text-center">

                <a href="{{ route('front.menu') }}"
                   class="btn btn-outline-primary mx-1 {{ empty($categoryId) ? 'active fw-bold text-decoration-underline' : '' }}">
                    الكل
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('front.menu.filter', $category->id) }}"
                       class="btn btn-outline-primary mx-1 {{ isset($categoryId) && $categoryId == $category->id ? 'active fw-bold text-decoration-underline' : '' }}">
                        {{ $category->name }}
                    </a>
                @endforeach

            </div>
        </div>

        <!-- Products -->
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card h-100 shadow-sm border-0 d-flex flex-column">

                        <!-- Image -->
                        <img src="{{ $product->image ? asset('images/'.$product->image) : asset('images/default.jpg') }}"
                             class="card-img-top rounded-top" alt="{{ $product->name }}" style="height:200px; object-fit:cover;">

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column flex-grow-1">
                            <h5 class="card-title text-center mb-3">{{ $product->name }}</h5>

                            <div class="mt-auto">
                                <span class="d-block text-center fs-5 fw-bold mb-2">{{ $product->price }} جنية</span>
                           <a href="#"
   class="btn btn-success w-100 d-flex align-items-center justify-content-center">
    <i class="fas fa-calendar-check me-2"></i> إحجز أوردر
</a>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <p class="text-center text-muted fs-5">لا توجد منتجات</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>

    </div>
</section>

@endsection
