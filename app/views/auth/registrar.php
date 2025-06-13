<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrarse - Sistema Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center text-success">📝 Registro de Usuario</h2>

        <?php if (!empty($data['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
        <?php endif; ?>

        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" name="correo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="clave" class="form-label">Contraseña:</label>
                <input type="password" name="clave" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" name="direccion" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Tipo de usuario:</label>
                <select name="rol" class="form-select" required>
                    <option value="">Seleccionar</option>
                    <option value="1">Estudiante</option>
                    <option value="2">Profesor</option>
                    <option value="3">Bibliotecario</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="/" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Registrarse</button>
            </div>
        </form>
    </div>
</body>

</html>