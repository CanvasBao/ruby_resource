<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ruby Label</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  
</head>
<body>  
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

    <div class="mr-auto">
      @if(isset($about['logo_path']))
        <a href="{{ route('home') }}" class="logo"><img src="{{ asset($about['logo_path'] ?? '') }}" alt="" class="img-fluid"></a>
      @else
        <h1 class="logo"><a href="{{ route('home') }}">
          @foreach( $about["company_name_array"] as $key => $name ) @if($key % 2 != 0){{$name}}@else<span>{{$name}}</span>@endif @endforeach 
        </a></h1>
      @endif
    </div>
      <!-- Uncomment below if you prefer to use an image logo -->

      <nav id="header_menu" class="nav-menu d-none d-lg-block">
        <ul>
          <li class=""><a href="{{ route('home') }}">Trang chủ</a></li>
          <li class=""><a href="#">Giới thiệu</a></li>
          <li class=""><a href="#">Sản Phẩm</a></li>
          <li class=""><a href="{{ route('home') }}">Liên hệ</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="zalo"><i class="icofont-id-card"></i></a>
      </div>

    </div>
  </header><!-- End Header -->
  @yield('main')
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>{{ $about['company_name'] ?? '' }}</h3>
            <p>{{ $about['street_address'] ?? '' }}<br>
              {{ $about['area_address'] ?? '' }}<br>
              {{ $about['city_address'] ?? '' }}, {{ $about['country_address'] ?? '' }}<br><br>
              <strong>Phone:</strong> {{ $about['phone'] ?? '' }}<br>
              <strong>Email:</strong> {{ $about['email'] ?? '' }}<br>
            </p>
          </div>
          <div class="col-md-6 footer-links">
            <h4>Sản Phẩm</h4>
            <ul>
              <div class="d-flex align-content-stretch flex-wrap">
                <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">About</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </div>
            </ul>
          </div>
          <div class="col-lg-1 col-md-6">
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
              <h4>Liên Hệ</h4>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="zalo"><i class="bx bxs-id-card"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-2">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>Company</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
  <script>
    activeMenu = {{ $active }};
  </script>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>