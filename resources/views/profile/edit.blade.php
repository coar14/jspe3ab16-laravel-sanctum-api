<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Profile</h1>
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ $user->name }}" required>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ $user->email }}" required>
        <label for="password">New Password</label>
        <input id="password" type="password" name="password">
        <label for="password_confirmation">Confirm New Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation">
        <button type="submit">Update Profile</button>
    </form>
@endsection
