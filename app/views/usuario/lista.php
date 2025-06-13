<h2 class="mb-4">👥 Lista de Usuarios</h2>

<a href="/usuario/crear" class="btn btn-success mb-3">➕ Agregar Usuario</a>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($usuarios)): ?>
        <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= htmlspecialchars($usuario['nombre']) ?></td>
            <td><?= htmlspecialchars($usuario['correo']) ?></td>
            <td><?= htmlspecialchars($usuario['telefono']) ?></td>
            <td><?= htmlspecialchars($usuario['direccion']) ?></td>
            <td>
                <?php if ($usuario['rol'] == '1') { ?>
                Estudiante
                <?php } elseif ($usuario['rol'] == '2'){?>
                Profesor
                <?php } else { ?>
                Bibliotecario
                <?php }?>
            </td>
            <td>
                <a href="/usuario/mostrar/<?= $usuario['id'] ?>" class="btn btn-sm btn-info">👁 Ver</a>
                <a href="/usuario/eliminar/<?= $usuario['id'] ?>" class="btn btn-sm btn-danger"
                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">🗑 Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="7" class="text-center">No hay usuarios registrados.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>