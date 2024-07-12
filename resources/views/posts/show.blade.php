<!-- resources/views/posts/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <h2>Comments:</h2>
    @foreach($post->comments as $comment)
        @include('comments._comment', ['comment' => $comment])
    @endforeach
    <form method="POST" action="{{ route('comments.store', $post) }}">
        @csrf
        <label for="body">Add Comment:</label>
        <textarea id="body" name="body" required>{{ old('body') }}</textarea>
        <button type="submit">Post Comment</button>
    </form>
@endsection
