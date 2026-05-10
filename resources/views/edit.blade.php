<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEGAMEVAULT — Editar Juego</title>
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
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { background:var(--bg); color:var(--text); font-family:'Inter',sans-serif; min-height:100vh; display:flex; flex-direction:column; }

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
        .nav-right { display:flex; align-items:center; gap:1rem; }
        .btn-outline { border:1px solid var(--border); color:var(--muted); background:transparent; padding:.45rem 1.2rem; border-radius:4px; font-size:.8rem; font-weight:600; cursor:pointer; text-decoration:none; transition:border-color .2s, color .2s; }
        .btn-outline:hover { border-color:var(--accent); color:var(--accent); }

        /* PAGE HEADER */
        .page-header {
            margin-top:64px;
            padding:2rem 5%;
            background:linear-gradient(180deg,#12161f 0%,var(--bg) 100%);
            border-bottom:1px solid var(--border);
            display:flex; align-items:center; gap:1.2rem;
        }
        .page-header-img {
            width:64px; height:44px; border-radius:6px;
            object-fit:cover; border:1px solid var(--border);
        }
        .page-header h1 { font-family:'Rajdhani',sans-serif; font-size:1.8rem; font-weight:700; letter-spacing:2px; text-transform:uppercase; }
        .page-header h1 span { color:var(--accent); }
        .page-header p { color:var(--muted); font-size:.85rem; margin-top:.2rem; }

        /* MAIN */
        .main-content { padding:2.5rem 5%; flex:1; display:grid; grid-template-columns:1fr 320px; gap:2rem; align-items:start; }

        /* CARDS */
        .form-card {
            background:var(--card); border:1px solid var(--border); border-radius:10px; overflow:hidden;
        }
        .form-card-header {
            padding:1.1rem 1.5rem;
            background:var(--bg3); border-bottom:1px solid var(--border);
            display:flex; align-items:center; gap:.6rem;
            font-family:'Rajdhani',sans-serif; font-size:1rem; font-weight:700; letter-spacing:1px; text-transform:uppercase;
        }
        .form-card-header i { color:var(--accent); }
        .form-card-header.danger i { color:var(--danger); }
        .form-card-body { padding:1.5rem; }

        /* FORM */
        .form-group { margin-bottom:1.2rem; }
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1.2rem; }

        label { display:block; font-size:.72rem; font-weight:600; color:var(--muted); letter-spacing:.5px; text-transform:uppercase; margin-bottom:.5rem; }

        .input-wrap { position:relative; }
        .input-wrap i { position:absolute; left:1rem; top:50%; transform:translateY(-50%); color:var(--muted); font-size:.8rem; pointer-events:none; transition:color .2s; }
        .input-wrap:focus-within i { color:var(--accent); }

        input, textarea {
            width:100%; background:var(--bg3); border:1px solid var(--border); border-radius:6px;
            padding:.75rem 1rem .75rem 2.6rem; color:var(--text); font-size:.88rem;
            outline:none; transition:border-color .2s; font-family:'Inter',sans-serif;
        }
        input:focus, textarea:focus { border-color:var(--accent); }
        input::placeholder { color:var(--muted); }
        input[type="date"]::-webkit-calendar-picker-indicator { filter:invert(.4); cursor:pointer; }

        /* BUTTONS */
        .btn-save {
            width:100%; background:var(--accent); color:#000; border:none; border-radius:6px;
            padding:.85rem; font-family:'Rajdhani',sans-serif; font-size:1rem; font-weight:700;
            letter-spacing:1px; text-transform:uppercase; cursor:pointer;
            display:flex; align-items:center; justify-content:center; gap:.6rem;
            transition:background .2s, transform .15s; margin-top:.5rem;
        }
        .btn-save:hover { background:var(--accent2); transform:translateY(-1px); }

        .btn-cancel {
            display:flex; align-items:center; justify-content:center; gap:.4rem;
            width:100%; margin-top:.8rem;
            color:var(--muted); font-size:.8rem; text-decoration:none; transition:color .2s;
        }
        .btn-cancel:hover { color:var(--text); }

        .btn-delete {
            width:100%; background:transparent; border:1px solid var(--danger); color:var(--danger);
            border-radius:6px; padding:.85rem; font-family:'Rajdhani',sans-serif;
            font-size:.9rem; font-weight:700; letter-spacing:1px; text-transform:uppercase;
            cursor:pointer; display:flex; align-items:center; justify-content:center; gap:.6rem;
            transition:background .2s;
        }
        .btn-delete:hover { background:rgba(255,77,109,.1); }

        /* DIVIDER */
        .divider { height:1px; background:var(--border); margin:1.5rem 0; }

        /* SIDEBAR */
        .sidebar { display:flex; flex-direction:column; gap:1.2rem; position:sticky; top:80px; }

        /* PREVIEW */
        .preview-card { background:var(--card); border:1px solid var(--border); border-radius:10px; overflow:hidden; }
        .preview-img-wrap { height:140px; overflow:hidden; position:relative; }
        .preview-img-wrap img { width:100%; height:100%; object-fit:cover; transition:transform .3s; }
        .preview-img-wrap img:hover { transform:scale(1.05); }
        .preview-body { padding:1rem; }
        .preview-genre { font-size:.7rem; color:var(--accent); font-weight:600; letter-spacing:.5px; text-transform:uppercase; margin-bottom:.3rem; }
        .preview-platform { font-size:.7rem; color:var(--muted); margin-bottom:.5rem; }
        .preview-title { font-family:'Rajdhani',sans-serif; font-size:1.05rem; font-weight:700; margin-bottom:.8rem; }
        .preview-footer { display:flex; align-items:center; justify-content:space-between; }
        .preview-price { font-family:'Rajdhani',sans-serif; font-size:1.4rem; font-weight:700; color:var(--accent); }
        .preview-stock { font-size:.7rem; color:var(--muted); }

        /* INFO CARD */
        .info-card { background:var(--card); border:1px solid var(--border); border-radius:10px; padding:1.2rem; }
        .info-row { display:flex; justify-content:space-between; align-items:center; padding:.5rem 0; border-bottom:1px solid var(--border); font-size:.8rem; }
        .info-row:last-child { border-bottom:none; }
        .info-row .info-label { color:var(--muted); }
        .info-row .info-value { font-weight:600; }
        .info-row .info-value.green { color:var(--accent); }
        .info-row .info-value.red { color:var(--danger); }

        /* FOOTER */
        footer { background:var(--bg2); border-top:1px solid var(--border); padding:1.5rem 5%; display:flex; align-items:center; justify-content:space-between; }
        footer .logo { font-family:'Rajdhani',sans-serif; font-size:1.1rem; font-weight:700; }
        footer .logo span { color:var(--accent); }
        footer p { color:var(--muted); font-size:.78rem; }

        @media(max-width:768px) { .main-content { grid-template-columns:1fr; } .sidebar { position:static; } }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="{{ route('home') }}" class="nav-logo">THE<span>GAMEVAULT</span></a>
    <div class="nav-right">
        <a href="{{ route('home') }}" class="btn-outline"><i class="fas fa-arrow-left" style="margin-right:.4rem"></i>Volver a la tienda</a>
        <a href="{{ route('logout') }}" style="color:var(--danger);font-size:.8rem;text-decoration:none;font-weight:600;">SALIR</a>
    </div>
