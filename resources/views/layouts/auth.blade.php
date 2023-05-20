<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>@yield('title')Warehouse Management System</title>
</head>
<body>

<header class="p-3 text-bg-dark">
    <div class="container justify-content-between">
        <div class="d-flex flex-wrap align-items-center justify-content-between justify-content-lg-between"
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h2>Warehouse Inventory Management System</h2>
            </a>
            <div class="text-end">
                <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-info">Sign-up</a>
            </div>
        </div>
</header>

<main class="mt-5 pt-3">
    @yield('content')
</main>

</body>
</html>
