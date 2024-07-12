<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label for="name">Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
        <button type="submit">Register</button>
    </form>
@endsection
