<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">📘 Detalle del Libro</h3>
        </div>
        <div class="card-body">
            <p><strong>📖 Título:</strong> <?= htmlspecialchars($libro['titulo']) ?></p>
            <p><strong>📝 Subtítulo:</strong> <?= htmlspecialchars($libro['subtitulo']) ?></p>
            <p><strong>👨‍💼 Autor(es):</strong> <?= htmlspecialchars($libro['autores']) ?></p>
            <p><strong>🔢 ISBN-10:</strong> <?= htmlspecialchars($libro['isbn_10']) ?></p>
            <p><strong>🔢 ISBN-13:</strong> <?= htmlspecialchars($libro['isbn_13']) ?></p>
            <p><strong>🏢 Editorial:</strong> <?= htmlspecialchars($libro['editorial']) ?></p>
            <p><strong>📆 Edición:</strong> <?= htmlspecialchars($libro['edicion']) ?></p>
            <p><strong>📅 Año de Publicación:</strong> <?= htmlspecialchars($libro['anio_publicacion']) ?></p>
            <p><strong>📄 Páginas:</strong> <?= htmlspecialchars($libro['numero_paginas']) ?></p>
            <p><strong>🗣 Idioma:</strong> <?= htmlspecialchars($libro['idioma']) ?></p>
            <p><strong>🏷 Categoría:</strong> <?= htmlspecialchars($libro['categoria']) ?></p>
            <p><strong>📄 Formato:</strong> <?= htmlspecialchars($libro['formato']) ?></p>
            <p><strong>📚 Disponible:</strong> <?= $prestado ? '✖ No (Prestado)' : '✔ Sí' ?></p>
            <p><strong>📍 Ubicación Física:</strong> <?= htmlspecialchars($libro['ubicacion']) ?></p>
            <p><strong>📝 Descripción:</strong> <?= nl2br(htmlspecialchars($libro['descripcion'])) ?></p>
            <?php if (!empty($libro['portada_url'])): ?>
                <p><strong>🖼 Portada:</strong><br>
                    <img src="<?= htmlspecialchars($libro['portada_url']) ?>" alt="Portada del libro" class="img-thumbnail" style="max-width: 200px;">
                </p>
            <?php endif; ?>

            <?php if (isset($usuario)): ?>
                <?php if ($prestado): ?>
                    <form action="/prestamo/reservar/<?= $libro['id'] ?>" method="POST">
                        <button type="submit" class="btn btn-warning">🔒 Reservar Libro</button>
                    </form>
                <?php else: ?>
                    <form action="/prestamo/crear" method="POST">
                        <input type="hidden" name="id_libro" value="<?= $libro['id'] ?>">
                        <input type="hidden" name="id_usuario" value="<?= $usuario['id'] ?>">
                        <input type="hidden" name="fecha_prestamo" value="<?= date('Y-m-d') ?>">
                        <input type="hidden" name="fecha_entrega" value="<?= date('Y-m-d', strtotime('+7 days')) ?>">
                        <button type="submit" class="btn btn-success">📖 Solicitar Préstamo</button>
                    </form>
                <?php endif; ?>
            <?php else: ?>
                <p class="text-muted">🔐 Inicia sesión para solicitar el préstamo o reservar este libro.</p>
            <?php endif; ?>
        </div>
        <div class="card-footer text-end">
            <a href="/libros" class="btn btn-secondary">↩️ Volver al Catálogo</a>
        </div>
    </div>
</div>
<