</nav>

<!-- PAGE HEADER -->
<div class="page-header">
    <img class="page-header-img" src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}">
    <div>
        <h1>Editando: <span>{{ $juego->titulo }}</span></h1>
        <p>Modificá los datos del juego y guardá los cambios.</p>
    </div>
</div>

<!-- MAIN -->
<div class="main-content">

    <!-- FORM -->
    <div>
        <div class="form-card" style="margin-bottom:1.5rem;">
            <div class="form-card-header">
                <i class="fas fa-pen"></i> Editar información
            </div>
            <div class="form-card-body">
                <form action="{{ route('videojuegos.update', $juego->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Título del juego</label>
                        <div class="input-wrap">
                            <i class="fas fa-heading"></i>
                            <input type="text" name="titulo" id="prev-titulo" value="{{ $juego->titulo }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div>
                            <label>Precio (USD)</label>
                            <div class="input-wrap">
                                <i class="fas fa-dollar-sign"></i>
                                <input type="number" step="0.01" min="0" name="precio" id="prev-precio" value="{{ $juego->precio }}" required>
                            </div>
                        </div>
                        <div>
                            <label>Stock</label>
                            <div class="input-wrap">
                                <i class="fas fa-boxes-stacked"></i>
                                <input type="number" min="0" name="stock" id="prev-stock" value="{{ $juego->stock }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div>
                            <label>Género</label>
                            <div class="input-wrap">
                                <i class="fas fa-tag"></i>
                                <input type="text" name="genero" id="prev-genero" value="{{ $juego->genero }}" required>
                            </div>
                        </div>
                        <div>
                            <label>Plataforma</label>
                            <div class="input-wrap">
                                <i class="fas fa-desktop"></i>
                                <input type="text" name="plataforma" id="prev-plataforma" value="{{ $juego->plataforma }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fecha de lanzamiento</label>
                        <div class="input-wrap">
                            <i class="fas fa-calendar"></i>
                            <input type="date" name="fecha_lanzamiento" value="{{ $juego->fecha_lanzamiento }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>URL de imagen</label>
                        <div class="input-wrap">
                            <i class="fas fa-image"></i>
                            <input type="url" name="imagen" id="prev-imagen" value="{{ $juego->imagen }}" required>
                        </div>
                    </div>

                    <button type="submit" class="btn-save">
                        <i class="fas fa-floppy-disk"></i> Guardar cambios
                    </button>
                </form>

                <a href="{{ route('home') }}" class="btn-cancel">
                    <i class="fas fa-xmark"></i> Cancelar y volver
                </a>
            </div>
        </div>

        <!-- DELETE -->
        <div class="form-card">
            <div class="form-card-header danger">
                <i class="fas fa-triangle-exclamation"></i> Zona peligrosa
            </div>
            <div class="form-card-body">
                <p style="color:var(--muted);font-size:.85rem;margin-bottom:1.2rem;line-height:1.6;">
                    Esta acción es <strong style="color:var(--danger)">permanente e irreversible</strong>. El juego será eliminado completamente de la base de datos.
                </p>
                <form action="{{ route('videojuegos.destroy', $juego->id) }}" method="POST"
                      onsubmit="return confirm('¿Seguro que querés eliminar {{ $juego->titulo }}? Esta acción no se puede deshacer.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">
                        <i class="fas fa-trash"></i> Eliminar permanentemente
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- PREVIEW -->
        <div class="preview-card">
            <div class="form-card-header" style="padding:1.1rem 1.2rem;">
                <i class="fas fa-eye"></i> Vista previa
            </div>
            <div class="preview-img-wrap">
                <img id="prev-img" src="{{ $juego->imagen }}" alt="{{ $juego->titulo }}">
            </div>
            <div class="preview-body">
                <div class="preview-genre" id="disp-genero">{{ $juego->genero }}</div>
                <div class="preview-platform" id="disp-plataforma">{{ $juego->plataforma }}</div>
                <div class="preview-title" id="disp-titulo">{{ strtoupper($juego->titulo) }}</div>
                <div class="preview-footer">
                    <span class="preview-price" id="disp-precio">${{ number_format($juego->precio, 2) }}</span>
                    <span class="preview-stock" id="disp-stock"><i class="fas fa-boxes-stacked" style="margin-right:.3rem"></i>{{ $juego->stock }} uds.</span>
                </div>
            </div>
        </div>

        <!-- INFO -->
        <div class="info-card">
            <div style="font-family:'Rajdhani',sans-serif;font-size:.95rem;font-weight:700;letter-spacing:1px;text-transform:uppercase;margin-bottom:.8rem;display:flex;align-items:center;gap:.5rem;">
                <i style="color:var(--accent)" class="fas fa-circle-info"></i> Estado actual
            </div>
            <div class="info-row">
                <span class="info-label">ID</span>
                <span class="info-value">#{{ $juego->id }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Stock</span>
                <span class="info-value {{ $juego->stock > 0 ? 'green' : 'red' }}">
                    {{ $juego->stock > 0 ? $juego->stock.' uds.' : 'Agotado' }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Estado</span>
                <span class="info-value {{ $juego->comprado ? 'red' : 'green' }}">
                    {{ $juego->comprado ? 'En biblioteca' : 'En tienda' }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Lanzamiento</span>
                <span class="info-value">{{ \Carbon\Carbon::parse($juego->fecha_lanzamiento)->format('d/m/Y') }}</span>
            </div>
        </div>

    </div>
</div>

<footer>
    <div class="logo">THE<span>GAMEVAULT</span></div>
    <p>© {{ date('Y') }} THEGAMEVAULT — Panel de administración</p>
</footer>

<script>
function bind(inputId, displayId, transform) {
    const input   = document.getElementById(inputId);
    const display = document.getElementById(displayId);
    if (!input || !display) return;
    input.addEventListener('input', () => {
        display.textContent = transform ? transform(input.value) : input.value;
    });
}

bind('prev-titulo',    'disp-titulo',    v => v ? v.toUpperCase() : '—');
bind('prev-genero',    'disp-genero',    v => v || '—');
bind('prev-plataforma','disp-plataforma',v => v || '—');
bind('prev-stock',     'disp-stock',     v => `${v || 0} uds.`);
bind('prev-precio',    'disp-precio',    v => {
    const n = parseFloat(v);
    return isNaN(n) ? '$0.00' : (n === 0 ? 'GRATIS' : `$${n.toFixed(2)}`);
});

document.getElementById('prev-imagen').addEventListener('input', function () {
    document.getElementById('prev-img').src = this.value;
});
</script>
</body>
</html>