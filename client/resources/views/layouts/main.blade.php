<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('images/logo/logo-infiverse.png') }}" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @include('includes.libraries')

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    @yield('css')
</head>

<body>

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    @yield('js')

</body>

</html>