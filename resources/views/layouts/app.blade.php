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
    {{-- @livewire('navigation-dropdown') --}}
    <nav class="bg-green-400 p-6 mb-6">
        <div class="flex items-center justify-between flex-wrap container mx-auto px-12">
            <a class="flex content-center items-center flex-shrink-0 text-white mr-6" href="/">
                <img class="" width="48" src="/images/logo.png" />
                <span class="font-extrabold text-3xl ml-2 mt-1">
                    COPYBU
                </span>
            </a>
            <div class="block lg:hidden">
                <button
                    class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>
                            Menu
                        </title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                <div class="text-sm lg:flex-grow">
                </div>
                <div>
                    <a href="/profile"
                        class="font-bold px-5 py-2 border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4">
                        Профиль
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-12">
        {{ $slot }}
    </div>

    @stack('modals')
    @livewireScripts
</body>

</html>