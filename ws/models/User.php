<?php

declare(strict_types=1);

require_once __DIR__ . '/../interfaces/IToJson.php';

class User implements IToJson
{
    private string $nombre;
    private string $apellidos;
    private string $contrasena;
    private string $telefono;
    private string $email;
    private string $sexo;

    public function __construct(string $nombre, string $apellidos, string $contrasena, string $telefono, string $email, string $sexo)
    {
        $this->setNombre($nombre);
        $this->setApellidos($apellidos);
        $this->setContrasena($contrasena);
        $this->setTelefono($telefono);
        $this->setEmail($email);
        $this->setSexo($sexo);
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    public function toJson(): string
    {
        return json_encode([
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'contrasena' => $this->contrasena,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'sexo' => $this->sexo,
        ], JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    }
}
