@extends('layouts.main')
@section('content')
    <h1>Create post</h1>
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="{{ old('title') }}"><br>
        @error('title')
            {{ $message }}
        @enderror
        <br>
        <label for="content">Content</label><br>
        <textarea name="content" id="content" placeholder="{{ old('content') }}">
            {{ old('content') }}
        </textarea><br>
        @error('content')
            {{ $message }}
        @enderror
        <br>
        <input type="submit" value="Save">
    </form>
    <a href="{{route('post.index')}}">Go to posts</a>
@endsection
