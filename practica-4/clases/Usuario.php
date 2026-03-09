<?php

/**
 * Clase Usuario (base)
 * Atributos protected para que las clases hijas puedan acceder.
 * Valida el correo y lanza Exception si no es válido.
 */
class Usuario
{
    protected string $nombre;
    protected string $correo;

    public function __construct(string $nombre, string $correo)
    {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Correo inválido: \"$correo\"");
        }
        $this->nombre = trim($nombre);
        $this->correo = $correo;
    }

    public function getNombre(): string { return $this->nombre; }
    public function getCorreo(): string  { return $this->correo; }
}
