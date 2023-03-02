<div class="widget-area">
   <div class="post widget-item">
      <h3>Penggalangan lainnya</h3>
      @foreach($campaigns as $campaign)
      <div class="post-inner">
         <ul class="align-items-center">
            <li>
               <img src="{{ asset('storage/'.$campaign->thumbnail) }}" alt="Details">
            </li>
            <li>
               <h4>
                  <a href="{{ route('campaign.show', $campaign->slug) }}">{{ $campaign->title }}</a>
               </h4>
               <p>{{ $campaign->deadline }}</p>
            </li>
         </ul>
      </div>
      @endforeach
   </div>
</div>