<!DOCTYPE html>
<html lang="zxx">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/modal-video.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/lightbox.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/theme-dark.css') }}">
   <title>{{ $title }}</title>
   <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
   <style>
      .donation-item:hover h3, 
      .donation-item:hover .inner ul li, 
      .donation-item:hover .inner span {
         color: white !important;
      }
   </style>
</head>
<body>
   <div class="loader">
      <div class="d-table">
         <div class="d-table-cell">
            <div class="pre-box-one">
               <div class="pre-box-two"></div>
            </div>
         </div>
      </div>
   </div>
   <div class="navbar-area sticky-top">
      <div class="mobile-nav">
         <a href="{{ route('index') }}" class="logo">
         <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="40">
         </a>
      </div>
      <div class="main-nav">
         <div class="container">
            {{-- Navbar --}}
            @include('components.home.navbar', ['categories' => $categories])
         </div>
      </div>
   </div>

   {{-- Banner area --}}
   <div class="banner-area-two three">
      <div class="banner-slider owl-theme owl-carousel">
         <div class="banner-slider-item banner-img-four">
            <div class="d-table">
               <div class="d-table-cell">
                  <div class="container">
                     <div class="banner-content">
                        <h1>Berikan bantuan kepada semua yang membutuhkan</h1>
                        <div class="banner-btn-area">
                           <a class="common-btn" href="#">Mulai Berdonasi</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="banner-slider-item banner-img-six">
            <div class="d-table">
               <div class="d-table-cell">
                  <div class="container">
                     <div class="banner-content">
                        <h1>Uluran tanganmu sangat berarti bagi mereka</h1>                        
                        <div class="banner-btn-area">
                           <a class="common-btn" href="#donasi">Mulai Berdonasi</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   {{-- Donation area --}}
   <section class="donations-area three pt-100 pb-70" id="donasi">
      <div class="container">
         <div class="section-title">
            <h2>Penggalangan terbaru</h2>
         </div>
         <div class="row">
            @yield('donation')
         </div>
      </div>
   </section>

   {{-- Blog section --}}
   <section class="blog-area pb-70" style="padding-top: 40px">
      <div class="container">
         <div class="section-title">
            <h2>Blog</h2>
         </div>
         <div class="row">
            @yield('blog')
         </div>
      </div>
   </section>

   <footer class="footer-area">
      <div class="container">
         <div class="copyright-area">
            <p>
               Copyright @<script>document.write(new Date().getFullYear())</script> <a href="{{ route('index') }}">Darulirfan</a>
            </p>
         </div>
      </div>
   </footer>
   <div class="go-top">
      <i class="icofont-arrow-up"></i>
      <i class="icofont-arrow-up"></i>
   </div>
   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
   <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
   <script src="{{ asset('assets/js/jquery-modal-video.min.js') }}"></script>
   <script src="{{ asset('assets/js/wow.min.js') }}"></script>
   <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
   <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
   <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
   <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>