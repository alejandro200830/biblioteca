<?php
require_once __DIR__ . '/../app/models/UsuarioModel.php';
require_once __DIR__ . '/../app/entities/UsuarioEntity.php'; // Solo si tienes esta clase

echo "=== PRUEBAS USUARIOMODEL ===\n";

$model = new UsuarioModel();

// ⚠ Asegúrate de que esta clase exista, si no, puedes usar un stdClass o arreglo.
$usuario = new UsuarioEntity([
    'nombre'    => 'Prueba Unitaria',
    'correo'    => 'testunitario' . rand(1000, 9999) . '@ejemplo.com',
    'clave'     => '1234',
    'telefono'  => '123456789',
    'direccion' => 'Calle Falsa 123',
    'rol'       => 'lector'
]);

// Prueba 1: Crear usuario
$creado = $model->create($usuario);
echo $creado ? "[✔] Usuario creado correctamente\n" : "[✖] Error al crear usuario\n";

// Prueba 2: Buscar por correo
$encontrado = $model->findByCorreo($usuario->getCorreo());
echo $encontrado ? "[✔] Usuario encontrado por correo\n" : "[✖] No se encontró el usuario por correo\n";

// Prueba 3: Buscar por ID
if ($encontrado) {
    $usuarioId = $encontrado['id'];
    $porId = $model->getById($usuarioId);
    echo $porId ? "[✔] Usuario encontrado por ID\n" : "[✖] No se encontró el usuario por ID\n";
}

// Prueba 4: Obtener todos los usuarios
$usuarios = $model->getAll();
echo is_array($usuarios) ? "[✔] getAll() devuelve un array\n" : "[✖] getAll() no devuelve un array\n";

// Prueba 5: Eliminar usuario
if (isset($usuarioId)) {
    $eliminado = $model->delete($usuarioId);
    echo $eliminado ? "[✔] Usuario eliminado correctamente\n" : "[✖] Error al eliminar usuario\n";
}
