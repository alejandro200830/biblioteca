<?php

require_once '../app/models/PrestamoEntity.php';

class PrestamoController extends Controller {
    
    public function index() {
        $model = $this->model('PrestamoModel');
        $prestamos = $model->obtenerTodos();
        $this->view('prestamos/lista', ['prestamos' => $prestamos]);
    }

     public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prestamo = new PrestamoEntity($_POST);

            $multaModel = $this->model('MultaModel');

            if ($multaModel->tieneMultasPendientes($prestamo->getUsuarioId())) {
                die("No puedes realizar préstamos hasta que pagues tus multas.");}

            $model = $this->model('PrestamoModel');
            $model->crearPrestamo($prestamo);
            header("Location: /prestamos");
        } else {
            $libroModel = $this->model('LibroModel');
            $usuarioModel = $this->model('UsuarioModel');
            
            $librosDisponibles = $libroModel->getDisponibles();
            $usuarios = $usuarioModel->getAll();

            $this->view('prestamos/crear', [
                'libros' => $librosDisponibles,
                'usuarios' => $usuarios
            ]);
        }
    }
    
    public function renovar($id) {
        $model = $this->model('PrestamoModel');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevaFecha = $_POST['fecha_entrega'];
            $model->renovarPrestamo($id, $nuevaFecha);
            header("Location: /prestamos");
        } else {
            $this->view('prestamos/renovar', ['id' => $id]);
        }
    }

    public function devolver($id) {
        $model = $this->model('PrestamoModel');
        $model->registrarDevolucion($id);
        header("Location: /prestamos");
    }

    public function historial($idUsuario) {
        $model = $this->model('PrestamoModel');
        $historial = $model->obtenerHistorialUsuario($idUsuario);
        $this->view('prestamos/historial', ['historial' => $historial]);
    }

    public function reservar($idLibro) {
        session_start();
        $usuarioId = $_SESSION['usuario']['id'] ?? null;
        if ($usuarioId) {
            $model = $this->model('PrestamoModel');
            $model->reservarLibro($usuarioId, $idLibro);
        }
        header("Location: /libro/mostrar/$idLibro");
    }
}