<div class="container mt-4">
    <div class="card shadow rounded">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">📘 Detalle del Libro</h3>
        </div>
        <div class="card-body">
            <p><strong>📖 Título:</strong> <?= htmlspecialchars($data['libro']['titulo']) ?></p>
            <p><strong>📝 Subtítulo:</strong> <?= htmlspecialchars($data['libro']['subtitulo']) ?></p>
            <p><strong>👨‍💼 Autor(es):</strong> <?= htmlspecialchars($data['libro']['autores']) ?></p>
            <p><strong>🔢 ISBN-10:</strong> <?= htmlspecialchars($data['libro']['isbn_10']) ?></p>
            <p><strong>🔢 ISBN-13:</strong> <?= htmlspecialchars($data['libro']['isbn_13']) ?></p>
            <p><strong>🏢 Editorial:</strong> <?= htmlspecialchars($data['libro']['editorial']) ?></p>
            <p><strong>📆 Edición:</strong> <?= htmlspecialchars($data['libro']['edicion']) ?></p>
            <p><strong>📅 Año de Publicación:</strong> <?= htmlspecialchars($data['libro']['anio_publicacion']) ?></p>
            <p><strong>📄 Páginas:</strong> <?= htmlspecialchars($data['libro']['numero_paginas']) ?></p>
            <p><strong>🗣 Idioma:</strong> <?= htmlspecialchars($data['libro']['idioma']) ?></p>
            <p><strong>🏷 Categoría:</strong> <?= htmlspecialchars($data['libro']['categoria']) ?></p>
            <p><strong>📝 Descripción:</strong> <?= nl2br(htmlspecialchars($data['libro']['descripcion'])) ?></p>
            <p><strong>📚 Disponibilidad:</strong> <?= htmlspecialchars($data['libro']['disponibilidad']) ?></p>
            <p><strong>📍 Ubicación Física:</strong> <?= htmlspecialchars($data['libro']['ubicacion']) ?></p>
            <p><strong>💾 Formato:</strong> <?= htmlspecialchars($data['libro']['formato']) ?></p>
        </div>
        <div class="card-footer text-end">
            <a href="/libros" class="btn btn-secondary">↩️ Volver al Catálogo</a>
        </div>
    </div>
</div>
