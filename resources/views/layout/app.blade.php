<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{session('name')}}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background-color: {{ session('second_color') }}"> 
    <nav class="navbar" style="background-color: {{ session('primary_color')}};color: {{ session('second_color') }}">
        <div class="container">
            <div class="logo">{{session('name')}}</div>
            <ul class="nav-links">
                <li><a href="/{{ session('slug') }}">Início</a></li>
                <li><a href="/{{ session('slug') }}/products">Cardápio</a></li>
                <li><a href="/{{ session('slug') }}/reserve" class="btn-reserve">Fazer Reserva</a></li>
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
        @extends('layout.cart')
    </main>

    @if(!Route::is('search.reserve'))
        <footer style="background-color: {{ session('primary_color')}};color: {{ session('second_color') }}; height:30px;" >
            <p>&copy; 2026 YourMenu - Todos os direitos reservados.</p>
        </footer>
    @endif
</body>
</html>