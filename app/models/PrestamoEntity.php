<?php
class PrestamoEntity {
    private int $id_usuario;
    private int $id_libro;
    private string $fecha_prestamo;
    private string $fecha_entrega;
    private ?string $fecha_devolucion;
    private bool $renovado;

    public function __construct(array $data) {
        $this->id_usuario = $data['usuario_id'];
        $this->id_libro = $data['libro_id'];
        $this->fecha_prestamo = $data['fecha_prestamo'] ?? date('Y-m-d');
        $this->fecha_entrega = $data['fecha_entrega'];
        $this->fecha_devolucion = $data['fecha_devolucion'] ?? null;
        $this->renovado = $data['renovado'] ?? false;
    }

    public function getUsuarioId(): int { return $this->id_usuario; }
    public function getLibroId(): int { return $this->id_libro; }
    public function getFechaPrestamo(): string { return $this->fecha_prestamo; }
    public function getFechaEntrega(): string { return $this->fecha_entrega; }
    public function getFechaDevolucion(): ?string { return $this->fecha_devolucion; }
    public function isRenovado(): bool { return $this->renovado; }
}
