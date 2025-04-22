<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('logo/3.png') }}" type="image/png">
    {{-- <link rel="icon" href="https://d1f4-2402-800-6390-c3f5-2054-bd05-7788-ebcb.ngrok-free.app/logo/3.png" type="image/png"> --}}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    @include('includes.libraries')

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- <link rel="stylesheet" href="https://d1f4-2402-800-6390-c3f5-2054-bd05-7788-ebcb.ngrok-free.app/css/main.css"> --}}
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

<script>
    $(document).ready(function() {

        const activeItem = $('.active .nav-option').get(0);
        if (activeItem) {
            activeItem.scrollIntoView({
                behavior: 'smooth',
                inline: 'center',
                block: 'nearest' // không thay đổi chiều dọc
            });
        }
    })
</script>

</html>
