<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameVault | Editar Juego</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <nav class="navbar">
        <a href="/" class="nav-logo">GAME<span>VAULT</span></a>
    </nav>

    <div class="admin-container">
        <div class="admin-card">
            <h2>Gestión de Software</h2>

            <form action="{{ route('videojuegos.update', $juego->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" class="admin-input" value="{{ $juego->titulo }}" required>
                </div>

                <div style="display:flex; gap:10px;">
                    <div class="form-group" style="flex:1;">
                        <label>Precio</label>
                        <input type="number" step="0.01" name="precio" class="admin-input" value="{{ $juego->precio }}" required>
                    </div>
                    <div class="form-group" style="flex:1;">
                        <label>Stock</label>
                        <input type="number" name="stock" class="admin-input" value="{{ $juego->stock }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>URL Imagen</label>
                    <input type="url" name="imagen" class="admin-input" value="{{ $juego->imagen }}" required>
                </div>

                <button type="submit" class="btn-admin">Guardar Cambios</button>
            </form>

            <hr style="border: 0; border-top: 1px solid #30363d; margin: 30px 0;">

            <form action="{{ route('videojuegos.destroy', $juego->id) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres borrar este juego de la base de datos?')">
                @csrf
                @method('DELETE')
                <button type="submit" style="width:100%; background:transparent; border:1px solid #ff4444; color:#ff4444; padding:10px; cursor:pointer; font-weight:bold; border-radius:4px; text-transform:uppercase;">
                    Eliminar permanentemente del sistema
                </button>
            </form>

            <a href="/" style="display:block; text-align:center; color:#8b949e; margin-top:20px; font-size:0.8rem; text-decoration:none;">Cancelar y volver</a>
        </div>
    </div>
</body>

</html>