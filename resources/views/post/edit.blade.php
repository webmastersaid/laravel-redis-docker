@extends('layouts.main')
@section('content')
    <h1>Edit post</h1>
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
            placeholder="{{ old('title', $post->title) }}"><br>
        @error('title')
            {{ $message }}
        @enderror
        <br>
        <label for="content">Content</label><br>
        <textarea name="content" id="content" placeholder="{{ old('content', $post->content) }}">
            {{ old('content', $post->content) }}
        </textarea><br>
        @error('content')
            {{ $message }}
        @enderror
        <br>
        <input type="submit" value="Save">
    </form>
    <a href="{{route('post.show', $post->id)}}">Go to post</a>
@endsection
