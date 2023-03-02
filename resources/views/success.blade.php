<!DOCTYPE html>
<html lang="zxx">
   <!-- Mirrored from templates.hibootstrap.com/findo/default/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Apr 2022 14:13:40 GMT -->
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
      <title>Terima kasih!</title>
      <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
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
      <div class="container">
         <div class="vh-100 d-flex align-items-center justify-content-center">
            <div class="text-center">
               <h1 class="text-secondary">Terima kasih!</h1>
               <h3>Donasi kamu telah diterima.</h3>
               <div class="py-4" style="text-align: left;">
                  <ul class="list-group">
                    <li class="list-group-item p-3">Pembayaran : <span style="color: #ff6015;">{{ $donation->payment_method }}</span> </li>
                    <li class="list-group-item p-3">Nominal : <b>Rp {{ number_format($donation->amount, 0, '.',',') }}</b></li>
                    <li class="list-group-item p-3">Waktu : {{ $donation->created_at->format('d-m-Y H:m:s') }}</li>
                  </ul>
               </div>
               <a class="common-btn" href="{{ route('index') }}">Halaman depan</a>
            </div>
         </div>
      </div>
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
   <!-- Mirrored from templates.hibootstrap.com/findo/default/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Apr 2022 14:13:40 GMT -->
</html>