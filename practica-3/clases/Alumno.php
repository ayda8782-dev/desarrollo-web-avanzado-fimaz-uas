<?php

require_once __DIR__ . '/Usuario.php';

/**
 * Clase Alumno — extiende Usuario
 * Agrega atributo $matricula y método getRol().
 */
class Alumno extends Usuario
{
    private string $matricula;

    public function __construct(string $nombre, string $correo, string $matricula)
    {
        parent::__construct($nombre, $correo);
        if (trim($matricula) === '') {
            throw new InvalidArgumentException('La matrícula no puede estar vacía.');
        }
        $this->matricula = strtoupper(trim($matricula));
    }

    public function getMatricula(): string { return $this->matricula; }

    public function setMatricula(string $matricula): void
    {
        if (trim($matricula) === '') {
            throw new InvalidArgumentException('La matrícula no puede estar vacía.');
        }
        $this->matricula = strtoupper(trim($matricula));
    }

    public function getRol(): string
    {
        return 'Alumno';
    }
}
