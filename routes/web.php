<?php

return [
    // Rutas de usuario
    '/' => ['controller' => 'UsuarioController', 'method' => 'login'],
    '/registrar' => ['controller' => 'UsuarioController', 'method' => 'registe'],
    '/inicio' => ['controller' => 'HomeController', 'method' => 'index'],
    '/usuarios' => ['controller' => 'UsuarioController', 'method' => 'index'],
    '/usuario/crear' => ['controller' => 'UsuarioController', 'method' => 'create'],
    '/usuario/mostrar/{id}' => ['controller' => 'UsuarioController', 'method' => 'show'],
    '/usuario/eliminar/{id}' => ['controller' => 'UsuarioController', 'method' => 'delete'],
    // Rutas de libros
    '/libros' => ['controller' => 'LibroController', 'method' => 'index'],
    '/libro/crear' => ['controller' => 'LibroController', 'method' => 'create'],
    '/libro/mostrar/{id}' => ['controller' => 'LibroController', 'method' => 'show'],
    '/libro/eliminar/{id}' => ['controller' => 'LibroController', 'method' => 'delete'],
    '/libro/buscar' => ['controller' => 'LibroController', 'method' => 'search'],
    // Rutas de préstamos
    '/prestamos' => ['controller' => 'PrestamoController', 'method' => 'index'],
    '/prestamo/crear' => ['controller' => 'PrestamoController', 'method' => 'crear'],
    '/prestamo/renovar/{id}' => ['controller' => 'PrestamoController', 'method' => 'renovar'],
    '/prestamo/devolver/{id}' => ['controller' => 'PrestamoController', 'method' => 'devolver'],
    '/prestamo/historial/{idUsuario}' => ['controller' => 'PrestamoController', 'method' => 'historial'],
    '/prestamo/reservar/{idLibro}' => ['controller' => 'PrestamoController', 'method' => 'reservar'],
    // Rutas de multas
    '/multas' => ['controller' => 'MultaController', 'method' => 'index'],
    '/multa/pagar/{id}' => ['controller' => 'MultaController', 'method' => 'pagar']

];
