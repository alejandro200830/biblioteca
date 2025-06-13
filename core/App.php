<?php

class App {
    protected $controller = 'UsuarioController';
    protected $method = 'login';
    protected $params = [];

    public function __construct() {
        $routes = require_once '../routes/web.php';
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Eliminar barra final si existe
        if ($requestUri !== '/' && substr($requestUri, -1) === '/') {
            $requestUri = rtrim($requestUri, '/');
        }

        if (isset($routes[$requestUri])) {
            // Ruta exacta definida
            $this->controller = $routes[$requestUri]['controller'];
            $this->method = $routes[$requestUri]['method'];
        } else {
            // Verificar rutas dinámicas como /usuarios/mostrar/5
            foreach ($routes as $route => $info) {
                if (strpos($route, '{id}') !== false) {
                    $baseRoute = str_replace('{id}', '', $route);
                    if (strpos($requestUri, $baseRoute) === 0) {
                        $this->controller = $info['controller'];
                        $this->method = $info['method'];
                        $this->params[] = basename($requestUri); // toma el último segmento (id)
                        break;
                    }
                }
            }
        }

        // Cargar controlador
        $controllerFile = '../app/controllers/' . $this->controller . '.php';
        if (!file_exists($controllerFile)) {
            http_response_code(404);
            echo "Controlador no encontrado";
            return;
        }

        require_once $controllerFile;
        $this->controller = new $this->controller;

        // Ejecutar método con parámetros si existe
        if (method_exists($this->controller, $this->method)) {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } else {
            http_response_code(404);
            echo "Método no encontrado";
        }
    }
}