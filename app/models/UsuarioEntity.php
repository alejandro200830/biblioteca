<?php

class UsuarioEntity {
    private int $id;
    private string $nombre;
    private string $correo;
    private string $clave;
    private string $telefono;
    private string $direccion;
    private string $rol;

    public function __construct($data) {
        $this->nombre = $data['nombre'];
        $this->correo = $data['correo'];
        $this->clave = $data['clave'];
        $this->telefono = $data['telefono'];
        $this->direccion = $data['direccion'];
        $this->rol = $data['rol'];
    }

    // GETTERS
    public function getNombre(): string {
        return $this->nombre;
    }

    public function getCorreo(): string {
        return $this->correo;
    }

    public function getClave(): string {
        return $this->clave;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    public function getRol(): string {
        return $this->rol;
    }
}