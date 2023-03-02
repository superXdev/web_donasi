<div class="col-sm-6 col-lg-4">
   <div class="blog-item">
      <div class="top">
         <a href="{{ route('blog.show', $slug) }}">
         <img src="{{ asset('storage/'.$thumbnail) }}" alt="Blog">
         </a>
      </div>
      <div class="bottom">
         <ul>
            <li>
               <i class="icofont-calendar"></i>
               <span>{{ $date }}</span>
            </li>
            <li>
               <i class="icofont-user-alt-3"></i>
               <a href="{{ route('blog.author', $author) }}">{{ $author }}</a>
            </li>
         </ul>
         <h3>
            <a href="{{ route('blog.show', $slug) }}">{{ $title }}</a>
         </h3>
         <a class="blog-btn" href="{{ route('blog.show', $slug) }}">Baca selengkapnya</a>
      </div>
   </div>
</div>