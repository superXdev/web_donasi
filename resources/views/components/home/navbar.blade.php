<nav class="navbar navbar-expand-md navbar-light">
   <a class="navbar-brand" href="{{ route('index') }}">
   <img src="{{ asset('assets/img/logo.png') }}" class="logo-one" alt="Logo">
   <img src="{{ asset('assets/img/logo.png') }}" class="logo-two" alt="Logo">
   </a>
   <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link">Home</a>
         </li>
         <li class="nav-item">
            <a href="{{ route('index') }}#donasi" class="nav-link">Donasi</a>
         </li>
         <li class="nav-item">
            <a href="#" class="nav-link dropdown-toggle">Blog <i class="icofont-simple-down"></i></a>
            <ul class="dropdown-menu">
               <li class="nav-item">
                  @foreach($categories as $category)
                  <a href="{{ route('blog.category', $category->slug) }}" class="nav-link">{{ $category->name }}</a>
                  @endforeach
               </li>
            </ul>
         </li>
         <li class="nav-item">
            <a href="{{ route('contact') }}" class="nav-link">Kontak</a>
         </li>
      </ul>
   </div>
</nav>