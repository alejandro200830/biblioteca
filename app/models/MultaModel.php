<?php

class MultaModel {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function calcularMulta($id_prestamo, $tipoUsuario, $tipoMaterial, $fechaDevolucion) {
        $tarifa = $this->obtenerTarifa($tipoUsuario, $tipoMaterial);
        $diasRetraso = $this->diasRetraso($id_prestamo, $fechaDevolucion);

        if ($diasRetraso > 0) {
            $monto = $diasRetraso * $tarifa;
            $sql = "INSERT INTO multas (id_prestamo, monto) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id_prestamo, $monto]);
        }
        return false;
    }

    private function diasRetraso($id_prestamo, $fechaDevolucion) {
        $sql = "SELECT fecha_entrega FROM prestamos WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_prestamo]);
        $fechaEntrega = $stmt->fetchColumn();
        return max(0, (strtotime($fechaDevolucion) - strtotime($fechaEntrega)) / (60 * 60 * 24));
    }

    private function obtenerTarifa($tipoUsuario, $tipoMaterial) {
        // Valores ejemplo: estudiante/libro = 0.50, docente/libro = 0.30
        $tarifas = [
            'estudiante' => ['fisico' => 0.5, 'ebook' => 0.2, 'audiolibro' => 0.3],
            'docente' => ['fisico' => 0.3, 'ebook' => 0.1, 'audiolibro' => 0.2]
        ];
        return $tarifas[$tipoUsuario][$tipoMaterial] ?? 0.5;
    }

    public function obtenerMultasUsuario($id_usuario) {
        $sql = "SELECT m.*, p.id_usuario FROM multas m 
                JOIN prestamos p ON m.id_prestamo = p.id 
                WHERE p.id_usuario = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_usuario]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pagarMulta($id_multa) {
        $sql = "UPDATE multas SET estado = 'pagado', fecha_pago = NOW() WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_multa]);
    }

    public function tieneMultasPendientes($id_usuario) {
        $sql = "SELECT COUNT(*) FROM multas m
                JOIN prestamos p ON m.id_prestamo = p.id
                WHERE p.id_usuario = ? AND m.estado = 'pendiente'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_usuario]);
        return $stmt->fetchColumn() > 0;
    }
}
