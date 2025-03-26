<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Page Title' }}</title>

    @include('includes.libraries')

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body style="background: gray">
    {{ $slot }}
</body>
</html>