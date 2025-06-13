<h2 class="mb-4">📚 Catálogo de Libros</h2>

<a href="/libro/crear" class="btn btn-success mb-3">➕ Agregar Libro</a>

<form method="POST" action="/libro/buscar" class="mb-3 d-flex">
    <input type="text" name="criterio" class="form-control me-2"
        placeholder="Buscar por título, autor, ISBN, categoría..." value="<?= htmlspecialchars($criterio ?? '') ?>">
    <button type="submit" class="btn btn-primary">🔍 Buscar</button>
</form>

<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor(es)</th>
            <th>ISBN</th>
            <th>Editorial</th>
            <th>Categoría</th>
            <th>Disponibilidad</th>
            <th>Formato</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($libros)): ?>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= $libro['id'] ?></td>
                    <td><?= htmlspecialchars($libro['titulo']) ?></td>
                    <td><?= htmlspecialchars($libro['autores']) ?></td>
                    <td><?= htmlspecialchars($libro['isbn_13'] ?? $libro['isbn_10']) ?></td>
                    <td><?= htmlspecialchars($libro['editorial']) ?></td>
                    <td><?= htmlspecialchars($libro['categoria']) ?></td>
                    <td><?= htmlspecialchars($libro['disponibilidad']) ?></td>
                    <td><?= htmlspecialchars($libro['formato']) ?></td>
                    <td>
                        <a href="/libro/mostrar/<?= $libro['id'] ?>" class="btn btn-sm btn-info">👁 Ver</a>
                        <a href="/libro/eliminar/<?= $libro['id'] ?>" class="btn btn-sm btn-danger"
                            onclick="return confirm('¿Estás seguro de eliminar este libro?')">🗑 Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">No hay libros registrados.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>