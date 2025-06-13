<?php

require_once '../app/models/UsuarioEntity.php';

class UsuarioController extends Controller {
    
    public function index() {
        $userModel = $this->model('UsuarioModel');
        $usuarios = $userModel->getAll();
        $this->view('usuario/lista', ['usuarios' => $usuarios]);
    }

    public function show($id) {
        $userModel = $this->model('UsuarioModel');
        $usuario = $userModel->getById($id);
        $this->view('usuario/mostrar', ['usuario' => $usuario]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('UsuarioModel');
            $usuario = new UsuarioEntity($_POST);
            $userModel->create($usuario);
            header("Location: /usuarios");
        } else {
            $this->view('usuario/crear');
        }
    }

    public function registe() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('UsuarioModel');
            $usuario = new UsuarioEntity($_POST);
            $userModel->create($usuario);
            header("Location: /");
        } else {
            $this->view('auth/registrar');
        }
    }

    public function delete($id) {
        $userModel = $this->model('UsuarioModel');
        $userModel->delete($id);
        header("Location: /usuarios");
    }

    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $correo = $_POST['correo'] ?? '';
        $clave = $_POST['clave'] ?? '';

        $userModel = $this->model('UsuarioModel');

        $usuario = $userModel->findByCorreo($correo);

        if ($usuario && md5($clave) === $usuario['clave'])  {

            session_start();
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'rol' => $usuario['idrol']
            ];
            header("Location: /inicio");
        } else {
            $this->view('auth/login', ['error' => 'Correo o clave incorrectos']);
        }
    } else {
        $this->view('auth/login');
    }
}

}