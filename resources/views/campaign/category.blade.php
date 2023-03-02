@extends('layouts.blog', [
	'title' => 'Kategori: '.$category_name,
	'categories' => $categories
])

@section('body')

@forelse($posts as $post)
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