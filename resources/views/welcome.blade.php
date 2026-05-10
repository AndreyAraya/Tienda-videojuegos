<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEGAMEVAULT — Inicio</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg:        #0b0d10;
            --bg2:       #11141a;
            --bg3:       #181c24;
            --accent:    #00e5a0;
            --accent2:   #00b87a;
            --text:      #e8eaf0;
            --muted:     #7a8099;
            --card:      #13161e;
            --border:    #1f2330;
            --danger:    #ff4d6d;
            --gold:      #f5c518;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        /* ─── NAVBAR ─────────────────────────────── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2.5rem;
            height: 64px;
            background: rgba(11,13,16,0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
            text-decoration: none;
            letter-spacing: 1px;
        }
        .nav-logo span { color: var(--accent); }

        .nav-center { display: flex; gap: 2rem; }
        .nav-center a {
            color: var(--muted);
            text-decoration: none;
            font-size: .85rem;
            font-weight: 500;
            letter-spacing: .5px;
            text-transform: uppercase;
            transition: color .2s;
            padding-bottom: 2px;
        }
        .nav-center a:hover,
        .nav-center a.active { color: var(--text); }
        .nav-center a.active {
            border-bottom: 2px solid var(--accent);
            color: var(--accent);
        }

        .nav-right { display: flex; align-items: center; gap: 1rem; }
        .btn-login {
            border: 1px solid var(--accent);
            color: var(--accent);
            background: transparent;
            padding: .45rem 1.2rem;
            border-radius: 4px;
            font-size: .8rem;
            font-weight: 600;
            letter-spacing: .5px;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s, color .2s;
        }
        .btn-login:hover { background: var(--accent); color: #000; }

        /* ─── HERO BANNER ─────────────────────────── */
        .hero {
            position: relative;
            height: 520px;
            margin-top: 64px;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity .8s ease;
        }
        .hero-slide.active { opacity: 1; }

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(.45);
        }

        .hero-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to right,
                rgba(11,13,16,.95) 30%,
                rgba(11,13,16,.1) 100%
            );
        }

        .hero-content {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 5%;
            max-width: 500px;
        }

        .hero-badge {
            display: inline-block;
            background: var(--accent);
            color: #000;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: .3rem .8rem;
            border-radius: 2px;
            margin-bottom: 1rem;
            text-transform: uppercase;
        }

        .hero-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.05;
            margin-bottom: .8rem;
            text-shadow: 0 2px 20px rgba(0,0,0,.6);
        }

        .hero-desc {
            color: var(--muted);
            font-size: .95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .hero-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.8rem;
            font-size: .8rem;
            color: var(--muted);
        }
        .hero-meta span { display: flex; align-items: center; gap: .4rem; }
        .hero-meta i { color: var(--accent); }

        .hero-price-row {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .hero-price {
            font-family: 'Rajdhani', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--accent);
        }
        .btn-hero {
            background: var(--accent);
            color: #000;
            border: none;
            padding: .75rem 2rem;
            border-radius: 4px;
            font-weight: 700;
            font-size: .9rem;
            letter-spacing: .5px;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s, transform .15s;
        }
        .btn-hero:hover { background: var(--accent2); transform: translateY(-1px); }

        /* Hero dots */
        .hero-dots {
            position: absolute;
            bottom: 1.5rem;
            left: 5%;
            display: flex;
            gap: .5rem;
        }
        .hero-dot {
            width: 28px; height: 3px;
            background: var(--border);
            border-radius: 2px;
            cursor: pointer;
            transition: background .3s;
        }
        .hero-dot.active { background: var(--accent); }

        /* ─── SEARCH & FILTERS ────────────────────── */
        .search-bar-section {
            padding: 2rem 5%;
            background: var(--bg2);
            border-bottom: 1px solid var(--border);
        }

        .search-row {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-input-wrap {
            position: relative;
            flex: 1;
            min-width: 220px;
        }
        .search-input-wrap i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: .9rem;
        }
        .search-input {
            width: 100%;
            background: var(--bg3);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: .75rem 1rem .75rem 2.8rem;
            color: var(--text);
            font-size: .9rem;
            outline: none;
            transition: border-color .2s;
        }
        .search-input:focus { border-color: var(--accent); }
        .search-input::placeholder { color: var(--muted); }

        .filter-select {
            background: var(--bg3);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: .75rem 1rem;
            color: var(--text);
            font-size: .85rem;
            outline: none;
            cursor: pointer;
            transition: border-color .2s;
        }
        .filter-select:focus { border-color: var(--accent); }

        .genre-chips {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }
        .genre-chip {
            background: var(--bg3);
            border: 1px solid var(--border);
            color: var(--muted);
            padding: .35rem .9rem;
            border-radius: 20px;
            font-size: .78rem;
            cursor: pointer;
            transition: all .2s;
            user-select: none;
        }
        .genre-chip:hover,
        .genre-chip.active {
            border-color: var(--accent);
            color: var(--accent);
            background: rgba(0,229,160,.08);
        }

        /* ─── MAIN CONTENT ────────────────────────── */
        .main-content { padding: 2.5rem 5%; }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .section-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text);
            display: flex;
            align-items: center;
            gap: .7rem;
        }
        .section-title::before {
            content: '';
            display: inline-block;
            width: 4px; height: 1.2em;
            background: var(--accent);
            border-radius: 2px;
        }
        .section-count {
            font-size: .8rem;
            color: var(--muted);
        }

        /* ─── GAME GRID ───────────────────────────── */
        .game-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 1.25rem;
        }

        .game-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
            transition: transform .2s, border-color .2s, box-shadow .2s;
            position: relative;
        }
        .game-card:hover {
            transform: translateY(-4px);
            border-color: rgba(0,229,160,.3);
            box-shadow: 0 12px 40px rgba(0,0,0,.4);
        }

        .card-img-wrap {
            position: relative;
            height: 150px;
            overflow: hidden;
        }
        .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s;
        }
        .game-card:hover .card-img-wrap img { transform: scale(1.05); }

        .card-badge {
            position: absolute;
            top: .6rem; left: .6rem;
            background: var(--accent);
            color: #000;
            font-size: .6rem;
            font-weight: 700;
            letter-spacing: 1px;
            padding: .2rem .5rem;
            border-radius: 3px;
            text-transform: uppercase;
        }
        .card-badge.sold-out {
            background: var(--danger);
            color: #fff;
        }

        .card-body { padding: .9rem; }

        .card-genre {
            font-size: .7rem;
            color: var(--accent);
            font-weight: 600;
            letter-spacing: .5px;
            text-transform: uppercase;
            margin-bottom: .2rem;
        }
        .card-platform {
            font-size: .7rem;
            color: var(--muted);
            margin-bottom: .4rem;
        }
        .card-stock {
            font-size: .7rem;
            color: var(--muted);
            margin-bottom: .5rem;
        }
        .card-stock i { color: var(--accent); margin-right: .3rem; }

        .card-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: .4rem;
            line-height: 1.2;
        }

        .card-desc {
            font-size: .75rem;
            color: var(--muted);
            line-height: 1.5;
            margin-bottom: .7rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-stars {
            display: flex;
            gap: 2px;
            margin-bottom: .7rem;
        }
        .card-stars i { color: var(--gold); font-size: .7rem; }
        .card-stars span { color: var(--muted); font-size: .7rem; margin-left: .3rem; }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-price {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--accent);
        }
        .card-price.free { color: #60d394; }

        .btn-comprar {
            background: transparent;
            border: 1px solid var(--accent);
            color: var(--accent);
            padding: .4rem .9rem;
            border-radius: 4px;
            font-size: .75rem;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s, color .2s;
            text-decoration: none;
        }
        .btn-comprar:hover { background: var(--accent); color: #000; }

        /* ─── NO RESULTS ──────────────────────────── */
        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            display: none;
        }
        .no-results i { font-size: 3rem; color: var(--muted); margin-bottom: 1rem; }
        .no-results p { color: var(--muted); }

        /* ─── FOOTER ──────────────────────────────── */
        footer {
            margin-top: 4rem;
            background: var(--bg2);
            border-top: 1px solid var(--border);
            padding: 2rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }
        footer .logo {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text);
        }
        footer .logo span { color: var(--accent); }
        footer p { color: var(--muted); font-size: .8rem; }
        footer .footer-links { display: flex; gap: 1.5rem; }
        footer .footer-links a {
            color: var(--muted);
            font-size: .8rem;
            text-decoration: none;
            transition: color .2s;
        }
        footer .footer-links a:hover { color: var(--accent); }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="{{ route('home') }}" class="nav-logo">THE<span>GAMEVAULT</span></a>
    <div class="nav-center">
        <a href="{{ route('home') }}" class="active">Tienda</a>
        <a href="{{ route('videojuegos.biblioteca') }}">Biblioteca</a>
        <a href="{{ route('comunidad') }}">Comunidad</a>
        <a href="{{ route('soporte') }}">Soporte</a>
    </div>
