<?php

require_once __DIR__ . '/../../core/Database.php';

class PrestamoModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function crearPrestamo($prestamo)
    {
        $sql = "INSERT INTO prestamos (id_libro, id_usuario, fecha_prestamo, fecha_entrega, fecha_devolucion, estado)
                VALUES (:id_libro, :id_usuario, :fecha_prestamo, :fecha_entrega, :fecha_devolucion, 'prestado')";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id_libro' => $prestamo->getLibroId(),
            ':id_usuario' => $prestamo->getUsuarioId(),
            ':fecha_prestamo' => $prestamo->getFechaPrestamo(),
            ':fecha_entrega' => $prestamo->getFechaEntrega(),
            ':fecha_devolucion' => $prestamo->getFechaDevolucion()
        ]);
    }

    public function renovarPrestamo($id, $nuevaFechaEntrega)
    {
        $sql = "UPDATE prestamos 
                SET fecha_entrega = :fecha_entrega 
                WHERE id = :id AND estado = 'prestado'";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':fecha_entrega' => $nuevaFechaEntrega,
            ':id' => $id
        ]);
    }

    public function registrarDevolucion($id)
    {
        $sql = "UPDATE prestamos 
                SET estado = 'devuelto', fecha_devolucion = NOW() 
                WHERE id = :id AND estado = 'prestado'";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function crearReserva($datos)
    {
        $sql = "INSERT INTO reservas (id_libro, id_usuario, fecha_reserva)
                VALUES (:id_libro, :id_usuario, NOW())";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id_libro' => $datos['id_libro'],
            ':id_usuario' => $datos['id_usuario']
        ]);
    }

    public function historialPorUsuario($id_usuario)
    {
        $sql = "SELECT p.*, l.titulo 
                FROM prestamos p
                JOIN libros l ON p.id_libro = l.id
                WHERE p.id_usuario = :id_usuario
                ORDER BY p.fecha_prestamo DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_usuario' => $id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function libroEstaPrestado($id_libro)
    {
        $sql = "SELECT COUNT(*) 
                FROM prestamos 
                WHERE id_libro = :id_libro AND estado = 'prestado'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_libro' => $id_libro]);
        return $stmt->fetchColumn() > 0;
    }
public function obtenerTodos()
{
    $sql = "SELECT p.id, u.nombre AS nombre_usuario, l.titulo AS titulo_libro,
                   p.fecha_entrega, p.fecha_devolucion, p.estado
            FROM prestamos p
            JOIN usuario u ON p.id_usuario = u.id
            JOIN libros l ON p.id_libro = l.id
            ORDER BY p.fecha_prestamo DESC";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $prestamos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Agregar campo 'devuelto' según estado
    foreach ($prestamos as &$prestamo) {
        $prestamo['devuelto'] = ($prestamo['estado'] === 'devuelto');
    }

    return $prestamos;
}

}
