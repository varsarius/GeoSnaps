<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GeoSnaps</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<img src="{{asset('favicon.png')}}" alt="to main">

@yield('content')

</body>
</html>
