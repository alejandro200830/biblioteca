<div class="container">
    <h2>Registrar Libro</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="subtitulo" class="form-label">Subtítulo</label>
            <input type="text" name="subtitulo" id="subtitulo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="autores" class="form-label">Autor(es)</label>
            <input type="text" name="autores" id="autores" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isbn_10" class="form-label">ISBN-10</label>
            <input type="text" name="isbn_10" id="isbn_10" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isbn_13" class="form-label">ISBN-13</label>
            <input type="text" name="isbn_13" id="isbn_13" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="editorial" class="form-label">Editorial</label>
            <input type="text" name="editorial" id="editorial" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="edicion" class="form-label">Edición</label>
            <input type="text" name="edicion" id="edicion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="anio_publicacion" class="form-label">Año de Publicación</label>
            <input type="number" name="anio_publicacion" id="anio_publicacion" class="form-control" min="1000"
                max="<?= date('Y') ?>" required>
        </div>

        <div class="mb-3">
            <label for="numero_paginas" class="form-label">Número de Páginas</label>
            <input type="number" name="numero_paginas" id="numero_paginas" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="idioma" class="form-label">Idioma</label>
            <input type="text" name="idioma" id="idioma" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" id="categoria" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="portada_url" class="form-label">URL de la Portada</label>
            <input type="url" name="portada_url" id="portada_url" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación Física</label>
            <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="disponibilidad" class="form-label">Disponibilidad</label>
            <select name="disponibilidad" id="disponibilidad" class="form-select" required>
                <option value="Disponible" selected>Disponible</option>
                <option value="No disponible">No disponible</option>
                <option value="Prestado">Prestado</option>
                <option value="Reservado">Reservado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="formato" class="form-label">Formato</label>
            <select name="formato" id="formato" class="form-select" required>
                <option value="Físico">📘 Físico</option>
                <option value="eBook">💻 eBook</option>
                <option value="Audiolibro">🎧 Audiolibro</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="/libros" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
    </form>
</div>