<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('logo/3.png') }}" type="image/png">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @include('includes.libraries')

    {{-- <link rel="stylesheet" href="{{ asset('css/main.css') }}"> --}}
    <link rel="stylesheet" href=" https://b2fc-113-178-239-81.ngrok-free.app/css/main.css">

    @yield('css')
    @livewireStyles
</head>

<body>

    @livewire('header')

    @livewire('sign-in')
    @livewire('sign-up')

    {{ $slot }}

    @livewire('user-order-status')
    @livewire('footer')

    @yield('js')

    @livewireScripts
</body>

</html>
