<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Broobe - @yield('title')</title>
    <!--VITE-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body style="background-color: #76a6d5">
    <div class="container">
        <main class="main border-none rounded p-3 my-5">
            <nav class="menu">
                <a class="menu__item mx-2 {{ request()->routeIs('run-metric.index') ? 'active' : '' }}" href="{{ route('run-metric.index') }}">Run Metric</a>
                <a class="menu__item mx-2 {{ request()->routeIs('metric-history.index') ? 'active' : '' }}" href="{{ route('metric-history.index') }}">Metric History</a>
            </nav>
            @yield('content')
        </main>
    </div>
</body>

</html>