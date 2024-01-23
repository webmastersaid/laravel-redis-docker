@extends('layouts.main')
@section('content')
    <h1>{{ $post->title }}</h1>
    <form action="{{ route('post.destroy', $post->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
    </form>
    <a href="{{route('post.edit', $post->id)}}">Update</a>
    <p>{{ $post->content }}</p>
    <div>Likes: {{ $post->likes }}</div>
    <a href="{{ route('post.index') }}">Go to posts</a>
@endsection