<div class="nav-right">
    @if(session('logueado'))
        <a href="{{ route('videojuegos.create') }}" class="btn-login" style="background:var(--accent);color:#000;border:none;">+ Agregar</a>
        <a href="{{ route('logout') }}" style="color:#ff4444;font-size:.8rem;text-decoration:none;font-weight:600;">SALIR</a>
    @else
        <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
    @endif
</div>
</nav>

<!-- HERO BANNER -->
<section class="hero">
    @php $heroGames = $tienda->take(4); @endphp
    @foreach($heroGames as $i => $game)
    <div class="hero-slide {{ $i === 0 ? 'active' : '' }}" data-index="{{ $i }}">
        <img src="{{ $game->imagen }}" alt="{{ $game->titulo }}">
        <div class="hero-gradient"></div>
        <div class="hero-content">
            <span class="hero-badge">⚡ Destacado</span>
            <h1 class="hero-title">{{ $game->titulo }}</h1>
            <p class="hero-desc">{{ $game->descripcion }}</p>
            <div class="hero-meta">
                <span><i class="fas fa-gamepad"></i> {{ $game->genero }}</span>
                <span><i class="fas fa-desktop"></i> {{ $game->plataforma }}</span>
                <span><i class="fas fa-boxes-stacked"></i> {{ $game->stock }} uds.</span>
            </div>
            <div class="hero-price-row">
                <span class="hero-price">${{ number_format($game->precio, 2) }}</span>
                <form action="{{ route('videojuegos.comprar', $game->id) }}" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="hero-dots">
        @foreach($heroGames as $i => $game)
        <div class="hero-dot {{ $i === 0 ? 'active' : '' }}" data-dot="{{ $i }}"></div>
        @endforeach
    </div>
