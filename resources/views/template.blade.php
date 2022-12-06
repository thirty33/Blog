<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proyecto Web</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
</head>

<body>
    <div class='container px-4 mx-auto flex justify-between items-center'>
        <header class='flex justify-between items-center py-4'>
            <div class='flex items-center flex-grow gap-4'>
                <a href="{{ route('home') }}">
                    <img src="{{ Vite::asset('resources/images/elephant.png') }}" alt="" class='h-12'>
                </a>
                <form action="{{ route('home') }}" method="GET" class="flex-grow">
                    <input type="text" placeholder="Buscar" name='search' value='{{ request('search') }}'
                        class="border border-gray-200 rounded py-2 px-4 w-1/2">

                </form>
            </div>
        </header>

        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endauth
    </div>
    <div class='opacity-60 h-px mb-8'
        style='background: linear-gradient(to right,
                rgba(200,200,200, 0) 0%,
                rgba(200,200,200, 1) 30%,
                rgba(200,200,200, 1) 70%,
                rgba(200,200,200, 0) 100%
     );'>
    </div>

    {{-- <p class='py-16 flex items-center justify-center flex-grow gap-4'>
        <img src="{{ Vite::asset('resources/images/elephant.png') }}" alt="" class='h-12'>
    </p> --}}

    @yield('content')
</body>

</html>
