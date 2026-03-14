<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Your Menu</title>
    <link rel="stylesheet" href="{{ asset('css/client/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="admin-wrapper">
        <aside class="sidebar">
            <div class="sidebar-header">
                <p>{{Auth::user()->name}}</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="active"><a href="{{ route('restaurant.edit', Auth::user()->id) }}"><i class="fas fa-home"></i> Início</a></li>
                    <li><a href="{{ route('products-panel') }}"><i class="fas fa-box"></i> Produtos</a></li>
                    <li><a href="{{ route('tables-panel') }}"><i class="fas fa-chair"></i> Mesas</a></li>
                    <li><a href="{{ route('reserves-panel') }}"><i class="fas fa-calendar-check"></i> Reservas</a></li>
                    <li><a href="{{ route('orders-panel') }}"><i class="fas fa-clipboard-list"></i> Pedidos</a></li>
                    <li><a href="{{ route('checks-panel') }}"><i class="fas fa-file-invoice-dollar"></i> Comandas</a></li>
                </ul>
            </nav>
        </aside>

        <main class="admin-content">
            <header class="top-bar">
                <span>Painel de Controle</span>
            </header>
            
            <div class="content-padding">
                @yield('panel_content')
            </div>
        </main>
    </div>

</body>
</html>