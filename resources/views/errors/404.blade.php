<!DOCTYPE html>
<html>
<head>
    <title>Página não encontrada</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="page-404">
        <div>
            <h1>404</h1>
            <h2>Oops. Página não encontrada</h3>
            <a href="{{ url('/') }}">
                <x-buttons.primary.root>
                    <x-buttons.primary.content text="Voltar para a Página Inicial"/>
                </x-buttons.primary.root>
            </a>
        </div>
    </main>
</body>
</html>
