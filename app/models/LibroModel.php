<?php

require_once __DIR__ . '/../../core/Database.php';

class LibroModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM libros");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($libro)
    {
        try {
            $sql = "INSERT INTO libros (
                    titulo, subtitulo, autores, isbn_10, isbn_13,
                    editorial, edicion, anio_publicacion, numero_paginas,
                    idioma, categoria, descripcion, portada_url,
                    disponibilidad, ubicacion, fecha_registro, formato
                ) VALUES (
                    :titulo, :subtitulo, :autores, :isbn_10, :isbn_13,
                    :editorial, :edicion, :anio_publicacion, :numero_paginas,
                    :idioma, :categoria, :descripcion, :portada_url,
                    :disponibilidad, :ubicacion, :fecha_registro, :formato
                )";

            $stmt = $this->db->prepare($sql);

            return $stmt->execute([
                ':titulo' => $libro->getTitulo(),
                ':subtitulo' => $libro->getSubtitulo(),
                ':autores' => $libro->getAutores(),
                ':isbn_10' => $libro->getIsbn10(),
                ':isbn_13' => $libro->getIsbn13(),
                ':editorial' => $libro->getEditorial(),
                ':edicion' => $libro->getEdicion(),
                ':anio_publicacion' => $libro->getAnioPublicacion(),
                ':numero_paginas' => $libro->getNumeroPaginas(),
                ':idioma' => $libro->getIdioma(),
                ':categoria' => $libro->getCategoria(),
                ':descripcion' => $libro->getDescripcion(),
                ':portada_url' => $libro->getPortadaUrl(),
                ':disponibilidad' => $libro->getDisponibilidad(),
                ':ubicacion' => $libro->getUbicacion(),
                ':fecha_registro' => $libro->getFechaRegistro(),
                ':formato' => $libro->getFormato()
            ]);
        } catch (PDOException $e) {
            error_log("Error al crear libro: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM libros WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function findByIsbn($isbn)
    {
        $stmt = $this->db->prepare("SELECT * FROM libros WHERE isbn_10 = ? OR isbn_13 = ?");
        $stmt->execute([$isbn, $isbn]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function search($criterio)
    {
        $sql = "SELECT * FROM libros
            WHERE titulo LIKE :criterio 
               OR autores LIKE :criterio 
               OR categoria LIKE :criterio 
               OR isbn_10 LIKE :criterio";

        $stmt = $this->db->prepare($sql);
        $searchTerm = '%' . $criterio . '%';
        $stmt->bindParam(':criterio', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDisponibles()
    {
        $sql = "SELECT * FROM libros 
            WHERE id NOT IN (
                SELECT id_libro FROM prestamos WHERE estado = 'prestado'
            )";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}