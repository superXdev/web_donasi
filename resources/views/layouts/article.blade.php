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
         <a href="index.html" class="logo">
         <img src="{{ asset('assets/img/logo-two.png') }}" alt="Logo">
         </a>
      </div>
      <div class="main-nav">
         <div class="container">
            {{-- Navbar --}}
            @include('components.home.navbar', ['categories' => $categories])
         </div>
      </div>
   </div>
   <div class="donation-details-area ptb-100" style="padding-top: 100px;">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
               <div class="details-item">
                  <div class="details-img">
                  	<h2>{{ $title }}</h2>
                     <p class="text-secondary" style="margin: -10px 0 20px 0; font-size: 17px;">
                        <i class="icofont-folder"></i> <a href="{{ route('blog.category', $category->slug) }}" style="color: #ff6015; margin-right: 10px">{{ $category->name }}</a>
                        <i class="icofont-calendar"></i> {{ $date }}
                     </p>
                     <img src="{{ asset('storage/'.$image) }}" alt="Details">
                     @yield('body')
                  </div>
                  <div class="details-share">
                     <div class="row">
                        <div class="col-sm-6 col-lg-6">
                           <div class="left">
                              <ul>
                                 <li>
                                    <span>Share:</span>
                                 </li>
                                 <li>
                                    <a href="#" target="_blank">
                                    <i class="icofont-facebook"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" target="_blank">
                                    <i class="icofont-twitter"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" target="_blank">
                                    <i class="icofont-youtube-play"></i>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#" target="_blank">
                                    <i class="icofont-instagram"></i>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-sm-6 col-lg-6">
                           <div class="right">
                              <ul>
                                 <li>
                                    <span>Penulis:</span>
                                 </li>
                                 <li>
                                    <a href="{{ route('blog.author', $author) }}">{{ $author }}</a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  {{-- Payment section --}}
               </div>
            </div>
            <div class="col-lg-4">
               {{-- Widget area --}}
               @include('components.home.widget', ['posts' => $posts, 'categories' => $categories])
            </div>
         </div>
      </div>
   </div>
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