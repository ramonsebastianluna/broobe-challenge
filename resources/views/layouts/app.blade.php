<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Broobe - @yield('title')</title>
    <!--VITE-->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <a href="{{ route('run-metric.index') }}">Run Metric</a>
    <a href="{{ route('metric-history.index') }}">Metric History</a>
    @yield('content')
</body>

</html>