@extends('layouts.main')
@section('content')
    <h1>Posts</h1>
    <a href="{{ route('post.create') }}">Create post</a>
    @foreach ($posts as $post)
        <div>
            <h2><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->content }}</p>
            <small>Likes: {{ $post->likes }}</small>
        </div>
    @endforeach
@endsection
