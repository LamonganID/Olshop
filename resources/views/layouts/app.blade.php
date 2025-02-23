<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles()
        
        <script>
            // Check for dark mode preference
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        </script>
    </head>
    <body class="font-sans antialiased bg-white dark:bg-gray-900">
        <div class="min-h-screen flex flex-col">
            @include('livewire.layout.header')
            @include('livewire.layout.navigation')

            <!-- Page Heading -->
            <div class="px-6 mt-4">
                @if (isset($header))
                    {{ $header }}
                @endif
            </div>
            <!-- Page Content -->
            <main id="content" class="flex-grow p-6">
                @yield('content')
            </main>
        </div>
            
        @livewireScripts()
        <script src="./node_modules/preline/dist/preline.js"></script>
        <script>
            // Dark mode toggle function
            function toggleDarkMode() {
                const isDark = document.documentElement.classList.toggle('dark')
                localStorage.theme = isDark ? 'dark' : 'light'
            }
        </script>
    </body>
</html>
