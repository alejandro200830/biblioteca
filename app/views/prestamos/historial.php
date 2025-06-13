<div class="container mt-4">
    <h2>Historial de Préstamos del Usuario: <?= htmlspecialchars($usuario['nombre']) ?></h2>
    <a href="/usuarios" class="btn btn-secondary mb-3">↩️ Volver</a>

    <?php if (!empty($prestamos)): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Libro</th>
                    <th>Entrega</th>
                    <th>Devolución</th>
                    <th>Devuelto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prestamos as $prestamo): ?>
                    <tr>
                        <td><?= $prestamo['id'] ?></td>
                        <td><?= htmlspecialchars($prestamo['libro_titulo']) ?></td>
                        <td><?= $prestamo['fecha_entrega'] ?></td>
                        <td><?= $prestamo['fecha_devolucion'] ?></td>
                        <td><?= $prestamo['devuelto'] ? '✔ Sí' : '✖ No' ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay préstamos registrados para este usuario.</p>
    <?php endif; ?>
</div>