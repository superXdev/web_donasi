<div class="widget-area">
   <div class="search widget-item">
      <form action="{{ route('blog.search') }}" method="GET">
         <input type="text" name="keyword" class="form-control" placeholder="Search..." required>
         <button type="submit" class="btn">
         <i class="icofont-search-1"></i>
         </button>
      </form>
   </div>
   <div class="post widget-item">
      <h3>Artikel lainnya</h3>
      @foreach($posts as $post)
      <div class="post-inner">
         <ul class="align-items-center">
            <li>
               <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="Details">
            </li>
            <li>
               <h4>
                  <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
               </h4>
               <p> <a href="{{ route('blog.author', $post->author) }}">{{ $post->author }}</a></p>
            </li>
         </ul>
      </div>
      @endforeach
   </div>
   <div class="common-right-content widget-item">
      <h3>Kategori</h3>
      <ul>
         @foreach($categories as $category)
         <li>
            <a href="{{ route('blog.category', $category->slug) }}">{{ $category->name }} ({{ $category->posts->count() }})</a>
         </li>
         @endforeach
      </ul>
   </div>
</div>