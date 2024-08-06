<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OnBook</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="home-page">
            <header>
                <div class="logo">
                    <img src="{{ asset('images/icons/ico_logo.png') }}"/>
                    <h2 class="text-2xl">OnBook</h2>
                </div>
                @if (Route::has('login'))
                    <nav class="nav">
                        @auth
                            <a
                                href="{{ url('/arquivos') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Arquivos
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                            >
                                <x-buttons.primary.root>
                                    <x-buttons.primary.content text="{{ __('Faça login') }}"/>
                                </x-buttons.primary.root>
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Registre-se
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
            <main>
                <div class="title">
                    <h1>
                        Gerencie seus arquivos,
                        <span x-data="typingAnimation()" x-text="currentWord"></span>
                   </h1>
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed ipsum eu nisl malesuada vehicula porttitor ac nibh. Fusce leo velit, vestibulum at efficitur et, rutrum sit amet turpis.</h2>
                    <!-- Typing Animation -->

                </div>
            </main>
            <footer class="self-end">
                {{date('Y')}}© Five Digital
            </footer>
        </div>
    </body>
</html>
