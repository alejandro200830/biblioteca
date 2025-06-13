<?php
require_once __DIR__ . '/../app/models/LibroModel.php';
require_once __DIR__ . '/../app/entities/LibroEntity.php'; // Asegúrate de que esta clase exista

echo "=== PRUEBAS LIBROMODEL ===\n";

$model = new LibroModel();

// Crear libro de prueba (puedes ajustar si no usas LibroEntity)
$libro = new LibroEntity([
    'titulo'           => 'PHP Unit Test',
    'subtitulo'        => 'Pruebas en PHP',
    'autores'          => 'Test Developer',
    'isbn_10'          => '0123456789',
    'isbn_13'          => '9780123456789',
    'editorial'        => 'Test Editorial',
    'edicion'          => '1',
    'anio_publicacion' => '2024',
    'numero_paginas'   => '123',
    'idioma'           => 'Español',
    'categoria'        => 'Programación',
    'descripcion'      => 'Libro de prueba para test',
    'portada_url'      => '',
    'disponibilidad'   => 'sí',
    'ubicacion'        => 'Estante T',
    'fecha_registro'   => date('Y-m-d'),
    'formato'          => 'físico'
]);

// Prueba 1: Crear libro
$creado = $model->create($libro);
echo $creado ? "[✔] Libro creado correctamente\n" : "[✖] Error al crear libro\n";

// Prueba 2: Buscar por ISBN
$encontrado = $model->findByIsbn($libro->getIsbn10());
echo $encontrado ? "[✔] Libro encontrado por ISBN\n" : "[✖] Libro no encontrado por ISBN\n";

// Guardar ID para otras pruebas
if ($encontrado) {
    $libroId = $encontrado['id'];
}

// Prueba 3: Obtener libro por ID
if (isset($libroId)) {
    $porId = $model->getById($libroId);
    echo $porId ? "[✔] Libro encontrado por ID\n" : "[✖] No se encontró el libro por ID\n";
}

// Prueba 4: Obtener todos los libros
$libros = $model->getAll();
echo is_array($libros) ? "[✔] getAll() devuelve un array\n" : "[✖] getAll() falló\n";

// Prueba 5: Buscar por criterio
$busqueda = $model->search('PHP');
echo count($busqueda) > 0 ? "[✔] Búsqueda por criterio funciona\n" : "[✖] No se encontraron resultados por criterio\n";

// Prueba 6: Obtener disponibles
$disponibles = $model->getDisponibles();
echo is_array($disponibles) ? "[✔] Libros disponibles obtenidos\n" : "[✖] Error en getDisponibles()\n";

// Prueba 7: Eliminar libro
if (isset($libroId)) {
    $eliminado = $model->delete($libroId);
    echo $eliminado ? "[✔] Libro eliminado correctamente\n" : "[✖] Error al eliminar libro\n";
}
