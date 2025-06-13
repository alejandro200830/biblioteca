<div class="container mt-4">
    <h2>Renovar Préstamo</h2>

    <form action="/prestamo/renovar/<?= $id ?>" method="POST">
        <div class="mb-3">
            <label for="fecha_entrega" class="form-label">Nueva fecha de entrega</label>
            <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega"
                   value="<?= date('Y-m-d', strtotime('+7 days')) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Renovar</button>
        <a href="/prestamos" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
