<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel App</title>
    <!-- Include any CSS or JS libraries here -->
    <style>
        /* Example CSS */
        body { font-family: Arial, sans-serif; }
        nav { background-color: #333; color: #fff; padding: 10px; }
        nav a { color: #fff; margin-right: 10px; }
        .container { margin: 20px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('posts.index') }}">Posts</a>
        <a href="{{ route('profile.show') }}">Profile</a>
        @auth
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
