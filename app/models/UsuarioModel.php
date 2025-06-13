<?php

require_once __DIR__ . '/../../core/Database.php';

class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($usuario) {
        try {
            $sql = "INSERT INTO usuario (nombre, correo, clave, telefono, direccion, rol)
                    VALUES (:nombre, :correo, :clave, :telefono, :direccion, :rol)";
            $stmt = $this->db->prepare($sql);

            // Hashear la clave de forma segura
            $hashedPassword = md5($usuario->getClave());

            return $stmt->execute([
                ':nombre'    => $usuario->getNombre() ,
                ':correo'    => $usuario->getCorreo(),
                ':clave'     => $hashedPassword,
                ':telefono'  => $usuario->getTelefono(),
                ':direccion' => $usuario->getDireccion(),
                ':rol'       => $usuario->getRol()
            ]);
        } catch (PDOException $e) {
            error_log("Error al crear usuario: " . $e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM usuario WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function findByCorreo($correo) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE correo = ?");
        $stmt->execute([$correo]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
