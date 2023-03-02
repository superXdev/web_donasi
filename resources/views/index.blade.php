@extends('layouts.home', [
	'title' => 'Home',
	'categories' => \App\Models\Category::all()
])

@section('donation')
@foreach(\App\Models\Campaign::limit(6)->get() as $campaign)

<div class="col-sm-6 col-lg-4">
   <div class="donation-item">
      <div class="img">
         <img src="{{ asset('storage/'.$campaign->thumbnail) }}" alt="Donation">
      </div>
      <div class="top pt-3">
         <h3>
            <a href="{{ route('campaign.show', $campaign->slug) }}">
            {{ $campaign->title }}
            </a>
         </h3>
      </div>
      <div class="inner">
         <div class="bottom">
            <div class="skill">
               <div class="skill-bar wow fadeInLeftBig" style="width: {{ ($campaign->raised / $campaign->goals) * 100 }}%">
                  <span class="skill-count4">{{ ($campaign->raised / $campaign->goals) * 100 >= 10 ? (($campaign->raised / $campaign->goals) * 100).'%' : '' }}</span>
               </div>
            </div>
            <ul>
               <li class="text-dark">Target: Rp.{{  number_format($campaign->goals, 0, '.',',') }}</li>
               <li class="text-dark"><b>{{ $campaign->deadline }}</b></li>
            </ul>
            <h4><span>{{ 
               $campaign->donations()
                  ->where('campaign_id', $campaign->id)
                  ->where('status', 'PAID')
                  ->count('id')
            }} donatur</span></h4>
         </div>
      </div>
   </div>
</div>

@endforeach
@endsection

@section('blog')

@forelse(\App\Models\Post::limit(6)->get() as $post)
	@include('components.home.article-card', [
		'title' => $post->title,
		'thumbnail' => $post->thumbnail,
		'date' => $post->created_at->format('d M, Y'),
		'author' => $post->author,
		'slug' => $post->slug
	])
@empty
<div class="text-center vh-100">
	<h4>Tidak ada artikel</h4>
</div>
@endforelse

@endsection