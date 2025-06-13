<?php
require_once __DIR__ . '/../app/models/PrestamoModel.php';
require_once __DIR__ . '/../core/Database.php';

echo "=== PRUEBAS PRESTAMOMODEL ===\n";

$model = new PrestamoModel();

// Prueba 1: Verificar si un libro está prestado
$libroId = 1; // usa un ID válido de prueba
$resultado = $model->libroEstaPrestado($libroId);

if (is_bool($resultado)) {
    echo "[✔] libroEstaPrestado() devuelve un booleano\n";
} else {
    echo "[✖] libroEstaPrestado() NO devuelve un booleano\n";
}

// Prueba 2: Crear un préstamo
$datos = [
    'id_libro' => 1,
    'id_usuario' => 1,
    'fecha_prestamo' => date('Y-m-d'),
    'fecha_entrega' => date('Y-m-d', strtotime('+7 days'))
];

$resultado = $model->crearPrestamo($datos);

if ($resultado) {
    echo "[✔] crearPrestamo() ejecutado correctamente\n";
} else {
    echo "[✖] crearPrestamo() falló\n";
}
