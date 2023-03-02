@extends('layouts.campaign', [
	'id' => $campaign->id,
	'title' => $campaign->title, 
	'image' => $campaign->thumbnail,
	'author' => $campaign->author,
	'category' => $campaign->category,
	'date' => $campaign->created_at->format('d M, Y'),
	'posts' => $campaigns,
	'categories' => $categories,
	'donations' => $donations,
	'raised' => $campaign->raised,
	'goals' => $campaign->goals
])

@section('body')
{!! $campaign->body !!}
@endsection