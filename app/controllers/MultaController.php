<?php

class MultaController extends Controller
{
    public function index()
    {
        session_start();    
        $usuarioId = $_SESSION['usuario']['id'] ?? null;
        if (!$usuarioId) {
            header("Location: /inicio");
            exit;
        }
        $model = $this->model('MultaModel');
        $multas = $model->obtenerMultasUsuario($usuarioId);
        $this->view('multas/lista', ['multas' => $multas]);
    }

    public function pagar($id)
    {
        session_start();
        $usuarioId = $_SESSION['usuario']['id'] ?? null;
        if (!$usuarioId) {
            header("Location: /inicio");
            exit;
        }

        $model = $this->model('MultaModel');
        $model->pagarMulta($id);

        header("Location: /multas");
    }
}
