<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Beepay</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <div class="admin-wrapper">
        <aside class="sidebar">
            <div class="sidebar-header">
                <p>YourMenu</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="active"><a href="#"><i class="fas fa-th-large"></i> Início</a></li>
                    <li><a href="{{ route('create.user') }}"><i class="fas fa-user"></i> Criar novo restaurante</a></li>
                </ul>
            </nav>
        </aside>

        <main class="admin-content">
            <header class="top-bar">
                <span>Painel de Controle / <strong>Início</strong></span>
            </header>
            
            <div class="content-padding">
                @yield('admin_content')
            </div>
        </main>
    </div>

</body>
</html>