</section>

<!-- SEARCH & FILTERS -->
<section class="search-bar-section">
    <div class="search-row">
        <div class="search-input-wrap">
            <i class="fas fa-search"></i>
            <input type="text" class="search-input" id="searchInput" placeholder="Buscar juegos...">
        </div>
        <select class="filter-select" id="platformFilter">
            <option value="">Todas las plataformas</option>
            <option value="PC">PC</option>
            <option value="PS5">PS5</option>
            <option value="Xbox">Xbox</option>
        </select>
        <select class="filter-select" id="priceFilter">
            <option value="">Ordenar por precio</option>
            <option value="asc">Menor precio</option>
            <option value="desc">Mayor precio</option>
        </select>
    </div>
    <div class="genre-chips">
        <div class="genre-chip active" data-genre="">Todos</div>
        <div class="genre-chip" data-genre="RPG">RPG</div>
        <div class="genre-chip" data-genre="Acción">Acción</div>
        <div class="genre-chip" data-genre="Aventura">Aventura</div>
        <div class="genre-chip" data-genre="Terror">Terror</div>
        <div class="genre-chip" data-genre="Carreras">Carreras</div>
        <div class="genre-chip" data-genre="Shooter">Shooter</div>
        <div class="genre-chip" data-genre="Western">Western</div>
    </div>
</section>

<!-- GAME GRID -->
<main class="main-content">
    <div class="section-header">
        <h2 class="section-title">Disponibles</h2>
        <span class="section-count" id="gameCount">{{ $tienda->count() }} juegos</span>
    </div>

    <div class="game-grid" id="gameGrid">
        @foreach($tienda as $juego)
        <div class="game-card"
             data-titulo="{{ strtolower($juego->titulo) }}"
             data-genero="{{ $juego->genero }}"
             data-plataforma="{{ $juego->plataforma }}"
             data-precio="{{ $juego->precio }}">

            <div class="card-img-wrap">
                <img src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}" loading="lazy">
                @if($juego->stock > 0)
                    <span class="card-badge">Disponible</span>
                @else
                    <span class="card-badge sold-out">Sin Stock</span>
                @endif
            </div>

            <div class="card-body">
                <div class="card-genre">{{ $juego->genero }}</div>
                <div class="card-platform"><i class="fas fa-desktop" style="margin-right:.3rem;color:var(--muted)"></i>{{ $juego->plataforma }}</div>
                <div class="card-stock"><i class="fas fa-boxes-stacked"></i>STOCK: {{ $juego->stock }} uds.</div>
                <h3 class="card-title">{{ strtoupper($juego->titulo) }}</h3>
                <p class="card-desc">{{ $juego->descripcion }}</p>
                <div class="card-stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    <span>(Nuevo)</span>
                </div>
                <div class="card-footer">
                    <span class="card-price {{ $juego->precio == 0 ? 'free' : '' }}">
                        {{ $juego->precio == 0 ? 'GRATIS' : '$'.number_format($juego->precio,2) }}
                    </span>
                    @if($juego->stock > 0)
                        <form action="{{ route('videojuegos.comprar', $juego->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn-comprar">COMPRAR</button>
                        </form>
                    @else
                        <span style="color:var(--danger);font-size:.75rem;font-weight:600;">AGOTADO</span>
                    @endif
                </div>

                @if(session('logueado'))
                <div style="display:flex; gap:.5rem; margin-top:.5rem;">
                    <a href="{{ route('videojuegos.edit', $juego->id) }}"
                       style="flex:1; text-align:center; padding:.4rem; border:1px solid var(--accent);
                              color:var(--accent); border-radius:4px; font-size:.72rem; font-weight:600; text-decoration:none;">
                        <i class="fas fa-pen"></i> EDITAR
                    </a>
                    <form action="{{ route('videojuegos.destroy', $juego->id) }}" method="POST"
                          onsubmit="return confirm('¿Eliminar este juego?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                style="padding:.4rem .8rem; border:1px solid #ff4444; color:#ff4444;
                                       background:transparent; border-radius:4px; font-size:.72rem; font-weight:600; cursor:pointer;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                @endif

            </div>
        </div>
        @endforeach
    </div>

    <div class="no-results" id="noResults">
        <i class="fas fa-ghost"></i>
        <p>No se encontraron juegos con esos filtros.</p>
    </div>
