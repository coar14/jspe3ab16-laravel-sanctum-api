<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <p>You are logged in!</p>
@endsection
