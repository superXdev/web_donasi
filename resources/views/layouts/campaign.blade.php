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
      
      @media only screen and (min-width: 600px) {
         .details-payment {
            margin-top: 5rem !important;
         }
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
   <div class="donation-details-area ptb-100" style="padding-top: 100px;">
      <div class="container">
         <div class="row">
            <div class="col-lg-7">
               <div class="details-item">
                  <div class="details-img">
                  	<h2>{{ $title }}</h2>
                     <div class="d-flex justify-content-between w-full pb-3">
                        <div>
                           <p style="margin: -10px 0 0 0; font-size: 24px;color: #ff6015; font-weight: bold;">Rp {{ number_format($raised, 0, '.',',') }}</p>
                           <p>Terkumpul dari <b>Rp {{ number_format($goals, 0, '.',',') }}</b></p>
                        </div>
                        <div>
                           <p class="text-secondary" style="margin: -10px 0 10px 0; font-size: 17px;">
                              <i class="icofont-calendar"></i> {{ $date }}
                           </p>
                        </div>
                     </div>
                     
                     
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
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-5">
               <div class="details-payment p-4 mt-3" style="background-color: #f3f3f3; border-radius: 10px;">
                  <form action="{{ route('donation.store', $id) }}" method="POST">
                     @csrf
                     <div class="form-group mt-2">
                        <label for="nama">Nominal</label>
                        <input required type="number" class="form-control" name="amount" min="1000" step="1000">
                     </div>
                     <div class="form-group mt-2">
                        <div class="row">
                           <div class="col-md-6">
                              <label for="name">Nama</label>
                              <input required type="text" class="form-control" name="name">
                           </div>
                           <div class="col-md-6">
                              <label for="nama">No. HP</label>
                              <input required type="text" class="form-control" name="phone">
                           </div>
                        </div>
                     </div>
                     <div class="form-group mt-2">
                        <label for="nama">Email</label>
                        <input required type="email" class="form-control" name="email">
                     </div>
                     <div class="form-group mt-2">
                        <label for="nama">Alamat lengkap</label>
                        <textarea required name="address" id="" cols="30" rows="4" class="form-control"></textarea>
                     </div>
                     <div class="mt-3">
                        <button type="submit" class="btn common-btn w-100">Donasi</button>
                     </div>
                  </form>   
               </div>

               <div class="mt-5">
                  <h4>Donatur <span class="sub-span">{{ $donations->count() }}</h4>
                  <input type="text" class="form-control py-2" placeholder="Cari donatur" id="cari-donatur">
                  <hr>
                  <div id="donatur">
                  @foreach($donations->latest()->limit(6)->get() as $donation)
                     <div>
                        <h5 style="color: #ff6015;">{{ $donation->name }}</h5>
                        <p>Berdonasi sebesar <b>Rp {{ number_format($donation->amount, 0, '.',',') }}</b></p>
                        <p style="margin-top: -10px; font-size: 12px">{{ $donation->created_at->diffForHumans() }}</p>
                        <hr>
                     </div>
                  @endforeach
                  </div>
               </div>
               <div class="mt-5">
                  @include('components.home.widget-campaign', ['campaigns' => $campaigns])
               </div>
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
   <script src="https://cdn.jsdelivr.net/npm/fuse.js@6.6.2"></script>

   <script>
      let list = [];

      $(document).ready(function () {
         $.get('{{ route('api.donatur') }}?id={{ $id }}', function(data) {
            list = data;
         });
      });

      $('#cari-donatur').keyup(function() {
         const keyword = $(this).val();

         const options = {
           keys: [
             "name"
           ]
         };

         const fuse = new Fuse(list, options);
         const result = fuse.search(keyword);

         let donatur = '';

         if(keyword == '') {
            list.slice(0, 6).forEach(data => {
               donatur += `
               <div>
                  <h5 style="color: #ff6015;">${data.name}</h5>
                  <p>Berdonasi sebesar <b>Rp ${parseInt(data.amount).toLocaleString()}</b></p>
                  <p style="margin-top: -10px; font-size: 12px">${timeSince(new Date(data.created_at))}</p>
                  <hr>
               </div>
               `;
            });
         } else {
            result.forEach(({ item }) => {
               donatur += `
               <div>
                  <h5 style="color: #ff6015;">${item.name}</h5>
                  <p>Berdonasi sebesar <b>Rp ${parseInt(item.amount).toLocaleString()}</b></p>
                  <p style="margin-top: -10px; font-size: 12px">${timeSince(new Date(item.created_at))}</p>
                  <hr>
               </div>
               `;
            });
         }

         

         $('#donatur').html(donatur);
      });

      function timeSince(date) {

         let seconds = Math.floor((new Date() - date) / 1000);

         let interval = seconds / 31536000;

         if (interval > 1) {
            return Math.floor(interval) + " years ago";
         }

         interval = seconds / 2592000;
         if (interval > 1) {
            return Math.floor(interval) + " months ago";
         }

         interval = seconds / 86400;
         if (interval > 1) {
            return Math.floor(interval) + " days ago";
         }

         interval = seconds / 3600;
         if (interval > 1) {
            return Math.floor(interval) + " hours ago";
         }

         interval = seconds / 60;
         if (interval > 1) {
            return Math.floor(interval) + " minutes ago";
         }

         return Math.floor(seconds) + " seconds ago";
      }
   </script>
</body>
</html>