</main>

<footer>
    <div class="logo">THE<span>GAMEVAULT</span></div>
    <p>© {{ date('Y') }} THEGAMEVAULT. Todos los derechos reservados.</p>
    <div class="footer-links">
        <a href="{{ route('soporte') }}">Soporte</a>
        <a href="{{ route('comunidad') }}">Comunidad</a>
    </div>
</footer>

<script>
// ── HERO SLIDER ─────────────────────────────────────────────
const slides = document.querySelectorAll('.hero-slide');
const dots   = document.querySelectorAll('.hero-dot');
let current  = 0;
let timer;

function goTo(n) {
    slides[current].classList.remove('active');
    dots[current].classList.remove('active');
    current = (n + slides.length) % slides.length;
    slides[current].classList.add('active');
    dots[current].classList.add('active');
}

function startTimer() {
    timer = setInterval(() => goTo(current + 1), 5000);
}

dots.forEach(d => {
    d.addEventListener('click', () => {
        clearInterval(timer);
        goTo(+d.dataset.dot);
        startTimer();
    });
});

startTimer();

// ── SEARCH & FILTER ─────────────────────────────────────────
const cards        = document.querySelectorAll('.game-card');
const searchInput  = document.getElementById('searchInput');
const platformSel  = document.getElementById('platformFilter');
const priceSel     = document.getElementById('priceFilter');
const genreChips   = document.querySelectorAll('.genre-chip');
const gameGrid     = document.getElementById('gameGrid');
const noResults    = document.getElementById('noResults');
const gameCount    = document.getElementById('gameCount');

let activeGenre = '';

function applyFilters() {
    const query    = searchInput.value.toLowerCase();
    const platform = platformSel.value.toLowerCase();
    const priceDir = priceSel.value;

    let visible = [...cards].filter(card => {
        const titulo     = card.dataset.titulo;
        const genero     = card.dataset.genero;
        const plataforma = card.dataset.plataforma.toLowerCase();

        const matchSearch   = titulo.includes(query);
        const matchPlatform = !platform || plataforma.includes(platform);
        const matchGenre    = !activeGenre || genero.includes(activeGenre);

        return matchSearch && matchPlatform && matchGenre;
    });

    // Sort
    if (priceDir === 'asc')
        visible.sort((a,b) => +a.dataset.precio - +b.dataset.precio);
    else if (priceDir === 'desc')
        visible.sort((a,b) => +b.dataset.precio - +a.dataset.precio);

    // Hide all, show visible in order
    cards.forEach(c => c.style.display = 'none');
    visible.forEach(c => {
        c.style.display = '';
        gameGrid.appendChild(c);
    });

    gameCount.textContent = `${visible.length} juego${visible.length !== 1 ? 's' : ''}`;
    noResults.style.display = visible.length === 0 ? 'block' : 'none';
}

searchInput.addEventListener('input', applyFilters);
platformSel.addEventListener('change', applyFilters);
priceSel.addEventListener('change', applyFilters);

genreChips.forEach(chip => {
    chip.addEventListener('click', () => {
        genreChips.forEach(c => c.classList.remove('active'));
        chip.classList.add('active');
        activeGenre = chip.dataset.genre;
        applyFilters();
    });
});
</script>
</body>
</html>