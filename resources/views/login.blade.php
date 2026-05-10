<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THEGAMEVAULT — Acceso Admin</title>
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

        body {
            background:var(--bg);
            color:var(--text);
            font-family:'Inter',sans-serif;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            position:relative;
            overflow:hidden;
        }

        /* Fondo decorativo */
        .bg-glow {
            position:fixed;
            width:500px; height:500px;
            border-radius:50%;
            background:radial-gradient(circle, rgba(0,229,160,.06) 0%, transparent 70%);
            top:50%; left:50%;
            transform:translate(-50%,-50%);
            pointer-events:none;
        }
        .bg-grid {
            position:fixed; inset:0;
            background-image:
                linear-gradient(rgba(0,229,160,.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,229,160,.03) 1px, transparent 1px);
            background-size:40px 40px;
            pointer-events:none;
        }

        /* CARD */
        .login-card {
            position:relative; z-index:1;
            background:var(--card);
            border:1px solid var(--border);
            border-radius:12px;
            padding:2.5rem;
            width:100%; max-width:420px;
            box-shadow:0 24px 80px rgba(0,0,0,.5);
        }

        /* LOGO */
        .login-logo {
            text-align:center;
            margin-bottom:2rem;
        }
        .login-logo a {
            font-family:'Rajdhani',sans-serif;
            font-size:1.8rem; font-weight:700;
            color:var(--text); text-decoration:none; letter-spacing:1px;
        }
        .login-logo a span { color:var(--accent); }
        .login-logo p {
            color:var(--muted); font-size:.78rem;
            margin-top:.3rem; letter-spacing:.5px; text-transform:uppercase;
        }

        /* DIVIDER */
        .divider {
            height:1px; background:var(--border);
            margin-bottom:1.8rem;
        }

        /* BADGE */
        .admin-badge {
            display:inline-flex; align-items:center; gap:.5rem;
            background:rgba(0,229,160,.08);
            border:1px solid rgba(0,229,160,.2);
            color:var(--accent);
            font-size:.72rem; font-weight:600; letter-spacing:1px;
            padding:.4rem .9rem; border-radius:20px;
            text-transform:uppercase;
            margin-bottom:1.5rem;
        }
        .admin-badge i { font-size:.7rem; }

        /* FORM */
        .form-group { margin-bottom:1.2rem; }
        .form-group label {
            display:block;
            font-size:.75rem; font-weight:600;
            color:var(--muted); letter-spacing:.5px;
            text-transform:uppercase; margin-bottom:.5rem;
        }

        .input-wrap { position:relative; }
        .input-wrap i {
            position:absolute; left:1rem; top:50%;
            transform:translateY(-50%);
            color:var(--muted); font-size:.85rem;
            transition:color .2s;
        }
        .input-wrap input {
            width:100%;
            background:var(--bg3);
            border:1px solid var(--border);
            border-radius:6px;
            padding:.8rem 1rem .8rem 2.8rem;
            color:var(--text); font-size:.9rem;
            outline:none; transition:border-color .2s;
            font-family:'Inter',sans-serif;
        }
        .input-wrap input:focus { border-color:var(--accent); }
        .input-wrap input:focus + i,
        .input-wrap:focus-within i { color:var(--accent); }
        .input-wrap input::placeholder { color:var(--muted); }

        /* Toggle password */
        .toggle-pw {
            position:absolute; right:1rem; top:50%;
            transform:translateY(-50%);
            color:var(--muted); font-size:.85rem;
            cursor:pointer; transition:color .2s;
            background:none; border:none;
        }
        .toggle-pw:hover { color:var(--accent); }

        /* ERROR */
        @if(session('error'))
        @endif
        .error-msg {
            background:rgba(255,77,109,.08);
            border:1px solid rgba(255,77,109,.25);
            color:var(--danger);
            border-radius:6px;
            padding:.7rem 1rem;
            font-size:.8rem;
            display:flex; align-items:center; gap:.6rem;
            margin-bottom:1.2rem;
        }

        /* SUBMIT */
        .btn-submit {
            width:100%;
            background:var(--accent); color:#000;
            border:none; border-radius:6px;
            padding:.85rem;
            font-family:'Rajdhani',sans-serif;
            font-size:1rem; font-weight:700; letter-spacing:1px;
            cursor:pointer; transition:background .2s, transform .15s;
            margin-top:.5rem;
            text-transform:uppercase;
        }
        .btn-submit:hover { background:var(--accent2); transform:translateY(-1px); }
        .btn-submit:active { transform:translateY(0); }

        /* BACK LINK */
        .back-link {
            display:flex; align-items:center; justify-content:center; gap:.4rem;
            margin-top:1.5rem;
            color:var(--muted); font-size:.8rem;
            text-decoration:none; transition:color .2s;
        }
        .back-link:hover { color:var(--accent); }
    </style>
</head>
<body>

<div class="bg-grid"></div>
<div class="bg-glow"></div>

<div class="login-card">

    <div class="login-logo">
        <a href="{{ route('home') }}">THE<span>GAMEVAULT</span></a>
        <p>Panel de administración</p>
    </div>

    <div class="divider"></div>

    <div class="admin-badge">
        <i class="fas fa-shield-halved"></i> Acceso restringido
    </div>

    @if(session('error'))
    <div class="error-msg">
        <i class="fas fa-circle-exclamation"></i>
        {{ session('error') }}
    </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Usuario</label>
            <div class="input-wrap">
                <input type="text" name="usuario" placeholder="Nombre de usuario" required autocomplete="off">
                <i class="fas fa-user"></i>
            </div>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <div class="input-wrap">
                <input type="password" name="password" id="pwInput" placeholder="••••••••" required>
                <i class="fas fa-lock"></i>
                <button type="button" class="toggle-pw" onclick="togglePw()">
                    <i class="fas fa-eye" id="pwIcon"></i>
                </button>
            </div>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fas fa-right-to-bracket" style="margin-right:.5rem"></i>Entrar al sistema
        </button>
    </form>

    <a href="{{ route('home') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Volver a la tienda
    </a>
</div>

<script>
function togglePw() {
    const input  = document.getElementById('pwInput');
    const icon   = document.getElementById('pwIcon');
    const isText = input.type === 'text';
    input.type   = isText ? 'password' : 'text';
    icon.className = isText ? 'fas fa-eye' : 'fas fa-eye-slash';
}
</script>
</body>
</html>