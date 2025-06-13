<?php

class LibroEntity {
    private int $id;
    private string $titulo;
    private ?string $subtitulo;
    private string $autores;
    private ?string $isbn_10;
    private ?string $isbn_13;
    private ?string $editorial;
    private ?string $edicion;
    private ?int $anio_publicacion;
    private ?int $numero_paginas;
    private ?string $idioma;
    private ?string $categoria;
    private ?string $descripcion;
    private ?string $portada_url;
    private string $disponibilidad;
    private ?string $ubicacion;
    private string $fecha_registro;
    private string $formato;

    public function __construct(array $data) {
        $this->titulo = $data['titulo'];
        $this->subtitulo = $data['subtitulo'] ?? null;
        $this->autores = $data['autores'];
        $this->isbn_10 = $data['isbn_10'] ?? null;
        $this->isbn_13 = $data['isbn_13'] ?? null;
        $this->editorial = $data['editorial'] ?? null;
        $this->edicion = $data['edicion'] ?? null;
        $this->anio_publicacion = isset($data['anio_publicacion']) ? (int) $data['anio_publicacion'] : null;
        $this->numero_paginas = isset($data['numero_paginas']) ? (int) $data['numero_paginas'] : null;
        $this->idioma = $data['idioma'] ?? null;
        $this->categoria = $data['categoria'] ?? null;
        $this->descripcion = $data['descripcion'] ?? null;
        $this->portada_url = $data['portada_url'] ?? null;
        $this->disponibilidad = $data['disponibilidad'] ?? 'Disponible';
        $this->ubicacion = $data['ubicacion'] ?? null;
        $this->fecha_registro = $data['fecha_registro'] ?? date('Y-m-d H:i:s');
        $this->formato = $data['formato'] ?? 'Físico';
    }

    // GETTERS
    public function getTitulo(): string { return $this->titulo; }
    public function getSubtitulo(): ?string { return $this->subtitulo; }
    public function getAutores(): string { return $this->autores; }
    public function getIsbn10(): ?string { return $this->isbn_10; }
    public function getIsbn13(): ?string { return $this->isbn_13; }
    public function getEditorial(): ?string { return $this->editorial; }
    public function getEdicion(): ?string { return $this->edicion; }
    public function getAnioPublicacion(): ?int { return $this->anio_publicacion; }
    public function getNumeroPaginas(): ?int { return $this->numero_paginas; }
    public function getIdioma(): ?string { return $this->idioma; }
    public function getCategoria(): ?string { return $this->categoria; }
    public function getDescripcion(): ?string { return $this->descripcion; }
    public function getPortadaUrl(): ?string { return $this->portada_url; }
    public function getDisponibilidad(): string { return $this->disponibilidad; }
    public function getUbicacion(): ?string { return $this->ubicacion; }
    public function getFechaRegistro(): string { return $this->fecha_registro; }
    public function getFormato(): string { return $this->formato; }
}