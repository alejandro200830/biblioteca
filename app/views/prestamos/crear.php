<div class="container mt-4">
    <h2>Registrar Préstamo</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuario</label>
            <select name="usuario_id" id="usuario_id" class="form-select" required>
                <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>"><?= htmlspecialchars($usuario['nombre']) ?>
                        (<?php if ($usuario['rol'] == '1') { ?>
                            Estudiante
                        <?php } elseif ($usuario['rol'] == '2') { ?>
                            Profesor
                        <?php } else { ?>
                            Bibliotecario
                        <?php } ?>
                        )
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="libro_id" class="form-label">Libro</label>
            <select name="libro_id" id="libro_id" class="form-select" required>
                <?php foreach ($libros as $libro): ?>
                    <option value="<?= $libro['id'] ?>"><?= htmlspecialchars($libro['titulo']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    
        <div class="mb-3">
            <label for="fecha_prestamo" class="form-label">Fecha de Prestamo</label>
            <input type="date" name="fecha_prestamo" id="fecha_prestamo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_entrega" class="form-label">Fecha de Entrega</label>
            <input type="date" name="fecha_entrega" id="fecha_entrega" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_devolucion" class="form-label">Fecha de Devolución Estimada</label>
            <input type="date" name="fecha_devolucion" id="fecha_devolucion" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <a href="/prestamos" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>