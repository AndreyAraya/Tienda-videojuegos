<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GameVault — Tienda</title>

    {{-- Fuentes --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet" />

    {{-- Vite: CSS y JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <!-- NAVBAR -->
    <nav>
        <a href="#" class="nav-logo">Tienda<span>DeJuegos</span></a>
        <ul class="nav-links">
            <li><a href="#">Tienda</a></li>
            <li><a href="#">Biblioteca</a></li>
            <li><a href="#">Comunidad</a></li>
            <li><a href="#">Soporte</a></li>
        </ul>
        <div class="nav-actions">
            <button class="btn-nav">Iniciar sesión</button>
        </div>
    </nav>

    <!-- HERO -->
    <div class="hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <span class="hero-tag">⚡ Ofertas de temporada activas</span>
            <h1 class="hero-title">Tu próxima<br><span>aventura</span><br>te espera</h1>
            <p class="hero-desc">
                Los mejores títulos del momento con precios exclusivos. Descarga al instante y juega sin límites.
            </p>
            <div class="hero-cta">
                <button class="btn-primary">Explorar tienda</button>
                <button class="btn-ghost">Ver ofertas</button>
            </div>
            <div class="hero-stats">
                <div>
                    <div class="stat-num">500+</div>
                    <div class="stat-label">Juegos</div>
                </div>
                <div>
                    <div class="stat-num">2M</div>
                    <div class="stat-label">Jugadores</div>
                </div>
                <div>
                    <div class="stat-num">4.9</div>
                    <div class="stat-label">Valoración</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARDS -->
    <section>
        <div class="section-header">
            <h2 class="section-title">Destacados</h2>
            <a href="#" class="section-link">Ver todos →</a>
        </div>

        <div class="cards-grid">
            @foreach($videojuegos as $juego)
            <div class="game-card" style="--accent: {{ $loop->iteration % 2 == 0 ? '#9f7aea' : '#00c9a7' }};">
                <div class="card-img-wrap">
                    <img src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}">
                    <div class="img-overlay"></div>
                    <span class="badge">{{ $juego->stock > 0 ? 'Disponible' : 'Agotado' }}</span>
                </div>
                <div class="card-body">
                    <p class="card-genre">{{ $juego->genero }} · {{ $juego->plataforma }}</p>
                    <h3 class="card-title">{{ $juego->titulo }}</h3>
                    <p class="card-desc">{{ $juego->descripcion }}</p>
                    <div class="card-stars">★★★★★ <span>(Nuevo)</span></div>
                    <div class="card-footer">
                        <div>
                            <div class="card-price">${{ number_format($juego->precio, 2) }}</div>
                        </div>
                        <button class="btn-buy">Comprar</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- BANNER PROMO -->
    <div class="banner">
        <div class="banner-text">
            <h2>Hazte Premium</h2>
            <p>Accede a <strong>+200 juegos</strong> por solo <strong>$9.99/mes</strong>. Cancela cuando quieras.</p>
        </div>
        <button class="btn-primary">Comenzar prueba gratis</button>
    </div>

    <!-- FOOTER -->
    <footer>
        <div>
            <div class="footer-brand">Tienda<span>DeJuegos</span></div>
            <p class="footer-copy">© 2026 Grupo(No recuerdo cual es,jajaja). Todos los derechos reservados.</p>
        </div>
        <nav class="footer-links">
            <a href="#">Facebook</a>
            <a href="#">Instagram</a>
            <a href="#">Discord</a>
        </nav>
    </footer>

</body>

</html>