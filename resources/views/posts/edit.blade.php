<!-- resources/views/posts/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ $post->title }}" required>
        <label for="body">Body</label>
        <textarea id="body" name="body" required>{{ $post->body }}</textarea>
        <button type="submit">Update Post</button>
    </form>
@endsection
