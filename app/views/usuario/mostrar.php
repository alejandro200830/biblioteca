    <div class="container mt-4">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">👤 Detalle del Usuario</h3>
            </div>
            <div class="card-body">
                <p><strong>📛 Nombre:</strong> <?= htmlspecialchars($data['usuario']['nombre']) ?></p>
                <p><strong>📧 Correo:</strong> <?= htmlspecialchars($data['usuario']['correo']) ?></p>
                <p><strong>📞 Teléfono:</strong> <?= htmlspecialchars($data['usuario']['telefono']) ?></p>
                <p><strong>📍 Dirección:</strong> <?= htmlspecialchars($data['usuario']['direccion']) ?></p>
                <p><strong>📍 Rol:</strong> 
            <?php if ($data['usuario']['rol'] == '1') { ?>
                Estudiante
                <?php } elseif ($data['usuario']['rol'] == '2') {?>
                Profesor
                <?php } else { ?>
                Bibliotecario
                <?php }?>
                </p>
            </div>
            <div class="card-footer text-end">
                <a href="/usuarios" class="btn btn-secondary">↩️ Volver a la Lista</a>
            </div>
        </div>
    </div>
    