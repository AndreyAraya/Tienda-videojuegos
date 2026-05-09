<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>GameVault | Tienda</title>
  @vite(['resources/css/app.css'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

  <nav class="navbar">
    <a href="{{ route('home') }}" class="nav-logo">TIENDA<span>DEJUEGOS</span></a>

    <div class="nav-center">
      <a href="{{ route('home') }}" class="nav-link-active">Tienda</a>
      <a href="{{ route('videojuegos.biblioteca') }}">Biblioteca</a>
      <a href="#">Comunidad</a>
      <a href="#">Soporte</a>
    </div>

    <div class="nav-right">
      @if(session('logueado'))
      <a href="{{ route('videojuegos.create') }}" class="btn-login-nav btn-add-game">+ Agregar Juego</a>
      <a href="{{ route('logout') }}" class="btn-logout">SALIR</a>
      @else
      <a href="{{ route('login') }}" class="btn-login-nav">Iniciar Sesión</a>
      @endif
    </div>
  </nav>

  <div class="container">
    <h2 class="section-title">Destacados</h2>

    <div class="game-grid">
      @foreach($tienda as $juego)
      <div class="card">
        <div class="card-header">
          <span class="badge-disponible">Disponible</span>
          <img src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}">
        </div>

        <div class="card-body">
          <div class="card-tags">{{ $juego->genero }}</div>
          <div class="card-platforms">{{ $juego->plataforma }}</div>

          <div class="stock-indicator {{ $juego->stock <= 5 ? 'low-stock' : '' }}">
            <i class="fas fa-boxes"></i> STOCK: {{ $juego->stock }} uds.
          </div>

          <h3 class="card-title">{{ $juego->titulo }}</h3>
          <p class="card-desc">{{ Str::limit($juego->descripcion, 75) }}</p>

          <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
            <span class="new-badge">(Nuevo)</span>
          </div>

          <div class="card-footer">
            <span class="price">${{ number_format($juego->precio, 2) }}</span>

            <div style="display: flex; gap: 8px;">
              @if($juego->stock > 0)
              <form action="{{ route('videojuegos.comprar', $juego->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn-action">Comprar</button>
              </form>
              @else
              <button class="btn-action" disabled>Agotado</button>
              @endif

              @if(session('logueado'))
              <a href="{{ route('videojuegos.edit', $juego->id) }}" class="btn-action btn-edit">
                <i class="fas fa-edit"></i>
              </a>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</body>

</html>