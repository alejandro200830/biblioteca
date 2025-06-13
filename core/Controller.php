<?php

class Controller {

    public function view($view, $data = []) {
        extract($data); // convierte array en variables
        ob_start();
        require_once "../app/views/$view.php"; // ejemplo: usuario/index.php
        $content = ob_get_clean();
        require_once "../app/views/layout.php"; // tu layout (puede llamarse main.php si lo renombraste)
    }

    public function model($model) {
            require_once "../app/models/$model.php";
            return new $model();
    }
}