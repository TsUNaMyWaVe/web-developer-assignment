<!DOCTYPE html>
<html lang="en">

<head>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/02f4a8a6ea.js" crossorigin="anonymous"></script>
    @laravelViewsStyles
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{ asset('style.css') }}>
    <title>Books Database</title>
</head>

<body>
    @include('partials._flash-message')
    @laravelViewsScripts
    <h1><a href="/">Books Database</a></h1>
    @yield('content')
</body>

</html>
