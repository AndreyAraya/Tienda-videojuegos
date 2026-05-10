<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEGAMEVAULT — Comunidad</title>
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
            --online: #3ddc84;
            --gold:   #f5c518;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { background:var(--bg); color:var(--text); font-family:'Inter',sans-serif; min-height:100vh; }

        /* NAVBAR */
        .navbar {
            position:fixed; top:0; left:0; right:0; z-index:100;
            display:flex; align-items:center; justify-content:space-between;
            padding:0 2.5rem; height:64px;
            background:rgba(11,13,16,.85); backdrop-filter:blur(16px);
            border-bottom:1px solid var(--border);
        }
        .nav-logo { font-family:'Rajdhani',sans-serif; font-size:1.5rem; font-weight:700; color:var(--text); text-decoration:none; }
        .nav-logo span { color:var(--accent); }
        .nav-center { display:flex; gap:2rem; }
        .nav-center a { color:var(--muted); text-decoration:none; font-size:.85rem; font-weight:500; letter-spacing:.5px; text-transform:uppercase; transition:color .2s; }
        .nav-center a:hover { color:var(--text); }
        .nav-center a.active { color:var(--accent); border-bottom:2px solid var(--accent); }
        .btn-login { border:1px solid var(--accent); color:var(--accent); background:transparent; padding:.45rem 1.2rem; border-radius:4px; font-size:.8rem; font-weight:600; cursor:pointer; text-decoration:none; transition:background .2s,color .2s; }
        .btn-login:hover { background:var(--accent); color:#000; }

        /* PAGE HEADER */
        .page-header {
            margin-top:64px;
            padding:3rem 5% 2rem;
            background:linear-gradient(180deg, #12161f 0%, var(--bg) 100%);
            border-bottom:1px solid var(--border);
        }
        .page-header h1 {
            font-family:'Rajdhani',sans-serif;
            font-size:2.5rem; font-weight:700; letter-spacing:2px; text-transform:uppercase;
            display:flex; align-items:center; gap:.8rem;
        }
        .page-header h1 i { color:var(--accent); font-size:1.8rem; }
        .page-header p { color:var(--muted); margin-top:.5rem; font-size:.95rem; }

        /* STATS ROW */
        .stats-row {
            display:flex; gap:1.5rem; flex-wrap:wrap;
            padding:1.5rem 5%;
            background:var(--bg2);
            border-bottom:1px solid var(--border);
        }
        .stat-card {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:8px;
            padding:1rem 1.5rem;
            display:flex; align-items:center; gap:1rem;
            flex:1; min-width:180px;
        }
        .stat-icon {
            width:44px; height:44px; border-radius:8px;
            background:rgba(0,229,160,.1);
            display:flex; align-items:center; justify-content:center;
            color:var(--accent); font-size:1.1rem;
        }
        .stat-value { font-family:'Rajdhani',sans-serif; font-size:1.8rem; font-weight:700; line-height:1; }
        .stat-label { font-size:.75rem; color:var(--muted); margin-top:.2rem; }

        /* CONTENT */
        .content { padding:2rem 5%; }

        .section-title {
            font-family:'Rajdhani',sans-serif; font-size:1.3rem; font-weight:700;
            letter-spacing:2px; text-transform:uppercase; margin-bottom:1.2rem;
            display:flex; align-items:center; gap:.7rem;
        }
        .section-title::before { content:''; display:inline-block; width:4px; height:1.1em; background:var(--accent); border-radius:2px; }

        /* LIVE NOW TABLE */
        .live-table {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:8px;
            overflow:hidden;
            margin-bottom:2.5rem;
        }
        .live-table-header {
            display:grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            padding:.7rem 1.2rem;
            background:var(--bg3);
            border-bottom:1px solid var(--border);
            font-size:.72rem; font-weight:600; letter-spacing:1px; text-transform:uppercase; color:var(--muted);
        }
        .live-row {
            display:grid;
            grid-template-columns:2fr 1fr 1fr 1fr;
            padding:.9rem 1.2rem;
            border-bottom:1px solid var(--border);
            align-items:center;
            transition:background .15s;
        }
        .live-row:last-child { border-bottom:none; }
        .live-row:hover { background:rgba(255,255,255,.02); }

        .game-info { display:flex; align-items:center; gap:.8rem; }
        .game-thumb {
            width:48px; height:32px;
            border-radius:4px; object-fit:cover;
            border:1px solid var(--border);
        }
        .game-name { font-weight:600; font-size:.9rem; }
        .game-genre { font-size:.72rem; color:var(--muted); margin-top:.15rem; }

        .player-count {
            display:flex; align-items:center; gap:.5rem;
            font-family:'Rajdhani',sans-serif; font-size:1.1rem; font-weight:700;
        }
        .dot-live {
            width:8px; height:8px; border-radius:50%;
            background:var(--online);
            box-shadow:0 0 6px var(--online);
            animation:pulse 2s infinite;
        }
        @keyframes pulse {
            0%,100% { opacity:1; transform:scale(1); }
            50%      { opacity:.5; transform:scale(.8); }
        }

        .bar-wrap {
            height:6px; background:var(--border); border-radius:3px; overflow:hidden;
        }
        .bar-fill {
            height:100%; background:linear-gradient(90deg,var(--accent),var(--accent2));
            border-radius:3px; transition:width 1s ease;
        }

        .trend {
            font-size:.8rem; font-weight:600;
        }
        .trend.up { color:#60d394; }
        .trend.down { color:#ff6b6b; }
        .trend.flat { color:var(--muted); }

        /* TOP PLAYERS */
        .players-grid {
            display:grid;
            grid-template-columns:repeat(auto-fill, minmax(200px,1fr));
            gap:1rem;
            margin-bottom:2.5rem;
        }
        .player-card {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:8px;
            padding:1.2rem;
            display:flex; flex-direction:column; align-items:center;
            text-align:center; gap:.5rem;
            transition:border-color .2s, transform .2s;
        }
        .player-card:hover { border-color:rgba(0,229,160,.3); transform:translateY(-2px); }

        .avatar {
            width:52px; height:52px; border-radius:50%;
            background:linear-gradient(135deg,var(--accent),#006eff);
            display:flex; align-items:center; justify-content:center;
            font-family:'Rajdhani',sans-serif; font-size:1.3rem; font-weight:700; color:#000;
            position:relative;
        }
        .avatar-status {
            position:absolute; bottom:1px; right:1px;
            width:12px; height:12px; border-radius:50%;
            background:var(--online);
            border:2px solid var(--card);
        }

        .player-name { font-weight:600; font-size:.9rem; }
        .player-game { font-size:.72rem; color:var(--muted); }
        .player-hours { font-size:.72rem; color:var(--accent); font-weight:600; }

        /* FOOTER */
        footer {
            margin-top:3rem;
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

<nav class="navbar">
    <a href="{{ route('home') }}" class="nav-logo">THE<span>GAMEVAULT</span></a>
    <div class="nav-center">
        <a href="{{ route('home') }}">Tienda</a>
        <a href="{{ route('videojuegos.biblioteca') }}">Biblioteca</a>
        <a href="{{ route('comunidad') }}" class="active">Comunidad</a>
        <a href="{{ route('soporte') }}">Soporte</a>
    </div>
    <div class="nav-right">
    </div>
</nav>

<div class="page-header">
    <h1><i class="fas fa-users"></i> Comunidad</h1>
    <p>Mirá quién está jugando ahora mismo en la plataforma.</p>
</div>

<!-- STATS -->
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-circle-dot"></i></div>
        <div>
            <div class="stat-value" id="totalOnline">—</div>
            <div class="stat-label">Jugadores en línea</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-gamepad"></i></div>
        <div>
            <div class="stat-value">{{ $tienda->count() }}</div>
            <div class="stat-label">Juegos disponibles</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-fire"></i></div>
        <div>
            <div class="stat-value" id="peakGame">—</div>
            <div class="stat-label">Juego más popular</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><i class="fas fa-arrow-trend-up"></i></div>
        <div>
            <div class="stat-value">+12%</div>
            <div class="stat-label">Actividad vs. ayer</div>
        </div>
    </div>
</div>

<!-- LIVE NOW -->
<div class="content">
    <div class="section-title">En vivo ahora</div>

    <div class="live-table">
        <div class="live-table-header">
            <span>Juego</span>
            <span>Jugadores</span>
            <span>Popularidad</span>
            <span>Tendencia</span>
        </div>

        @php
            $liveData = [
                ['players' => 18420, 'trend' => 'up',   'delta' => '+5.2%'],
                ['players' => 14300, 'trend' => 'up',   'delta' => '+2.8%'],
                ['players' => 12100, 'trend' => 'flat',  'delta' => '0.0%'],
                ['players' => 9800,  'trend' => 'down', 'delta' => '-1.3%'],
                ['players' => 8500,  'trend' => 'up',   'delta' => '+8.1%'],
                ['players' => 7200,  'trend' => 'up',   'delta' => '+3.4%'],
                ['players' => 4100,  'trend' => 'down', 'delta' => '-0.7%'],
                ['players' => 3300,  'trend' => 'flat',  'delta' => '+0.2%'],
                ['players' => 2900,  'trend' => 'up',   'delta' => '+1.5%'],
                ['players' => 1800,  'trend' => 'down', 'delta' => '-2.1%'],
            ];
            $maxPlayers = $liveData[0]['players'];
            $allPlayers = array_sum(array_column($liveData, 'players'));
        @endphp

        @foreach($tienda as $index => $juego)
            @if(isset($liveData[$index]))
            @php
                $live = $liveData[$index];
                $pct  = round(($live['players'] / $maxPlayers) * 100);
                $trendIcon = $live['trend'] === 'up' ? 'fa-arrow-up' : ($live['trend'] === 'down' ? 'fa-arrow-down' : 'fa-minus');
            @endphp
            <div class="live-row">
                <div class="game-info">
                    <img class="game-thumb" src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}">
                    <div>
                        <div class="game-name">{{ $juego->titulo }}</div>
                        <div class="game-genre">{{ $juego->genero }}</div>
                    </div>
                </div>
                <div class="player-count">
                    <span class="dot-live"></span>
                    <span class="live-num" data-base="{{ $live['players'] }}">
                        {{ number_format($live['players']) }}
                    </span>
                </div>
                <div>
                    <div style="font-size:.7rem;color:var(--muted);margin-bottom:.3rem;">{{ $pct }}%</div>
                    <div class="bar-wrap" style="width:90px">
                        <div class="bar-fill" style="width:{{ $pct }}%"></div>
                    </div>
                </div>
                <div class="trend {{ $live['trend'] }}">
                    <i class="fas {{ $trendIcon }}"></i> {{ $live['delta'] }}
                </div>
            </div>
            @endif
        @endforeach
    </div>

    <!-- TOP PLAYERS -->
    <div class="section-title">Jugadores activos</div>
    <div class="players-grid">
        @php
            $players = [
                ['init'=>'AX','name'=>'AxelR99','game'=>'Elden Ring','hrs'=>'1,240 hrs'],
                ['init'=>'MK','name'=>'MasterKnight','game'=>'God of War','hrs'=>'980 hrs'],
                ['init'=>'ZV','name'=>'ZeroVeil','game'=>'Cyberpunk 2077','hrs'=>'870 hrs'],
                ['init'=>'LN','name'=>'LunaFire','game'=>'GTA V','hrs'=>'760 hrs'],
                ['init'=>'DR','name'=>'DarkRealm','game'=>'The Witcher 3','hrs'=>'690 hrs'],
                ['init'=>'NS','name'=>'NeonStar','game'=>'Spider-Man','hrs'=>'540 hrs'],
            ];
        @endphp
        @foreach($players as $p)
        <div class="player-card">
            <div class="avatar">
                {{ $p['init'] }}
                <div class="avatar-status"></div>
            </div>
            <div class="player-name">{{ $p['name'] }}</div>
            <div class="player-game"><i class="fas fa-gamepad" style="margin-right:.3rem;color:var(--muted)"></i>{{ $p['game'] }}</div>
            <div class="player-hours"><i class="fas fa-clock" style="margin-right:.3rem"></i>{{ $p['hrs'] }}</div>
        </div>
        @endforeach
    </div>
</div>

<footer>
    <div class="logo">THE<span>GAMEVAULT</span></div>
    <p>© {{ date('Y') }} THEGAMEVAULT. Todos los derechos reservados.</p>
    <div class="footer-links">
        <a href="{{ route('soporte') }}">Soporte</a>
        <a href="{{ route('comunidad') }}">Comunidad</a>
    </div>
</footer>

<script>
// Simular fluctuación de jugadores en tiempo real
const nums = document.querySelectorAll('.live-num');
let total = 0;

function fluctuate() {
    total = 0;
    nums.forEach(el => {
        const base  = +el.dataset.base;
        const delta = Math.floor((Math.random() - 0.45) * base * 0.015);
        const next  = Math.max(100, base + delta);
        el.dataset.base = next;
        el.textContent  = next.toLocaleString('es-ES');
        total += next;
    });
    document.getElementById('totalOnline').textContent = total.toLocaleString('es-ES');
}

// Set peak game name
const rows = document.querySelectorAll('.live-row');
if (rows.length > 0) {
    const firstName = rows[0].querySelector('.game-name')?.textContent?.trim();
    document.getElementById('peakGame').textContent = firstName || '—';
}

fluctuate();
setInterval(fluctuate, 3000);
</script>
</body>
</html>