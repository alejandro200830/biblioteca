<div class="container mt-4">
    <h2>Listado de Préstamos</h2>
    <a href="/prestamo/crear" class="btn btn-success mb-3">➕ Nuevo Préstamo</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Libro</th>
                <th>Entrega</th>
                <th>Devolución</th>
                <th>Devuelto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($prestamos as $prestamo): ?>
                <tr>
                    <td><?= $prestamo['id'] ?></td>
                    <td><?= htmlspecialchars($prestamo['nombre_usuario']) ?></td>
                    <td><?= htmlspecialchars($prestamo['titulo_libro']) ?></td>
                    <td><?= $prestamo['fecha_entrega'] ?></td>
                    <td><?= $prestamo['fecha_devolucion'] ?></td>
                    <td><?= $prestamo['devuelto'] ? '✔ Sí' : '✖ No' ?></td>
                    <td>
                        <?php if (!$prestamo['devuelto']): ?>
                            <a href="/prestamo/devolver/<?= $prestamo['id'] ?>" class="btn btn-sm btn-success">✔ Devolver</a>
                            <a href="/prestamo/renovar/<?= $prestamo['id'] ?>" class="btn btn-sm btn-warning">🔁 Renovar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>