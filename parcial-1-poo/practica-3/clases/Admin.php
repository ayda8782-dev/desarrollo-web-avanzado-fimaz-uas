<?php

require_once __DIR__ . '/Usuario.php';

/**
 * Clase Admin — extiende Usuario
 * Agrega el método getRol().
 */
class Admin extends Usuario
{
    public function getRol(): string
    {
        return 'Administrador';
    }
}
