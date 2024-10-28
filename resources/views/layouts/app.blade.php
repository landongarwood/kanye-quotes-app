<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div id="app">
        <!-- Navbar -->
        <nav class="bg-white shadow">
            <div class="container mx-auto py-3 px-3">
                <div class="flex justify-between items-center">
                    <!-- Branding -->
                    <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-800">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <!-- Desktop Navbar Links -->
                    <div class="hidden md:flex gap-3 items-center">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-gray-800 hover:text-gray-600">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-800 hover:text-gray-600">{{ __('Register') }}</a>
                            @endif

                            @else
                            <div class="flex items-center gap-3">
                                <a href="{{ route('logout') }}" 
                                class="text-gray-800 hover:text-gray-600"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <span class="text-gray-800 font-bold">{{ Auth::user()->name }}</span>

                                <!-- Hidden Logout Form -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        @endguest
                    </div>

                    <div class="md:hidden">
                        <button id="menu-toggle" class="text-gray-800 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="md:hidden hidden"> <!-- Ensure hidden on large screens initially -->
                    <div class="space-y-2 py-2">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="block text-gray-800 hover:text-gray-600">{{ __('Login') }}</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block text-gray-800 hover:text-gray-600">{{ __('Register') }}</a>
                            @endif
                        @else
                            <a href="{{ route('logout') }}" class="block text-gray-800 hover:text-gray-600"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="py-8 container mx-auto px-4">
            @yield('content')
        </main>
    </div>

    @livewireScripts

    <!-- Simple Toggle Script for Mobile Menu -->
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
