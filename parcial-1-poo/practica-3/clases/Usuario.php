<?php

/**
 * Clase Usuario (base)
 * Atributos privados con validación de correo.
 * Lanza InvalidArgumentException si el correo no es válido.
 */
class Usuario
{
    private string $nombre;
    private string $correo;

    public function __construct(string $nombre, string $correo)
    {
        if (trim($nombre) === '') {
            throw new InvalidArgumentException('El nombre no puede estar vacío.');
        }
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El correo \"$correo\" no tiene un formato válido.");
        }
        $this->nombre = trim($nombre);
        $this->correo = $correo;
    }

    public function getNombre(): string { return $this->nombre; }
    public function getCorreo(): string  { return $this->correo; }

    public function setNombre(string $nombre): void
    {
        if (trim($nombre) === '') {
            throw new InvalidArgumentException('El nombre no puede estar vacío.');
        }
        $this->nombre = trim($nombre);
    }

    public function setCorreo(string $correo): void
    {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El correo \"$correo\" no tiene un formato válido.");
        }
        $this->correo = $correo;
    }
}
