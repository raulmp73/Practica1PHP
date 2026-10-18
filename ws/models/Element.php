<?php

declare(strict_types=1);

require_once __DIR__ . '/../interfaces/IToJson.php';

class Element implements IToJson
{
    private string $nombre;
    private string $descripcion;
    private string $categoria;
    private int $cantidad;

    public function __construct(string $nombre, string $descripcion, string $categoria, int $cantidad)
    {
        $this->setNombre($nombre);
        $this->setDescripcion($descripcion);
        $this->setCategoria($categoria);
        $this->setCantidad($cantidad);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function toJson(): string
    {
        return json_encode([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'categoria' => $this->categoria,
            'cantidad' => $this->cantidad,
        ], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    }
}
