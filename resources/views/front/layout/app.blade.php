<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.themefisher.com/cafedine-bootstrap/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Apr 2025 15:05:43 GMT -->
<head>
  <meta charset="utf-8">
  <title>CafeDine - Restuarant template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/themify/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/icofont/icofont.min.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/fontawesome/css/all.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/aos/aos.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/video-popup/modal-video.min.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/swiper/swiper.min.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/date-picker/datepicker.min.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/clock-picker/clockpicker.min.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.css">
  <link rel="stylesheet" href="{{ asset('front')}}/plugins/devices.min.css">

  <!-- Main Stylesheet -->
  <link href="{{ asset('front')}}/css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <link rel="icon" href="{{ asset('front')}}/images/favicon.png" type="image/x-icon">

</head>

<body>
  <div class="preloader">
    <img src="{{ asset('front')}}/images/preloader.gif" alt="preloader" class="img-fluid">
  </div>

<!-- Header Start -->

<header class="navigation ">
	<nav class="navbar navbar-expand-lg main-nav py-lg-3 position-absolute w-100" id="main-nav">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="{{ asset('front')}}/images/logo.png" alt="" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navigation"
				aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span>
			</button>

			<div class="collapse navbar-collapse" id="navigation">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Home</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
					<li class="nav-item"><a class="nav-link" href="menu.html">Recipes</a></li>
					<li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">Reservation</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="reservation.html">Reservation</a></li>
							<li><a class="dropdown-item" href="cart.html">Cart</a></li>
							<li><a class="dropdown-item" href="shipping.html">Shipping</a></li>
							<li><a class="dropdown-item" href="payment.html">Payment</a></li>
							<li><a class="dropdown-item" href="confirmation.html">Confirmation</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">Blog</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="blog.html">Blog </a></li>
							<li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
						</ul>
					</li>

					<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>

@yield('front_content')



<!--Footer start -->
<footer class="section footer">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-3 mb-5 mb-lg-0">
				<div class="widget">
					<h4 class="mb-3">About</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, nam!</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="https://www.facebook.com/themefisher"><i
									class="ti-facebook mr-2"></i></a></li>
						<li class="list-inline-item"><a href="https://twitter.com/themefisher"><i class="ti-twitter mr-2 "></i></a>
						</li>
						<li class="list-inline-item"><a href="https://github.com/themefisher/"><i class="ti-github mr-2 "></i></a>
						</li>
						<li class="list-inline-item"><a href="https://dribbble.com/themefisher/"><i
									class="ti-dribbble mr-2 "></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-4 ml-auto col-md-5 mb-5 mb-lg-0">
				<div class="widget">
					<h4 class="mb-3">Contact Info</h4>

					<ul class="list-unstyled mb-0 footer-contact">
						<li><i class="ti-mobile"></i>+1 987 654 3210</li>
						<li><i class="ti-email"></i>mail@support.com</li>
						<li><i class="ti-map"></i>1234 Altschul, New York,NY 10027-0000</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 mb-5 mb-lg-0">
				<div class="widget">
					<h4 class="mb-3">Opening Hours</h4>

					<div class="info mb-4">
						<p class="mb-0">Monday - Thursday</p>
						<h5>10:00 AM - 11:00 PM</h5>
					</div>
					<div class="info">
						<p class="mb-0">Friday - Sunday</p>
						<h5>12:00 AM - 03:00 AM</h5>
					</div>
				</div>
			</div>
		</div>

		<div class="row justify-content-center mt-5">
			<div class="col-lg-6 text-center">
				<h4 class="text-white-50 mb-3">Get latest food recipe at your inbox</h4>
				<form action="#" class="footer-newsletter">
					<div class="form-group">
						<button class="button"><span class="ti-email"></span></button>
						<input type="email" class="form-control" placeholder="Enter Email">
					</div>
				</form>
			</div>
		</div>
	</div>
</footer>

<section class="footer-btm py-3">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="d-md-flex justify-content-between align-items-center py-3 text-center text-md-left">
					<p class="mb-0 ">Copyright &copy; 2019 a theme by <a href="https://themefisher.com/"
							class="text-white">themefisher.com</a></p>

					<div class="footer-menu mt-3 mt-lg-0">
						<ul class="list-inline mb-0">
							<li class="list-inline-item pl-2"><a href="index.html">Home</a></li>
							<li class="list-inline-item pl-2"><a href="about.html">About Us</a></li>
							<li class="list-inline-item pl-2"><a href="gallery.html">Gallery</a></li>
							<li class="list-inline-item pl-2"><a href="policy.html">Privacy Policy</a></li>
							<li class="list-inline-item pl-2"><a href="terms.html">Use of terms</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Footer  End -->

<!-- jQuery -->
<script src="{{ asset('front')}}/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('front')}}/plugins/bootstrap/bootstrap.min.js"></script>
<script src="{{ asset('front')}}/plugins/aos/aos.js"></script>
<script src="{{ asset('front')}}/plugins/shuffle/shuffle.min.js"></script>
<script src="{{ asset('front')}}/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('front')}}/plugins/date-picker/datepicker.min.js"></script>
<script src="{{ asset('front')}}/plugins/clock-picker/clockpicker.min.js"></script>
<script src="{{ asset('front')}}/plugins/video-popup/jquery-modal-video.min.js"></script>
<script src="{{ asset('front')}}/plugins/swiper/swiper.min.js"></script>
<script src="{{ asset('front')}}/plugins/instafeed/instafeed.min.js"></script>
<script src="{{ asset('front')}}/plugins/bootstrap-touchpin/jquery.bootstrap-touchspin.min.js"></script>

 <!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="{{ asset('front')}}/plugins/google-map/gmap.js"></script>
<!-- Main Script -->
<script src="{{ asset('front')}}/js/contact.js"></script>
<script src="{{ asset('front')}}/js/script.js"></script>


<!-- Mirrored from demo.themefisher.com/cafedine-bootstrap/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Apr 2025 15:06:09 GMT -->
</html>
