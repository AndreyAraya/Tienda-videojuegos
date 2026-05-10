<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEGAMEVAULT — Añadir Juego</title>
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
        }
        .page-header h1 { font-family:'Rajdhani',sans-serif; font-size:2rem; font-weight:700; letter-spacing:2px; text-transform:uppercase; display:flex; align-items:center; gap:.8rem; }
        .page-header h1 i { color:var(--accent); }
        .page-header p { color:var(--muted); font-size:.85rem; margin-top:.3rem; }

        /* LAYOUT */
        .main-content { padding:2.5rem 5%; flex:1; display:grid; grid-template-columns:1fr 340px; gap:2rem; align-items:start; }

        /* FORM CARD */
        .form-card {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:10px;
            overflow:hidden;
        }
        .form-card-header {
            padding:1.2rem 1.5rem;
            background:var(--bg3);
            border-bottom:1px solid var(--border);
            display:flex; align-items:center; gap:.6rem;
            font-family:'Rajdhani',sans-serif; font-size:1rem; font-weight:700;
            letter-spacing:1px; text-transform:uppercase;
        }
        .form-card-header i { color:var(--accent); }
        .form-card-body { padding:1.5rem; }

        /* FORM ELEMENTS */
        .form-group { margin-bottom:1.2rem; }
        .form-row { display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1.2rem; }

        label {
            display:block; font-size:.72rem; font-weight:600;
            color:var(--muted); letter-spacing:.5px;
            text-transform:uppercase; margin-bottom:.5rem;
        }

        .input-wrap { position:relative; }
        .input-wrap i {
            position:absolute; left:1rem; top:50%;
            transform:translateY(-50%);
            color:var(--muted); font-size:.8rem; pointer-events:none;
        }
        .input-wrap.textarea-wrap i { top:1rem; transform:none; }

        input, textarea, select {
            width:100%;
            background:var(--bg3);
            border:1px solid var(--border);
            border-radius:6px;
            padding:.75rem 1rem .75rem 2.6rem;
            color:var(--text); font-size:.88rem;
            outline:none; transition:border-color .2s;
            font-family:'Inter',sans-serif;
        }
        input:focus, textarea:focus { border-color:var(--accent); }
        input::placeholder, textarea::placeholder { color:var(--muted); }
        textarea { resize:vertical; min-height:90px; padding-top:.75rem; }

        input[type="date"]::-webkit-calendar-picker-indicator { filter:invert(.4); cursor:pointer; }

        /* SUBMIT */
        .btn-submit {
            width:100%; background:var(--accent); color:#000;
            border:none; border-radius:6px; padding:.85rem;
            font-family:'Rajdhani',sans-serif; font-size:1rem; font-weight:700;
            letter-spacing:1px; text-transform:uppercase; cursor:pointer;
            transition:background .2s, transform .15s;
            display:flex; align-items:center; justify-content:center; gap:.6rem;
            margin-top:.5rem;
        }
        .btn-submit:hover { background:var(--accent2); transform:translateY(-1px); }

        .btn-cancel {
            display:flex; align-items:center; justify-content:center; gap:.4rem;
            width:100%; margin-top:.8rem;
            color:var(--muted); font-size:.8rem; text-decoration:none;
            transition:color .2s;
        }
        .btn-cancel:hover { color:var(--danger); }

        /* PREVIEW CARD */
        .preview-card {
            background:var(--card);
            border:1px solid var(--border);
            border-radius:10px;
            overflow:hidden;
            position:sticky; top:80px;
        }
        .preview-header {
            padding:1.2rem 1.5rem;
            background:var(--bg3);
            border-bottom:1px solid var(--border);
            display:flex; align-items:center; gap:.6rem;
            font-family:'Rajdhani',sans-serif; font-size:1rem; font-weight:700;
            letter-spacing:1px; text-transform:uppercase;
        }
        .preview-header i { color:var(--accent); }

        .preview-img-wrap {
            height:160px; overflow:hidden;
            background:var(--bg3);
            display:flex; align-items:center; justify-content:center;
        }
        .preview-img-wrap img { width:100%; height:100%; object-fit:cover; display:none; }
        .preview-img-placeholder { color:var(--muted); font-size:2.5rem; }

        .preview-body { padding:1.2rem; }
        .preview-genre { font-size:.7rem; color:var(--accent); font-weight:600; letter-spacing:.5px; text-transform:uppercase; margin-bottom:.3rem; }
        .preview-platform { font-size:.7rem; color:var(--muted); margin-bottom:.5rem; }
        .preview-title { font-family:'Rajdhani',sans-serif; font-size:1.1rem; font-weight:700; margin-bottom:.4rem; min-height:1.3em; }
        .preview-desc { font-size:.75rem; color:var(--muted); line-height:1.5; margin-bottom:.8rem; min-height:2em; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
        .preview-footer { display:flex; align-items:center; justify-content:space-between; }
        .preview-price { font-family:'Rajdhani',sans-serif; font-size:1.5rem; font-weight:700; color:var(--accent); }
        .preview-stock { font-size:.7rem; color:var(--muted); }

        /* FOOTER */
        footer { background:var(--bg2); border-top:1px solid var(--border); padding:1.5rem 5%; display:flex; align-items:center; justify-content:space-between; }
        footer .logo { font-family:'Rajdhani',sans-serif; font-size:1.1rem; font-weight:700; }
        footer .logo span { color:var(--accent); }
        footer p { color:var(--muted); font-size:.78rem; }

        @media (max-width: 768px) {
            .main-content { grid-template-columns:1fr; }
            .preview-card { position:static; }
        }
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
    <h1><i class="fas fa-circle-plus"></i> Añadir nuevo juego</h1>
    <p>Completá el formulario para publicar un juego en la tienda.</p>
</div>

<!-- MAIN -->
<div class="main-content">

    <!-- FORM -->
    <div class="form-card">
        <div class="form-card-header">
            <i class="fas fa-gamepad"></i> Información del juego
        </div>
        <div class="form-card-body">
            <form action="{{ route('videojuegos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Título del juego</label>
                    <div class="input-wrap">
                        <i class="fas fa-heading"></i>
                        <input type="text" name="titulo" id="prev-titulo" placeholder="Ej: Elden Ring" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <div class="input-wrap textarea-wrap">
                        <i class="fas fa-align-left"></i>
                        <textarea name="descripcion" id="prev-desc" placeholder="Breve descripción del juego..." required></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label>Precio (USD)</label>
                        <div class="input-wrap">
                            <i class="fas fa-dollar-sign"></i>
                            <input type="number" step="0.01" min="0" name="precio" id="prev-precio" placeholder="0.00" required>
                        </div>
                    </div>
                    <div>
                        <label>Stock</label>
                        <div class="input-wrap">
                            <i class="fas fa-boxes-stacked"></i>
                            <input type="number" min="0" name="stock" id="prev-stock" placeholder="0" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label>Género</label>
                        <div class="input-wrap">
                            <i class="fas fa-tag"></i>
                            <input type="text" name="genero" id="prev-genero" placeholder="Ej: RPG / Acción" required>
                        </div>
                    </div>
                    <div>
                        <label>Plataforma</label>
                        <div class="input-wrap">
                            <i class="fas fa-desktop"></i>
                            <input type="text" name="plataforma" id="prev-plataforma" placeholder="Ej: PC / PS5" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fecha de lanzamiento</label>
                    <div class="input-wrap">
                        <i class="fas fa-calendar"></i>
                        <input type="date" name="fecha_lanzamiento" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>URL de imagen</label>
                    <div class="input-wrap">
                        <i class="fas fa-image"></i>
                        <input type="url" name="imagen" id="prev-imagen" placeholder="https://..." required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-upload"></i> Publicar en tienda
                </button>
            </form>

            <a href="{{ route('home') }}" class="btn-cancel">
                <i class="fas fa-xmark"></i> Cancelar y volver
            </a>
        </div>
    </div>

    <!-- PREVIEW -->
    <div class="preview-card">
        <div class="preview-header">
            <i class="fas fa-eye"></i> Vista previa
        </div>
        <div class="preview-img-wrap">
            <img id="prev-img" src="" alt="Preview">
            <i class="fas fa-image preview-img-placeholder" id="prev-placeholder"></i>
        </div>
        <div class="preview-body">
            <div class="preview-genre" id="disp-genero">Género</div>
            <div class="preview-platform" id="disp-plataforma">Plataforma</div>
            <div class="preview-title" id="disp-titulo">Título del juego</div>
            <div class="preview-desc" id="disp-desc">La descripción del juego aparecerá aquí...</div>
            <div class="preview-footer">
                <span class="preview-price" id="disp-precio">$0.00</span>
                <span class="preview-stock" id="disp-stock"><i class="fas fa-boxes-stacked" style="margin-right:.3rem"></i>0 uds.</span>
            </div>
        </div>
    </div>

</div>

<footer>
    <div class="logo">THE<span>GAMEVAULT</span></div>
    <p>© {{ date('Y') }} THEGAMEVAULT — Panel de administración</p>
</footer>

<script>
// Live preview
function bind(inputId, displayId, transform) {
    const input   = document.getElementById(inputId);
    const display = document.getElementById(displayId);
    if (!input || !display) return;
    input.addEventListener('input', () => {
        display.textContent = transform ? transform(input.value) : (input.value || display.dataset.placeholder || '');
    });
}

bind('prev-titulo',    'disp-titulo',    v => v || 'Título del juego');
bind('prev-desc',      'disp-desc',      v => v || 'La descripción del juego aparecerá aquí...');
bind('prev-genero',    'disp-genero',    v => v || 'Género');
bind('prev-plataforma','disp-plataforma',v => v || 'Plataforma');
bind('prev-stock',     'disp-stock',     v => `${v || 0} uds.`);
bind('prev-precio',    'disp-precio',    v => {
    const n = parseFloat(v);
    return isNaN(n) ? '$0.00' : (n === 0 ? 'GRATIS' : `$${n.toFixed(2)}`);
});

// Image preview
document.getElementById('prev-imagen').addEventListener('input', function () {
    const img = document.getElementById('prev-img');
    const placeholder = document.getElementById('prev-placeholder');
    if (this.value) {
        img.src = this.value;
        img.style.display = 'block';
        placeholder.style.display = 'none';
        img.onerror = () => { img.style.display='none'; placeholder.style.display='block'; };
    } else {
        img.style.display = 'none';
        placeholder.style.display = 'block';
    }
});
</script>
</body>
</html>