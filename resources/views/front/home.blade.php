
    @extends('front.layout.app')

@section('title')
    الصفحة الرئيسية
@endsection

    @section('front_content')



    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
<h1 class="display-3 fw-bold text-white mb-4">
    متعة الطعم في <span style="color: #ffc107;">كل وجبة</span>
</h1>
                    <p class="lead text-white mb-5 ">         استمتع بأشهى المأكولات مع كل لقمة
                    <div class="hero-buttons">

                        <a href="#qrcode" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-qrcode"></i> مسح الباركود
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">لماذا نحن الأفضل؟</h2>
                    <p class="text-muted">نقدم لك تجربة طعام لا تُنسى</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>جودة عالية</h4>
                        <p class="text-muted">نستخدم أجود المكونات الطازجة</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h4>توصيل سريع</h4>
                        <p class="text-muted">خدمة توصيل سريعة لجميع المناطق</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>فريق محترف</h4>
                        <p class="text-muted">طهاة ذوو خبرة عالية</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- QR Code Section -->
    <section id="qrcode" class="qrcode-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="qrcode-card text-center p-5">
                        <h3 class="mb-4">امسح الباركود لعرض المنيو</h3>
                        <div class="qr-container mb-4">
                            <div id="qrcode-display" class="qr-placeholder">
                                <a href="{{ $appUrl }}" target="_blank" class="d-inline-block mt-3">
    {!! QrCode::size(250)->generate($appUrl) !!}
</a>


                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Dishes -->
    <section class="popular-dishes py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title">  المنتجات العشوية </h2>

                </div>
            </div>
            <div class="row g-4">
                @foreach ($products as $product )


                <div class="col-md-4">
                    <div class="dish-card">

                              <div class=" text-center">
            <img src="{{ $product->image ? asset('images/'.$product->image) : asset('images/default.jpg') }}"
                 alt="{{ $product->name }}"
                 class="img-fluid rounded-top"
                 style="height:200px; object-fit:cover; width:100%;">
        </div>
                        <div class="dish-info p-4">
                            <h5> {{ $product->name }}</h5>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">{{ $product->price }} ج</span>

                            </div>
                        </div>
                    </div>
                </div>

                    @endforeach
            </div>
        </div>
    </section>

    @endsection
