<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEGAMEVAULT — Mi Biblioteca</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg:     #0b0d10;
            --bg2:    #11141a;
            --bg3:    #181c24;
            --accent: #00e5a0;
            --accent2:#00b87a;
            --text:   #e8eaf0;
            --muted:  #7a8099;
            --card:   #13161e;
            --border: #1f2330;
            --danger: #ff4d6d;
            --gold:   #f5c518;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
       body { background:var(--bg); color:var(--text); font-family:'Inter',sans-serif; min-height:100vh; display:flex; flex-direction:column; }

        /*cORRECCION BARRA*/
        body {
    display: flex;
    flex-direction: column;
}

.main-content {
    flex: 1;
}


        /* NAVBAR */
        .navbar {
            position:fixed; top:0; left:0; right:0; z-index:100;
            display:flex; align-items:center; justify-content:space-between;
            padding:0 2.5rem; height:64px;
            background:rgba(11,13,16,.85); backdrop-filter:blur(16px);
            border-bottom:1px solid var(--border);
        }
        .nav-logo { font-family:'Rajdhani',sans-serif; font-size:1.5rem; font-weight:700; color:var(--text); text-decoration:none; letter-spacing:1px; }
        .nav-logo span { color:var(--accent); }
        .nav-center { display:flex; gap:2rem; }
        .nav-center a { color:var(--muted); text-decoration:none; font-size:.85rem; font-weight:500; letter-spacing:.5px; text-transform:uppercase; transition:color .2s; padding-bottom:2px; }
        .nav-center a:hover { color:var(--text); }
        .nav-center a.active { color:var(--accent); border-bottom:2px solid var(--accent); }
        .nav-right { display:flex; align-items:center; gap:1rem; }
        .btn-login { border:1px solid var(--accent); color:var(--accent); background:transparent; padding:.45rem 1.2rem; border-radius:4px; font-size:.8rem; font-weight:600; letter-spacing:.5px; cursor:pointer; text-decoration:none; transition:background .2s,color .2s; }
        .btn-login:hover { background:var(--accent); color:#000; }

        /* PAGE HEADER */
        .page-header {
            margin-top:64px;
            padding:2.5rem 5% 2rem;
            background:linear-gradient(180deg,#12161f 0%,var(--bg) 100%);
            border-bottom:1px solid var(--border);
            display:flex; align-items:flex-end; justify-content:space-between; flex-wrap:wrap; gap:1rem;
        }
        .page-header h1 {
            font-family:'Rajdhani',sans-serif;
            font-size:2.2rem; font-weight:700; letter-spacing:2px; text-transform:uppercase;
            display:flex; align-items:center; gap:.8rem;
        }
        .page-header h1 i { color:var(--accent); }
        .page-header p { color:var(--muted); font-size:.9rem; margin-top:.3rem; }
        .header-stat {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:8px;
            padding:.7rem 1.2rem;
            text-align:center;
        }
        .header-stat-num { font-family:'Rajdhani',sans-serif; font-size:1.8rem; font-weight:700; color:var(--accent); line-height:1; }
        .header-stat-label { font-size:.7rem; color:var(--muted); margin-top:.2rem; }

        /* MAIN */
        .main-content { padding:2.5rem 5%; flex:1; }

        .section-title {
            font-family:'Rajdhani',sans-serif; font-size:1.3rem; font-weight:700;
            letter-spacing:2px; text-transform:uppercase; margin-bottom:1.5rem;
            display:flex; align-items:center; gap:.7rem;
        }
        .section-title::before { content:''; display:inline-block; width:4px; height:1.1em; background:var(--accent); border-radius:2px; }

        /* GAME GRID */
        .game-grid {
            display:grid;
            grid-template-columns:repeat(auto-fill, minmax(220px,1fr));
            gap:1.25rem;
        }

        .game-card {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:8px;
            overflow:hidden;
            transition:transform .2s, border-color .2s, box-shadow .2s;
            position:relative;
        }
        .game-card:hover {
            transform:translateY(-4px);
            border-color:rgba(0,229,160,.3);
            box-shadow:0 12px 40px rgba(0,0,0,.4);
        }

        .card-img-wrap { position:relative; height:150px; overflow:hidden; }
        .card-img-wrap img { width:100%; height:100%; object-fit:cover; transition:transform .3s; }
        .game-card:hover .card-img-wrap img { transform:scale(1.05); }

        .card-owned-badge {
            position:absolute; top:.6rem; left:.6rem;
            background:#238636;
            color:#fff;
            font-size:.6rem; font-weight:700; letter-spacing:1px;
            padding:.2rem .55rem; border-radius:3px; text-transform:uppercase;
        }

        .card-body { padding:.9rem; }
        .card-genre { font-size:.7rem; color:var(--accent); font-weight:600; letter-spacing:.5px; text-transform:uppercase; margin-bottom:.2rem; }
        .card-platform { font-size:.7rem; color:var(--muted); margin-bottom:.6rem; }
        .card-title { font-family:'Rajdhani',sans-serif; font-size:1.05rem; font-weight:700; color:var(--text); margin-bottom:.8rem; line-height:1.2; }

        /* BUTTONS */
        .btn-play {
            width:100%; background:#238636; color:#fff;
            border:none; border-radius:4px;
            padding:.55rem; font-size:.8rem; font-weight:700;
            letter-spacing:.5px; cursor:pointer;
            display:flex; align-items:center; justify-content:center; gap:.5rem;
            transition:background .2s;
            margin-bottom:.5rem;
        }
        .btn-play:hover { background:#2ea043; }

        .btn-devolver {
            width:100%; background:transparent;
            border:1px solid var(--danger); color:var(--danger);
            border-radius:4px; padding:.5rem;
            font-size:.72rem; font-weight:600; letter-spacing:.5px;
            cursor:pointer; transition:background .2s, color .2s;
        }
        .btn-devolver:hover { background:rgba(255,77,109,.1); }

        /* EMPTY STATE */
        .empty-state {
            grid-column:1/-1;
            text-align:center;
            padding:5rem 2rem;
            display:flex; flex-direction:column; align-items:center; gap:1rem;
        }
        .empty-icon {
            width:80px; height:80px; border-radius:50%;
            background:rgba(0,229,160,.07);
            display:flex; align-items:center; justify-content:center;
            color:var(--muted); font-size:2rem;
        }
        .empty-state h3 { font-family:'Rajdhani',sans-serif; font-size:1.3rem; font-weight:700; color:var(--text); }
        .empty-state p { color:var(--muted); font-size:.9rem; }
        .btn-go-shop {
            background:var(--accent); color:#000;
            border:none; border-radius:4px;
            padding:.7rem 2rem; font-weight:700; font-size:.9rem;
            cursor:pointer; text-decoration:none;
            transition:background .2s, transform .15s;
            margin-top:.5rem;
        }
        .btn-go-shop:hover { background:var(--accent2); transform:translateY(-1px); }

        /* FOOTER */
        footer {
            margin-top:4rem;
            background:var(--bg2); border-top:1px solid var(--border);
            padding:2rem 5%;
            display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem;
        }
        footer .logo { font-family:'Rajdhani',sans-serif; font-size:1.2rem; font-weight:700; }
        footer .logo span { color:var(--accent); }
        footer p { color:var(--muted); font-size:.8rem; }
        footer .footer-links { display:flex; gap:1.5rem; }
        footer .footer-links a { color:var(--muted); font-size:.8rem; text-decoration:none; transition:color .2s; }
        footer .footer-links a:hover { color:var(--accent); }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="{{ route('home') }}" class="nav-logo">THE<span>GAMEVAULT</span></a>
    <div class="nav-center">
        <a href="{{ route('home') }}">Tienda</a>
        <a href="{{ route('videojuegos.biblioteca') }}" class="active">Biblioteca</a>
        <a href="{{ route('comunidad') }}">Comunidad</a>
        <a href="{{ route('soporte') }}">Soporte</a>
    </div>
    <div class="nav-right">
        @if(session('logueado'))
            <a href="{{ route('videojuegos.create') }}" class="btn-login" style="background:var(--accent);color:#000;border:none;">+ Agregar</a>
            <a href="{{ route('logout') }}" style="color:var(--danger);font-size:.8rem;text-decoration:none;font-weight:600;">SALIR</a>
        @else
            <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
        @endif
    </div>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
    <div>
        <h1><i class="fas fa-book-open"></i> Mi Biblioteca</h1>
        <p>Todos tus juegos adquiridos en un solo lugar.</p>
    </div>
    <div class="header-stat">
        <div class="header-stat-num">{{ $biblioteca->count() }}</div>
        <div class="header-stat-label">Juegos en biblioteca</div>
    </div>
</div>

<!-- MAIN -->
<main class="main-content">
    <div class="section-title">Juegos adquiridos</div>

    <div class="game-grid">
        @forelse($biblioteca as $juego)
        <div class="game-card">
            <div class="card-img-wrap">
                <img src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}">
                <span class="card-owned-badge"><i class="fas fa-check" style="margin-right:.3rem"></i>En tu biblioteca</span>
            </div>
            <div class="card-body">
                <div class="card-genre">{{ $juego->genero }}</div>
                <div class="card-platform"><i class="fas fa-desktop" style="margin-right:.3rem;color:var(--muted)"></i>{{ $juego->plataforma }}</div>
                <h3 class="card-title">{{ strtoupper($juego->titulo) }}</h3>

                <button class="btn-play">
                    <i class="fas fa-play"></i> JUGAR
                </button>

                <form action="{{ route('videojuegos.devolver', $juego->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-devolver"
                            onclick="return confirm('¿Devolver {{ $juego->titulo }} a la tienda?')">
                        <i class="fas fa-rotate-left" style="margin-right:.3rem"></i>DEVOLVER A TIENDA
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <div class="empty-icon"><i class="fas fa-folder-open"></i></div>
            <h3>Tu biblioteca está vacía</h3>
            <p>Aún no has adquirido ningún juego. ¡Explorá la tienda!</p>
            <a href="{{ route('home') }}" class="btn-go-shop">
                <i class="fas fa-store" style="margin-right:.5rem"></i>Ir a la Tienda
            </a>
        </div>
        @endforelse
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

</body>
</html>