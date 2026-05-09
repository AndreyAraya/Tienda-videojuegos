<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameVault — Mi Biblioteca</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="nav-logo">TIENDA<span>DEJUEGOS</span></a>

        <div class="nav-center">
            <a href="{{ route('home') }}">Tienda</a>
            <a href="{{ route('videojuegos.biblioteca') }}" style="color: #fff; border-bottom: 2px solid var(--neon-cyan);">Biblioteca</a>
            <a href="#">Comunidad</a>
            <a href="#">Soporte</a>
        </div>

        <div class="nav-right">
            @if(session('logueado'))
            <a href="{{ route('videojuegos.create') }}" class="btn-login-nav" style="background: var(--neon-cyan); color: #000; border: none;">+ Agregar</a>
            <a href="{{ route('logout') }}" style="color: #ff4444; font-size: 0.7rem; margin-left: 15px; text-decoration: none; font-weight: bold;">SALIR</a>
            @else
            <a href="{{ route('login') }}" class="btn-login-nav">Iniciar Sesión</a>
            @endif
        </div>
    </nav>

    <div class="container">
        <h2 class="section-title">Mi Biblioteca</h2>

        <div class="game-grid">
            @forelse($biblioteca as $juego)
            <div class="card">
                <div class="card-header">
                    <img src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}">
                </div>

                <div class="card-body">
                    <div class="card-tags">{{ $juego->genero }}</div>
                    <div class="card-platforms" style="font-size: 0.6rem; color: var(--text-muted); margin-bottom: 5px;">{{ $juego->plataforma }}</div>

                    <h3 class="card-title">{{ $juego->titulo }}</h3>

                    <button class="btn-action" style="width:100%; background:#238636; color:white; border:none; margin-bottom:10px; height: 35px;">
                        <i class="fas fa-play"></i> JUGAR
                    </button>

                    <form action="{{ route('videojuegos.devolver', $juego->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action" style="width:100%; border-color:#ff4444; color:#ff4444; font-size: 0.55rem;">
                            DEVOLVER A TIENDA
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
                <i class="fas fa-folder-open" style="font-size: 3rem; color: #30363d; margin-bottom: 20px;"></i>
                <p style="color: var(--text-muted);">Tu biblioteca está vacía.</p>
                <a href="{{ route('home') }}" class="btn-action" style="display: inline-block; margin-top: 10px; padding: 10px 20px;">Ir a comprar</a>
            </div>
            @endforelse
        </div>
    </div>

</body>

</html>