<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body class="antialiased">
<h1 class="bg-gray-100 text-xl">This is the father element</h1>
<a class="bg-red-50" href="{{route('register')}}">Injected content should be under me</a>
@yield('content')
</body>
</html>
