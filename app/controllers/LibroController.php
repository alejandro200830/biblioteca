<?php

require_once '../app/models/LibroEntity.php';

class LibroController extends Controller
{

    public function index()
    {
        $libroModel = $this->model('LibroModel');
        $libros = $libroModel->getAll();
        $this->view('libro/lista', ['libros' => $libros]);
    }

    public function show($id)
    {
        $libroModel = $this->model('LibroModel');
        $libro = $libroModel->getById($id);
        $this->view('libro/mostrar', ['libro' => $libro]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libroModel = $this->model('LibroModel');
            $libro = new LibroEntity($_POST);
            $libroModel->create($libro);
            header("Location: /libros");
        } else {
            $this->view('libro/crear');
        }
    }

    public function delete($id)
    {
        $libroModel = $this->model('LibroModel');
        $libroModel->delete($id);
        header("Location: /libros");
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $criterio = $_POST['criterio'] ?? '';
            $libroModel = $this->model('LibroModel');
            $libros = $libroModel->search($criterio);
            $this->view('libro/lista', ['libros' => $libros, 'criterio' => $criterio]);
        } else {
            header("Location: /libros");
        }
    }

}
