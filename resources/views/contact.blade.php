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
   <title>Kontak</title>
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
         <a href="{{ route('index') }}" class="logo">
         <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="40">
         </a>
      </div>
      <div class="main-nav">
         <div class="container">
            {{-- Navbar --}}
            @include('components.home.navbar', ['categories' => App\Models\Category::all()])
         </div>
      </div>
   </div>

   <div class="contact-info-area pt-100 pb-70">
         <div class="container mt-4">
            <div class="row">
               <div class="col-sm-6 col-lg-4">
                  <div class="contact-info">
                     <i class="icofont-location-pin"></i>
                     <span>Lokasi:</span>
                     <a href="#">Jl. Kp. Lb. Gempol, Panancangan, Kec. Cipocok Jaya, Kota Serang, Banten 42124</a>
                  </div>
               </div>
               <div class="col-sm-6 col-lg-4">
                  <div class="contact-info">
                     <i class="icofont-ui-call"></i>
                     <span>Telpon:</span>
                     <a href="#">(0254) 280257</a>
                  </div>
               </div>
               <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                  <div class="contact-info">
                     <i class="icofont-ui-email"></i>
                     <span>Email:</span>
                     <a href="#">darulirfan20@gmail.com</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="contact-area pb-70">
         <div class="container">
            <form id="contactForm">
               <h2>Kirim pesan</h2>
               @csrf
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>
                        <i class="icofont-user-alt-3"></i>
                        </label>
                        <input type="text" name="name" class="form-control" placeholder="Nama" required data-error="Mohon masukkan nama">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>
                        <i class="icofont-ui-email"></i>
                        </label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required data-error="Mohon masukkan email">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>
                        <i class="icofont-ui-call"></i>
                        </label>
                        <input type="text" name="phone" placeholder="No. HP" required data-error="Mohon masukkan nomor HP" class="form-control">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>
                        <i class="icofont-notepad"></i>
                        </label>
                        <input type="text" name="subject" class="form-control" placeholder="Subjek" required data-error="Mohon masukkan subjek pesan">
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label>
                        <i class="icofont-comment"></i>
                        </label>
                        <textarea name="message" class="form-control" cols="30" rows="8" placeholder="Tulis pesan" required data-error="Mohon masukkan pesan yang akan dikirim"></textarea>
                        <div class="help-block with-errors"></div>
                     </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                  </div>
                  <div class="col-lg-12">
                     <button type="submit" class="btn common-btn">
                     Kirim
                     </button>
                     <div id="msgSubmit" class="h3 text-center hidden"></div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="map-area">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.111500510765!2d106.19205869999999!3d-6.1156893000000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e41f51d41a5109d%3A0x82a8fc6f854fef21!2sYayasan%20Darul%20Irfan!5e0!3m2!1sid!2sid!4v1667531837917!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="map"></iframe>
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
   <script>
      /*==============================================================*/
      // Contact Form  JS
      /*==============================================================*/
      (function ($) {
          "use strict"; // Start of use strict
          $("#contactForm").validator().on("submit", function (event) {
              if (event.isDefaultPrevented()) {
                  formError();
                  submitMSG(false, "Did you fill in the form properly?");
              }
              else {
                  event.preventDefault();
                  submitForm();
              }
          });

          function submitForm(){
              // Initiate Variables With Form Content
              const name = $("[name='name']").val();
              const email = $("[name='email']").val();
              const msg_subject = $("[name='subject']").val();
              const phone_number = $("[name='phone']").val();
              const message = $("[name='message']").val();
              const token = '{{ csrf_token() }}';

              $('[type="submit"]').text('Mengirim...');
              $('[type="submit"]').attr('disabled', '');

              $.ajax({
                  type: "POST",
                  url: "{{ route('contact.store') }}",
                  data: "name=" + name + "&email=" + email + "&subject=" + msg_subject + "&phone=" + phone_number + "&message=" + message + '&_token=' + token,
                  success : function(text){
                      if (text == "success"){
                          formSuccess();
                      }
                      else {
                          formError();
                          submitMSG(false,text);
                      }
                  }
              });
          }
          function formSuccess(){
            $('[type="submit"]').text('Kirim');
              $('[type="submit"]').removeAttr('disabled', '');
              $("#contactForm")[0].reset();
              submitMSG(true, "Pesan telah dikirim!")
          }
          function formError(){
              $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                  $(this).removeClass();
              });
          }
          function submitMSG(valid, msg){
              if(valid){
                  var msgClasses = "h4 tada animated text-success";
              }
              else {
                  var msgClasses = "h4 text-danger";
              }
              $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
          }

      }(jQuery)); // End of use strict
   </script>
</body>
</html>