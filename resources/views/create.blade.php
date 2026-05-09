<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>GameVault | Cargar Juego</title>
    @vite(['resources/css/app.css'])
</head>

<body>

    <nav class="navbar">
        <a href="/" class="nav-logo">TIENDA<span>DEJUEGOS</span></a>
    </nav>

    <div class="admin-container">
        <div class="admin-card">
            <h2>Añadir nuevo juego</h2>

            <form action="{{ route('videojuegos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Título del Juego</label>
                    <input type="text" name="titulo" class="admin-input" required>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="admin-input" rows="3" required></textarea>
                </div>

                <div style="display:flex; gap:10px;">
                    <div class="form-group" style="flex:1;">
                        <label>Precio</label>
                        <input type="number" step="0.01" name="precio" class="admin-input" required>
                    </div>
                    <div class="form-group" style="flex:1;">
                        <label>Género</label>
                        <input type="text" name="genero" class="admin-input" required>
                    </div>
                </div>

                <div style="display:flex; gap:10px;">
                    <div class="form-group" style="flex:1;">
                        <label>Plataforma</label>
                        <input type="text" name="plataforma" class="admin-input" required>
                    </div>
                    <div class="form-group" style="flex:1;">
                        <label>Stock</label>
                        <input type="number" name="stock" class="admin-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fecha de Lanzamiento</label>
                    <input type="date" name="fecha_lanzamiento" class="admin-input" required>
                </div>

                <div class="form-group">
                    <label>URL de Imagen</label>
                    <input type="url" name="imagen" class="admin-input" required>
                </div>

                <button type="submit" class="btn-admin">Publicar en Tienda</button>
            </form>

            <a href="/" style="display:block; text-align:center; color:var(--text-muted); margin-top:20px; font-size:0.8rem; text-decoration:none;">← Cancelar</a>
        </div>
    </div>

</body>

</html>