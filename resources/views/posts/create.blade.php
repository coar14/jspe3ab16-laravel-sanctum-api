<!-- resources/views/posts/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ old('title') }}" required>
        <label for="body">Body</label>
        <textarea id="body" name="body" required>{{ old('body') }}</textarea>
        <button type="submit">Create Post</button>
    </form>
@endsection
