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
  <link href="{{ asset('assets/vendor/icons/font-awesome/css/fontawesome-all.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icons/themify-icons/themify-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icons/material-design-iconic-font/css/materialdesignicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icons/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/admin/style.css') }}" rel="stylesheet">
  
  <!-- JS File -->
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  
  
</head>
<body>
  <!-- Preloader -->
  <div class="preloader">
      <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
      </div>
  </div>
  <!-- Main wrapper -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
      data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      <!-- Topbar header -->
      <header class="topbar" data-navbarbg="skin5">
          <nav class="navbar top-navbar navbar-expand-md navbar-light">
              <div class="navbar-header" data-logobg="skin6">
                <a class="navbar-brand" href="dashboard.html">
                  <!-- Logo icon -->
                  <b class="logo-icon"></b>
                  <!--End Logo icon -->
                  <!-- Logo text -->
                  <span class="logo-text"><span style="color: #1bbd36">Ruby</span>Label
                  </span>
                </a>
                <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                      href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
              </div>

               <!-- User profile-->
              <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                  <ul class="navbar-nav ms-auto d-flex align-items-center">
                      <li>
                          <a class="profile-pic" href="#">
                              <!-- <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                  class="img-circle"> --><span style='font-size: 1.575rem;' class="text-white font-medium">{{ Auth::user()->name }}</span></a>
                      </li>
                    <li>
                        <a class="profile-pic"  href="{{ route('logout') }}">
                            <span class='fa-stack fa-lg'>
                                <i class='far fa-square fa-stack-2x'></i>
                                <i class='fas fa-sign-out-alt fa-stack-1x'></i>
                            </span>
                        </a>
                    </li>
                  </ul>
                  <i class="fa fa-sign-out" aria-hidden="true"></i>
              </div>
          </nav>
      </header>
      
      <!-- Left Sidebar -->
    <aside class="left-sidebar" data-sidebarbg="skin6">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
              <ul id="sidebarnav">
                  <li class="sidebar-item pt-2">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard.index') }}"
                          aria-expanded="false">
                          <i class="far fa-clock" aria-hidden="true"></i>
                          <span class="hide-menu">Dashboard</span>
                      </a>
                  </li>
                  <li class="sidebar-item pt-2">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('about.index') }}"
                          aria-expanded="false">
                          <i class=" far fa-address-card" aria-hidden="true"></i>
                          <span class="hide-menu">About</span>
                      </a>
                  </li>
                  <li class="sidebar-item pt-2">
                      <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('banner.index') }}"
                          aria-expanded="false">
                          <i class="far fa-image" aria-hidden="true"></i>
                          <span class="hide-menu">Banner</span>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>

    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">{{ $sub_name }}</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield('main')
        </div>
    </div>
  </div>
  
  <!-- The Modal -->
  <div class="modal" id="confirmModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="confirm" type="button" class="btn btn-primary" data-dismiss="modal">Đồng ý</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-sticky/jquery.sticky.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>

  <script src="{{ asset('assets/js/admin/sidebarmenu.js') }}"></script>
  <script src="{{ asset('assets/js/admin/app-style-switcher.js') }}"></script>
  <script src="{{ asset('assets/js/admin/custom.js') }}"></script>
  <script src="{{ asset('assets/js/admin/waves.js') }}"></script>
  @yield('include-js')
</body>

</html>