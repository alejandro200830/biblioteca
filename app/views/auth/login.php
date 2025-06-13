<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login - Sistema Biblioteca</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center text-primary mb-4">🔐 Iniciar Sesión</h3>

            <?php if (!empty($data['error'])): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($data['error']) ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" class="form-control" placeholder="ejemplo@correo.com"
                        required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Contraseña</label>
                    <input type="password" id="clave" name="clave" class="form-control" placeholder="Ingrese su clave"
                        required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
            </form>

            <div class="text-center mt-3">
                <a href="/registrar" class="text-decoration-none">Registrate</a>
            </div>
        </div>
    </div>

</body>

</html>