@extends('layouts.article', [
	'title' => $post->title, 
	'image' => $post->thumbnail,
	'author' => $post->author,
	'category' => $post->category,
	'date' => $post->created_at->format('d M, Y'),
	'posts' => $posts,
	'categories' => $categories
])

@section('body')
{!! $post->body !!}
@endsection