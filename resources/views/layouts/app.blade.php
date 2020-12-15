<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js" defer></script>
</head>

<body class="font-sans antialiased">
    <nav class="bg-green-400 py-6 mb-6">
        <div class="flex items-center justify-between flex-wrap container mx-auto px-4 sm:px-8 lg:px-12">
            <a class="flex content-center items-center flex-shrink-0 text-white mr-6" href="/">
                <img class="" width="48" src="/images/logo.png" />
                <span class="font-extrabold ml-2 mt-1 text-2xl lg:text-3xl">
                    COPYBU
                </span>
            </a>
            <div class="ml-auto">
                @auth
                    <a href="/user/profile" class="font-bold px-5 py-2 border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4">
                        Профиль
                    </a>
                @endauth
                @guest
                    <a href="/login" class="font-bold px-5 py-2 border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4">
                        Войти
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 sm:px-8 lg:px-12">
        {{ $slot }}
    </div>

    @stack('modals')
    @livewireScripts
</body>

</html>