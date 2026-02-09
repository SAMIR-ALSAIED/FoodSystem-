<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>

    <!-- Bootstrap RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('front')}}/css/style.css">
</head>
<body>
    <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a  class="navbar-brand" href="{{ route('front.home') }}">
                <i class="fas fa-utensils"></i> مطعمنا
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link " href=" {{ route('front.home') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.menu') }}">قائمة الطعام</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="reservation.html">الحجز</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('front_content')


    <!-- Footer -->
<footer class="footer bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- عن المطعم -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold"><i class="fas fa-utensils"></i> مطعم الذواقة</h5>
                <p class="text-light">
                    نقدم أشهى الأطباق العربية والعالمية مع خدمة ممتازة وأجواء مريحة لعائلتك وأصدقائك.
                </p>
            </div>

            <!-- روابط سريعة -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">روابط سريعة</h5>
                <ul class="list-unstyled">
                    <li><a href="index.html" class="text-light text-decoration-none">الرئيسية</a></li>
                    <li><a href="menu.html" class="text-light text-decoration-none">قائمة الطعام</a></li>
                    <li><a href="about.html" class="text-light text-decoration-none">من نحن</a></li>
                    <li><a href="contact.html" class="text-light text-decoration-none">اتصل بنا</a></li>
                </ul>
            </div>

            <!-- تواصل معنا -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">تواصل معنا</h5>
                <p class="text-light mb-1">
                    <i class="fas fa-phone me-2"></i> 0123456789
                </p>
                <p class="text-light mb-1">
                    <i class="fas fa-envelope me-2"></i> info@restaurant.com
                </p>
                <p class="text-light mb-0">
                    <i class="fas fa-map-marker-alt me-2"></i> القاهرة، مصر
                </p>
            </div>
        </div>

        <hr class="border-light">

        <!-- حقوق النشر -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-3">
            <p class="mb-0 text-light">&copy; 2024 مطعم الذواقة. جميع الحقوق محفوظة.</p>
            <p class="mb-0 text-light">أفضل تجربة طعام لعائلتك وأصدقائك!</p>
        </div>
    </div>
</footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('front')}}/js/main.js"></script>
</body>
</html>
