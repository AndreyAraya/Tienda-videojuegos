<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameVault | Login</title>
    @vite(['resources/css/app.css'])
</head>

<body style="display:flex; justify-content:center; align-items:center; height:100vh;">

    <div class="admin-card" style="width:100%; max-width:400px;">
        <div style="text-align:center; margin-bottom:20px;">
            <a href="/" class="nav-logo" style="text-decoration:none;">TIENDA<span>DEJUEGOS</span></a>
        </div>
        <h2>Acceso Dueño</h2>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Usuario Administrador</label>
                <input type="text" name="usuario" class="admin-input" placeholder="Ej: TGV" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="admin-input" placeholder="••••" required>
            </div>
            <button type="submit" class="btn-action" style="width:100%; padding:15px; font-size:1rem;">Entrar al Sistema</button>
        </form>
        <a href="/" style="display:block; text-align:center; margin-top:20px; color:var(--text-muted); font-size:0.8rem; text-decoration:none;">← Volver a la tienda</a>
    </div>

</body>

</html>