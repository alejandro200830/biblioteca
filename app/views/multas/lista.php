<h2>Multas del Usuario</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Préstamo</th>
            <th>Monto</th>
            <th>Estado</th>
            <th>Pago</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($multas as $m): ?>
        <tr>
            <td><?= $m['id'] ?></td>
            <td><?= $m['id_prestamo'] ?></td>
            <td>$<?= $m['monto'] ?></td>
            <td><?= ucfirst($m['estado']) ?></td>
            <td>
                <?php if ($m['estado'] === 'pendiente'): ?>
                <a href="/multa/pagar/<?= $m['id'] ?>" class="btn btn-sm btn-success">💰 Pagar</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
