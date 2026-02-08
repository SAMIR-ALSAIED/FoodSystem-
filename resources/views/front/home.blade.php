
@extends('front.layout.app')


@section('front_content')


<section class="slider-hero hero-slider  hero-style-1  ">
  <div class="swiper-container swiper-container-horizontal">
    <div class="swiper-wrapper">
      <!-- start slide-item -->
      <div class="swiper-slide slide-item">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="{{ asset('front')}}/images/banner/slide-1.jpg">
          <!-- <div class="overlay"></div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Welcome to restuarant</span>
                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">Fresh,Delicious meal to reach your optimum health and fitness</h1>
                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">View Menu</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slide-item -->

      <!-- start slide-item -->
      <div class="swiper-slide slide-item">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="{{ asset('front')}}/images/banner/slide-2.jpg">
          <!-- <div class="overlay"></div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Welcome to restuarant</span>
                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">Good food starts with good ingridients.Have a great time with us</h1>
                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">View Menu</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slide-item -->

      <!-- start slide-item -->
      <div class="swiper-slide slide-item">
        <div class="slide-inner slide-bg-image main-sider-inner" data-background="{{ asset('front')}}/images/banner/slide-3.jpg">
          <!-- <div class="overlay"></div> -->
          <div class="container">
            <div class="row">
              <div class="col-lg-7">
                <span data-swiper-parallax="300" class="text-primary font-extra font-md">Welcome to restuarant</span>
                <h1 class="mt-3 mb-5 text-lg text-white" data-swiper-parallax="400">We deliver good quality food with great service to our customers</h1>
                <a href="menu.html" class="btn btn-main mr-3" data-swiper-parallax="500">View Menu</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slide-item -->
    </div>
    <!-- end swiper-wrapper -->
    <!-- swipper controls -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
</section>
<!--  Banner End -->




<!-- CTA  End -->

<!-- DISHES start -->
<section class="section menu py-5 bg-light">
    <div class="container">
        <!-- عنوان القسم -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="text-primary font-extra font-md">المنتجات</span>
                <h2 class="mt-2 mb-4">اكتشف أفضل منتجاتنا بجودة عالية</h2>
            </div>
        </div>

        <!-- المنتجات -->
        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card product-card shadow-sm border-0 h-100">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $product->image ? asset('images/' . $product->image) : asset('images/default.jpg') }}"
                                 alt="{{ $product->name }}"
                                 class="card-img-top img-fluid"
                                 style="height:250px; object-fit:cover;">
                            <!-- Hover overlay -->
                            <div class="overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                 style="background: rgba(0,0,0,0.4); opacity:0; transition:0.3s;">
                                <a href="#" class="btn btn-light">عرض التفاصيل</a>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <h6 class="text-primary font-weight-bold">{{ $product->price }}$</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- زر عرض كل المنتجات -->

    </div>
</section>

<!-- تحسينات CSS -->



<!-- DISHES  End -->

<!--App start -->
<section class="section download py-5 bg-light">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-6 text-center mb-4 mb-md-0">
                <h3 class="mb-3">Scan QR Code to Download</h3>

                <div class="qr-code mx-auto" style="width:250px; height:250px;">
                    {{-- QR Code ديناميكي --}}
                    {!! QrCode::size(250)->generate($appUrl) !!}
                </div>

                <p class="mt-3">افتح الرابط لمسح الكود وتحميل التطبيق</p>
            </div>
        </div>
    </div>
</section>



<!-- App  End -->

<!-- CTA start -->
<section class="section cta">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 text-center">
				<span class="font-extra text-md-2 text-white-70">Prepare The Best Dishes</span>
				<h2 class="mt-3 text-white mb-4">Come & Experience Our Best of World Class Cousine</h2>

				<a href="#" class="btn btn-white">book now</a>
			</div>
		</div>
	</div>
</section>

@endsection
