<?php

/**
 * Clase Usuario
 * 
 * Representa un usuario del sistema con atributos privados
 * y métodos de acceso (getters y setters) para encapsulamiento.
 * 
 * @author Práctica POO - PHP
 * @version 1.0
 */
class Usuario
{
    /**
     * @var string Nombre del usuario
     */
    private string $nombre;

    /**
     * @var string Correo electrónico del usuario
     */
    private string $correo;

    /**
     * Constructor de la clase Usuario
     * 
     * @param string $nombre Nombre del usuario
     * @param string $correo Correo electrónico del usuario
     */
    public function __construct(string $nombre, string $correo)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // ── Getters ──────────────────────────────────────────────

    /**
     * Obtiene el nombre del usuario
     * 
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Obtiene el correo electrónico del usuario
     * 
     * @return string
     */
    public function getCorreo(): string
    {
        return $this->correo;
    }

    // ── Setters ──────────────────────────────────────────────

    /**
     * Establece el nombre del usuario
     * 
     * @param string $nombre
     * @return void
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Establece el correo electrónico del usuario
     * 
     * @param string $correo
     * @return void
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }
}
