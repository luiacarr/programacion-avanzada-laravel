<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div>
                    <a class="text-gray-800 text-xl font-bold" href="{{ url('/') }}">My Application</a>
                </div>
                <div>
                    <a class="text-gray-800 text-sm font-semibold" href="{{ route('posts.index') }}">Posts</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-6">
        <div class="container mx-auto px-6">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white shadow mt-6">
        <div class="container mx-auto px-6 py-3">
            <p class="text-gray-600 text-sm text-center">&copy; {{ date('Y') }} My Application. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>